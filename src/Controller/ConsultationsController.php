<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Consultations Controller
 *
 * @property \App\Model\Table\ConsultationsTable $Consultations
 */
class ConsultationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Consultations->find()
            ->contain(['Clients', 'Lawyers', 'Creators', 'Updaters']);
        $consultations = $this->paginate($query);

        $this->set(compact('consultations'));
    }

    /**
     * Search method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        // リクエストから検索クエリを取得
        $clientName = $this->request->getQuery('client_name');
        $consultationName = $this->request->getQuery('consultation_name');

        // クエリの作成
        $query = $this->Consultations->find()
            ->contain(['Clients', 'Lawyers', 'Creators', 'Updaters']);

        // 検索条件の適用
        if (!empty($clientName)) {
            $query->matching('Clients', function ($q) use ($clientName) {
                return $q->where(['Clients.name LIKE' => '%' . $clientName . '%']);
            });
        }

        if (!empty($consultationName)) {
            $query->where(['Consultations.consultation_name LIKE' => '%' . $consultationName . '%']);
        }

        // ページネーション
        $consultations = $this->paginate($query);

        // ビューにデータを渡す
        $this->set(compact('consultations', 'clientName', 'consultationName'));

        $this->render('index'); // index ビューを使用
    }

    /**
     * View method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $consultation = $this->Consultations->get($id, [
            'contain' => ['Clients', 'Lawyers', 'Creators', 'Updaters', 'AdvisorContracts', 'CorporateContactsAssignment']
        ]);

        $this->set(compact('consultation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consultation = $this->Consultations->newEmptyEntity();
        if ($this->request->is('post')) {
            $consultation = $this->Consultations->patchEntity($consultation, $this->request->getData());
            if ($this->Consultations->save($consultation)) {
                $this->Flash->success(__('The consultation has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consultation could not be saved. Please, try again.'));
        }

        $clientSearchTerm = $this->request->getData('client_search');
        $lawyerSearchTerm = $this->request->getData('lawyer_search');

        $clients = [];
        if (!empty($clientSearchTerm)) {
            $clients = $this->Consultations->Clients->find('list', [
                'conditions' => ['Clients.name LIKE' => '%' . $clientSearchTerm . '%'],
                'limit' => 10
            ])->toArray();
        }

        $lawyers = [];
        if (!empty($lawyerSearchTerm)) {
            $lawyers = $this->Consultations->Users->find('list', [
                'conditions' => [
                    'Users.role_kbn' => 'lawyer',
                    'Users.user_name LIKE' => '%' . $lawyerSearchTerm . '%'
                ],
                'limit' => 10
            ])->toArray();
        }

        $this->set(compact('consultation', 'clients', 'lawyers'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $consultation = $this->Consultations->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consultation = $this->Consultations->patchEntity($consultation, $this->request->getData());
            if ($this->Consultations->save($consultation)) {
                $this->Flash->success(__('The consultation has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The consultation could not be saved. Please, try again.'));
        }

        $clientSearchTerm = $this->request->getData('client_search');
        $lawyerSearchTerm = $this->request->getData('lawyer_search');

        $clients = [];
        if (!empty($clientSearchTerm)) {
            $clients = $this->Consultations->Clients->find('list', [
                'conditions' => ['Clients.name LIKE' => '%' . $clientSearchTerm . '%'],
                'limit' => 10
            ])->toArray();
        }

        $lawyers = [];
        if (!empty($lawyerSearchTerm)) {
            $lawyers = $this->Consultations->Users->find('list', [
                'conditions' => [
                    'Users.role_kbn' => 'lawyer',
                    'Users.user_name LIKE' => '%' . $lawyerSearchTerm . '%'
                ],
                'limit' => 10
            ])->toArray();
        }

        $this->set(compact('consultation', 'clients', 'lawyers'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Consultation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consultation = $this->Consultations->get($id);
        if ($this->Consultations->delete($consultation)) {
            $this->Flash->success(__('The consultation has been deleted.'));
        } else {
            $this->Flash->error(__('The consultation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function searchClients()
    {
        $term = $this->request->getQuery('term');
        if ($term) {
            $clients = $this->Consultations->Clients->find('list', [
                'conditions' => ['Clients.name LIKE' => '%' . $term . '%'],
                'limit' => 10
            ])->toArray();
        } else {
            $clients = [];
        }
        $this->set(compact('clients'));
    }

    public function searchLawyers()
    {
        $term = $this->request->getQuery('term');
        if ($term) {
            $lawyers = $this->Consultations->Users->find('list', [
                'conditions' => [
                    'Users.role_kbn' => 'lawyer',
                    'Users.user_name LIKE' => '%' . $term . '%'
                ],
                'limit' => 10
            ])->toArray();
        } else {
            $lawyers = [];
        }
        $this->set(compact('lawyers'));
    }

    /**
     * Add Corporate Contact Assignment
     *
     * @param string|null $consultationId Consultation id.
     * @return \Cake\Http\Response|null|void Redirects to add Corporate Contact Assignment page with consultation_id.
     */
    public function addCorporateContactAssignment($consultationId = null)
    {
        if ($consultationId) {
            return $this->redirect(['controller' => 'CorporateContactAssignments', 'action' => 'add', '?' => ['consultation_id' => $consultationId]]);
        }
        $this->Flash->error(__('Invalid consultation ID.'));
        return $this->redirect(['action' => 'index']);
    }
}





