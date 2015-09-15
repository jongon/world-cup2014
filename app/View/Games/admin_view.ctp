<div class="games view">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Game'); ?></h1>
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
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>&nbsp&nbsp;Edit Game'), array('action' => 'edit', $game['Game']['id']), array('escape' => false)); ?> </li>
		<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete Game'), array('action' => 'delete', $game['Game']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $game['Game']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Games'), array('action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Game'), array('action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp&nbsp;List Bets'), array('controller' => 'bets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp;New Bet'), array('controller' => 'bets', 'action' => 'add'), array('escape' => false)); ?> </li>
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
			<?php echo h($game['Game']['id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Date'); ?></th>
		<td>
			<?php echo h($game['Game']['date']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Status'); ?></th>
		<td>
			<?php echo h($game['Game']['status']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team1 Id'); ?></th>
		<td>
			<?php echo h($game['Game']['team1_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team2 Id'); ?></th>
		<td>
			<?php echo h($game['Game']['team2_id']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team1 Score'); ?></th>
		<td>
			<?php echo h($game['Game']['team1_score']); ?>
			&nbsp;
		</td>
</tr>
<tr>
		<th><?php echo __('Team2 Score'); ?></th>
		<td>
			<?php echo h($game['Game']['team2_score']); ?>
			&nbsp;
		</td>
</tr>
				</tbody>
			</table>

		</div><!-- end col md 9 -->

	</div>
</div>

<div class="related row">
	<div class="col-md-12">
	<h3><?php echo __('Related Bets'); ?></h3>
	<?php if (!empty($game['Bet'])): ?>
	<table cellpadding = "0" cellspacing = "0" class="table table-striped">
	<thead>
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Users Id'); ?></th>
		<th><?php echo __('Games Id'); ?></th>
		<th><?php echo __('Team1 Id'); ?></th>
		<th><?php echo __('Team2 Id'); ?></th>
		<th><?php echo __('Team1 Score'); ?></th>
		<th><?php echo __('Team2 Score'); ?></th>
		<th><?php echo __('Bet Score'); ?></th>
		<th class="actions"></th>
	</tr>
	<thead>
	<tbody>
	<?php foreach ($game['Bet'] as $bet): ?>
		<tr>
			<td><?php echo $bet['id']; ?></td>
			<td><?php echo $bet['users_id']; ?></td>
			<td><?php echo $bet['games_id']; ?></td>
			<td><?php echo $bet['team1_id']; ?></td>
			<td><?php echo $bet['team2_id']; ?></td>
			<td><?php echo $bet['team1_score']; ?></td>
			<td><?php echo $bet['team2_score']; ?></td>
			<td><?php echo $bet['bet_score']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-search"></span>'), array('controller' => 'bets', 'action' => 'view', $bet['id']), array('escape' => false)); ?>
				<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-edit"></span>'), array('controller' => 'bets', 'action' => 'edit', $bet['id']), array('escape' => false)); ?>
				<?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>'), array('controller' => 'bets', 'action' => 'delete', $bet['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $bet['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
<?php endif; ?>

	<div class="actions">
		<?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Bet'), array('controller' => 'bets', 'action' => 'add'), array('escape' => false, 'class' => 'btn btn-default')); ?> 
	</div>
	</div><!-- end col md 12 -->
</div>
