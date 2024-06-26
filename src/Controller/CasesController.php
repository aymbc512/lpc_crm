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

    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Common');
    }
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
       // $this->set(compact('case'));
       //$case_id = $this->Cases->get('case_id');
        // Fetch name by dataid and detailid for dataid = 4
   // $case_kbn_Name = $this->SelectionLists->getNameByDataIdAndDetailId(4, $detail_id->case_kbn);
   $selectionListsTable = $this->getTableLocator()->get('SelectionLists'); // SelectionListsTableを取得

   $caseDetail = $this->Cases->get($id); // ケースの詳細を取得

   // SelectionListsTableから名前を取得する
   $case_kbn_Name = $selectionListsTable->getNameByDataIdAndDetailId(4, $caseDetail->case_kbn);

   //$this->request->getSession()->write('case_id', $case_id);

   $this->set(compact('case','caseDetail', 'case_kbn_Name'));
    
   // $this->set(compact('caseDetail', 'case_kbn_Name'));

   //$this->set(compact('case', 'case_kbn_Name'));
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
            $this->Common->setAuditFields($case, $this->request, true); // Audit fieldsを設定
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
        $creators = $this->Cases->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->Cases->Updaters->find('list', ['limit' => 200])->all();
    
        $this->fetchTable('SelectionLists');
        $cases = $this->fetchTable('SelectionLists')->getNamesByDataId('4');
        $case_statuses = $this->fetchTable('SelectionLists')->getNamesByDataId('5');
        $this->set(compact('cases', 'case_statuses', 'case', 'customers', 'opponents', 'consultations', 'advisorConsultations', 'creators', 'updaters'));

            // Set the return URL to the opponent add page
    $returnUrl = $this->request->getQuery('returnUrl', ['controller' => 'Cases', 'action' => 'add']);
    $this->set('returnUrl', $returnUrl);
    }
    
    public function edit($id = null)
    {
        $case = $this->Cases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $case = $this->Cases->patchEntity($case, $this->request->getData());
            $this->Common->setAuditFields($case, $this->request, false); // Audit fieldsを設定
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
        $creators = $this->Cases->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->Cases->Updaters->find('list', ['limit' => 200])->all();
        
        $this->fetchTable('SelectionLists');
        $cases = $this->fetchTable('SelectionLists')->getNamesByDataId('4');
        $case_statuses = $this->fetchTable('SelectionLists')->getNamesByDataId('5');
        $this->set(compact('cases', 'case_statuses', 'case', 'customers', 'opponents', 'consultations', 'advisorConsultations', 'creators', 'updaters'));
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


