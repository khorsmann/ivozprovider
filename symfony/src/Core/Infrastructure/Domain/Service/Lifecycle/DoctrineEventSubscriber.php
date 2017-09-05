<?php

namespace Core\Infrastructure\Domain\Service\Lifecycle;

use Core\Domain\Service\LifecycleServiceCollectionInterface;
use Core\Domain\Service\LifecycleSubscriber;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class DoctrineEventSubscriber implements EventSubscriber
{
    use EntityClassToServiceNameTrait;

    /**
     * @var EntityManagerInterface
     */
    protected $em;

    protected $serviceContainer;

    public function __construct(
        ContainerInterface $serviceContainer,
        EntityManagerInterface $em
    ) {
        $this->serviceContainer = $serviceContainer;
        $this->em = $em;
    }

    public function getSubscribedEvents()
    {
        return array(
            'postLoad',

            'prePersist',
            'postPersist',
            'preUpdate',
            'postUpdate',

            'preRemove',
            'postRemove',
        );
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $this->run('post_load', $args);
    }

    public function prePersist(PreUpdateEventArgs $args)
    {
        $this->run('pre_persist', $args, true);
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $this->run('post_persist', $args, true);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $this->run('pre_persist', $args);
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $this->run('post_persist', $args);
    }

    public function preRemove(LifecycleEventArgs $args)
    {
        $this->run('pre_remove', $args);
    }

    public function postRemove(LifecycleEventArgs $args)
    {
        $this->run('post_remove', $args);
    }

    protected function run($eventName, LifecycleEventArgs $args, $isNew = false)
    {
        $entity = $args->getObject();
        $entityClass = get_class($entity);
        $serviceName = $this->getServiceName($entityClass, $eventName);

        if (!$this->serviceContainer->has($serviceName)) {
            return;
        }

        /**
         * @var LifecycleServiceCollectionInterface $service
         */
        $service = $this->serviceContainer->get($serviceName);
        $service->execute($entity, $isNew);

        try {
            $this->em->flush();
        } catch (\Exception $exception) {

            $errorHandlerName = $this->getServiceName($entityClass, 'error_handler');
            if (!$this->serviceContainer->has($errorHandlerName)) {
                throw $exception;
            }

            $errorHandler = $this->serviceContainer->get($errorHandlerName);
            $errorHandler->handle($exception);
        }

    }

}