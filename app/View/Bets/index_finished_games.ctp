<div class="bets form">
	<div class="row">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?php echo $user['User']['username']; ?></h1>
				<h2><?php echo __('Points: ').__($user['User']['points']) ?></h2>
			</div>
		</div>
	</div>
</div>
<div class="row">
    <div class="col-md-9 games-schedule">
        <?php foreach ($userBets as $chart) :?>
        <div class="well">
            <div class="games-schedule-items">
                <div class="row games-team">
                    <div class="col-md-5">
                        <?php echo $this->Html->image('/'.$chart['Games']['team1_image']); ?>
                        <span><?php echo $chart['Games']['team1_name'] ?></span>
                    </div>
                    <div class="col-md-2">
                    	<center><h4 class="img-circle"><?php echo __('VS') ?></h4></center>
                    </div>
                    <div class="col-md-5">
						<?php echo $this->Html->image('/'.$chart['Games']['team2_image']); ?>
                        <span><?php echo $chart['Games']['team2_name'] ?></span>  					
                    </div>
                </div>
                <div class="row games-score">
                    <div class="col-md-5 alert-success">
                    <span><center><?php echo $chart['Games']['team1_score'] ?></center></span>
                    </div>
                    <div class="col-md-2 alert-success"><center>-</center></div>
                    <div class="col-md-5 alert-success">
                    	<span><center><?php echo $chart['Games']['team2_score'] ?></center></span>
                    </div>
                </div>
                <br>
                <div class="row text">
                	<div class="col-md-12">
                		<p><?php echo ('User Score: ').$chart['Bet']['bet_score'] ?></p>
            		</div>
                </div>
                <div class="row user-score">
            		<div class="col-md-1 col-md-offset-2">
            			<center><?php echo $chart['Bet']['team1_score']?></center>
            		</div>
					<div class="col-md-1 col-md-offset-6">
						<center><?php echo $chart['Bet']['team2_score'] ?></center>
					</div>
                </div>
            </div>
    	</div>
		<?php endforeach; ?>
  </div>