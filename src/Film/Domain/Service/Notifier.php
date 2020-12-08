<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\Service;

interface Notifier
{
    public function notify(string $message);
}