<?php

declare(strict_types=1);

use Postyou\ComparisonSlider\Controller\ContentElement\ContentComparisonSlider;

$GLOBALS['TL_LANG']['CTE'][ContentComparisonSlider::TYPE] = ['Comparison Slider', ''];

$GLOBALS['TL_LANG']['tl_content']['pictureLeftSRC'][0] = 'Linkes Bild';
$GLOBALS['TL_LANG']['tl_content']['pictureRightSRC'][0] = 'Rechtes Bild';
$GLOBALS['TL_LANG']['tl_content']['textLeft'][0] = 'Linker Text';
$GLOBALS['TL_LANG']['tl_content']['textLeft'][1] = 'optionale Beschriftung des linken Bildes';
$GLOBALS['TL_LANG']['tl_content']['textRight'][0] = 'Rechter Text';
$GLOBALS['TL_LANG']['tl_content']['textRight'][1] = 'optionale Beschriftung des rechten Bildes';
$GLOBALS['TL_LANG']['tl_content']['textLeftPosition'][0] = 'Textposition';
$GLOBALS['TL_LANG']['tl_content']['textLeftPosition'][1] = 'Anordnung des linken Textes';
$GLOBALS['TL_LANG']['tl_content']['textRightPosition'][0] = 'Textposition';
$GLOBALS['TL_LANG']['tl_content']['textRightPosition'][1] = 'Anordnung des rechten Textes';

$GLOBALS['TL_LANG']['tl_content']['textPositionOptions'] = [
    'top-left' => 'Oben Links',
    'top-right' => 'Oben Rechts',
    'bottom-left' => 'Unten Links',
    'bottom-right' => 'Unten Rechts',
];
