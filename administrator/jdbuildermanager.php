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

use \Joomla\CMS\MVC\Controller\BaseController;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Language\Text;

// Access check.
if (!Factory::getUser()->authorise('core.manage', 'com_jdbuildermanager'))
{
	throw new Exception(Text::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Jdbuildermanager', JPATH_COMPONENT_ADMINISTRATOR);
JLoader::register('JdbuildermanagerHelper', JPATH_COMPONENT_ADMINISTRATOR . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR . 'jdbuildermanager.php');

$controller = BaseController::getInstance('Jdbuildermanager');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
