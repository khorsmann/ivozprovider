<?php

namespace CoreBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;
use Core\Domain\Service\LifecycleEventListener;

class LifecycleCompiler implements CompilerPassInterface
{
    /**
     * @var ContainerBuilder
     */
    protected $container;

    public function process(ContainerBuilder $container)
    {
        $this->container = $container;

        $events = $this->getLifecycleServices();
        foreach ($events as $tag => $services) {

            $lifeCycleCollectionClassName = $this->getLifeCycleCollectionClass($tag);
            $lifeCycleCollection = $this->container->autowire($tag, $lifeCycleCollectionClassName);
            $lifeCycleCollection->setPublic(true);

            foreach ($services as $key => $class) {
                $services[$key] = new Reference($class);
            }

            $lifeCycleCollection->addMethodCall('setServices', [$services]);
        }
    }

    protected function getLifeCycleCollectionClass($serviceTag)
    {
        $tagSegments = explode('.', $serviceTag);
        array_pop($tagSegments);
        $sharedAliasPrefix = implode('.', $tagSegments);
        $collectionAlias = $sharedAliasPrefix . '.service_collection';
        $definition = $this->container->findDefinition($collectionAlias);

        return $definition->getClass();
    }

    protected function getLifecycleServices()
    {
        $services = [];
        $servicesDefinitions = $this->container->getDefinitions();

        /**
         * @var Definition $definition
         */
        foreach ($servicesDefinitions as $definition) {

            $tags = array_filter($definition->getTags(), function ($key) {
                return (strpos($key, '.lifecycle.') !== false);
            }, ARRAY_FILTER_USE_KEY);

            if (empty($tags)) {
                continue;
            }

            foreach ($tags as $name => $arguments) {
                if (!array_key_exists($name, $services)) {
                    $services[$name] = array();
                }
                $services[$name] = $this->getServicesByTag($name);
            }
        }

        return $services;
    }

    protected function getServicesByTag($tag)
    {
        $services = $this->container->findTaggedServiceIds($tag);

        /**
         * @var Definition $a
         * @var Definition $b
         */
        uasort($services, function ($a, $b) use ($tag) {
            return $a[0]['priority'] > $b[0]['priority'];
        });

        return array_keys($services);
    }
}