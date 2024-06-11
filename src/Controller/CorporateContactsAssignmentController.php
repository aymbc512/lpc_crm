<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CorporateContactsAssignment Controller
 *
 * @property \App\Model\Table\CorporateContactsAssignmentTable $CorporateContactsAssignment
 */
class CorporateContactsAssignmentController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CorporateContactsAssignment->find()
            ->contain(['CorporateContacts', 'Cases', 'Consultations', 'AdvisorConsultations', 'Users']);
        $corporateContactsAssignment = $this->paginate($query);

        $this->set(compact('corporateContactsAssignment'));
    }

    /**
     * View method
     *
     * @param string|null $id Corporate Contacts Assignment id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporateContactsAssignment = $this->CorporateContactsAssignment->get($id, contain: ['CorporateContacts', 'Cases', 'Consultations', 'AdvisorConsultations', 'Users']);
        $this->set(compact('corporateContactsAssignment'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corporateContactsAssignment = $this->CorporateContactsAssignment->newEmptyEntity();
        if ($this->request->is('post')) {
            $corporateContactsAssignment = $this->CorporateContactsAssignment->patchEntity($corporateContactsAssignment, $this->request->getData());
            if ($this->CorporateContactsAssignment->save($corporateContactsAssignment)) {
                $this->Flash->success(__('The corporate contacts assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate contacts assignment could not be saved. Please, try again.'));
        }
        $corporateContacts = $this->CorporateContactsAssignment->CorporateContacts->find('list', limit: 200)->all();
        $cases = $this->CorporateContactsAssignment->Cases->find('list', limit: 200)->all();
        $consultations = $this->CorporateContactsAssignment->Consultations->find('list', limit: 200)->all();
        $advisorConsultations = $this->CorporateContactsAssignment->AdvisorConsultations->find('list', limit: 200)->all();
        $users = $this->CorporateContactsAssignment->Users->find('list', limit: 200)->all();
        $this->set(compact('corporateContactsAssignment', 'corporateContacts', 'cases', 'consultations', 'advisorConsultations', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Corporate Contacts Assignment id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corporateContactsAssignment = $this->CorporateContactsAssignment->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporateContactsAssignment = $this->CorporateContactsAssignment->patchEntity($corporateContactsAssignment, $this->request->getData());
            if ($this->CorporateContactsAssignment->save($corporateContactsAssignment)) {
                $this->Flash->success(__('The corporate contacts assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate contacts assignment could not be saved. Please, try again.'));
        }
        $corporateContacts = $this->CorporateContactsAssignment->CorporateContacts->find('list', limit: 200)->all();
        $cases = $this->CorporateContactsAssignment->Cases->find('list', limit: 200)->all();
        $consultations = $this->CorporateContactsAssignment->Consultations->find('list', limit: 200)->all();
        $advisorConsultations = $this->CorporateContactsAssignment->AdvisorConsultations->find('list', limit: 200)->all();
        $users = $this->CorporateContactsAssignment->Users->find('list', limit: 200)->all();
        $this->set(compact('corporateContactsAssignment', 'corporateContacts', 'cases', 'consultations', 'advisorConsultations', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Corporate Contacts Assignment id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corporateContactsAssignment = $this->CorporateContactsAssignment->get($id);
        if ($this->CorporateContactsAssignment->delete($corporateContactsAssignment)) {
            $this->Flash->success(__('The corporate contacts assignment has been deleted.'));
        } else {
            $this->Flash->error(__('The corporate contacts assignment could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
