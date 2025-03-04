<?php

declare(strict_types=1);

/*
 * This file is part of postyou/project-management-bundle.
 *
 * (c) POSTYOU Digital- & Filmagentur
 */

use Postyou\ComparisonSlider\Controller\ContentElement\ContentComparisonSlider;

$GLOBALS['TL_LANG']['CTE'][ContentComparisonSlider::TYPE] = ['Comparison Slider', ''];

$GLOBALS['TL_LANG']['tl_content']['pictureLeftSRC'][0] = 'Left picture';
$GLOBALS['TL_LANG']['tl_content']['pictureRightSRC'][0] = 'Right picture';
$GLOBALS['TL_LANG']['tl_content']['textLeft'][0] = 'Left text';
$GLOBALS['TL_LANG']['tl_content']['textLeft'][1] = 'optional caption of left picture';
$GLOBALS['TL_LANG']['tl_content']['textRight'][0] = 'Right text';
$GLOBALS['TL_LANG']['tl_content']['textRight'][1] = 'optional caption of right picture';
$GLOBALS['TL_LANG']['tl_content']['textLeftPosition'][0] = 'Textposition';
$GLOBALS['TL_LANG']['tl_content']['textLeftPosition'][1] = 'positioning of left text';
$GLOBALS['TL_LANG']['tl_content']['textRightPosition'][0] = 'Textposition';
$GLOBALS['TL_LANG']['tl_content']['textRightPosition'][1] = 'positioning of right text';

$GLOBALS['TL_LANG']['tl_content']['textPositionOptions'] = [
    'top-left' => 'Top Left',
    'top-right' => 'Top Right',
    'bottom-left' => 'Bottom Left',
    'bottom-right' => 'Bottom Right',
];
