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

use \Joomla\CMS\Factory;

/**
 * Class JdbuildermanagerController
 *
 * @since  1.6
 */
class JdbuildermanagerController extends \Joomla\CMS\MVC\Controller\BaseController
{
	/**
	 * Method to display a view.
	 *
	 * @param   boolean  $cachable   If true, the view output will be cached
	 * @param   mixed    $urlparams  An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return   JController This object to support chaining.
	 *
	 * @since    1.5
     * @throws Exception
	 */
	public function display($cachable = false, $urlparams = false)
	{
		$document = JFactory::getDocument();
		$document->addStyleSheet(JURI::root() . 'media/com_jdbuildermanager/css/style.css', ['version' => $document->getMediaVersion()]);
		$view = Factory::getApplication()->input->getCmd('view', 'sections');
		Factory::getApplication()->input->set('view', $view);

		parent::display($cachable, $urlparams);

		return $this;
	}
}
