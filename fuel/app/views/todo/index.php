<h2>Listing <span class='muted'>Todos</span></h2>
<br>
<?php if ($todos): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Note</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody class="">
<?php foreach ($todos as $item): ?>		<tr>

			<td><?php echo $item->note; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('todo/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-
                        sm')); ?>						<?php echo Html::anchor('todo/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('todo/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Todos.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('todo/create', 'Add new Todo', array('class' => 'btn btn-success')); ?>

</p>
