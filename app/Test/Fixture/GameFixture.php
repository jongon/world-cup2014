<?php
/**
 * GameFixture
 *
 */
class GameFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'date' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'status' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 4),
		'team1_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'team2_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'team1_score' => array('type' => 'integer', 'null' => true, 'default' => null),
		'team2_score' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date' => '2014-06-08 16:09:39',
			'status' => 1,
			'team1_id' => 1,
			'team2_id' => 1,
			'team1_score' => 1,
			'team2_score' => 1
		),
	);

}
