<?php
declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use App\Model\Table\UsersTable;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Http\Exception\NotFoundException;
use Cake\Mailer\Mailer;
use Cake\Utility\Security;
use Cake\I18n\DateTime;
use Cake\Routing\Router;

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


    public function search()
    {

        $user_name = $this->request->getQuery('user_name');
        $role_kbn = $this->request->getQuery('role_kbn');

        $query = $this->Users->find();


         if (!empty($user_name)) {
             $query->where(['Users.user_name LIKE' => '%' . $user_name . '%']);
             }
        if (!empty($role_kbn)) {
            $query->where(['Users.role_kbn LIKE' => '%' . $role_kbn . '%']);
            }    
        // ページネーション
        $users = $this->paginate($query);
        $this->set(compact('users'));
        $this->render('index'); // index ビューを使用
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

    $this->set(compact('user', 'creators', 'updaters'));

    $this->set(compact('creators', 'updaters'));
  
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

        $this->set(compact('user'));


        $this->fetchTable('SelectionLists');
   //$recentSelectionLists = $this -> SelectionLists ->find(all);
  // $this->set('SelectionLists',$this->SelectionLists->find('all'));
   $roles = $this->fetchTable('SelectionLists')->getNamesByDataId('1');
   $departments =$this->fetchTable('SelectionLists')->getNamesByDataId('2');
   $expertises = $this->fetchTable('SelectionLists')->getNamesByDataId('3');
   $this->set(compact('roles', 'departments', 'expertises'));


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

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // 認証を必要としないログインアクションを構成し、
        // 無限リダイレクトループの問題を防ぎます
        $this->Authentication->addUnauthenticatedActions(['login', 'add','requestPasswordReset','resetPassword']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // POST, GETを問わず、ユーザーがログインしている場合はリダイレクトします
        if ($result->isValid()) {
            // 認証に成功した場合、identity 属性を取得
            $user = $this->request->getAttribute('identity');
            \Cake\Log\Log::write('debug', 'User identity data: ' . json_encode($user));

            
            // ログインに成功した場合、ユーザー一覧にリダイレクトします
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);
            \Cake\Log\Log::write('debug', 'Redirecting to: ' . json_encode($redirect));
            // セッションデータの確認
             $session = $this->request->getSession();
             \Cake\Log\Log::write('debug', 'Session data (identity): ' . json_encode($session->read()));



            return $this->redirect($redirect);
        }
        // ユーザーがsubmit後、認証失敗した場合は、エラーを表示します
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('ユーザIDかパスワードが無効です。'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }



    public function requestPasswordReset()
    {
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $user = $this->Users->findByEmail($email)->first();

            if ($user) {
                $token = Security::hash(Security::randomBytes(25), 'sha256', true);
                $user->password_reset_token = $token;
                $user->token_created_at = DateTime::now();

                if ($this->Users->save($user)) {
                    $resetUrl = Router::url([
                        'controller' => 'Users',
                        'action' => 'resetPassword',
                        $token
                    ], true);

                    // ここにメール送信のロジックを追加できます。現時点ではログにURLを記録
                    \Cake\Log\Log::write('debug', 'Password reset URL: ' . $resetUrl);

                    $this->Flash->success(__('パスワード再設定用のリンクが送信されました。送信されたリンクからパスワード再設定を行ってください'));
                } else {
                    $this->Flash->error(__('パスワード再設定用のリンクを生成できませんでした。もう一度お試しください。'));
                }
            } else {
                $this->Flash->error(__('無効なメールアドレスです'));
            }
        }
    }

    public function resetPassword($token = null)
    {
        if ($token) {
            $user = $this->Users->find('all')
                ->where(['password_reset_token' => $token, 'token_created_at >' =>DateTime::now()->subHours(1)])
                ->first();

            if ($user) {
                if ($this->request->is(['patch', 'post', 'put'])) {
                    $user = $this->Users->patchEntity($user, $this->request->getData(), ['validate' => 'password']);
                    $user->password_reset_token = null;
                    $user->token_created_at = null;

                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('パスワードが変更されました。'));
                        return $this->redirect(['action' => 'login']);
                        //更新者カラムに自分のユーザIDを入れる
                        

                    } else {
                        $this->Flash->error(__('パスワードを変更できませんでした。もう一度お試しください。'));
                    }
                }
                $this->set(compact('user'));
            } else {
                $this->Flash->error(__('パスワードリセットの期限が過ぎています。'));
                return $this->redirect(['action' => 'login']);
            }
        } else {
            throw new NotFoundException(__('トークンが必要です。'));
        }
    }
}





    