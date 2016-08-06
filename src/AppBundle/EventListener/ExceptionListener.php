<?php

/**
 * Exception listener class for the kernel exceptions
 * 
 * @author   Ansu
 *    
 * @category Listener
 * 
 */

namespace AppBundle\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Log\LoggerInterface;

class ExceptionListener extends \Exception
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Function for handling exceptions
     * 
     * @param GetResponseForExceptionEvent $event
     */
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        
        $status = method_exists($event->getException(), 'getStatusCode') ? $event->getException()->getStatusCode() : 500;
        
        ladybug_dump_die($event->getException());
        
        // Log the exception
        $this->logger->error("Error", array($status => $event->getException()->getMessage(), 'TRACE' => $event->getException()->getTraceAsString()));

        switch ($status) {
            case 400:
                $errorMessage = "The request format or the data within it was found to be invalid";
                break;
            case 401:
                $errorMessage = "This request failed to be authorized/authenticated";
                break;
            case 404:
                $errorMessage = "The resource request could not be found on the server";
                break;
            case 408:
                $errorMessage = "The resource being created in this request already exists";
                break;
            case 409:
                $errorMessage = "The request has timed out";
                break;
            case 500:
                $errorMessage = "An error occurred on the server.  Some extra detail may exist in the Response object.";
                break;
            default :
                $errorMessage = "Internal Server Error";
                break;
        }
        $result = array('Budai' => array('errorCode' => $status, 'errorText' => $errorMessage));
        $response = new JsonResponse($result, $status);
        $event->setResponse($response);
    }

}
