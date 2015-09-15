<div class="countries form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Add Country'); ?></h1>
			</div>
		</div>
	</div>
		<div class="col-md-9">
			<?php echo $this->Form->create('Country', array('type' => 'file')); ?>

				<div class="form-group">
					<?php echo $this->Form->input('name', array('class' => 'form-control', 'placeholder' => __('Name')));?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->input('image',array('class' => 'filestyle', 'type'=>'file', 'data-buttonName'=>'btn-primary')); ?>
				</div>
				<div class="form-group">
					<?php echo $this->Form->submit(__('Submit'), array('class' => 'btn btn-default')); ?>
				</div>

			<?php echo $this->Form->end() ?>

		</div><!-- end col md 12 -->
	</div><!-- end row -->
</div>
