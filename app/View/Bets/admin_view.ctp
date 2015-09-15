<div class="bets view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Bet'); ?></h1>
			</div>
		</div>
	</div>

	<div class="row">

		<div class="col-md-3">
			<div class="actions">
				<div class="panel panel-default">
					<div class="panel-heading">Actions</div>
						<div class="panel-body">
							<ul class="nav nav-pills nav-stacked">
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Bet'), array('action' => 'edit', $bet['Bet']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Bet'), array('action' => 'delete', $bet['Bet']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bet['Bet']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Bets'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Bet'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Users'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Games'), array('controller' => 'games', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Games'), array('controller' => 'games', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div><!-- end body -->
				</div><!-- end panel -->
			</div><!-- end actions -->
		</div><!-- end col md 3 -->

		<div class="col-md-9">			
			<table cellpadding="0" cellspacing="0" class="table table-striped">
				<tbody>
				<tr>
		<th><?php echo __('Id'); ?></th>
		<td>
			<?php echo h($bet['Bet']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Users'); ?></th>
		<td>
			<?php echo $this->Html->link($bet['Users']['id'], array('controller' => 'users', 'action' => 'view', $bet['Users']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Games'); ?></th>
		<td>
			<?php echo $this->Html->link($bet['Games']['id'], array('controller' => 'games', 'action' => 'view', $bet['Games']['id'])); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team1 Id'); ?></th>
		<td>
			<?php echo h($bet['Bet']['team1_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team2 Id'); ?></th>
		<td>
			<?php echo h($bet['Bet']['team2_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team1 Score'); ?></th>
		<td>
			<?php echo h($bet['Bet']['team1_score']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team2 Score'); ?></th>
		<td>
			<?php echo h($bet['Bet']['team2_score']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Bet Score'); ?></th>
		<td>
			<?php echo h($bet['Bet']['bet_score']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

