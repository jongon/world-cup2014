<?php
App::uses('AppModel', 'Model');
/**
 * Country Model
 *
 */
class Country extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'id' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'naturalNumber' => array(
				'rule' => array('naturalNumber'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),			
			'unique' => array(
				'rule' => array('isUnique'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule' => array('between',0,45),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);


	/*
	Esto me impide borrar usuarios
	 */    
	public $actsAs = array(
	    'Uploader.Attachment' => array(
	        // Do not copy all these settings, it's merely an example
	        'image' => array(
	            //'nameCallback' => 'formatName',
	            'append' => '',	            
	            'tempDir' => 'tmp',
	            'uploadDir' => 'uploads/',
	            'finalPath' => 'uploads/',
	            'transportDir' => '',
	            'prepend' => '',
	            'metaColumns' => array(),
	            'defaultPath' => '',
	            'dbColumn' => 'image',
	            'overwrite' => false,
	            'stopSave' => true,
	            'allowEmpty' => true,
	            'transport' => array(),
	            'curl' => array()
	        )
	    ),
		'Uploader.FileValidation' => array(
			'image' => array(
				'extension' => array('value'=>array('gif', 'jpg', 'png', 'jpeg'),
									 'message'=>'File Extension not allowed (Solo \'gif\', \'jpg\', \'png\', \'jpeg\')'),
				'type' => array('value'=>array('image'),
								'message'=>'File is not an image, please try again'),
				'filesize' => array('value'=>1048576,
									'message'=>'Size Of selected image is bigger than allowed (Max 3MB)'),
				'required' => array('value'=>true,
									'message'=>'You must upload a profile picture'),
				'maxWidth' => array('value'=>640,
									'message'=>'Image width is bigger than allowed'),
				'maxHeight' => array('value'=>640,
									 'message'=>'Image height is bigger than allowed'),
				'minHeight'=> array('value'=>30,
								   'message'=>'Image height is smaller than allowed'),
				'minWidth'=> array('value'=>30,
									'message'=>'Image width is smaller than allowed'),
			)
		)
	); 

/*
* Función que asigna el nombre de la imagen
* Por defecto será el nombre unico de usuario
 */

	/*public function formatName() {
		return sprintf('%s', $this->data['User']['username']);
	} */
}
