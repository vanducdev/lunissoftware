<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\MediaFile;
use App\Services\MediaService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    public function __construct(
        protected MediaService $mediaService
    ) {}

    public function index(Request $request): View
    {
        $query = MediaFile::with('user')->latest();

        if ($request->filled('search')) {
            $term = $request->search;
            $query->where(function ($q) use ($term) {
                $q->where('original_name', 'like', "%{$term}%")
                    ->orWhere('filename', 'like', "%{$term}%")
                    ->orWhere('alt_text', 'like', "%{$term}%");
            });
        }

        if ($request->filled('folder')) {
            $query->where('folder', $request->folder);
        }

        if ($request->filled('type') && $request->type === 'image') {
            $query->where('mime_type', 'like', 'image/%');
        }

        $mediaFiles = $query->paginate(24)->withQueryString();
        $totalCount = MediaFile::count();
        $totalBytes = MediaFile::sum('size');

        return view('admin.media.index', compact('mediaFiles', 'totalCount', 'totalBytes'));
    }

    public function store(Request $request): JsonResponse|RedirectResponse
    {
        $request->validate([
            'file' => ['required', 'file', 'mimes:jpeg,jpg,png,webp,svg,gif,pdf', 'max:10240'],
            'alt_text' => ['nullable', 'string', 'max:255'],
            'folder' => ['nullable', 'string', 'max:50'],
        ]);

        $folder = $request->input('folder') ?: 'general';
        $altText = $request->input('alt_text');

        $media = $this->mediaService->upload($request->file('file'), $folder, $altText);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'media_uploaded',
            'description' => "Đã tải lên tệp: {$media->original_name} ({$media->formatted_size})",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'media' => $media,
                'url' => $media->url,
            ]);
        }

        return redirect()->route('admin.media.index')->with('success', "Tệp {$media->original_name} đã được tải lên thành công.");
    }

    public function destroy(MediaFile $medium): RedirectResponse
    {
        $name = $medium->original_name;
        $this->mediaService->delete($medium);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'action' => 'media_deleted',
            'description' => "Đã xóa tệp tin media: {$name}",
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        return redirect()->route('admin.media.index')->with('success', "Đã xóa tệp {$name} thành công.");
    }
}
