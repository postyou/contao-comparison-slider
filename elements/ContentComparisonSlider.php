<?php
    
    /**
    * Comparison Slider Widget for Contao Open Source CMS
    *
    * @copyright Postyou 2016
    * @author Mario Gienapp
    * @link https://postyou.de
    * @license http://creativecommons.org/licenses/by-sa/4.0/ CC BY-SA 4.0
    */

    namespace ComparisonSlider;

    class ContentComparisonSlider extends \ContentElement {
        
        
        /**
        * Template
        * @var string
        */
        protected $strTemplate = 'ce_comparison_slider';

        public function __construct($objModule, $strColumn='main') {
            $GLOBALS['TL_CSS']['comparisonSlider'] = 'system/modules/contao-comparison-slider/assets/css/comparison_slider.css';
            $GLOBALS['TL_JAVASCRIPT']['comparisonSlider'] = 'system/modules/contao-comparison-slider/assets/js/comparison_slider.js';
            $GLOBALS['TL_JAVASCRIPT']['jqueryMobileEvents'] = 'system/modules/contao-comparison-slider/assets/js/jquery.mobile-events.min.js';
            parent::__construct($objModule, $strColumn);
        }
        

        
        public function generate() {
                     
            //Backend Ausgabe
            if (TL_MODE == 'BE')
            {
                $objTemplate = new \BackendTemplate('be_wildcard');

                $objTemplate->wildcard = '### '.utf8_strtoupper("Comparison Slider").' ###';
                $objTemplate->title = $this->headline;
                $objTemplate->id = $this->id;
                $objTemplate->link = $this->name;
                $objTemplate->href = 'contao/main.php?do=themes&table=tl_module&act=edit&id=' . $this->id;
    
                return $objTemplate->parse();
            }

            return parent::generate();
        }
        
        
        protected function compile() {

            foreach ($this->Template->classes as $class) {
                $this->Template->classNames .= $class." ";
            }
            $this->Template->classNames .= "comparison-slider";

            if (isset($this->pictureLeftSRC) && isset($this->pictureRightSRC)) {
                $pictureLeft = \FilesModel::findByUuid($this->pictureLeftSRC);
                $pictureRight = \FilesModel::findByUuid($this->pictureRightSRC);


                list($width, $height) = getimagesize($pictureLeft->path);

                $this->Template->pictureWidth = $width;
                $this->Template->pictureHeight = $height;

                $this->Template->pictureLeftPath = "background-image: url('".$pictureLeft->path."');";
                $this->Template->pictureRightPath = "background-image: url('".$pictureRight->path."');";

                $this->Template->textLeft = $this->textLeft;
                $this->Template->textRight = $this->textRight;

                $textPositions = array("textLeftPosition" => $this->textLeftPosition, "textRightPosition" => $this->textRightPosition);

                foreach ($textPositions as $k => $v) {
                    switch ($v) {
                        case 'top-left':
                            $this->Template->$k = "top: 0; left: 0;";
                            break;
                        case 'top-right':
                            $this->Template->$k = "top: 0; right: 0;";
                            break;
                        case 'bottom-left':
                            $this->Template->$k = "bottom: 0; left: 0;";
                            break;
                        case 'bottom-right':
                            $this->Template->$k = "bottom: 0; right: 0;";
                            break;
                        default:
                            $this->Template->$k = "top: 0; left: 0;";
                            break;
                    }
                }
            }

            

            
        }
        
        
        
        
    }