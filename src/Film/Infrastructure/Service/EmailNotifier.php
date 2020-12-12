<?php
declare(strict_types=1);

namespace LaSalle\Film\Infrastructure\Service;

use LaSalle\Film\Domain\Service\Notifier;

class EmailNotifier implements Notifier
{
    public function notify(string $message)
    {
        echo "Sending Email with content \"$message\"";
    }
}
