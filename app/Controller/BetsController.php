<?php
App::uses('AppController', 'Controller');
App::import('Controller','Users');

/**
 * Bets Controller
 *
 * @property Bet $Bet
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class BetsController extends AppController {

	const COMPLETE_SCORE = 10; //Puntaje si se acierta el score completo (Parlay)
	const GOAL_SCORE = 1; //Puntaje por cada goal marcado
	const TEAM_SCORE = 2; //Puntaje en caso de acertar el equipo ganador o acertar empate con resultados distintos

/**
 * Primer método que se ejecuta en el controlador
 * @return void
 */
	public function beforefilter(){
	
		parent::beforeFilter();
	}

/**
 * Al ser autenticado el usuario se ejecuta este método
 * @return boolean, true si el usuario autenticado tiene acceso a este controlador
 */
	public function isAuthorized($user){

		parent::isAuthorized($user);
		return true;
	}

/**
 * 
 *
 * @return void
 */
	public function indexFinishedGames($user_id) {

		$this->Bet->recursive = 0;
		$userBets = $this->Bet->find('all',array('conditions'=>array('users_id'=>$user_id)));

		if ($user_id != null && !empty($userBets)){

			$this->loadModel('Country');
			$countries = $this->Country->find('all');
			$bets = array();

			foreach ($userBets as $bet){

				$status = 0;

				if ($bet['Games']['status'] == self::PLAYED){

					foreach ($countries as $country){

						if ($country['Country']['id'] == $bet['Bet']['team1_id']){

							$bet['Games']['team1_name'] = $country['Country']['name'];
							$bet['Games']['team1_image'] = $country['Country']['image'];

							$status ++;

							if ($status >=2)
								break;

						} else if ($country['Country']['id'] == $bet['Games']['team2_id']){

							$bet['Games']['team2_name'] = $country['Country']['name'];
							$bet['Games']['team2_image'] = $country['Country']['image'];

							$status ++;

							if ($status >=2)
								break;
						}
					}
					array_push($bets,$bet);
				}
			}

			$userBets = $bets;
			$this->set('userBets', $userBets);
			$this->set('user',$this->User->find('first',array('conditions'=>(array('id'=>$user_id)))));
		} else {

			$this->Session->setFlash(__('Invalid User Or Doesn\'t have bets', 'default', array('class' => 'alert alert-danger')));
			return $this->redirect(array('controller'=>'users','action' => 'usersRankings'));
		}
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
		$this->set('bet', $this->Bet->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		$bets = $this->Bet->find('all',array('conditions'=>array('Bet.users_id'=>$this->Auth->user()['id'],'Games.deleted'=>0)));
		
		//Entra si la petición es del tipo post
		if (empty($bets)){
			$edit = false;
		} else {
			$edit = true;
		}

		if ($this->request->is('post')) {

			$bets = $this->request->data['Bet']; //Las apuestas son asignasdas a $bets para un manejo mas cómodo

			try{
				//Todas las apuestas se van almacenando en la BD Una a Una
				foreach ($bets as $bet) {
					
					if(!$edit)
						$this->Bet->create(); //Hace reset del modelo 

					//En caso de que no salve exitosamente o que el usuario autenticado no sea el que realiza la apuesta
					if (!$this->Bet->save($bet) || ($bet['users_id'] !== $this->Auth->user()['id'])){

						throw new Exception("Error Processing Request", 1);
					}
				}
				
				$this->Session->setFlash(__('The bet has been saved.'), 'default', array('class' => 'alert alert-success'));//Mensaje Exitoso
				return $this->redirect(array('action' => 'add'));//Se redirecciona de nuevo a la página de apuestas

			} catch (Exception $e){

				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));//Mensaje si no puede ser guardado exitosamente
			}	
		}

		
		/*
		* si es un arreglo vacio en bets doirecto a displayear la quiniela por default si no
		* Con la configuración guardada
		 */
		if (empty($bets)){

			$user_chart = $this->setGamesChart(); //Todo el tablero con los partidos
			$this->set('user_chart',$user_chart); //Envia todos los partidos a la vista
		} else {

			$bets = $this->Bet->find('all',array('conditions'=>array('Bet.users_id'=>$this->Auth->user()['id'],'Games.deleted'=>0)));
			$user_chart = $this->setGamesChart($bets);
			$this->set('user_chart',$user_chart); //Envia las apuestas de los partidos a la vista
		}
	}

