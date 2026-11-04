<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class DownloadController extends Controller
{
    /**
     * Display the downloads index page with dynamic file listings.
     */
    public function index(): View
    {
        $products = Product::published()
            ->with('category')
            ->orderBy('order')
            ->get();

        $directFiles = $this->scanDownloadFiles();

        // Match uploaded files from dowload folder to registered products
        foreach ($products as $product) {
            foreach ($directFiles as $file) {
                $cleanProdName = strtolower((string) preg_replace('/[^a-zA-Z0-9]/', '', $product->name));
                $cleanFileName = strtolower((string) preg_replace('/[^a-zA-Z0-9]/', '', $file['filename']));
                $cleanSlug = strtolower((string) preg_replace('/[^a-zA-Z0-9]/', '', $product->slug));

                if (
                    (str_contains($cleanFileName, 'lushcare') && str_contains($cleanProdName, 'lushcare')) ||
                    (str_contains($cleanFileName, 'lushlogin') && str_contains($cleanProdName, 'lushlogin')) ||
                    (str_contains($cleanFileName, 'lushcrm') && str_contains($cleanProdName, 'lushcrm')) ||
                    (str_contains($cleanFileName, 'lushzalo') && str_contains($cleanProdName, 'lushzalo')) ||
                    (str_contains($cleanFileName, 'lushchat') && str_contains($cleanProdName, 'lushchat')) ||
                    (str_contains($cleanFileName, 'lushshopee') && str_contains($cleanProdName, 'lushshopee')) ||
                    (str_contains($cleanFileName, 'lushtiktok') && str_contains($cleanProdName, 'lushtiktok')) ||
                    (str_contains($cleanFileName, 'lushtelegram') && str_contains($cleanProdName, 'lushtelegram')) ||
                    str_contains($cleanFileName, $cleanSlug)
                ) {
                    $product->direct_file = $file;
                    break;
                }
            }
        }

        return view('pages.downloads', compact('products', 'directFiles'));
    }

    /**
     * Download a file directly from the dowload folder.
     */
    public function downloadDirect(Request $request, string $file): BinaryFileResponse
    {
        // Prevent directory traversal attacks
        $fileName = basename($file);

        $directories = [
            base_path('dowload'),
            base_path('download'),
            public_path('dowload'),
            public_path('downloads'),
        ];

        $targetPath = null;
        foreach ($directories as $dir) {
            $candidate = $dir.DIRECTORY_SEPARATOR.$fileName;
            if (file_exists($candidate) && is_file($candidate)) {
                $targetPath = $candidate;
                break;
            }
        }

        if (! $targetPath) {
            abort(404, 'Tập tin tải về không tồn tại hoặc đã được cập nhật phiên bản mới.');
        }

        $extension = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        $mimeType = match ($extension) {
            'exe' => 'application/x-msdownload',
            'zip' => 'application/zip',
            'rar' => 'application/x-rar-compressed',
            '7z' => 'application/x-7z-compressed',
            'msi' => 'application/x-msi',
            'dmg' => 'application/x-apple-diskimage',
            'pkg' => 'application/octet-stream',
            default => 'application/octet-stream',
        };

        $headers = [
            'Content-Description' => 'File Transfer',
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'attachment; filename="'.$fileName.'"',
            'Content-Transfer-Encoding' => 'binary',
            'Expires' => '0',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Pragma' => 'public',
            'Content-Length' => (string) filesize($targetPath),
        ];

        return response()->download($targetPath, $fileName, $headers);
    }

    /**
     * Scan dowload directory for uploaded .exe and .zip files.
     *
     * @return array<int, array<string, mixed>>
     */
    protected function scanDownloadFiles(): array
    {
        $directories = [
            base_path('dowload'),
            base_path('download'),
            public_path('dowload'),
            public_path('downloads'),
        ];

        $files = [];
        $scannedNames = [];

        foreach ($directories as $dir) {
            if (! is_dir($dir)) {
                continue;
            }

            $items = scandir($dir);
            if (! $items) {
                continue;
            }

            foreach ($items as $item) {
                if ($item === '.' || $item === '..' || in_array($item, $scannedNames, true)) {
                    continue;
                }

                $fullPath = $dir.DIRECTORY_SEPARATOR.$item;
                if (! is_file($fullPath)) {
                    continue;
                }

                $ext = strtolower(pathinfo($item, PATHINFO_EXTENSION));
                if (! in_array($ext, ['exe', 'zip', 'rar', '7z', 'msi', 'dmg', 'pkg', 'tar', 'gz'], true)) {
                    continue;
                }

                $sizeBytes = (int) filesize($fullPath);
                $sizeMb = round($sizeBytes / 1048576, 2);

                // Extract version if present (e.g. LushCare_v26.02_Setup.exe -> v26.02)
                $version = '2026.1';
                if (preg_match('/v?([0-9]+(\.[0-9]+)+)/i', $item, $matches)) {
                    $version = 'v'.ltrim($matches[1], 'v');
                }

                // Generate clean display title
                $cleanTitle = (string) preg_replace('/(\.[a-zA-Z0-9]+)$/', '', $item);
                $cleanTitle = str_replace(['_', '-'], ' ', $cleanTitle);

                $files[] = [
                    'filename' => $item,
                    'title' => ucwords($cleanTitle),
                    'version' => $version,
                    'extension' => strtoupper($ext),
                    'size_bytes' => $sizeBytes,
                    'size_formatted' => $sizeMb >= 1 ? ($sizeMb.' MB') : round($sizeBytes / 1024, 1).' KB',
                    'updated_at' => date('d/m/Y', (int) filemtime($fullPath)),
                    'download_url' => route('downloads.direct', ['file' => $item]),
                    'sha256' => substr(hash_file('sha256', $fullPath), 0, 16).'...',
                ];

                $scannedNames[] = $item;
            }
        }

        return $files;
    }
}
