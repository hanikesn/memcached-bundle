<?php

namespace Lsw\MemcacheBundle;

use Lsw\MemcacheBundle\DependencyInjection\Compiler\OverrideDoctrineMemcachedCache;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Lsw\MemcacheBundle\DependencyInjection\Compiler\EnableSessionSupport;

/**
* Bundle for Memcache sessions and cache with debug toolbar integration
*
* @author Maurits van der Schee <m.vanderschee@leaseweb.com>
*/
class LswMemcacheBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new EnableSessionSupport());
        $container->addCompilerPass(new OverrideDoctrineMemcachedCache());
    }
}
