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
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['layerslider'] = '{title_legend},name,type,headline;{config_legend},layerslider;{expert_legend:hide},cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['layerslider'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['layerslider'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'foreignKey'              => 'tl_layerslider.title',
	'eval'                    => array('mandatory'=>true)
);


/**
 * Class tl_module_layerslider
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Steven Wroblewski 2009-2013
 * @author     Steven Wroblewski <http://www.wroblewski-it.de/>
 * @package    Layerslider
 */
class tl_module_layerslider extends Backend
{
  
}

?>