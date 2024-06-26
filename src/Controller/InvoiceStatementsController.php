<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * InvoiceStatements Controller
 *
 * @property \App\Model\Table\InvoiceStatementsTable $InvoiceStatements
 */
class InvoiceStatementsController extends AppController
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
        $query = $this->InvoiceStatements->find()
            ->contain(['Invoices', 'Users']);
        $invoiceStatements = $this->paginate($query);

        $this->set(compact('invoiceStatements'));
    }

    /**
     * View method
     *
     * @param string|null $id Invoice Statement id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $invoiceStatement = $this->InvoiceStatements->get($id, contain: ['Invoices', 'Users']);
        $this->set(compact('invoiceStatement'));
    }

/**
 * Add method
 *
 * @param string|null $invoice_id Invoice id.
 * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
 */
public function add($invoice_id = null)
{
    $invoiceStatement = $this->InvoiceStatements->newEmptyEntity();
    if ($this->request->is('post')) {
        $invoiceStatement = $this->InvoiceStatements->patchEntity($invoiceStatement, $this->request->getData());
        $this->Common->setAuditFields($invoiceStatement, $this->request, true);
        if ($this->InvoiceStatements->save($invoiceStatement)) {
            $this->Flash->success(__('The invoice statement has been saved.'));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The invoice statement could not be saved. Please, try again.'));
    }
    
    // invoice_idが提供されている場合は自動設定
    if ($invoice_id) {
        $invoiceStatement->invoice_id = $invoice_id;
    }

    $invoices = $this->InvoiceStatements->Invoices->find('list', ['limit' => 200])->all();
    $users = $this->InvoiceStatements->Users->find('list', ['limit' => 200])->all();
    $this->set(compact('invoiceStatement', 'invoices', 'users', 'creators', 'updaters'));
}

    /**
     * Edit method
     *
     * @param string|null $id Invoice Statement id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $invoiceStatement = $this->InvoiceStatements->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $invoiceStatement = $this->InvoiceStatements->patchEntity($invoiceStatement, $this->request->getData());
            $this->Common->setAuditFields($invoiceStatement, $this->request, true);
            if ($this->InvoiceStatements->save($invoiceStatement)) {
                $this->Flash->success(__('The invoice statement has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The invoice statement could not be saved. Please, try again.'));
        }
        $invoices = $this->InvoiceStatements->Invoices->find('list', limit: 200)->all();
        $users = $this->InvoiceStatements->Users->find('list', limit: 200)->all();
        $this->set(compact('invoiceStatement', 'invoices', 'users', 'creators', 'updaters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Invoice Statement id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $invoiceStatement = $this->InvoiceStatements->get($id);
        if ($this->InvoiceStatements->delete($invoiceStatement)) {
            $this->Flash->success(__('The invoice statement has been deleted.'));
        } else {
            $this->Flash->error(__('The invoice statement could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
