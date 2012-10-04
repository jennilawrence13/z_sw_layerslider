<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
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
 * Table tl_layerslider_elements 
 */
$GLOBALS['TL_DCA']['tl_layerslider_elements'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_layerslider_slides',
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'flag'                    => 11,
			'fields'                  => array('sorting'),
			'headerFields'            => array('title'),
			'panelLayout'             => 'filter;search,limit',
			'child_record_callback'   => array('tl_layerslider_elements', 'listElements')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_elements']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_elements']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_elements']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_elements']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
      'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_elements']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_layerslider_elements', 'toggleIcon')
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'	=>	array('type'),
		'default'       => '{type_legend}, type;',
    
    'image'         => '{type_legend}, type;
                        {ls_slide_legend}, ls_slideDirection, ls_slideOutDirection;
                        {ls_parallax_legend:hide}, ls_parallaxIn, ls_parallaxOut;
                        {ls_animation_legend:hide}, ls_durationIn, ls_durationOut, ls_easingIn, ls_easingOut, ls_delayIn, ls_delayOut;
                        {ls_pos_legend:hide}, ls_posTop, ls_posLeft;
                        {image_legend}, singleSRC, alt, size, caption;
                        {url_legend:hide}, url, target;
                        {extend_legend}, cssClass, ifBg, published;',
    
    'text'          => '{type_legend}, type;
                        {ls_slide_legend}, ls_slideDirection, ls_slideOutDirection;
                        {ls_parallax_legend:hide}, ls_parallaxIn, ls_parallaxOut;
                        {ls_animation_legend:hide}, ls_durationIn, ls_durationOut, ls_easingIn, ls_easingOut, ls_delayIn, ls_delayOut;
                        {ls_pos_legend:hide}, ls_posTop, ls_posLeft;
                        {text_legend}, headline, subheadline, teaser;
                        {extend_legend}, cssClass, published;'
	),

	// Subpalettes
	'subpalettes' => array 
  (
    
	),
  
	// Fields
	'fields' => array
	(
    'type' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['type'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('image', 'text'),
			'eval'                    => array('mandatory' => true, 'submitOnChange' => true, 'includeBlankOption' => true, 'tl_class' => '')
		),
    
    'ls_slideDirection' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_slideDirection'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('left', 'right', 'top', 'bottom', 'fade'),
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_slideOutDirection' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_slideOutDirection'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('left', 'right', 'top', 'bottom', 'fade'),
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_parallaxIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_parallaxIn'],
      'default'                 => '.45',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_parallaxOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_parallaxOut'],
      'default'                 => '.45',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_durationIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_durationIn'],
      'default'                 => '1000',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_durationOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_durationOut'],
      'default'                 => '1000',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_easingIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_easingIn'],
      'default'                 => 'easeInOutQuint',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('linear', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_easingOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_easingOut'],
      'default'                 => 'easeInOutQuint',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('linear', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_delayIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_delayIn'],
      'default'                 => '0',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_delayOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_delayOut'],
      'default'                 => '0',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_posTop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_posTop'],
      'default'                 => '0',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_posLeft' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_posLeft'],
      'default'                 => '0',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'headline' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['headline'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
    
    'subheadline' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['subheadline'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
    
    'teaser' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['teaser'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory' => true, 'rte'=>'tinyMCE', 'tl_class'=>'')
		),
    
    'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>true)
		),
    
		'alt' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['alt'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'long')
		),
    
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['size'],
			'exclude'                 => true,
			'inputType'               => 'imageSize',
			'options'                 => $GLOBALS['TL_CROP'],
			'reference'               => &$GLOBALS['TL_LANG']['MSC'],
			'eval'                    => array('rgxp'=>'digit', 'nospace'=>true, 'helpwizard'=>true, 'tl_class'=>'w50')
		),
    
		'caption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['caption'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50')
		),
    
    'url' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['url'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('decodeEntities'=>true, 'maxlength'=>255, 'tl_class'=>'w50')
		),
    
		'target' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['MSC']['target'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50 m12')
		),
    
		'cssClass' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['cssClass'],
			'exclude'                 => true,
			'inputType'               => 'text'
		),
    
    'ifBg' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ifBg'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 1,
			'inputType'               => 'checkbox',
			'eval'                    => array()
		),
    
    'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 1,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true)
		)
  )
);


/**
 * Class tl_layerslider_elements
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Steven Wroblewski 2009-2013
 * @author     Steven Wroblewski <http://www.wroblewski-it.de/>
 * @package    Layerslider
 */
class tl_layerslider_elements extends Backend
{
  
