<?php

/**
 * acContacts actions.
 *
 * @package    ecsystem
 * @subpackage acContacts
 * @author     Anycode s.n.c. <davide@anycode.it>
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class acContactsActions extends sfActions
{
	public function executeIndex(sfWebRequest $request)
 	{
		$this->form = new acContactForm();
		if ($request->isMethod('post'))
		{
			$this->form->bind($request->getParameter('ac_contact'));
			if ($this->form->isValid())
			{
				// salva i dati
				$this->form->save();
				
				// e invia una mail
				$contact = $this->form->getObject();
				$this->getMailer()->composeAndSend(
					$contact->getEmailForSwift(), // from
					sfConfig::get('app_ac_contacts_recipients'), // to
					$contact->getSubject(), // subject
					$contact->getBody() // body 
				);
				
				$this->redirect('@ac_contacts_thanks');
			}
		}
	}
	
	public function executeThanks(sfWebRequest $request)
 	{
		
	}	
	
	public function executePrivacy(sfWebRequest $request)
	{
		
	}
}
