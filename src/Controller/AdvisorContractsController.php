<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\InvoicesTable;
use Cake\ORM\TableRegistry;

/**
 * AdvisorContracts Controller
 *
 * @property \App\Model\Table\AdvisorContractsTable $AdvisorContracts
 */
class AdvisorContractsController extends AppController
{
   function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication'); // Authenticationプラグインを使用
        $this->loadComponent('Common'); // CommonComponentをロード
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $advisorContracts = $this->paginate($this->AdvisorContracts->find()->contain(['Lawyers', 'Clients', 'Consultations','Paralegals']));

        $this->set(compact('advisorContracts'));
    }

    /**
     * Search method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        // リクエストから検索クエリを取得
        $name = $this->request->getQuery('name');

        // クエリの作成
        $query = $this->AdvisorContracts->find()->contain(['Lawyers', 'Clients', 'Consultations']);

        // 検索条件の適用
        if ($name) {
            $query->matching('Clients', function ($q) use ($name) {
                return $q->where(['Clients.name LIKE' => '%' . $name . '%']);
            });
        }

        // ページネーションの適用
        $advisorContracts = $this->paginate($query);

        // ビューにデータを渡す
        $this->set(compact('advisorContracts', 'name'));
        $this->render('index'); // index ビューを使用
    }

    /**
     * View method
     *
     * @param string|null $id Advisor Contract id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advisorContract = $this->AdvisorContracts->get($id, [
            'contain' => ['Lawyers', 'Clients', 'Consultations', 'AdvisorConsultations', 'Invoices','Creators','Updaters','Paralegals']
        ]);

        $selectionListsTable = $this->getTableLocator()->get('SelectionLists'); // SelectionListsTableを取得

        $advisorContractDetail = $this->AdvisorContracts->get($id); // ケースの詳細を取得
     
        // SelectionListsTableから名前を取得する
        $payment_method_kbn_Name = $selectionListsTable->getNameByDataIdAndDetailId(6, $advisorContractDetail->payment_method_kbn);

        $this->set(compact('advisorContract','payment_method_kbn_Name'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $advisorContract = $this->AdvisorContracts->newEmptyEntity();
        if ($this->request->is('post')) {
            $advisorContract = $this->AdvisorContracts->patchEntity($advisorContract, $this->request->getData());

            $this->Common->setAuditFields($advisorContract, false);

            if ($this->AdvisorContracts->save($advisorContract)) {
                $this->Flash->success(__('The advisor contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advisor contract could not be saved. Please, try again.'));
        }
        if ($this->request->getQuery('customer_id')) {
            $advisorContract->customer_id = $this->request->getQuery('customer_id');
        }
        $clients = $this->AdvisorContracts->Clients->find('list', ['limit' => 200])->all();
        $consultations = $this->AdvisorContracts->Consultations->find('list', ['limit' => 200])->all();
        $lawyers = $this->AdvisorContracts->Lawyers->find('list', ['limit' => 200])->all();
        $paralegals = $this->AdvisorContracts->Paralegals->find('list', ['limit' => 200])->all();
        $creators = $this->AdvisorContracts->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->AdvisorContracts->Updaters->find('list', ['limit' => 200])->all();
        $this->set(compact('advisorContract', 'clients', 'consultations', 'lawyers', 'paralegals', 'creators', 'updaters'));


        $this->fetchTable('SelectionLists');
   //$recentSelectionLists = $this -> SelectionLists ->find(all);
  // $this->set('SelectionLists',$this->SelectionLists->find('all'));
   $payment_methods = $this->fetchTable('SelectionLists')->getNamesByDataId('6');
   $this->set(compact('payment_methods'));


    }

    /**
     * Edit method
     *
     * @param string|null $id Advisor Contract id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advisorContract = $this->AdvisorContracts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advisorContract = $this->AdvisorContracts->patchEntity($advisorContract, $this->request->getData());
            $this->Common->setAuditFields($advisorContract, $this->request, true);
            if ($this->AdvisorContracts->save($advisorContract)) {
                $this->Common->setAuditFields($advisorContract, $this->request, true);
                $this->Flash->success(__('The advisor contract has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advisor contract could not be saved. Please, try again.'));
        }
        if ($this->request->getQuery('customer_id')) {
            $advisorContract->customer_id = $this->request->getQuery('customer_id');
        }
        $clients = $this->AdvisorContracts->Clients->find('list', ['limit' => 200])->all();
        $consultations = $this->AdvisorContracts->Consultations->find('list', ['limit' => 200])->all();
        $lawyers = $this->AdvisorContracts->Lawyers->find('list', ['limit' => 200])->all();
        $paralegals = $this->AdvisorContracts->Paralegals->find('list', ['limit' => 200])->all();
        $this->set(compact('advisorContract', 'clients', 'consultations', 'lawyers', 'paralegals', 'creators', 'updaters'));


        $this->fetchTable('SelectionLists');
        //$recentSelectionLists = $this -> SelectionLists ->find(all);
       // $this->set('SelectionLists',$this->SelectionLists->find('all'));
        $payment_methods = $this->fetchTable('SelectionLists')->getNamesByDataId('6');
        $this->set(compact('payment_methods'));
     

    }

    /**
     * Delete method
     *
     * @param string|null $id Advisor Contract id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advisorContract = $this->AdvisorContracts->get($id);
        if ($this->AdvisorContracts->delete($advisorContract)) {
            $this->Flash->success(__('The advisor contract has been deleted.'));
        } else {
            $this->Flash->error(__('The advisor contract could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
