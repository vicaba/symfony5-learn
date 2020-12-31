<?php
declare(strict_types=1);

namespace LaSalle\App\Film\RequestListener;

use Symfony\Component\Filesystem\Filesystem;

class RequestListener
{
    public function __construct(
        private string $filmDatabaseDirectoryPath,
        private string $filmDatabaseFilePath,
        private Filesystem $filesystem
    ) {}

    public function __invoke()
    {
        if (!$this->filesystem->exists($this->filmDatabaseDirectoryPath)) {
            $this->filesystem->mkdir($this->filmDatabaseDirectoryPath);

            $this->filesystem->touch($this->filmDatabaseFilePath);
            $this->filesystem->appendToFile($this->filmDatabaseFilePath, serialize([]));
        }
    }
}