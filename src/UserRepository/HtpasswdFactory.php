<?php
/**
 * @see       https://github.com/zendframework/zend-expressive-authentication for the canonical source repository
 * @copyright Copyright (c) 2017 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   https://github.com/zendframework/zend-expressive-authentication/blob/master/LICENSE.md New BSD License
 */

namespace Zend\Expressive\Authentication\UserRepository;

use Psr\Container\ContainerInterface;
use Zend\Expressive\Authentication\Exception;

class HtpasswdFactory
{
    /**
     * @throws Exception\InvalidConfigException
     */
    public function __invoke(ContainerInterface $container) : Htpasswd
    {
        $htpasswd = $container->get('config')['authentication']['htpasswd'] ?? null;
        if (null === $htpasswd) {
            throw new Exception\InvalidConfigException(sprintf(
                'Config key authentication.htpasswd is not present; cannot create %s user repository adapter',
                Htpasswd::class
            ));
        }

        return new Htpasswd($htpasswd);
    }
}
