<?php
declare(strict_types=1);

namespace LaSalle\App\Film\RequestListener;

use Symfony\Component\Filesystem\Filesystem;

class RequestListener
{
    public function __construct(private string $projectDirectory, private Filesystem $filesystem)
    {}

    public function __invoke()
    {
        $filmDatabaseDirectory = "$this->projectDirectory/var/film_db/";

        if (!$this->filesystem->exists($filmDatabaseDirectory)) {
            $this->filesystem->mkdir($filmDatabaseDirectory);
        }
    }
}