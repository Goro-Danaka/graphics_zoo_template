<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RequestCustomerFiles Controller
 *
 * @property \App\Model\Table\RequestCustomerFilesTable $RequestCustomerFiles
 *
 * @method \App\Model\Entity\RequestCustomerFile[] paginate($object = null, array $settings = [])
 */
class RequestCustomerFilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Requests', 'Customers']
        ];
        $requestCustomerFiles = $this->paginate($this->RequestCustomerFiles);

        $this->set(compact('requestCustomerFiles'));
        $this->set('_serialize', ['requestCustomerFiles']);
    }

    /**
     * View method
     *
     * @param string|null $id Request Customer File id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $requestCustomerFile = $this->RequestCustomerFiles->get($id, [
            'contain' => ['Requests', 'Customers']
        ]);

        $this->set('requestCustomerFile', $requestCustomerFile);
        $this->set('_serialize', ['requestCustomerFile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $requestCustomerFile = $this->RequestCustomerFiles->newEntity();
        if ($this->request->is('post')) {
            $requestCustomerFile = $this->RequestCustomerFiles->patchEntity($requestCustomerFile, $this->request->getData());
            if ($this->RequestCustomerFiles->save($requestCustomerFile)) {
                $this->Flash->success(__('The request customer file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request customer file could not be saved. Please, try again.'));
        }
        $requests = $this->RequestCustomerFiles->Requests->find('list', ['limit' => 200]);
        $customers = $this->RequestCustomerFiles->Customers->find('list', ['limit' => 200]);
        $this->set(compact('requestCustomerFile', 'requests', 'customers'));
        $this->set('_serialize', ['requestCustomerFile']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Request Customer File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $requestCustomerFile = $this->RequestCustomerFiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $requestCustomerFile = $this->RequestCustomerFiles->patchEntity($requestCustomerFile, $this->request->getData());
            if ($this->RequestCustomerFiles->save($requestCustomerFile)) {
                $this->Flash->success(__('The request customer file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request customer file could not be saved. Please, try again.'));
        }
        $requests = $this->RequestCustomerFiles->Requests->find('list', ['limit' => 200]);
        $customers = $this->RequestCustomerFiles->Customers->find('list', ['limit' => 200]);
        $this->set(compact('requestCustomerFile', 'requests', 'customers'));
        $this->set('_serialize', ['requestCustomerFile']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Request Customer File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $requestCustomerFile = $this->RequestCustomerFiles->get($id);
        if ($this->RequestCustomerFiles->delete($requestCustomerFile)) {
            $this->Flash->success(__('The request customer file has been deleted.'));
        } else {
            $this->Flash->error(__('The request customer file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
