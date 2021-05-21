<?php
/**
 * Payment Fixture
 */
class PaymentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'judul' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 100),
		'nominal' => array('type' => 'float', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('unique' => true, 'column' => 'id')
		),
		'tableParameters' => array()
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'judul' => 'Lorem ipsum dolor sit amet',
			'nominal' => 1
		),
	);

}
