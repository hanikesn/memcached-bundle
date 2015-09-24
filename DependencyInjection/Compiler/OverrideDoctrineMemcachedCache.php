<?php


namespace Lsw\MemcacheBundle\DependencyInjection\Compiler;


use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class OverrideDoctrineMemcachedCache implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        if($container->getParameter('doctrine_cache.memcached.class') === 'Doctrine\Common\Cache\MemcachedCache') {
            $container->setParameter('doctrine_cache.memcached.class', 'Lsw\MemcacheBundle\Doctrine\Cache\MemcachedCache');
        }

        if($container->getParameter('doctrine.orm.cache.memcached.class') === 'Doctrine\Common\Cache\MemcachedCache') {
            $container->setParameter('doctrine.orm.cache.memcached.class', 'Lsw\MemcacheBundle\Doctrine\Cache\MemcachedCache');
        }
    }
}
