<div class="bets form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo __('Your Pool'); ?></h1>
			</div>
		</div>
	</div>
</div>
  <div class="row">
    <div class="col-md-9 games-schedule">
    <?php echo $this->Form->create('Bet', array('role'=>'form')); ?>
    <?php echo $this->Form->submit(__('Submit'),array('class' => 'btn btn-primary')); ?>
    <br>
        <?php $i = 0; ?>
        <?php foreach ($user_chart as $chart) :?>
        <?php   
                if ($chart['Game']['status']==0):

                    $chart['Game']['status'] = false;
                elseif ($chart['Game']['status'] == 1):

                    $chart['Game']['status'] = true;
                else:

                    $chart['Game']['status'] = false;
                endif;

                if (!isset($chart['Bet'])):
                    $chart['Bet']['team1_score'] = 0;
                    $chart['Bet']['team2_score'] = 0;
                endif; 

        ?>               
        <div class="well">
            <div class="games-schedule-items">
                <div class="row games-team">
                    <div class="col-md-5">
                        <?php echo $this->Html->image('/'.$chart['Game']['team1_image']); ?>
                        <span><?php echo $chart['Game']['team1_name'] ?></span>
                    </div>
                    <div class="col-md-2">
                    	<center><h4 class="img-circle"><?php echo __('VS') ?></h4></center>
                    </div>
                    <div class="col-md-5">
						<?php echo $this->Html->image('/'.$chart['Game']['team2_image']); ?>
                        <span><?php echo $chart['Game']['team2_name'] ?></span>  					
                    </div>
                </div>
                <div class="row games-score">
                    <div class="col-md-5 alert-success">
                    <span><center><?php echo $chart['Game']['team1_score'] ?></center></span>
                    </div>
                    <div class="col-md-2 alert-success"><center>-</center></div>
                    <div class="col-md-5 alert-success">
                    	<span><center><?php echo $chart['Game']['team2_score'] ?></center></span>
                    </div>
                </div>
                <br>
                <div class="row text">
                	<div class="col-md-12">
                		<p><?php echo __('Your Score') ?></p>
            		</div>
                </div>
                <div class="row user-score">
            		<div class="col-md-1 col-md-offset-2">
            			<center><?php echo $this->Form->input('Bet.'.$i.'.team1_score',array('class' => array('form-control'),'value'=>$chart['Bet']['team1_score'],'label'=>false,'disabled'=>$chart['Game']['status'],'type'=>'text')) ?></center>
	            			<?php echo $this->Form->hidden('Bet.'.$i.'.team1_id',array('value'=>$chart['Game']['team1_id'])); ?>
            		</div>
					<div class="col-md-1 col-md-offset-6">
						<center><?php echo $this->Form->input('Bet.'.$i.'.team2_score',array('class' => array('form-control'),'value'=>$chart['Bet']['team2_score'],'label'=>false,'disabled'=>$chart['Game']['status'],'type'=>'text')) ?></center>
		            			<?php echo $this->Form->hidden('Bet.'.$i.'.team2_id',array('value'=>$chart['Game']['team2_id'])); ?>
					</div>
                </div>
                <br>
                <div class="row games-info">
                    <div class="col-md-12">
                        <p><span class="glyphicon glyphicon-play-circle"></span>
                        <?php echo $this->Time->format($chart['Game']['date'],'%B %e, %Y %H:%M %p');  ?>
                        (<small><?php echo __('Venezuelan Time -4:30 GMT') ?></small>)</p>
                    </div>
                </div>
            </div>
        <?php 
            if (isset($chart['Bet']['id']))
                echo $this->Form->hidden('Bet.'.$i.'.id',array('value'=>$chart['Bet']['id']));
         ?>
        <?php echo $this->Form->hidden('Bet.'.$i.'.games_id',array('value'=>$chart['Game']['id'])); ?>
        <?php echo $this->Form->hidden('Bet.'.$i.'.users_id',array('value'=>$current_user['id'])); ?>
        </div>
        <?php $i++ ?>
		<?php endforeach; ?>
	<?php echo $this->Form->submit(__('Submit'),array('class' => 'btn btn-primary')); ?>
	<?php echo $this->Form->end(); ?>
    </div>
  </div>