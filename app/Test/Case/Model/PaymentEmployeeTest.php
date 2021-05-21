<?php
App::uses('PaymentEmployee', 'Model');

/**
 * PaymentEmployee Test Case
 */
class PaymentEmployeeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.payment_employee',
		'app.employee',
		'app.payment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->PaymentEmployee = ClassRegistry::init('PaymentEmployee');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PaymentEmployee);

		parent::tearDown();
	}

}
