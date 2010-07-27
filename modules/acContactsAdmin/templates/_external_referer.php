<?php if (strpos($contatto->getExternalReferer(),'http://')!==false):?>
	<a href="<?php echo $contatto->getExternalReferer()?>" target="_blank"><?php echo $contatto->getExternalReferer()?></a>
<?php else:?>
	<?php echo $contatto->getExternalReferer()?>
<?php endif?>