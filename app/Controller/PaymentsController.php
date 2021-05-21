<?php
App::uses('AppController', 'Controller');
/**
 * Payments Controller
 *
 * @property Payment $Payment
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PaymentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');
	public $uses = array('Payment', 'Employee', 'PaymentEmployee');

	public function isAuthorized($user) {
	    // Admin can access every action
	    // if (isset($user['role']) && $user['role'] === 'admin') {
	    //     return true;
	    // }

	    // Default deny
	    return true;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		// $this->Payment->recursive = 0;
		$this->set('payments', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
		$payment = $this->Payment->find('first', $options);
		$option = array('conditions' => array('PaymentEmployee.payment_id' => $id));
		$paymentEmployees = $this->PaymentEmployee->find('all', $option);
		$this->set(compact('payment', 'paymentEmployees'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Payment->create();
			if ($this->Payment->save($this->request->data['Payment'])) {
				$paymentEmployees = $this->request->data['PaymentEmployee'];

				$savePaymentEmployee = [];

				for ($i=0; $i < count($paymentEmployees['employee_id']); $i++) { 
					$savePaymentEmployee[] = array(
							'employee_id' => $paymentEmployees['employee_id'][$i],
							'payment_id' => $this->Payment->getLastInsertID(),
							'persen' => $paymentEmployees['persen'][$i],
							'nominal' => $paymentEmployees['nominal'][$i],
						);
				}

				$this->PaymentEmployee->saveAll($savePaymentEmployee);
				$this->Flash->success(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The payment could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Payment->save($this->request->data)) {
				$this->Flash->success(__('The payment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The payment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Payment.' . $this->Payment->primaryKey => $id));
			$this->request->data = $this->Payment->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->Payment->exists($id)) {
			throw new NotFoundException(__('Invalid payment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Payment->delete($id)) {
			$this->Flash->success(__('The payment has been deleted.'));
		} else {
			$this->Flash->error(__('The payment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function add_row_buruh() {
    	$this->layout="ajax";
    	
		$digits = 3;
		$random = rand(pow(10, $digits-1), pow(10, $digits)-1);
		$employees = $this->Employee->find('all');
		$this->set(compact('employees', 'random'));
    }
}
