<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index() 
    {
        $query = $this->Users->find()
            ->contain(['Creators', 'Updaters']); // エイリアスを使用して自己参照リレーションを含める
        $users = $this->paginate($query);

        $this->set(compact('users'));

        $selectionListsTable = TableRegistry::getTableLocator()->get('SelectionLists');


        //$roles = $selectionListsTable->getNamesByDataId('1');
        //$departments = $SelectionListsTable->getNamesByDataId('2');
        //$expertises = $SelectionListsTable->getNamesByDataId('3');
        //$this->set(compact('roles', 'departments', 'expertises'));

       // $roles = $selectionLists->getNamesByDataId('1');
       // $departments = $SelectionLists->getNamesByDataId('2');
       // $expertises = $SelectionLists->getNamesByDataId('3');
        $this->set(compact('users', 'creators', 'updaters'));


    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Creators', 'Updaters'], // エイリアスを使用して自己参照リレーションを含める
        ]);
        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
{
    $user = $this->Users->newEmptyEntity();
    if ($this->request->is('post')) {
        $user = $this->Users->patchEntity($user, $this->request->getData());
        if ($this->Users->save($user)) {
            $this->Flash->success(__('The user has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    $creators = $this->Users->Creators->find('list', ['limit' => 200])->all();
    $updaters = $this->Users->Updaters->find('list', ['limit' => 200])->all();
    $this->set(compact('creators', 'updaters'));

    //$this->SelectionLists = new SelectionListsTable();
    //$roles = $this->SelectionLists->getNamesByDataId('1');
    //$departments = $this->SelectionLists->getNamesByDataId('2');
    //$expertises = $this->SelectionLists->getNamesByDataId('3');
    //$this->set(compact('roles', 'departments', 'expertises'));
    
   // $SelectionListsTable = $this->getTableLocator()->get('SelectionLists');
    //$SelectionListsTable-> save($entity);

 //   $roles = $SelectionListsTable->getNamesByDataId('1');
  //  $departments = $SelectionListsTable->getNamesByDataId('2');
   // $expertises = $SelectionListsTable->getNamesByDataId('3');
   
   $this->fetchTable('SelectionLists');
   //$recentSelectionLists = $this -> SelectionLists ->find(all);
  // $this->set('SelectionLists',$this->SelectionLists->find('all'));
   $roles = $this->fetchTable('SelectionLists')->getNamesByDataId('1');
   $departments =$this->fetchTable('SelectionLists')->getNamesByDataId('2');
   $expertises = $this->fetchTable('SelectionLists')->getNamesByDataId('3');
   $this->set(compact('roles', 'departments', 'expertises'));
}


    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $creators = $this->Users->Creators->find('list', ['limit' => 200])->all();
        $updaters = $this->Users->Updaters->find('list', ['limit' => 200])->all();
        $this->set(compact('user', 'creators', 'updaters'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}

