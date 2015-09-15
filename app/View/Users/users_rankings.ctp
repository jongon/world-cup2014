<?php $position = 1; ?>
<div class="row">
	<table class="table table-hover">
		<thead>
			<tr>
				<th>
					<?php echo __('Position') ?>
				</th>
				<th>
					<?php echo __('Username') ?>
				</th>
				<th>
					<?php echo __('Score') ?>
				</th>
				<th>
					<?php echo __('Pool') ?>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $position++; ?></td>
				<td><?php echo $user['User']['username'] ?></td>
				<td><?php echo $user['User']['points'] ?></td>
				<td><?php echo $this->Html->link(__('Predicciones Pasadas'), array('controller' => 'bets', 'action' => 'indexFinishedGames',$user['User']['id']),array('class'=>'btn btn-primary btn-xs')); ?></td>
			</tr>
		<?php endforeach; ?>
		</tbody>	
	</table>
</div>