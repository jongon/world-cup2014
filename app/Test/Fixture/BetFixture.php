<?php
/**
 * BetFixture
 *
 */
class BetFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'games_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'team1_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'team2_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'team1_score' => array('type' => 'integer', 'null' => false, 'default' => null),
		'team2_score' => array('type' => 'integer', 'null' => false, 'default' => null),
		'bet_score' => array('type' => 'integer', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_bets_users_idx' => array('column' => 'users_id', 'unique' => 0),
			'fk_bets_games1_idx' => array('column' => 'games_id', 'unique' => 0)
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
			'users_id' => 1,
			'games_id' => 1,
			'team1_id' => 1,
			'team2_id' => 1,
			'team1_score' => 1,
			'team2_score' => 1,
			'bet_score' => 1
		),
	);

}
