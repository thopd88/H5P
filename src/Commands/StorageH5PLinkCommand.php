<?php

namespace EscolaLms\HeadlessH5P\Commands;

use EscolaLms\HeadlessH5P\Repositories\H5PFileStorageRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\ExpectationFailedException;

class StorageH5PLinkCommand extends Command
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'h5p:storage-link {--relative : Create the symbolic link using relative paths} {--overwrite : Overwrite files if they existed before}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create the symbolic links for H5P configured for the application';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $relative = $this->option('relative');
        $overwrite = $this->option('overwrite');

        $links = $this->links();

        foreach ($links as $link => $target) {
            if (!$overwrite && (is_link($link) || file_exists($link))) {
                $this->error("The [$link] link already exists.");
                continue;
            }

            // Remove existing link/directory
            if (is_link($link)) {
                unlink($link);
            } elseif (is_dir($link)) {
                rmdir($link);
            }

            // Create symbolic link
            if (!symlink($target, $link)) {
                $this->error("Failed to create symbolic link from [$link] to [$target].");
                continue;
            }

            $this->info("The [$link] link has been connected to [$target].");
        }

        $this->info('The links have been created.');
    }

    /**
     * Get the symbolic links that are configured for the application.
     *
     * @return array
     */
    protected function links()
    {
        return[
            public_path('h5p') => storage_path('app/h5p'),
            public_path('h5p-core') => base_path().'/vendor/h5p/h5p-core',
            public_path('h5p-editor') => base_path().'/vendor/thopd/h5p-editor',
        ];
    }
}
