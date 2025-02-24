<?php

/*
 * This file is part of Acseo's Sylius Yoast SEO Plugin for Sylius.
 * (c) Acseo <camille.islasse@acseo-conseil.fr>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Acseo\SyliusYoastSEOPlugin;

use LogicException;
use Sylius\Bundle\CoreBundle\Application\SyliusPluginTrait;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

final class AcseoSyliusYoastSEOPlugin extends Bundle
{
    use SyliusPluginTrait;

    /**
     * Returns the plugin's container extension.
     *
     * @throws LogicException
     *
     * @return ExtensionInterface|null The container extension
     */
    public function getContainerExtension(): ?ExtensionInterface
    {
        if (null === $this->containerExtension) {
            $this->containerExtension = false;
            $extension = $this->createContainerExtension();
            if (null !== $extension) {
                $this->containerExtension = $extension;
            }
        }

        return $this->containerExtension instanceof ExtensionInterface
            ? $this->containerExtension
            : null;
    }
}
