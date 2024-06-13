<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AdvisorConsultations Controller
 *
 * @property \App\Model\Table\AdvisorConsultationsTable $AdvisorConsultations
 */
class AdvisorConsultationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->AdvisorConsultations->find()
            ->contain(['Clients', 'Lawyers', 'AdvisorContracts.Clients']);
        $advisorConsultations = $this->paginate($query);

        $this->set(compact('advisorConsultations'));
    }

    /**
     * View method
     *
     * @param string|null $id Advisor Consultation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $advisorConsultation = $this->AdvisorConsultations->get($id, [
            'contain' => ['Clients', 'Lawyers', 'AdvisorContracts.Clients', 'Cases']
        ]);
        $this->set(compact('advisorConsultation'));
    }

    /**
     * Add method
     *
     * @param string|null $advisor_contract_id Advisor Contract id.
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($advisor_contract_id = null)
    {
        $advisorConsultation = $this->AdvisorConsultations->newEmptyEntity();
        if ($this->request->is('post')) {
            $advisorConsultation = $this->AdvisorConsultations->patchEntity($advisorConsultation, $this->request->getData());
            $this->Common->setAuditFields($advisorConsultation, false); // Audit fieldsを設定
            if ($this->AdvisorConsultations->save($advisorConsultation)) {
                $this->Flash->success(__('The advisor consultation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advisor consultation could not be saved. Please, try again.'));
        }

        // Set default value for advisor_contract_id if provided
        if ($advisor_contract_id) {
            $advisorConsultation->advisor_contract_id = $advisor_contract_id;
            $advisorContract = $this->AdvisorConsultations->AdvisorContracts->get($advisor_contract_id, ['contain' => ['Clients']]);
            if ($advisorContract && $advisorContract->has('client')) {
                $advisorConsultation->customer_id = $advisorContract->client->id;
            }
        }

        $clients = $this->AdvisorConsultations->Clients->find('list', ['limit' => 200])->all();
        $lawyers = $this->AdvisorConsultations->Lawyers->find('list', ['limit' => 200])->all();
        $paralegals = $this->AdvisorConsultations->Paralegals->find('list', ['limit' => 200])->all();
        $advisorContracts = $this->AdvisorConsultations->AdvisorContracts->find('list', ['limit' => 200])->all();
        $this->set(compact('advisorConsultation', 'clients', 'lawyers', 'paralegals', 'advisorContracts', 'advisor_contract_id'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Advisor Consultation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $advisorConsultation = $this->AdvisorConsultations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $advisorConsultation = $this->AdvisorConsultations->patchEntity($advisorConsultation, $this->request->getData());
            $this->Common->setAuditFields($advisorConsultation, false); // Audit fieldsを設定
            if ($this->AdvisorConsultations->save($advisorConsultation)) {
                $this->Flash->success(__('The advisor consultation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The advisor consultation could not be saved. Please, try again.'));
        }
        $clients = $this->AdvisorConsultations->Clients->find('list', ['limit' => 200])->all();
        $lawyers = $this->AdvisorConsultations->Lawyers->find('list', ['limit' => 200])->all();
        $paralegals = $this->AdvisorConsultations->Paralegals->find('list', ['limit' => 200])->all();
        $advisorContracts = $this->AdvisorConsultations->AdvisorContracts->find('list', ['limit' => 200])->all();
        $this->set(compact('advisorConsultation', 'clients', 'lawyers', 'paralegals', 'advisorContracts'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Advisor Consultation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $advisorConsultation = $this->AdvisorConsultations->get($id);
        if ($this->AdvisorConsultations->delete($advisorConsultation)) {
            $this->Flash->success(__('The advisor consultation has been deleted.'));
        } else {
            $this->Flash->error(__('The advisor consultation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
 