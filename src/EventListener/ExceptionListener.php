<?php

namespace App\EventListener;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event)
    {
        // $exception = $event->getThrowable();
        // dd($exception);
        // file_put_contents('../public/log_mllp.txt', $exception->getMessage());
        // dd($event) ;
        
    }
}