<?php

namespace App\EventListener;

use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JWTCreatedListener
{
    /**
     * @param JWTCreatedEvent $event
     *
     * @return void
     */
    public function onJWTCreated(JWTCreatedEvent $event): void
    {
        /** @var $user User */
        $user = $event->getUser();
        $payload = $event->getData();
        $payload['id'] = $user->getId();

        $event->setData($payload);
    }

}