/**
 * [setGamesChart description]
 * @return array 
 */
	private function setGamesChart($games = null){

		$this->loadModel('Country'); //Se carga el modelo de los Paises
		
		if ($games == null){

			$this->loadModel('Game'); //Se carga el modelo de los Juegos
			$games = $this->Game->find('all',array('recursive'=>0,'conditions'=>array('deleted'=>0))); //
		} 
		
		$countries = $this->Country->find('all',array('fields'=>array('Country.id','Country.name','Country.image'))); //Se encuentran y alamcenan en $countries todos los paises en la base de datos
		$game_chart = array();
		
		foreach ($games as $game){

			$status = 0;
			
			if (isset($game['Games'])){

				$game['Game'] = $game['Games'];
				unset($game['Games']);
			}	

			foreach ($countries as $country){

				if ($country['Country']['id'] == $game['Game']['team1_id']){

					$game['Game']['team1_name'] = $country['Country']['name'];
					$game['Game']['team1_image'] = $country['Country']['image'];

					$status ++;

					if ($status >=2)
						break;

				} else if ($country['Country']['id'] == $game['Game']['team2_id']){

					$game['Game']['team2_name'] = $country['Country']['name'];
					$game['Game']['team2_image'] = $country['Country']['image'];

					$status ++;

					if ($status >=2)
						break;
				}
			}
			array_push($game_chart,$game);
		}

		return $game_chart;
	}


	public function betScoreCalculator($id_game){

		$bets = $this->Bet->find('all',array('conditions'=>array('games_id'=> $id_game)));

		foreach ($bets as $bet){

			$scores = 0;

			//En caso de acertar el resultado exacto
			if ($bet['Games']['team1_score'] == $bet['Bet']['team1_score']
				&& $bet['Games']['team2_score'] == $bet['Bet']['team2_score']){

				$scores = self::COMPLETE_SCORE;
			} else {

				//En caso de acertar empate entre dos equipos
				if ($bet['Games']['team1_score'] == $bet['Games']['team2_score'] 
					&& $bet['Bet']['team1_score'] == $bet['Bet']['team2_score']){

					$scores += self::TEAM_SCORE;
				
				} else {
					//En caso de acertar Equipo ganador
					if (($bet['Games']['team1_score'] > $bet['Games']['team2_score'] && $bet['Bet']['team1_score'] > $bet['Bet']['team2_score']) ||
							($bet['Games']['team2_score'] > $bet['Games']['team1_score'] && $bet['Bet']['team2_score'] > $bet['Bet']['team1_score'])){

						$scores += self::TEAM_SCORE;

					}
					//En caso de acertar un gol en el partido
					if (($bet['Games']['team1_score'] == $bet['Bet']['team1_score']) || ($bet['Games']['team2_score'] == $bet['Bet']['team2_score'])){

						$scores += self::GOAL_SCORE;
					}
				}

			}

			$bet['Bet']['bet_score'] = $scores;
			$this->editBetScores($bet);
		}
	}

	private function editBetScores($bet){

		if (!$this->Bet->exists($bet['Bet']['id'])) {
			throw new NotFoundException(__('Invalid bet'));
		}

		$this->editUserScore($bet);

		if ($this->Bet->save($bet)) {

			$this->Session->setFlash(__('The bet has been saved.'), 'default', array('class' => 'alert alert-success'));
			//return $this->redirect(array('action' => 'index'));
		} else {

			$this->Session->setFlash(__('The bet could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
	}

	private function editUserScore($bet){

		$bet['Users']['points'] += $bet['Bet']['bet_score'];
		$user['User'] = $bet['Users']; 
		unset($user['User']['password']);
		$this->loadModel('User');
        $this->User->validator()->remove('password','notempty');
        $this->User->validator()->remove('password','between');
        $this->User->validator()->remove('password','Match passwords');
        $this->User->validator()->remove('password_confirmation', 'notempty');
		$this->User->save($user);
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
			$this->request->data = $this->Bet->find('first', $options);
		}
		$users = $this->Bet->User->find('list');
		$games = $this->Bet->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Bet->id = $id;
		if (!$this->Bet->exists()) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bet->delete()) {
			$this->Session->setFlash(__('The bet has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The bet could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Bet->recursive = 0;
		$this->set('bets', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
		$this->set('bet', $this->Bet->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Bet->create();
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Bet->User->find('list');
		$games = $this->Bet->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Bet->exists($id)) {
			throw new NotFoundException(__('Invalid bet'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Bet->save($this->request->data)) {
				$this->Session->setFlash(__('The bet has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bet could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Bet.' . $this->Bet->primaryKey => $id));
			$this->request->data = $this->Bet->find('first', $options);
		}
		$users = $this->Bet->User->find('list');
		$games = $this->Bet->Game->find('list');
		$this->set(compact('users', 'games'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Bet->id = $id;
		if (!$this->Bet->exists()) {
			throw new NotFoundException(__('Invalid bet'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Bet->delete()) {
			$this->Session->setFlash(__('The bet has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The bet could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}