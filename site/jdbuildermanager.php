<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Jdbuildermanager
 * @author     JoomDev <info@joomdev.com>
 * @copyright  Copyright (C) 2019 Joomdev, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use \Joomla\CMS\Factory;
use \Joomla\CMS\MVC\Controller\BaseController;

// Include dependancies
jimport('joomla.application.component.controller');

JLoader::registerPrefix('Jdbuildermanager', JPATH_COMPONENT);
JLoader::register('JdbuildermanagerController', JPATH_COMPONENT . '/controller.php');


// Execute the task.
$controller = BaseController::getInstance('Jdbuildermanager');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();
