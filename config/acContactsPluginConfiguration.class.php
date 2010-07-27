<?php

/**
 * acContactsPluginConfiguration configuration.
 * 
 * @package    acContactsPlugin
 * @subpackage config
 * @author     Anycode
 * @version    SVN: $Id: acContactsPluginConfiguration.class.php,v 1.1 2009-11-24 13:21:07 davide Exp $
 */
class acContactsPluginConfiguration extends sfPluginConfiguration
{
  /**
   * @see sfPluginConfiguration
   */
	public function initialize()
	{
		$this->dispatcher->connect('response.filter_content', array($this, 'listenToFindExternalReferer'));
		
		// routing per i vari moduli
	    foreach (array('acContacts', 'acContactsAdmin') as $module)
	    {
			if (in_array($module, sfConfig::get('sf_enabled_modules', array())))
			{
				$this->dispatcher->connect('routing.load_configuration', array('acContactsRouting', 'addRouteFor'.$module));
			}
	    }
	}
	
	public function listenToFindExternalReferer(sfEvent $event, $result)
	{
		// se è la prima richiesta salva il referer in un attributo dello user
		$user = sfContext::getInstance()->getUser();
		if (!$user->hasAttribute('external_referer','acContactsPlugin'))
		{
			$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'Traffico diretto'; 
			$user->setAttribute('external_referer',$referer,'acContactsPlugin');
		}
		
		return $result;		
	}

}