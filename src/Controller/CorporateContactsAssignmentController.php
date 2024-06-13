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
            ->contain(['CorporateContacts', 'Cases', 'Consultations', 'AdvisorConsultations', 'Creators', 'Updaters']);
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
        $corporateContactsAssignment = $this->CorporateContactsAssignment->get($id, ['contain' => ['CorporateContacts', 'Cases', 'Consultations', 'AdvisorConsultations', 'Creators', 'Updaters']]);
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

        // 遷移元のURLから外部キーを取得
        $caseId = $this->request->getQuery('case_id');
        $consultationId = $this->request->getQuery('consultation_id');
        $advisorConsultationId = $this->request->getQuery('advisor_consultation_id');

        if ($this->request->is('post')) {
            $corporateContactsAssignment = $this->CorporateContactsAssignment->patchEntity($corporateContactsAssignment, $this->request->getData());

            // CommonControllerのメソッドを呼び出してフィールドを更新
            $this->Common->setAuditFields($corporateContactsAssignment);

            if ($this->CorporateContactsAssignment->save($corporateContactsAssignment)) {
                $this->Flash->success(__('The corporate contacts assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate contacts assignment could not be saved. Please, try again.'));
        }

        // 新規作成フォームに初期値を設定
        if ($caseId) {
            $corporateContactsAssignment->case_id = $caseId;
        }

        if ($consultationId) {
            $corporateContactsAssignment->consultation_id = $consultationId;
        }

        if ($advisorConsultationId) {
            $corporateContactsAssignment->advisor_consultation_id = $advisorConsultationId;
        }

        $corporateContacts = $this->CorporateContactsAssignment->CorporateContacts->find('list', ['limit' => 200])->all();
        $cases = $this->CorporateContactsAssignment->Cases->find('list', ['limit' => 200])->all();
        $consultations = $this->CorporateContactsAssignment->Consultations->find('list', ['limit' => 200])->all();
        $advisorConsultations = $this->CorporateContactsAssignment->AdvisorConsultations->find('list', ['limit' => 200])->all();
        $creators = $this->CorporateContactsAssignment->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->CorporateContactsAssignment->Updaters->find('list', ['limit' => 200])->all();
        $this->set(compact('corporateContactsAssignment', 'corporateContacts', 'cases', 'consultations', 'advisorConsultations', 'creators', 'updaters'));
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
        $corporateContactsAssignment = $this->CorporateContactsAssignment->get($id, ['contain' => []]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $corporateContactsAssignment = $this->CorporateContactsAssignment->patchEntity($corporateContactsAssignment, $this->request->getData());

            // CommonControllerのメソッドを呼び出してフィールドを更新
            $this->Common->setAuditFields($corporateContactsAssignment, false);

            if ($this->CorporateContactsAssignment->save($corporateContactsAssignment)) {
                $this->Flash->success(__('The corporate contacts assignment has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The corporate contacts assignment could not be saved. Please, try again.'));
        }
        $corporateContacts = $this->CorporateContactsAssignment->CorporateContacts->find('list', ['limit' => 200])->all();
        $cases = $this->CorporateContactsAssignment->Cases->find('list', ['limit' => 200])->all();
        $consultations = $this->CorporateContactsAssignment->Consultations->find('list', ['limit' => 200])->all();
        $advisorConsultations = $this->CorporateContactsAssignment->AdvisorConsultations->find('list', ['limit' => 200])->all();
        $creators = $this->CorporateContactsAssignment->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->CorporateContactsAssignment->Updaters->find('list', ['limit' => 200])->all();
        $this->set(compact('corporateContactsAssignment', 'corporateContacts', 'cases', 'consultations', 'advisorConsultations', 'creators', 'updaters'));
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
