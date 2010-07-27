<?php

/**
 * PluginacContact
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class PluginacContact extends BaseacContact
{
	public function getEmailForSwift()
	{
		$fields = sfConfig::get('app_ac_contact_sender_name_fields');
		$sender_name = '';
		foreach($fields as $field)
		{
			if ($sender_name) 
				$sender_name .= ' ';
			$sender_name .= $this->$field;
		}
		if (!$sender_name) 
			$sender_name = $this->email; 
		
		return array($this->email => $sender_name);
	}

	public function getSubject()
	{
		return 'Contatto inviato tramite il sito '.$_SERVER['HTTP_HOST'];
	}
	
	public function getBody($with_referer = true)
	{
		return strip_tags(str_replace('<br/>',"\n",$this->getHtmlBody($with_referer)));
	}
	
	public function getHtmlBody($with_referer = true)
	{
		$body = '';
		foreach(sfConfig::get('app_ac_contact_schema') as $key => $field)
		{
			$body .= $field['name'].': <b>'.$this->$field['name'].'</b><br/>';
		}
		if ($with_referer)
			$body .= 'Sito di provenienza: <b>'.$this->external_referer.'</b>';
		return $body;
		
		
	}
}
