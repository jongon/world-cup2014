<div class="users form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('User Registration'); ?></h1>
			</div>
		</div>
	</div>
	<div class="row">

		<div class="col-md-9">
			<?php echo $this->Form->create('User', array('role' => 'form')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('username', array('class' => 'form-control', 'placeholder' => __('Username')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('password', array('class' => 'form-control', 'placeholder' => __('Password')));?>
				</div>
				<div class="form-group">
        			<?php echo $this->Form->input('password_confirmation',array('class' => 'form-control', 'type'=>'password', 'placeholder'=>__('Confirm Password'))); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('email', array('class' => 'form-control', 'placeholder' => __('Email')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('first_name', array('class' => 'form-control', 'placeholder' => __('First Name')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('last_name', array('class' => 'form-control', 'placeholder' => __('Last Name')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
