<?php

namespace Acseo\SyliusYoastSEOPlugin\Menu;

use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;

final class AdminProductFormMenuListener
{
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('Yoast')
            ->setAttribute('template', 'bundles/SyliusAdminBundle/Product/Tab/_yoast.html.twig')
            ->setLabel('Yoast')
        ;
    }
}
