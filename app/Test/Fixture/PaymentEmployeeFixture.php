<?php
/**
 * PaymentEmployee Fixture
 */
class PaymentEmployeeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 11, 'key' => 'primary'),
		'employee_id' => array('type' => 'integer', 'null' => true, 'default' => null),
		'payment_id' => array('type' => 'integer', 'null' => true, 'default' => null),
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
			'employee_id' => 1,
			'payment_id' => 1,
			'nominal' => 1
		),
	);

}
