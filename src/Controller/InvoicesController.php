<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Invoices Controller
 *
 * @property \App\Model\Table\InvoicesTable $Invoices
 */
class InvoicesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Invoices->find()
            ->contain(['Cases', 'Stakeholders', 'AdvisorContracts', 'Users']);
        $invoices = $this->paginate($query);

        $this->set(compact('invoices'));
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
        $invoice = $this->Invoices->get($id, ['contain' => ['Cases', 'Stakeholders', 'AdvisorContracts', 'Users']]);
        $this->set(compact('invoice'));
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
            $this->Common->setAuditFields($invoice, true); // Audit fieldsを設定
            if ($this->Invoices->save($invoice)) {
                $this->Flash->success(__('The invoice has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice could not be saved. Please, try again.'));
        }

        // Advisor Contract IDが指定されている場合、自動入力
        if ($advisor_contract_id !== null) {
            $invoice->advisor_contract_id = $advisor_contract_id;
            $invoice->creator_id = $this->Auth->user('id');
        //     $invoice->created_at = date('Y-m-d H:i:s');
        //     $invoice->updater_id = $this->Auth->user('id');
        //     $invoice->updated_at = date('Y-m-d H:i:s');
        // 
        }

        $cases = $this->Invoices->Cases->find('list', ['limit' => 200])->all();
        $stakeholders = $this->Invoices->Stakeholders->find('list', ['limit' => 200])->all();
        $advisorContracts = $this->Invoices->AdvisorContracts->find('list', ['limit' => 200])->all();
        $users = $this->Invoices->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'cases', 'stakeholders', 'advisorContracts', 'users'));
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
        $stakeholders = $this->Invoices->Stakeholders->find('list', ['limit' => 200])->all();
        $advisorContracts = $this->Invoices->AdvisorContracts->find('list', ['limit' => 200])->all();
        $users = $this->Invoices->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('invoice', 'cases', 'stakeholders', 'advisorContracts', 'users'));
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
