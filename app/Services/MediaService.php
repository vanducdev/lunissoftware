<?php

namespace App\Services;

use App\Models\MediaFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MediaService
{
    /**
     * Store an uploaded media asset and record its metadata.
     */
    public function upload(UploadedFile $file, string $folder = 'general', ?string $altText = null): MediaFile
    {
        $originalName = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension() ?: 'bin';
        $filename = Str::slug(pathinfo($originalName, PATHINFO_FILENAME)).'-'.Str::random(8).'.'.$extension;

        $path = $file->storeAs("media/{$folder}", $filename, 'public');

        $mimeType = $file->getClientMimeType() ?: 'application/octet-stream';
        $size = $file->getSize();

        $width = null;
        $height = null;

        if (str_starts_with($mimeType, 'image/')) {
            $dimensions = @getimagesize($file->getRealPath());
            if ($dimensions) {
                $width = $dimensions[0];
                $height = $dimensions[1];
            }
        }

        return MediaFile::create([
            'user_id' => auth()->id(),
            'filename' => $filename,
            'original_name' => $originalName,
            'path' => $path,
            'mime_type' => $mimeType,
            'size' => $size,
            'width' => $width,
            'height' => $height,
            'alt_text' => $altText ?: pathinfo($originalName, PATHINFO_FILENAME),
            'folder' => $folder,
        ]);
    }

    /**
     * Delete the media asset from storage disk and database.
     */
    public function delete(MediaFile $media): bool
    {
        if (Storage::disk('public')->exists($media->path)) {
            Storage::disk('public')->delete($media->path);
        }

        return (bool) $media->delete();
    }
}
