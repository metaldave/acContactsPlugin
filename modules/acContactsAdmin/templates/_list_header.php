<b>Destinatari:</b>
<?php
foreach(sfConfig::get('app_ac_contact_recipients') as $email => $nome)
{
	echo $nome.' &lt;'.$email.'&gt;, ';
}
?>