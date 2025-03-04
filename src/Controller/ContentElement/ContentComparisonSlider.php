<?php

declare(strict_types=1);

namespace Postyou\ComparisonSlider\Controller\ContentElement;

use Contao\BackendTemplate;
use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\DependencyInjection\Attribute\AsContentElement;
use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\System;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[AsContentElement(type: ContentComparisonSlider::TYPE, category: 'media', template: 'ce_comparison_slider')]
class ContentComparisonSlider extends AbstractContentElementController
{
    public const TYPE = 'comparison_slider';

    public function __construct(private ScopeMatcher $scopeMatcher)
    {
    }

    protected function getResponse(Template $template, ContentModel $model, Request $request): Response
    {
        if ($this->scopeMatcher->isBackendRequest($request)) {
            $objTemplate = new BackendTemplate('be_wildcard');
            $objTemplate->wildcard = '### Comparison Slider ###';

            return $objTemplate->getResponse();
        }

        $this->initializeAssets();
        $this->updateTemplateValues($template, $model);

        return $template->getResponse();
    }

    private function initializeAssets()
    {
        $GLOBALS['TL_CSS']['comparisonSlider'] = 'bundles/contaocomparisonslider/css/comparison_slider.css';
        $GLOBALS['TL_JAVASCRIPT']['comparisonSlider'] = 'bundles/contaocomparisonslider/js/comparison_slider.js';
    }

    private function updateTemplateValues(Template $template, ContentModel $model)
    {
        $template->class .= ' ce_comparison-slider'; // Backwards compatibility

        if (isset($model->pictureLeftSRC) && isset($model->pictureRightSRC)) {
            $figure = System::getContainer()
                ->get('contao.image.studio')
                ->createFigureBuilder()
                ->from($model->pictureLeftSRC)
                ->setOptions(['caption' => $model->textLeft, 'floatClass' => ' '.$this->textPositionClass($model->textLeftPosition)])
                ->setSize($model->size)
                ->buildIfResourceExists();

            $figure2 = System::getContainer()
                ->get('contao.image.studio')
                ->createFigureBuilder()
                ->from($model->pictureRightSRC)
                ->setOptions(['caption' => $model->textRight, 'floatClass' => ' '.$this->textPositionClass($model->textRightPosition)])
                ->setSize($model->size)
                ->buildIfResourceExists();

            $template->picture_one = $figure->getLegacyTemplateData();
            $template->picture_two = $figure2->getLegacyTemplateData();
        }
    }

    private function textPositionClass($textPosition)
    {
        return match ($textPosition) {
            'top-left' => 'comparison-slider-top-left',
            'top-right' => 'comparison-slider-top-right',
            'bottom-left' => 'comparison-slider-bottom-left',
            'bottom-right' => 'comparison-slider-bottom-right',
            default => '',
        };
    }
}