  /**
	 * Import the back end user object
	 */
	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}
  
  
  
	/**
	 * Check permissions to edit table tl_news
	 */
	public function checkPermission()
	{
		if ($this->User->isAdmin)
		{
			return;
		}

		// Set root IDs
		if (!is_array($this->User->news) || empty($this->User->news))
		{
			$root = array(0);
		}
		else
		{
			$root = $this->User->news;
		}

		$id = strlen($this->Input->get('id')) ? $this->Input->get('id') : CURRENT_ID;

		// Check current action
		switch ($this->Input->get('act'))
		{
			case 'paste':
				// Allow
				break;

			case 'create':
				if (!strlen($this->Input->get('pid')) || !in_array($this->Input->get('pid'), $root))
				{
					$this->log('Not enough permissions to create news items in news archive ID "'.$this->Input->get('pid').'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'cut':
			case 'copy':
				if (!in_array($this->Input->get('pid'), $root))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' news item ID "'.$id.'" to news archive ID "'.$this->Input->get('pid').'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				// NO BREAK STATEMENT HERE

			case 'edit':
			case 'delete':
			case 'toggle':
				$objArchive = $this->Database->prepare("SELECT pid FROM tl_news WHERE id=?")
											 ->limit(1)
											 ->execute($id);

				if ($objArchive->numRows < 1)
				{
					$this->log('Invalid news item ID "'.$id.'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				if (!in_array($objArchive->pid, $root))
				{
					$this->log('Not enough permissions to '.$this->Input->get('act').' news item ID "'.$id.'" of news archive ID "'.$objArchive->pid.'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;

			case 'select':
			case 'editAll':
			case 'deleteAll':
			case 'overrideAll':
			case 'cutAll':
			case 'copyAll':
				if (!in_array($id, $root))
				{
					$this->log('Not enough permissions to access news archive ID "'.$id.'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				$objArchive = $this->Database->prepare("SELECT id FROM tl_news WHERE pid=?")
											 ->execute($id);

				if ($objArchive->numRows < 1)
				{
					$this->log('Invalid news archive ID "'.$id.'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}

				$session = $this->Session->getData();
				$session['CURRENT']['IDS'] = array_intersect($session['CURRENT']['IDS'], $objArchive->fetchEach('id'));
				$this->Session->setData($session);
				break;

			default:
				if (strlen($this->Input->get('act')))
				{
					$this->log('Invalid command "'.$this->Input->get('act').'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				elseif (!in_array($id, $root))
				{
					$this->log('Not enough permissions to access news archive ID "'.$id.'"', 'tl_news checkPermission', TL_ERROR);
					$this->redirect('contao/main.php?act=error');
				}
				break;
		}
	}
  
  
  
	/**
	 * List Imageslider Elements
	 * @param array
	 * @return string
	 */
	public function listElements($arrRow)
  {
    if($arrRow['type'] == 'image' && file_exists(TL_ROOT . '/' . $arrRow['singleSRC']))
    {
      $thumbnail = $this->getImage($arrRow['singleSRC'], 170, 70, 'center_center');
      $arrImageSize = @getimagesize(TL_ROOT . '/' . $arrRow['singleSRC']);
      
      switch($arrImageSize['mime'])
      {
        case 'image/png':
          $typeImg = 'iconTIF.gif';
          break;
        
        case 'image/tiff':
          $typeImg = 'iconTIF.gif';
          break;
        
        case 'image/jpeg':
          $typeImg = 'iconJPG.gif';
          break;
        
        case 'image/gif':
          $typeImg = 'iconGIF.gif';
          break;
        
        case 'image/bmp':
          $typeImg = 'iconBMP.gif';
          break;
      }
      
      $element = 
'<div class="img_container limit_height h64">
  <img title="' . $arrRow['alt'] . '" alt="' . $arrRow['alt'] . '" src="' . $thumbnail . '">
 </div>';
    }
    elseif($arrRow['type'] == 'text')
    {
      $typeImg = 'iconPLAIN.gif';
      $arrImageSize['mime'] = 'text/plain';
      
      if($arrRow['headline'])
      {
        $headline = '<h1>'.$arrRow['headline'].'</h1>';
      }
      
      if($arrRow['subheadline'])
      {
        $subheadline = '<h2>'.$arrRow['subheadline'].'</h2>';
      }
      
      $element = 
'<div class="text_container limit_height h64">
   '.$headline.'
   '.$subheadline.'
   <p>'.$arrRow['teaser'].'</p>
 </div>';
    }
    
    return '<div class="be_layerslider_elements">
              <p style="background: url(system/themes/default/images/'.$typeImg.') 0 -2px no-repeat; text-indent: 18px;">'. $arrImageSize['mime'] . ' </p>
              '.$element.'
            </div>' . "\n";
	}
  
  
  
  /**
	 * Return the "toggle visibility" button
	 * @param array
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @param string
	 * @return string
	 */
	public function toggleIcon($row, $href, $label, $title, $icon, $attributes)
	{
		if (strlen($this->Input->get('tid')))
		{
			$this->toggleVisibility($this->Input->get('tid'), ($this->Input->get('state') == 1));
			$this->redirect($this->getReferer());
		}

		// Check permissions AFTER checking the tid, so hacking attempts are logged
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_layerslider_elements::published', 'alexf'))
		{
			return '';
		}

		$href .= '&amp;tid='.$row['id'].'&amp;state='.($row['published'] ? '' : 1);

		if (!$row['published'])
		{
			$icon = 'invisible.gif';
		}		

		return '<a href="'.$this->addToUrl($href).'" title="'.specialchars($title).'"'.$attributes.'>'.$this->generateImage($icon, $label).'</a> ';
	}
  
  
  
	/**
	 * Disable/enable a user group
	 * @param integer
	 * @param boolean
	 */
	public function toggleVisibility($intId, $blnVisible)
	{
		// Check permissions to edit
		$this->Input->setGet('id', $intId);
		$this->Input->setGet('act', 'toggle');
		$this->checkPermission();

		// Check permissions to publish
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_layerslider_elements::published', 'alexf'))
		{
			$this->log('Not enough permissions to publish/unpublish news item ID "'.$intId.'"', 'tl_layerslider_elements toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$this->createInitialVersion('tl_layerslider_elements', $intId);
	
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_layerslider_elements']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_layerslider_elements']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_layerslider_elements SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion('tl_layerslider_elements', $intId);
	}
}
?>