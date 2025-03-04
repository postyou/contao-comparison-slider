<?php

declare(strict_types=1);

/*
 * This file is part of postyou/project-management-bundle.
 *
 * (c) POSTYOU Digital- & Filmagentur
 */

namespace Postyou\ComparisonSlider\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Postyou\ComparisonSlider\ContaoComparisonSliderBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(ContaoComparisonSliderBundle::class)
                ->setLoadAfter([
                    ContaoCoreBundle::class,
                ]),
        ];
    }
}
