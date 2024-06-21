<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Opponents Controller
 *
 * @property \App\Model\Table\OpponentsTable $Opponents
 */
class OpponentsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $opponents = $this->paginate($this->Opponents->find()->where(['opponent' => 1]));

        $this->set(compact('opponents'));
    }

    /**
     * View method
     *
     * @param string|null $id Opponent id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opponent = $this->Opponents->get($id);

        $this->set(compact('opponent'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opponent = $this->Opponents->newEmptyEntity();
        if ($this->request->is('post')) {
            $opponent = $this->Opponents->patchEntity($opponent, $this->request->getData());
            if ($this->Opponents->save($opponent)) {
                $this->Flash->success(__('The opponent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opponent could not be saved. Please, try again.'));
        }
        $this->set(compact('opponent'));

        $this->fetchTable('SelectionLists');
        $stakeholder_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('12');
        $this->set(compact('stakeholder_kbns'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Opponent id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opponent = $this->Opponents->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opponent = $this->Opponents->patchEntity($opponent, $this->request->getData());
            if ($this->Opponents->save($opponent)) {
                $this->Flash->success(__('The opponent has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The opponent could not be saved. Please, try again.'));
        }
        $this->set(compact('opponent'));

        $this->fetchTable('SelectionLists');
        $stakeholder_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('12');
        $this->set(compact('stakeholder_kbns'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Opponent id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opponent = $this->Opponents->get($id);
        if ($this->Opponents->delete($opponent)) {
            $this->Flash->success(__('The opponent has been deleted.'));
        } else {
            $this->Flash->error(__('The opponent could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
