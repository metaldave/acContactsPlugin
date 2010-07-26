<?php


/**
 * sfWidgetFormInputPrivacy represents an HTML checkbox tag with privacy statement.
 *
 * @package    acContactsPlugin
 * @subpackage widget
 * @author     Anycode s.n.c. <davide@anycode.it>
 * @version    SVN: $Id: sfWidgetFormInputPrivacy.class.php 21908 2009-09-11 12:06:21Z fabien $
 */
class sfWidgetFormInputPrivacy extends sfWidgetFormInputCheckbox
{

  /**
   * @param  string $name        The element name
   * @param  string $value       The this widget is checked if value is not null
   * @param  array  $attributes  An array of HTML attributes to be merged with the default HTML attributes
   * @param  array  $errors      An array of errors for the field
   *
   * @return string An HTML tag string
   *
   * @see sfWidgetForm
   */
	public function render($name, $value = null, $attributes = array(), $errors = array())
	{
	  	$privacy = sfConfig::get('app_ac_contact_privacy');
	  	$company_name = $privacy['company_name'];
	  	
	    return parent::render($name, $value, $attributes, $errors).
	    		'<label for="'.$this->generateId($name).'">'.
	    			__('ac_contacts_privacy_statement',array('%company_name%'=>$company_name, '%link%'=>url_for('@ac_contacts_privacy')),'ac_contacts').
	    		'</label>';
	}

	public function getStylesheets()
	{
		return array(
			'/acContactsPlugin/js/cluetip-1.0.6/jquery.cluetip.css' => 'screen'
		);
	}
	
	public function getJavascripts()
	{
		return array(
			sfConfig::get('app_ac_contact_jquery_url'),
			'/acContactsPlugin/js/cluetip-1.0.6/jquery.cluetip.min.js',
			'/acContactsPlugin/js/privacy.js'
		);
	}  
}
