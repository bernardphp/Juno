<?php

namespace Juno\EventListener;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AcceptListener implements \Symfony\Component\EventDispatcher\EventSubscriberInterface
{
    public function onKernelRequest(GetResponseEvent $event)
    {
        $request = $event->getRequest();

        $accepts = explode(',', $request->headers->get('Accept', ''));

        $request->request->set('_accept', trim(reset($accepts)));
    }

    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::REQUEST => array('onKernelRequest', 100),
        );
    }
}
