<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Cases Controller
 *
 * @property \App\Model\Table\CasesTable $Cases
 */
class CasesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Cases->find()
            ->contain(['Customers', 'Opponents', 'Consultations', 'AdvisorConsultations']);
        $cases = $this->paginate($query);

        $this->set(compact('cases'));
    }

    /**
     * View method
     *
     * @param string|null $id Case id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $case = $this->Cases->get($id, [
            'contain' => ['Customers', 'Opponents', 'Consultations', 'AdvisorConsultations', 'CaseAssignees', 'Invoices', 'CorporateContacts']
        ]);
        $this->set(compact('case'));
    }

    public function search()
    {
        // リクエストから検索クエリを取得
        $customerName = $this->request->getQuery('customer_name');
        $caseName = $this->request->getQuery('case_name');

        // クエリの作成
        $query = $this->Cases->find()
            ->contain(['Customers', 'Opponents', 'Consultations', 'AdvisorConsultations']); 

        // 検索条件の適用
        if (!empty($customerName)) {
            $query->matching('Customers', function ($q) use ($customerName) {
                return $q->where(['Customers.name LIKE' => '%' . $customerName . '%']);
            });
        }

        if (!empty($caseName)) {
            $query->where(['Cases.case_name LIKE' => '%' . $caseName . '%']);
        }

        // ページネーション
        $cases = $this->paginate($query);

        // 必要なリストデータを再取得
        $customers = $this->Cases->Customers->find('list', ['limit' => 200])->all();
        $opponents = $this->Cases->Opponents->find('list', ['limit' => 200])->all();
        $consultations = $this->Cases->Consultations->find('list', ['limit' => 200])->all();
        $advisorConsultations = $this->Cases->AdvisorConsultations->find('list', ['limit' => 200])->all();

        // ビューにデータを渡す
        $this->set(compact('cases', 'customerName', 'caseName', 'customers', 'opponents', 'consultations', 'advisorConsultations'));

        $this->render('index'); // index ビューを使用
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $case = $this->Cases->newEmptyEntity();
        if ($this->request->is('post')) {
            $case = $this->Cases->patchEntity($case, $this->request->getData());
            if ($this->Cases->save($case)) {
                $this->Flash->success(__('The case has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The case could not be saved. Please, try again.'));
        }
        if ($this->request->getQuery('customer_id')) {
            $case->customer_id = $this->request->getQuery('customer_id');
        }
        $customers = $this->Cases->Customers->find('list', ['limit' => 200])->all();
        $opponents = $this->Cases->Opponents->find('list', ['limit' => 200])->all();
        $consultations = $this->Cases->Consultations->find('list', ['limit' => 200])->all();
        $advisorConsultations = $this->Cases->AdvisorConsultations->find('list', ['limit' => 200])->all();
        $this->set(compact('case', 'customers', 'opponents', 'consultations', 'advisorConsultations'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Case id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $case = $this->Cases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $case = $this->Cases->patchEntity($case, $this->request->getData());
            if ($this->Cases->save($case)) {
                $this->Flash->success(__('The case has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The case could not be saved. Please, try again.'));
        }
        $customers = $this->Cases->Customers->find('list', ['limit' => 200])->all();
        $opponents = $this->Cases->Opponents->find('list', ['limit' => 200])->all();
        $consultations = $this->Cases->Consultations->find('list', ['limit' => 200])->all();
        $advisorConsultations = $this->Cases->AdvisorConsultations->find('list', ['limit' => 200])->all();
        $this->set(compact('case', 'customers', 'opponents', 'consultations', 'advisorConsultations'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Case id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $case = $this->Cases->get($id);
        if ($this->Cases->delete($case)) {
            $this->Flash->success(__('The case has been deleted.'));
        } else {
            $this->Flash->error(__('The case could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}


