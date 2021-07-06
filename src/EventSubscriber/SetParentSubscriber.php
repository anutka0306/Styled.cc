<?php

namespace App\EventSubscriber;

use App\Entity\Content;
use App\Entity\RootService;
use App\Entity\Simple;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

class SetParentSubscriber implements EventSubscriberInterface
{
    /**
     * @var EntityManagerInterface
     */
    protected $em;
    
    public function __construct(
        EntityManagerInterface $entity_manager
    ) {
        $this->em = $entity_manager;
    }
    
    /**
     * Returns an array of event names this subscriber wants to listen to.
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return array(
            'easy_admin.pre_update'  => 'setParent',
            'easy_admin.pre_persist' => 'setParent',
        );
    }
    
    public function setParent(GenericEvent $event): void
    {
        $entity = $event->getSubject();
        
        if ( ! $entity instanceof RootService &&  ! $entity instanceof Simple ) {
            return;
        }
        
        if ($entity->getParent() === null) {
            $repo = $this->em->getRepository(Content::class);
            $main_page = $repo->find(1);
            $entity->setParent($main_page);
        }
    }
}