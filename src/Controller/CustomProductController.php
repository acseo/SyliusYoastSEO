<?php

declare(strict_types=1);

namespace Acseo\SyliusYoastSEOPlugin\Controller;

use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CustomProductController extends ResourceController
{
    public function getYoast(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);

        $productId = $request->query->get('productId');

        if (!$productId) {
            return new JsonResponse(['error' => 'Product ID is required.'], 400);
        }

        /** @var Product|null $product */
        $product = $this->repository->find($productId);

        $html =  $this->renderView('@SyliusShop/Product/show.html.twig', [
            'configuration' => $configuration,
            'product' => $product,
        ]);

        return new Response($html);
    }

}
