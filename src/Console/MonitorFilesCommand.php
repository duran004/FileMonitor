<?php

namespace Dcyilmaz\FileMonitor\Console;

use Illuminate\Console\Command;
use Dcyilmaz\FileMonitor\Models\FileRecord;
use Illuminate\Support\Facades\File;

class MonitorFilesCommand extends Command
{
    protected $signature = 'file-monitor:check {--init}';
    protected $description = 'Monitor files for changes or new files';

    public function handle()
    {
        $isInitial = $this->option('init');

        $allowedExtensions = ['php', '.htaccess', 'js']; // Kontrol edilecek dosya türleri

        $files = File::allFiles(base_path());
        $totalFiles = count($files);
        $processedFiles = 0;

        $this->output->writeln("Total files: $totalFiles", "yellow");

        foreach ($files as $file) {
            $filePath = $file->getRealPath();
            $extension = $file->getExtension();

            if (!in_array($extension, $allowedExtensions)) {
                continue;
            }

            $hash = hash_file('sha256', $filePath);

            $existingFile = FileRecord::where('file_path', $filePath)->first();

            if ($isInitial) {
                if (!$existingFile) {
                    FileRecord::create([
                        'file_path' => $filePath,
                        'hash' => $hash,
                    ]);
                }
            } else {
                if (!$existingFile) {
                    $this->warn("New file detected: $filePath");
                } elseif ($existingFile->hash !== $hash) {
                    $this->warn("File changed: $filePath");
                }
            }

            $processedFiles++;
            $percentage = ($processedFiles / $totalFiles) * 100;
            $this->output->write("\rLoading: " . number_format($percentage, 2) . "%");
        }

        $this->output->writeln("\nScan complete!");
    }
}
