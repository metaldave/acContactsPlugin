<?php

/**
 *
 * @package    acContactsPlugin
 * @subpackage plugin
 * @author     Anycode
 * @version    SVN: $Id: acContactsRouting.class.php,v 1.1 2009-11-24 13:21:22 davide Exp $
 */
class acContactsRouting
{
	static public function addRouteForacContacts(sfEvent $event)
	{
		$r = $event->getSubject();
		
		$base_pattern = sfConfig::get('app_contacts_culture_in_route',true) ? '/:sf_culture' : '';

		$r->prependRoute('ac_contacts', new sfRoute(
			$base_pattern.'/contacts.html', // pattern
			array('module' => 'acContacts', 'action' => 'index'), // defaults
			array('sf_method'=>'get') //requirements
		));

		$r->prependRoute('ac_contacts_privacy', new sfRoute(
			$base_pattern.'/privacy.html', // pattern
			array('module' => 'acContacts', 'action' => 'privacy'), // defaults
			array('sf_method'=>'get') //requirements
		));	

		$r->prependRoute('ac_contacts_thanks', new sfRoute(
			$base_pattern.'/contacts-thanks.html', // pattern
			array('module' => 'acContacts', 'action' => 'thanks'), // defaults
			array('sf_method'=>'get') //requirements
		));		
	}
	
	static public function addRouteForacContactsAdmin(sfEvent $event)
	{
	    $event->getSubject()->prependRoute('ac_contact', new sfDoctrineRouteCollection(array(
	      'name'                => 'ac_contact',
	      'model'               => 'acContact',
	      'module'              => 'acContactsAdmin',
	      'prefix_path'         => 'acContactsAdmin',
	      'with_wildcard_routes' => true,
	      'requirements'        => array(),
	    )));
	}

}