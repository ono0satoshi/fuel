<h2>Viewing <span class='muted'>#<?php echo $todo->id; ?></span></h2>

<p>
	<strong>Note:</strong>
	<?php echo $todo->note; ?></p>

<?php echo Html::anchor('todo/edit/'.$todo->id, 'Edit'); ?> |
<?php echo Html::anchor('todo', 'Back'); ?>