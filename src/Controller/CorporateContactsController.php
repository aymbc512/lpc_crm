<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CorporateContacts Controller
 *
 * @property \App\Model\Table\CorporateContactsTable $CorporateContacts
 */
class CorporateContactsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CorporateContacts->find()
            ->contain(['Stakeholders', 'Cases', 'Users']);
        $corporateContacts = $this->paginate($query);

        $this->set(compact('corporateContacts'));
    }

    /**
     * View method
     *
     * @param string|null $id Corporate Contact id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $corporateContact = $this->CorporateContacts->get($id, contain: ['Stakeholders', 'Cases', 'Users']);
        $this->set(compact('corporateContact'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $corporateContact = $this->CorporateContacts->newEmptyEntity();
        if ($this->request->is('post')) {
            $corporateContact = $this->CorporateContacts->patchEntity($corporateContact, $this->request->getData());
            if ($this->CorporateContacts->save($corporateContact)) {
                $this->Flash->success(__('The corporate contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate contact could not be saved. Please, try again.'));
        }
        $stakeholders = $this->CorporateContacts->Stakeholders->find('list', limit: 200)->all();
        $cases = $this->CorporateContacts->Cases->find('list', limit: 200)->all();
        $users = $this->CorporateContacts->Users->find('list', limit: 200)->all();
        $this->set(compact('corporateContact', 'stakeholders', 'cases', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Corporate Contact id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $corporateContact = $this->CorporateContacts->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporateContact = $this->CorporateContacts->patchEntity($corporateContact, $this->request->getData());
            if ($this->CorporateContacts->save($corporateContact)) {
                $this->Flash->success(__('The corporate contact has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate contact could not be saved. Please, try again.'));
        }
        $stakeholders = $this->CorporateContacts->Stakeholders->find('list', limit: 200)->all();
        $cases = $this->CorporateContacts->Cases->find('list', limit: 200)->all();
        $users = $this->CorporateContacts->Users->find('list', limit: 200)->all();
        $this->set(compact('corporateContact', 'stakeholders', 'cases', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Corporate Contact id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $corporateContact = $this->CorporateContacts->get($id);
        if ($this->CorporateContacts->delete($corporateContact)) {
            $this->Flash->success(__('The corporate contact has been deleted.'));
        } else {
            $this->Flash->error(__('The corporate contact could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
