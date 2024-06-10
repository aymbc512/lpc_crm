<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Stakeholders Controller
 *
 * @property \App\Model\Table\StakeholdersTable $Stakeholders
 */
class StakeholdersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Stakeholders->find()
            ->contain(['Users']);
        $stakeholders = $this->paginate($query);

        $this->set(compact('stakeholders'));
    }

    /**
     * View method
     *
     * @param string|null $id Stakeholder id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $stakeholder = $this->Stakeholders->get($id, contain: ['Users']);
        $this->set(compact('stakeholder'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $stakeholder = $this->Stakeholders->newEmptyEntity();
        if ($this->request->is('post')) {
            $stakeholder = $this->Stakeholders->patchEntity($stakeholder, $this->request->getData());
            if ($this->Stakeholders->save($stakeholder)) {
                $this->Flash->success(__('The stakeholder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stakeholder could not be saved. Please, try again.'));
        }
        $users = $this->Stakeholders->Users->find('list', limit: 200)->all();
        $this->set(compact('stakeholder', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Stakeholder id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $stakeholder = $this->Stakeholders->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $stakeholder = $this->Stakeholders->patchEntity($stakeholder, $this->request->getData());
            if ($this->Stakeholders->save($stakeholder)) {
                $this->Flash->success(__('The stakeholder has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The stakeholder could not be saved. Please, try again.'));
        }
        $users = $this->Stakeholders->Users->find('list', limit: 200)->all();
        $this->set(compact('stakeholder', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Stakeholder id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $stakeholder = $this->Stakeholders->get($id);
        if ($this->Stakeholders->delete($stakeholder)) {
            $this->Flash->success(__('The stakeholder has been deleted.'));
        } else {
            $this->Flash->error(__('The stakeholder could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
