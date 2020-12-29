<?php
declare(strict_types=1);

namespace LaSalle\App\Film\ExceptionListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class KernelExceptionListener
{
    public function onKernelException(ExceptionEvent $event) {
        $message = "This resource does not exist.";

        $response = new Response();
        $response
            ->setContent($message)
            ->setStatusCode(Response::HTTP_NOT_FOUND);

        $event->setResponse($response);
    }
}