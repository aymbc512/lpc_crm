<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 */
class ClientsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Clientsテーブルを使ってクエリを実行
        $clients = $this->paginate($this->Clients->find()->where(['client' => 1]));

        $this->set(compact('clients'));
    }

    /**
     * Search method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        $query = $this->Clients->find()
            ->where(['client' => 1])
            ->contain(['Cases']);

        if ($this->request->is('post')) {
            $searchData = $this->request->getData();
            if (!empty($searchData['case_name'])) {
                $query->matching('Cases', function ($q) use ($searchData) {
                    return $q->where(['Cases.case_name LIKE' => '%' . $searchData['case_name'] . '%']);
                });
            }
            if (!empty($searchData['name'])) {
                $query->where(['Clients.name LIKE' => '%' . $searchData['name'] . '%']);
            }
            if (!empty($searchData['prefectures'])) {
                $query->where(['Clients.prefectures LIKE' => '%' . $searchData['prefectures'] . '%']);
            }
            if (!empty($searchData['kuchouson'])) {
                $query->where(['Clients.kuchouson LIKE' => '%' . $searchData['kuchouson'] . '%']);
            }
            if (!empty($searchData['phone_number'])) {
                $query->where(['Clients.phone_number' => $searchData['phone_number']]);
            }
        }

        $clients = $this->paginate($query);

        $this->set(compact('clients'));
        $this->render('index');
    }

    /**
     * View method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $client = $this->Clients->get($id, [
            'contain' => [
                'Cases',
                'AdvisorContracts' => ['Consultations', 'Lawyers', 'Paralegals', 'Creators', 'Updaters'],
                'Cases.Invoices',
                'AdvisorContracts.Invoices'
            ]
        ]);
    
        $this->set(compact('client'));
    }
    

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $client = $this->Clients->newEmptyEntity();
        if ($this->request->is('post')) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $client = $this->Clients->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $client = $this->Clients->patchEntity($client, $this->request->getData());
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $this->set(compact('client'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Client id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $client = $this->Clients->get($id);
        if ($this->Clients->delete($client)) {
            $this->Flash->success(__('The client has been deleted.'));
        } else {
            $this->Flash->error(__('The client could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

