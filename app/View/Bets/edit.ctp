<div class="bets form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Edit Bet'); ?></h1>
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

																<li><?php echo $this->Form->postLink(__('<span class="glyphicon glyphicon-remove"></span>&nbsp;&nbsp;Delete'), array('action' => 'delete', $this->Form->value('Bet.id')), array('escape' => false), __('Are you sure you want to delete # %s?', $this->Form->value('Bet.id'))); ?></li>
																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Bets'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Users'), array('controller' => 'users', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Users'), array('controller' => 'users', 'action' => 'add'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Games'), array('controller' => 'games', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Games'), array('controller' => 'games', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Bet', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('id', array('class' => 'form-control', 'placeholder' => 'Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('users_id', array('class' => 'form-control', 'placeholder' => 'Users Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('games_id', array('class' => 'form-control', 'placeholder' => 'Games Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('team1_id', array('class' => 'form-control', 'placeholder' => 'Team1 Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('team2_id', array('class' => 'form-control', 'placeholder' => 'Team2 Id'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('team1_score', array('class' => 'form-control', 'placeholder' => 'Team1 Score'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('team2_score', array('class' => 'form-control', 'placeholder' => 'Team2 Score'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('bet_score', array('class' => 'form-control', 'placeholder' => 'Bet Score'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
