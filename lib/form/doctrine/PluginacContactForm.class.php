<?php

/**
 * PluginacContact form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfDoctrineFormPluginTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
abstract class PluginacContactForm extends BaseacContactForm
{
	public function setupInheritance()
	{
		unset($this['created_at'], $this['updated_at'], $this['external_referer'], $this['ip']);
		
		$this->validatorSchema['email'] = new sfValidatorEmail(array('required'=>true));
				
		
		$this->widgetSchema['privacy'] = new sfWidgetFormInputPrivacy();		
		$this->validatorSchema['privacy'] = new sfValidatorBoolean(array('required'=>true));
		
		$this->widgetSchema->getFormFormatter()->setTranslationCatalogue('ac_contacts');
	}
	

}
