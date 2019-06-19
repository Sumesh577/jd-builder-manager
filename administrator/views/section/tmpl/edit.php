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

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;


HTMLHelper::addIncludePath(JPATH_COMPONENT . '/helpers/html');
HTMLHelper::_('behavior.tooltip');
HTMLHelper::_('behavior.formvalidation');
HTMLHelper::_('formbehavior.chosen', 'select');
HTMLHelper::_('behavior.keepalive');

// Import CSS
$document = Factory::getDocument();
$document->addStyleSheet(Uri::root() . 'media/com_jdbuildermanager/css/form.css');
?>
<script type="text/javascript">
	js = jQuery.noConflict();
	js(document).ready(function () {
		
	js('input:hidden.categories').each(function(){
		var name = js(this).attr('name');
		if(name.indexOf('categorieshidden')){
			js('#jform_categories option[value="'+js(this).val()+'"]').attr('selected',true);
		}
	});
	js("#jform_categories").trigger("liszt:updated");
	});

	Joomla.submitbutton = function (task) {
		if (task == 'section.cancel') {
			Joomla.submitform(task, document.getElementById('section-form'));
		}
		else {
			
			if (task != 'section.cancel' && document.formvalidator.isValid(document.id('section-form'))) {
				
				Joomla.submitform(task, document.getElementById('section-form'));
			}
			else {
				alert('<?php echo $this->escape(Text::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
			}
		}
	}
</script>

<form
	action="<?php echo JRoute::_('index.php?option=com_jdbuildermanager&layout=edit&id=' . (int) $this->item->id); ?>"
	method="post" enctype="multipart/form-data" name="adminForm" id="section-form" class="form-validate form-horizontal">

	
	<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
	<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
	<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
	<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
	<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
	<?php echo $this->form->renderField('created_by'); ?>
	<?php echo $this->form->renderField('modified_by'); ?>
	<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'section')); ?>
	<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'section', JText::_('COM_JDBUILDERMANAGER_TAB_SECTION', true)); ?>
	<div class="row-fluid">
		<div class="span10 form-horizontal">
			<fieldset class="adminform">
				<legend><?php echo JText::_('COM_JDBUILDERMANAGER_FIELDSET_SECTION'); ?></legend>
				<?php echo $this->form->renderField('title'); ?>
				<?php echo $this->form->renderField('categories'); ?>
			<?php
				foreach((array)$this->item->categories as $value): 
					if(!is_array($value)):
						echo '<input type="hidden" class="categories" name="jform[categorieshidden]['.$value.']" value="'.$value.'" />';
					endif;
				endforeach;
			?>
				<?php echo $this->form->renderField('thumbnail'); ?>
				<?php echo $this->form->renderField('content'); ?>
				<?php echo $this->form->renderField('minversion'); ?>
				<?php echo $this->form->renderField('views'); ?>
				<?php echo $this->form->renderField('status'); ?>
				<?php echo $this->form->renderField('updatedon'); ?>
				<?php echo $this->form->renderField('createdon'); ?>
				<?php if ($this->state->params->get('save_history', 1)) : ?>
					<div class="control-group">
						<div class="control-label"><?php echo $this->form->getLabel('version_note'); ?></div>
						<div class="controls"><?php echo $this->form->getInput('version_note'); ?></div>
					</div>
				<?php endif; ?>
			</fieldset>
		</div>
	</div>
	<?php echo JHtml::_('bootstrap.endTab'); ?>

	
	<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	<input type="hidden" name="task" value=""/>
	<?php echo JHtml::_('form.token'); ?>

</form>
