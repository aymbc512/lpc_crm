<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\ORM\Entity;
use Cake\Log\Log; 

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController

{ 
       public function initialize(): void
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
        $query = $this->Invoices->find()
            ->contain(['Cases', 'Clients', 'AdvisorContracts', 'Creators', 'Updaters']);
        $invoices = $this->paginate($query);

        $this->set(compact('invoices'));
    }

       /**
     * Search method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function search()
    {
        $invoiceStatusKbn = $this->request->getQuery('invoice_status_kbn');

        $query = $this->Invoices->find()
            ->contain(['Cases', 'Clients', 'AdvisorContracts']);

        if ($invoiceStatusKbn) {
            $query->where(['invoice_status_kbn' => $invoiceStatusKbn]);
        }

        $invoices = $this->paginate($query);

        $this->set(compact('invoices'));
        $this->render('index');
    }


    /**
     * View method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoice = $this->Invoices->get($id, [
            'contain' => ['Cases', 'Clients', 'AdvisorContracts', 'Creators', 'Updaters', 'InvoiceStatements']
        ]);
        $case = $invoice->case ?? null;
        $this->set(compact('invoice','case'));
    }

    /**
     * Add method
     *
     * @param string|null $advisor_contract_id Advisor Contract id.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($advisor_contract_id = null)
    {
        $invoice = $this->Invoices->newEmptyEntity();
        if ($this->request->is('post')) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            Log::debug('Invoice Entity Before setAuditFields: ' . print_r($invoice->toArray(), true));
    
            // CommonComponentのsetAuditFieldsメソッドを呼び出していることを確認
            $this->Common->setAuditFields($invoice, $this->request, true);
            
            Log::debug('Invoice Entity After setAuditFields: ' . print_r($invoice->toArray(), true));
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));
    
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
    
        $cases = $this->Invoices->Cases->find('list', ['limit' => 200])->all();
        $clients = $this->Invoices->Clients->find('list', ['limit' => 200])->all();
        $advisorContracts = $this->Invoices->AdvisorContracts->find('list', ['limit' => 200])->all();
        $creators = $this->Invoices->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->Invoices->Updaters->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'cases', 'clients', 'advisorContracts', 'creators', 'updaters'));
    
        $this->fetchTable('SelectionLists');
        $invoice_status_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('11');
        $this->set(compact('invoice_status_kbns'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoice = $this->Invoices->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoice = $this->Invoices->patchEntity($invoice, $this->request->getData());
            $this->Common->setAuditFields($invoice, false); // Audit fieldsを設定
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }
        $cases = $this->Invoices->Cases->find('list', ['limit' => 200])->all();
        $clients = $this->Invoices->Clients->find('list', ['limit' => 200])->all();
        $advisorContracts = $this->Invoices->AdvisorContracts->find('list', ['limit' => 200])->all();
        $creators = $this->Invoices->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->Invoices->Updaters->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'cases', 'clients', 'advisorContracts', 'creators', 'updaters'));

        $this->fetchTable('SelectionLists');
        $invoice_status_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('11');
        $this->set(compact('invoice_status_kbns'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoice = $this->Invoices->get($id);
        if ($this->Invoices->delete($invoice)) {
            $this->Flash->success(__('The invoice has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
