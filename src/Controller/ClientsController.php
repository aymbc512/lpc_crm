<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\CommonComponent;
use Cake\Log\Log;

/**
 * Clients Controller
 *
 * @property \App\Model\Table\ClientsTable $Clients
 * @property \App\Controller\Component\CommonComponent $Common
 */
class ClientsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Common'); // Load the Common component
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        // Clientsテーブルを使ってクエリを実行
        $clients = $this->paginate($this->Clients->find()
            ->where(['client' => 1])
            ->contain(['Lawyers', 'Cases','Invoices','Creators','Updaters']));
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
            'contain' => ['Lawyers', 'Cases','Invoices','Creators','Updaters']
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
        // Ensure 'client' field is set to 1 when creating a new client
        $data = $this->request->getData();
        $data['client'] = 1;

        $client = $this->Clients->patchEntity($client, $data);
            $this->Common->setAuditFields($client, $this->request, true); // Set audit fields
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                Log::error('Client save failed: ' . print_r($client->getErrors(), true));
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }

     $lawyers = $this->Clients->Lawyers->find('list', ['limit' => 200])->all();
    $this->set(compact('client','lawyers'));

    $this->fetchTable('SelectionLists');
    $stakeholder_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('12');
    $this->set(compact('stakeholder_kbns'));
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
            $this->Common->setAuditFields($client, $this->request, false); // Set audit fields
            if ($this->Clients->save($client)) {
                $this->Flash->success(__('The client has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The client could not be saved. Please, try again.'));
        }
        $this->set(compact('client'));

        $this->fetchTable('SelectionLists');
        $stakeholder_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('12');
        $this->set(compact('stakeholder_kbns'));
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


