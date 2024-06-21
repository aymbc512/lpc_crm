<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * CaseAssignees Controller
 *
 * @property \App\Model\Table\CaseAssigneesTable $CaseAssignees
 */
class CaseAssigneesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->CaseAssignees->find()
            ->contain(['Users', 'Cases']);
        $caseAssignees = $this->paginate($query);

        $this->set(compact('caseAssignees'));
    }

    /**
     * View method
     *
     * @param string|null $id Case Assignee id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caseAssignee = $this->CaseAssignees->get($id, [
            'contain' => ['Users', 'Cases'],
        ]);

        $this->set(compact('caseAssignee'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caseAssignee = $this->CaseAssignees->newEmptyEntity();
        if ($this->request->is('post')) {
            $caseAssignee = $this->CaseAssignees->patchEntity($caseAssignee, $this->request->getData());
            $this->setAuditFields($caseAssignee, true);
            if ($this->CaseAssignees->save($caseAssignee)) {
                $this->Flash->success(__('The case assignee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The case assignee could not be saved. Please, try again.'));
        }
        $users = $this->CaseAssignees->Users->find('list', [
            'keyField' => 'user_id',
            'valueField' => 'user_name',
            'limit' => 200
        ])->all();
        $caseId = $this->request->getQuery('case_id');
        $this->set(compact('caseAssignee', 'users', 'caseId'));


        $this->fetchTable('SelectionLists');
        $case_role_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('9');
        $this->set(compact('case_role_kbns'));

    }

    /**
     * Edit method
     *
     * @param string|null $id Case Assignee id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caseAssignee = $this->CaseAssignees->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caseAssignee = $this->CaseAssignees->patchEntity($caseAssignee, $this->request->getData());
            $this->setAuditFields($caseAssignee, false);
            if ($this->CaseAssignees->save($caseAssignee)) {
                $this->Flash->success(__('The case assignee has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The case assignee could not be saved. Please, try again.'));
        }
        $users = $this->CaseAssignees->Users->find('list', [
            'keyField' => 'user_id',
            'valueField' => 'user_name',
            'limit' => 200
        ])->all();
        $cases = $this->CaseAssignees->Cases->find('list', ['limit' => 200])->all();
        $this->set(compact('caseAssignee', 'users', 'cases'));

        $this->fetchTable('SelectionLists');
        $case_role_kbns = $this->fetchTable('SelectionLists')->getNamesByDataId('9');
        $this->set(compact('case_role_kbns'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Case Assignee id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caseAssignee = $this->CaseAssignees->get($id);
        if ($this->CaseAssignees->delete($caseAssignee)) {
            $this->Flash->success(__('The case assignee has been deleted.'));
        } else {
            $this->Flash->error(__('The case assignee could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
