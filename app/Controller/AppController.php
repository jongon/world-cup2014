<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	const PLAYED = 1; //Status de juego Jugado
	const NOT_PLAYED = 0; //Status de Juego Jugado

/**
 * Variable que define Helpers, están seteadas para el los  
 * Helpers del Plugin BoostCake
 * @var array
 */
	/*public $helpers = array(
			'Session',
			'Html' => array('className' => 'BoostCake.BoostCakeHtml'),
			'Form' => array('className' => 'BoostCake.BoostCakeForm'),
			'Paginator' => array('className' => 'BoostCake.BoostCakePaginator'),
	);*/

/**
 * Variable que sirve para el seteo de los componentes de 
 * Session, Authentication, Paginator y el plguin "AutoLogin" (Botón remember me?)
 * @var array
 */
	public $components = array(
		'Session',
		'Paginator',
	    'Auth'=>array(
	        'loginRedirect'=>array('controller'=>'bets','action'=>'add'), //redirección del cliente al hacer el Login
	        'logoutRedirect'=>array('controller'=>'users', 'action'=>'login'), //redirección del cliente al hacer logOut
	        'authError'=>'You Need User Privilege to Continue', //Error en caso de entrar a un area que requiera autenticación
	        'authorize'=>array('Controller'),//A donde va a autorizar
	        'flash' => array( //Plantilla de error en caso de fallo (Tiene bugs)
	            'element' => 'alert',
	            'key' => 'auth',
	            'params' => array(
	                'plugin' => 'BoostCake',
	                'class' => 'alert-error'
	            )
	        )
	    ),
	    'Utility.AutoLogin' => array('cookieName' => 'rememberMe','expires' => '+1 weeks') //Auto Login recuerda la sesión del usuario según su preferencia
	);

/**
 * Primer método que se ejecuta en el controlador
 * @return void
 */
	 public function beforeFilter() {

        //Configure::write('Config.language', 'spa');
        //Inicio del Layout de Bootstap
    	$this->layout = 'bootstrap';
    	//Se pasa a la vista la variable que indica si un usuario ha iniciado sesión
        $this->set('logged_in', $this->Auth->loggedIn());
        //Se pasa a la vista la variable que tiene data del usuario que está logeado al sistema 
        $this->set('current_user', $this->Auth->user());
    }

/**
 * Al ser autenticado el usuario se ejecuta este método
 * El usuario autorizado es guardado en el cache del sistema por lo tanto si un usuario es 
 * eliminado de la base de datos mientras se encuentra en el sistema podría segui haciendo uso de él
 * En el siguiente codigo cada vez que ve que el suario está autorizado lo busca en la base de datos
 * Si no se encuentra lo autoriza pero hace logout
 * @param  array  $user
 * @return boolean, true si el usuario autenticado tiene acceso a este controller
 */
    public function isAuthorized($user) {
	    
	    //Carga el modelo de Usuario
	    $this->loadModel('User');
	    //Se ahce seteo de las opciones de la busqueda
	    $options = array ('conditions'=>array('User.id'=>$user['id']),'fields'=>array('User.id'),'recursive'=>0);
	    
	    //Pregunta si el usuario autenticado se encuentra en la BD
	    if (!isset($this->User->find('first',$options)['User']['id'])){
	        
	        $this->redirect($this->Auth->logout()); //redirecciona a logOut
	        return true;
	    }

	    return true;
    }
}
