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
 * Table tl_layerslider_slides 
 */
$GLOBALS['TL_DCA']['tl_layerslider_slides'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_layerslider',
    'ctable'                      => array('tl_layerslider_elements'),
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
			'headerFields'            => array('title','ls_size'),
			'panelLayout'             => 'filter;search,limit',
			'child_record_callback'   => array('tl_layerslider_slides', 'listElements')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['edit'],
				'href'                => 'table=tl_layerslider_elements',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
      'toggle' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['toggle'],
				'icon'                => 'visible.gif',
				'attributes'          => 'onclick="Backend.getScrollOffset();return AjaxRequest.toggleVisibility(this,%s)"',
				'button_callback'     => array('tl_layerslider_slides', 'toggleIcon')
			)
		)
	),

	// Palettes
	'palettes' => array
	(
		'__selector__'	=>	array('type'),
		'default'       => '{type_legend}, title;
                        {ls_slide_legend}, ls_slideDirection, ls_slideDelay;
                        {ls_animation_legend:hide}, ls_durationIn, ls_durationOut, ls_easingIn, ls_easingOut, ls_delayIn, ls_delayOut;
                        {extend_legend}, cssClass, published;',
	),

	// Subpalettes
	'subpalettes' => array 
  (
    
	),
  
	// Fields
	'fields' => array
	(
    'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory' => true, 'tl_class' => 'w50')
		),
    
    'ls_slideDirection' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_slideDirection'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('left', 'right', 'top', 'bottom', 'fade'),
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_slideDelay' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_slideDelay'],
      'default'                 => '4000',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_durationIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_durationIn'],
      'default'                 => '1000',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_durationOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_durationOut'],
      'default'                 => '1000',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_easingIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_easingIn'],
      'default'                 => 'easeInOutQuint',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('linear', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_easingOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_easingOut'],
      'default'                 => 'easeInOutQuint',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
      'options'                 => array('linear', 'swing', 'easeInQuad', 'easeOutQuad', 'easeInOutQuad', 'easeInCubic', 'easeOutCubic', 'easeInOutCubic', 'easeInQuart', 'easeOutQuart', 'easeInOutQuart', 'easeInQuint', 'easeOutQuint', 'easeInOutQuint', 'easeInExpo', 'easeOutExpo', 'easeInOutExpo', 'easeInSine', 'easeOutSine', 'easeInOutSine', 'easeInCirc', 'easeOutCirc', 'easeInOutCirc', 'easeInElastic', 'easeOutElastic', 'easeInOutElastic', 'easeInBack', 'easeOutBack', 'easeInOutBack', 'easeInBounce', 'easeOutBounce', 'easeInOutBounce'),
			'eval'                    => array('tl_class' => '')
		),
    
    'ls_delayIn' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_delayIn'],
      'default'                 => '0',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
    'ls_delayOut' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['ls_delayOut'],
      'default'                 => '0',
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp' => 'digit', 'tl_class' => '')
		),
    
		'cssClass' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['cssClass'],
			'exclude'                 => true,
			'inputType'               => 'text'
		),
    
    'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_layerslider_slides']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 1,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true)
		)
  )
);


/**
 * Class tl_layerslider_slides
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Steven Wroblewski 2009-2013
 * @author     Steven Wroblewski <http://www.wroblewski-it.de/>
 * @package    Layerslider
 */
class tl_layerslider_slides extends Backend
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
    return '<div class="be_layerslider_elements">
              <p>'.$arrRow['title'].'</p>
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
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_layerslider_slides::published', 'alexf'))
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
		if (!$this->User->isAdmin && !$this->User->hasAccess('tl_layerslider_slides::published', 'alexf'))
		{
			$this->log('Not enough permissions to publish/unpublish news item ID "'.$intId.'"', 'tl_layerslider_slides toggleVisibility', TL_ERROR);
			$this->redirect('contao/main.php?act=error');
		}

		$this->createInitialVersion('tl_layerslider_slides', $intId);
	
		// Trigger the save_callback
		if (is_array($GLOBALS['TL_DCA']['tl_layerslider_slides']['fields']['published']['save_callback']))
		{
			foreach ($GLOBALS['TL_DCA']['tl_layerslider_slides']['fields']['published']['save_callback'] as $callback)
			{
				$this->import($callback[0]);
				$blnVisible = $this->$callback[0]->$callback[1]($blnVisible, $this);
			}
		}

		// Update the database
		$this->Database->prepare("UPDATE tl_layerslider_slides SET tstamp=". time() .", published='" . ($blnVisible ? 1 : '') . "' WHERE id=?")
					   ->execute($intId);

		$this->createNewVersion('tl_layerslider_slides', $intId);
	}
}
?>