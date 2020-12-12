<?php
declare(strict_types=1);

namespace LaSalle\Film\Infrastructure\Service;

use LaSalle\Film\Domain\Service\Notifier;
use LaSalle\Film\Domain\Service\NotifierBaseDecorator;

class SMSNotifierDecorator extends NotifierBaseDecorator
{
    public function __construct(Notifier $wrapee)
    {
        parent::__construct($wrapee);
    }

    public function notify(string $message)
    {
        parent::notify($message);

        echo "Sending SMS with content \"$message\"";
    }
}
