
<?php 
 if (count($resdiances) > 0) : ?>
	<div class="error">
		<?php foreach ($resdiances as $resdiance) : ?>
			<p><?php echo $resdiance ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
?>		