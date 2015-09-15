<div class="page-header">
   <center><h1><?php echo __('Bienvenidos a la Quiniela del Mundial Brasil 2014') ?>
   </h1></center>
</div>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo __('Please Sign in') ?></h3>
            </div>
            <div class="panel-body">
                <?php echo $this->Form->create('User',array('role'=>'form')); ?>
                <fieldset>
                    <div class="form-group">
                        <?php echo $this->Form->input('username',array('class'=>'form-control', 'placeholder'=>__('User'),'label'=>false)); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->input('password',array('class'=>'form-control','placeholder'=>__('Password'),'label'=>false)) ?>
                    </div>
                    <div class="checkbox">
                        <label>
                            <?php echo $this->Form->input('auto_login', array('type' =>'checkbox','label'=>false,'after'=>__('Remember Me?'),'div'=>'')); ?>
                        </label>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Form->submit(__('Login'),array('class'=>'btn btn-lg btn-success btn-block')); ?>
                    </div>
                    <div class="form-group">
                        <?php echo $this->Html->link(__('Registration'), array('controller' => 'users', 'action' => 'add'),array('class'=>'btn btn-lg btn-primary btn-block')); ?>
                    </div>
                </fieldset>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>

