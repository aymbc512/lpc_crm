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
            ->contain(['Stakeholders', 'Users']);
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
        $stakeholderName = $this->request->getQuery('stakeholder_name');
        $consultationName = $this->request->getQuery('consultation_name');

         // クエリの作成
        $query = $this->Consultations->find()
            ->contain(['Stakeholders', 'Users']);

            // 検索条件の適用
        if (!empty($stakeholderName)) {
            $query->matching('Stakeholders', function ($q) use ($stakeholderName) {
                return $q->where(['Stakeholders.name LIKE' => '%' . $stakeholderName . '%']);
            });
        }

        if (!empty($consultationName)) {
            $query->where(['Consultations.consultation_name LIKE' => '%' . $consultationName . '%']);
        }
         // ページネーション
        $consultations = $this->paginate($query);

        // ビューにデータを渡す
        $this->set(compact('consultations', 'stakeholderName', 'consultationName'));

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
        $consultation = $this->Consultations->get($id, contain: ['Stakeholders', 'Users', 'AdvisorContracts']);
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

        $stakeholderSearchTerm = $this->request->getData('stakeholder_search');
        $lawyerSearchTerm = $this->request->getData('lawyer_search');

        $stakeholders = [];
        if (!empty($stakeholderSearchTerm)) {
            $stakeholders = $this->Consultations->Stakeholders->find('list', [
                'conditions' => ['Stakeholders.name LIKE' => '%' . $stakeholderSearchTerm . '%'],
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

        $this->set(compact('consultation', 'stakeholders', 'lawyers'));
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

        $stakeholderSearchTerm = $this->request->getData('stakeholder_search');
        $lawyerSearchTerm = $this->request->getData('lawyer_search');

        $stakeholders = [];
        if (!empty($stakeholderSearchTerm)) {
            $stakeholders = $this->Consultations->Stakeholders->find('list', [
                'conditions' => ['Stakeholders.name LIKE' => '%' . $stakeholderSearchTerm . '%'],
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

        $this->set(compact('consultation', 'stakeholders', 'lawyers'));
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

    public function searchStakeholders()
    {
        $term = $this->request->getQuery('term');
        if ($term) {
            $stakeholders = $this->Consultations->Stakeholders->find('list', [
                'conditions' => ['Stakeholders.name LIKE' => '%' . $term . '%'],
                'limit' => 10
            ])->toArray();
        } else {
            $stakeholders = [];
        }
        $this->set(compact('stakeholders'));
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
}
