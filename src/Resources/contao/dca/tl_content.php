<?php

declare(strict_types=1);

/*
 * This file is part of postyou/project-management-bundle.
 *
 * (c) POSTYOU Digital- & Filmagentur
 */

use Contao\ArrayUtil;
use Contao\BackendUser;
use Postyou\ComparisonSlider\Controller\ContentElement\ContentComparisonSlider;

/*
 * Config
 */

// $GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = function ($dc) {
// 	$objUser = BackendUser::getInstance();

// 	if (!$objUser->hasAccess('themes', 'modules') ||  !$objUser->hasAccess('layout', 'themes'))
// 		return;
// };

/*
 * Palettes
 */

$GLOBALS['TL_DCA']['tl_content']['palettes'][ContentComparisonSlider::TYPE] = '{type_legend},type;{Slider Einstellungen}, pictureLeftSRC,pictureRightSRC,size, textLeft, textLeftPosition	,textRight, textRightPosition;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space;{invisible_legend:hide},invisible,start,stop';

/*
 * Fields
 */
ArrayUtil::arrayInsert($GLOBALS['TL_DCA']['tl_content']['fields'], 0, [
    'pictureLeftSRC' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['pictureLeftSRC'],
        'inputType' => 'fileTree',
        'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'mandatory' => true, 'tl_class' => ''],
        'sql' => 'binary(16) NULL',
    ],

    'pictureRightSRC' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['pictureRightSRC'],
        'inputType' => 'fileTree',
        'eval' => ['filesOnly' => true, 'fieldType' => 'radio', 'mandatory' => true, 'tl_class' => ''],
        'sql' => 'binary(16) NULL',
    ],

    'textLeft' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['textLeft'],
        'inputType' => 'text',
        'eval' => ['maxlength' => 256, 'tl_class' => 'w50 clr'],
        'sql' => "varchar(256) NOT NULL default ''",
    ],

    'textLeftPosition' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['textLeftPosition'],
        'inputType' => 'select',
        'eval' => ['maxlength' => 256, 'tl_class' => 'w50'],
        'options' => &$GLOBALS['TL_LANG']['tl_content']['textPositionOptions'],
        'sql' => "varchar(256) NOT NULL default ''",
    ],

    'textRight' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['textRight'],
        'inputType' => 'text',
        'eval' => ['maxlength' => 256, 'tl_class' => 'w50'],
        'sql' => "varchar(256) NOT NULL default ''",
    ],

    'textRightPosition' => [
        'label' => &$GLOBALS['TL_LANG']['tl_content']['textRightPosition'],
        'inputType' => 'select',
        'eval' => ['maxlength' => 256, 'tl_class' => 'w50'],
        'options' => &$GLOBALS['TL_LANG']['tl_content']['textPositionOptions'],
        'sql' => "varchar(256) NOT NULL default ''",
    ],
]);
