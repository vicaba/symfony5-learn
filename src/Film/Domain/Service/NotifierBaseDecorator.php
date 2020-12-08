<?php
declare(strict_types=1);

namespace LaSalle\Film\Domain\Service;

abstract class NotifierBaseDecorator implements Notifier
{
    protected function __construct(protected Notifier $wrapee)
    {}

    public function notify(string $message)
    {
        $this->wrapee->notify($message);
    }
}