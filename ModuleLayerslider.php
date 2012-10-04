<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2012 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  Steven Wroblewski 2009-2013
 * @author     Steven Wroblewski <http://www.wroblewski-it.de/>
 * @package    Layerslider
 */


/**
 * Class ModuleLayerslider
 *
 * Front end module "layerslider".
 * @copyright  Steven Wroblewski 2009-2013
 * @author     Steven Wroblewski <http://www.wroblewski-it.de/>
 * @package    Layerslider
 */
class ModuleLayerslider extends Layerslider
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_layerslider';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### LAYERSLIDER ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=themes&amp;table=tl_module&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		return parent::generate();
	}
  
  
	/**
	 * Generate the module
	 */
	protected function compile()
  {
    global $objPage;
    $arrReturn = array();
    
    
    // Slider laden
    $objSlider = $this->Database->prepare('SELECT * FROM tl_layerslider WHERE id = ? ORDER BY sorting')
                 ->limit(1)
                 ->execute($this->layerslider);
    
    
    if($objSlider->numRows > 0)
    {
      // Slider in arrReturn speichern
      $arrReturn = $objSlider->row();
      
      
      // deserialize Size
      $arrReturn['ls_size'] = deserialize($objSlider->ls_size, true);
      
      
      // ls_autoStart to bool
      $arrReturn['ls_autoStart'] = $objSlider->ls_autoStart == 1 ? 'true' : 'false';
      
      // ls_twoWaySlideshow to bool
      $arrReturn['ls_twoWaySlideshow'] = $objSlider->ls_twoWaySlideshow == 1 ? 'true' : 'false';
      
      // ls_keybNav to bool
      $arrReturn['ls_keybNav'] = $objSlider->ls_keybNav == 1 ? 'true' : 'false';
      
      // ls_touchNav to bool
      $arrReturn['ls_touchNav'] = $objSlider->ls_touchNav == 1 ? 'true' : 'false';
      
      // ls_imgPreload to bool
      $arrReturn['ls_imgPreload'] = $objSlider->ls_imgPreload == 1 ? 'true' : 'false';
      
      // ls_navPrevNext to bool
      $arrReturn['ls_navPrevNext'] = $objSlider->ls_navPrevNext == 1 ? 'true' : 'false';
      
      // ls_navStartStop to bool
      $arrReturn['ls_navStartStop'] = $objSlider->ls_navStartStop == 1 ? 'true' : 'false';
      
      // ls_navButtons to bool
      $arrReturn['ls_navButtons'] = $objSlider->ls_navButtons == 1 ? 'true' : 'false';
      
      // ls_pauseOnHover to bool
      $arrReturn['ls_pauseOnHover'] = $objSlider->ls_pauseOnHover == 1 ? 'true' : 'false';
      
      // ls_animateFirstLayer to bool
      $arrReturn['ls_animateFirstLayer'] = $objSlider->ls_animateFirstLayer == 1 ? 'true' : 'false';
      
      // ls_forceLoopNum to bool
      $arrReturn['ls_forceLoopNum'] = $objSlider->ls_forceLoopNum == 1 ? 'true' : 'false';
      
      // ls_autoPlayVideos to bool
      $arrReturn['ls_autoPlayVideos'] = $objSlider->ls_autoPlayVideos == 1 ? 'true' : 'false';
      
      // ls_autoPlayVideos to bool
      $arrReturn['ls_autoPlayVideos'] = $objSlider->ls_autoPlayVideos == 1 ? 'true' : 'false';
      
      
      // ls_globalBGColor to bool
      if(($objSlider->ls_globalBGColor == 'transparent') || ($objSlider->ls_globalBGColor == ''))
      {
        $arrReturn['ls_globalBGColor'] = 'transparent';
      }
      else
      {
        $arrReturn['ls_globalBGColor'] = $objSlider->ls_globalBGColor;
      }
      
      
      // Slides laden
      $objSlides = $this->Database->prepare('SELECT * FROM tl_layerslider_slides WHERE pid = ? ORDER BY sorting')
                   ->execute($this->layerslider);
      
      
      if($objSlides->numRows > 0)
      {
        $a = 0;
        while($objSlides->next())
        {
          // Slides in arrReturn speichern
          $arrReturn['slides'][$a] = $objSlides->row();
          
          
          // Slideattribute (rel tag)
          $arrReturn['slides'][$a]['rel'] = 'rel="';
          $arrReturn['slides'][$a]['rel'] .= 'slidedirection: '.$objSlides->ls_slideDirection.'; ';
          $arrReturn['slides'][$a]['rel'] .= 'slidedelay: '.$objSlides->ls_slideDelay.'; ';
          $arrReturn['slides'][$a]['rel'] .= 'durationin: '.$objSlides->ls_durationIn.'; ';
          $arrReturn['slides'][$a]['rel'] .= 'durationout: '.$objSlides->ls_durationOut.'; ';
          $arrReturn['slides'][$a]['rel'] .= 'easingin: '.$objSlides->ls_easingIn.'; ';
          $arrReturn['slides'][$a]['rel'] .= 'easingout: '.$objSlides->ls_easingOut.'; ';
          $arrReturn['slides'][$a]['rel'] .= 'delayin: '.$objSlides->ls_delayIn.'; ';
          $arrReturn['slides'][$a]['rel'] .= 'delayout: '.$objSlides->ls_delayOut.';';
          $arrReturn['slides'][$a]['rel'] .= '"';
          
          
          // Slide Elements laden
          $objSlideElements = $this->Database->prepare('SELECT * FROM tl_layerslider_elements WHERE pid = ? ORDER BY sorting')
                              ->execute($objSlides->id);
          
          $slideElementsCount = $objSlideElements->numRows;
          
          if($objSlideElements->numRows > 0)
          {
            $b = 0;
            while($objSlideElements->next())
            {
              // Frontendtemplate
              $objTemplate = new FrontendTemplate('layerSlider_default');
              
              
              // Slide Elements in arrReturn speichern
              $objTemplate->setData($objSlideElements->row());
              
              
              // SlideNumber
              $objTemplate->number = $b;
              
              
              // Imagesize
              if($objSlideElements->type == 'image')
              {
                $objTemplate->size = deserialize($objSlideElements->size);
                if(($objTemplate->size[0] == '') && ($objTemplate->size[1] == ''))
                {
                  $objTemplate->size      = getimagesize($objSlideElements->singleSRC);
                  $objTemplate->singleSRC = $this->getImage($objSlideElements->singleSRC, $objTemplate->size[0], $objTemplate->size[1]);
                }
                else
                {
                  $objTemplate->singleSRC = $this->getImage($objSlideElements->singleSRC, $objTemplate->size[0], $objTemplate->size[1], $objTemplate->size[2]);
                  $objTemplate->size      = getimagesize($objTemplate->singleSRC);
                }
              }
              
              
              // Slideattribute (rel tag)
              $objTemplate->rel = 'rel="';
              $objTemplate->rel .= 'slidedirection: '.$objSlideElements->ls_slideDirection.'; ';
              $objTemplate->rel .= 'slideoutdirection: '.$objSlideElements->ls_slideOutDirection.'; ';
              $objTemplate->rel .= 'parallaxin: '.$objSlideElements->ls_parallaxIn.'; ';
              $objTemplate->rel .= 'parallaxout: '.$objSlideElements->ls_parallaxOut.'; ';
              $objTemplate->rel .= 'durationin: '.$objSlideElements->ls_durationIn.'; ';
              $objTemplate->rel .= 'durationout: '.$objSlideElements->ls_durationOut.'; ';
              $objTemplate->rel .= 'easingin: '.$objSlideElements->ls_easingIn.'; ';
              $objTemplate->rel .= 'easingout: '.$objSlideElements->ls_easingOut.'; ';
              $objTemplate->rel .= 'delayin: '.$objSlideElements->ls_delayIn.'; ';
              $objTemplate->rel .= 'delayout: '.$objSlideElements->ls_delayOut.';';
              $objTemplate->rel .= '"';
              
              
              // Class
              $class = '';
              if($objSlideElements->cssClass)
              {
                $class .= ' ' . $objSlideElements->cssClass;
              }
              
              if($b == 0)
              {
                $class .= ' first';
              }
              
              if($b == $slideElementsCount - 1)
              {
                $class .= ' last';
              }
              
              if($b %2 == 0)
              {
                $class .= ' even';
              }
              else
              {
                $class .= ' odd';
              }
              
              $objTemplate->cssClass = $class;
              
              
              // Position
              if($objSlideElements->ls_posLeft || $objSlideElements->ls_posTop)
              {
                $objTemplate->pos = 'style="';
                
                if($objSlideElements->ls_posLeft)
                {
                  $objTemplate->pos .= 'left: ' . $objSlideElements->ls_posLeft . 'px;';
                }
                
                if($objSlideElements->ls_posTop)
                {
                  $objTemplate->pos .= 'top: ' . $objSlideElements->ls_posTop . 'px;';
                }
                
                $objTemplate->pos .= '"';
              }
              
              
              // Parse Template
              $arrReturn['slides'][$a]['elements'][$b] = $objTemplate->parse();
              
              $b++;
            }
          }
          
          $a++;
        }
      }
    }
    
    
    $this->Template->layerslider = $arrReturn;
  }
}

?>