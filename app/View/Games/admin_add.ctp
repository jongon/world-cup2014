<div class="games form">

	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Admin Add Game'); ?></h1>
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

																<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Games'), array('action' => 'index'), array('escape' => false)); ?></li>
									<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-list"></span>&nbsp;&nbsp;List Bets'), array('controller' => 'bets', 'action' => 'index'), array('escape' => false)); ?> </li>
		<li><?php echo $this->Html->link(__('<span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;New Bet'), array('controller' => 'bets', 'action' => 'add'), array('escape' => false)); ?> </li>
							</ul>
						</div>
					</div>
				</div>			
		</div><!-- end col md 3 -->
		<div class="col-md-9">
			<?php echo $this->Form->create('Game', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('date', array('class' => 'form-control', 'placeholder' => 'Date'));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('status', array('class' => 'form-control', 'placeholder' => 'Status'));?>
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
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
