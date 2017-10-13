<?php

namespace App\Controller;

use App\Controller\AppController;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[] paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController {

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index() {
//        $this->paginate = [
//            'contain' => ['Customers', 'Employees']
//        ];
        $requests = $this->paginate($this->Requests);

        $this->set(compact('requests'));
        $this->set('_serialize', ['requests']);
    }

    /**
     * View method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null) {
        $request = $this->Requests->get($id, [
            'contain' => ['Customers', 'Employees']
        ]);

        $this->set('request', $request);
        $this->set('_serialize', ['request']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add() {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }

        $customer_list = $this->getCustomerList();
        $designer_list = $this->getDesignerList();
        $this->set(compact('request', 'customer_list', 'designer_list'));
        $this->set('_serialize', ['request']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null) {
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $customers = $this->Requests->Customers->find('list', ['limit' => 200]);
        $employees = $this->Requests->Employees->find('list', ['limit' => 200]);
        $this->set(compact('request', 'customers', 'employees'));
        $this->set('_serialize', ['request']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function allRequest() {
        $requests = $this->Requests
                ->find()
                ->contain(['Customers', 'Employees'])
//                ->where(['Requests.status' => REQUEST_STATUS_PENDING])
                ->all();

        $this->set(compact('requests'));
    }

    public function viewRequest($id = NULL) {
        $request = $this->Requests
                ->find()
                ->where(['Requests.id' => $id])
                ->first();
        $this->set(compact('request'));
    }

}
