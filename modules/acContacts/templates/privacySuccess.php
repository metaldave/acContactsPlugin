<?php use_helper('I18N')?>

<div style="font-size: 10px">
	<?php $privacy = sfConfig::get('app_ac_contact_privacy'); ?>
	<?php echo __('ac_contacts_privacy_notice',array(
					'%full_company_name%'=>$privacy['full_company_name'],
					'%company_name%'=>$privacy['company_name'],
					'%owner_name%'=>$privacy['owner_name'],
					'%owner_address%'=>$privacy['owner_address'],
					'%owner_email%'=>mail_to($privacy['owner_email'],$privacy['owner_email']),
	),'ac_contacts')?>
</div>