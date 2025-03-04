<?php

declare(strict_types=1);

/*
 * This file is part of postyou/project-management-bundle.
 *
 * (c) POSTYOU Digital- & Filmagentur
 */

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

/*
 * This file is part of postyou/project-management-bundle.
 *
 * (c) POSTYOU Digital- & Filmagentur
 */

$finder = Finder::create()
    ->in(__DIR__.'/src')
;

$header = <<<'EOF'
    This file is part of postyou/project-management-bundle.

    (c) POSTYOU Digital- & Filmagentur
    EOF;

$config = new Config();

return $config
    ->setRiskyAllowed(true)
    ->setRules([
        '@Symfony' => true,
        'declare_strict_types' => true,
        'no_alternative_syntax' => [
            'fix_non_monolithic_code' => false,
        ],
        'echo_tag_syntax' => [
            'format' => 'short',
        ],
        'strict_comparison' => false,
        'header_comment' => [
            'header' => $header
        ]
    ])
    ->setFinder($finder);
