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
		// routing per i vari moduli
	    foreach (array('acContacts', 'acContactsAdmin') as $module)
	    {
			if (in_array($module, sfConfig::get('sf_enabled_modules', array())))
			{
				$this->dispatcher->connect('routing.load_configuration', array('acContactsRouting', 'addRouteFor'.$module));
			}
	    }
	}

}