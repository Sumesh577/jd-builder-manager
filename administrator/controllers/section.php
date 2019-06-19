<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Jdbuildermanager
 * @author     JoomDev <info@joomdev.com>
 * @copyright  Copyright (C) 2019 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Section controller class.
 *
 * @since  1.6
 */
class JdbuildermanagerControllerSection extends \Joomla\CMS\MVC\Controller\FormController
{
	/**
	 * Constructor
	 *
	 * @throws Exception
	 */
	public function __construct()
	{
		$this->view_list = 'sections';
		parent::__construct();
	}
}
