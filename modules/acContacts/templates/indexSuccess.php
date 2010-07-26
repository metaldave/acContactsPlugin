<?php use_helper('I18N')?>

<?php use_stylesheets_for_form($form); ?>
<?php use_javascripts_for_form($form); ?>

<div id="contact_page">
	<?php if ('ac_contacts_title' != __('ac_contacts_title',null,'ac_contacts')):?>
		<h1><?php echo __('ac_contacts_title',null,'ac_contacts')?></h1>
	<?php endif?>
	
	<?php if ('ac_contacts_message' != __('ac_contacts_message',null,'ac_contacts')):?>
		<p><?php echo __('ac_contacts_message',null,'ac_contacts') ?></p>
	<?php endif?>
	
	
	<form action="<?php echo url_for('@ac_contacts')?>" method="post" id="contact_form">
		<table>
			<?php echo $form ?>	
			<tr>
				<th>
				</th>
				<td>
					<input type="submit" value="Invia">
				</td>
			</tr>
		</table>
		
	</form>
</div>
