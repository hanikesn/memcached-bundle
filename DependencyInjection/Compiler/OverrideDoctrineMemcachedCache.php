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
        if($container->has('doctrine_cache.memcached.class') &&
            $container->getParameter('doctrine_cache.memcached.class') === 'Doctrine\Common\Cache\MemcachedCache') {
            $container->setParameter('doctrine_cache.memcached.class', 'Lsw\MemcacheBundle\Doctrine\Cache\MemcachedCache');
        }

        if($container->hasParameter('doctrine.orm.cache.memcached.class') &&
            $container->getParameter('doctrine.orm.cache.memcached.class') === 'Doctrine\Common\Cache\MemcachedCache') {
            $container->setParameter('doctrine.orm.cache.memcached.class', 'Lsw\MemcacheBundle\Doctrine\Cache\MemcachedCache');
        }

        if($container->hasParameter('liip_doctrine_cache.memcached.class') &&
            $container->getParameter('liip_doctrine_cache.memcached.class') === 'Doctrine\Common\Cache\MemcachedCache') {
            $container->setParameter('liip_doctrine_cache.memcached.class', 'Lsw\MemcacheBundle\Doctrine\Cache\MemcachedCache');
        }
    }
}
