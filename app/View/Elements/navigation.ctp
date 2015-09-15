    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <?php echo $this->Html->link(__('World Cup 2014 Pools'), array('controller' => 'bets', 'action' => 'add'),array('class'=>'navbar-brand')); ?>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><?php echo $this->Html->link(__('Home'), array('controller' => 'bets', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('My Profile'), array('controller' => 'bets', 'action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('Rankings'), array('controller' => 'users', 'action' => 'usersRankings')); ?></li>
            <li><?php echo $this->Html->link(__('Calendar'), array('controller' => '', 'action' => '')); ?></li>
            <li><?php echo $this->Html->link(__('Rules'), array('controller' => 'pages', 'action' => 'rules')); ?></li>
            <li><?php echo $this->Html->link(__('Cerrar Sesión'), array('controller' => 'users', 'action' => 'logout')); ?></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>