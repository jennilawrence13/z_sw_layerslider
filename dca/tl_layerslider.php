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
 * Table tl_layerslider 
 */
$GLOBALS['TL_DCA']['tl_layerslider'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_layerslider_slides'),
		'switchToEdit'                => true,
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s',
			'label_callback'	        => array('tl_layerslider', 'createLabel')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider']['edit'],
				'href'                => 'table=tl_layerslider_slides',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'attributes'          => 'class="edit-header"'
			),			
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'	=>	array('ls_isYourLogo'),
		'default'       => '{title_legend}, title, alias, ls_size;
                        {ls_start_legend}, ls_autoStart, ls_animateFirstLayer, ls_firstLayer;
                        {ls_buttons_legend}, ls_navPrevNext, ls_navStartStop, ls_navButtons;
                        {ls_skins_legend}, ls_skin, ls_skinsPath;
                        {ls_config_legend}, ls_twoWaySlideshow, ls_keybNav, ls_touchNav, ls_imgPreload, ls_pauseOnHover, ls_forceLoopNum, ls_autoPlayVideos, ls_loops, ls_autoPauseSlideshow, ls_youtubePreview;
                        {ls_bg_legend}, ls_globalBGColor, ls_globalBGImage;
                        {ls_logo_legend}, ls_isYourLogo;'
	),

	// Subpalettes
	'subpalettes' => array
  (
    'ls_isYourLogo' => 'ls_yourLogo, ls_yourLogoLink, ls_yourLogoTarget, ls_yourLogoStyle'
	),

	// Fields
	'fields' => array
	(
    'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory' => true, 'maxlength' => 255, 'tl_class' => 'w50')
		),
    
    'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_layerslider', 'generateAlias')
			)
		),
    
    'ls_size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_size'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory' => true, 'multiple' => true, 'size' => 2, 'nospace' => true, 'tl_class' => 'clr')
		),
    
    'ls_autoStart' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_autoStart'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_firstLayer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_firstLayer'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'nospace' => true, 'tl_class' => 'clr')
		),
    
    'ls_twoWaySlideshow' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_twoWaySlideshow'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_keybNav' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_keybNav'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_touchNav' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_touchNav'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_imgPreload' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_imgPreload'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_navPrevNext' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_navPrevNext'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_navStartStop' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_navStartStop'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_navButtons' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_navButtons'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_skin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_skin'],
      'default'                 => 'default',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength' => 255, 'tl_class' => 'w50')
		),
    
    'ls_skinsPath' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_skinsPath'],
      'default'                 => 'system/modules/z_sw_layerslider/html/skins/',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'fileTree',
      'eval'                    => array('multiple' => true, 'files' => false, 'filesOnly' => false, 'fieldType' => 'radio', 'tl_class' => 'clr')
		),
    
    'ls_pauseOnHover' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_pauseOnHover'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_globalBGColor' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_globalBGColor'],
      'default'                 => 'transparent',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('maxlength' => 255)
		),
    
    'ls_globalBGImage' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_globalBGImage'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('multiple' => true, 'files' => true, 'filesOnly' => true, 'extensions' => 'png, jpg, jpeg, tiff, gif', 'fieldType' => 'radio')
		),
    
    'ls_animateFirstLayer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_animateFirstLayer'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_isYourLogo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_isYourLogo'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange' => true)
		),
    
    'ls_yourLogo' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_yourLogo'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('multiple' => true, 'files' => true, 'filesOnly' => true, 'extensions' => 'png, jpg, jpeg, tiff, gif', 'fieldType' => 'radio')
		),
    
    'ls_yourLogoStyle' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_yourLogoStyle'],
      'default'                 => 'position: absolute; z-index: 1001; left: 10px; top: 10px;',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array()
		),
    
    'ls_yourLogoLink' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_yourLogoLink'],
      'default'                 => 'false',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array()
		),
    
    'ls_yourLogoTarget' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_yourLogoTarget'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('_blank', '_self', '_parent', '_top'),
			'eval'                    => array()
		),
    
    'ls_loops' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_loops'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'nospace' => true, 'tl_class' => 'clr')
		),
    
    'ls_forceLoopNum' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_forceLoopNum'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_autoPlayVideos' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_autoPlayVideos'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class' => 'w50')
		),
    
    'ls_autoPauseSlideshow' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_autoPauseSlideshow'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('auto', 'true', 'false'),
			'eval'                    => array('tl_class' => 'clr')
		),
    
    'ls_youtubePreview' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider']['ls_youtubePreview'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('multiple' => true, 'files' => true, 'filesOnly' => true, 'extensions' => 'png, jpg, jpeg, tiff, gif', 'fieldType' => 'radio')
		),
	)
);


/**
 * Class tl_layerslider
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Steven Wroblewski 2009-2013
 * @author     Steven Wroblewski <http://www.wroblewski-it.de/>
 * @package    Layerslider
 */
class tl_layerslider extends Backend
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
	 * Auto-generate the slide alias if it has not been set yet
	 * @param mixed
	 * @param DataContainer
	 * @return string
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate alias if there is none
		if (!strlen($varValue))
		{
			$autoAlias = true;
			$varValue = standardize($this->restoreBasicEntities($dc->activeRecord->title));
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_layerslider WHERE alias=?")
								   ->execute($varValue);

		// Check whether the news alias exists
		if ($objAlias->numRows > 1 && !$autoAlias)
		{
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
		}

		// Add ID to alias
		if ($objAlias->numRows && $autoAlias)
		{
			$varValue .= '-' . $dc->id;
		}

		return $varValue;
	}
  
  
  
	/**
	 * List a particular record
	 * @param array
	 * @return string
	 */
	public function createLabel($arrRow, $strLabel)
	{
	  return '
<div class="labelbox">
  <div class="heading">' . $arrRow['title'] . '</div>
</div>';
	}
	
}

?>