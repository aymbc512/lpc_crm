<?php

declare(strict_types=1);

namespace App\Controller;
use App\Controller\AppController;
use Cake\Mailer\Mailer;

class MailsController extends AppController
{

    public function send($userId = null)
    {
        if ($this->request->is('post')) {
            $userId = $this->request->getData('user_id');

            $usersTable = $this->fetchTable('Users');

             {
                $user = $usersTable->get($userId);

                if ($user) {
                    
                    $email = $user->email;

                    
                    $this->sendEmptyMail($email);

                   
                   
               }
            
            }
        }
    }

    private function sendEmptyMail($email)
    {

        $mailer = new Mailer('default');
        
        try{
       $result=$mailer
            ->setTo($email)
            ->setSubject('空メール')
            ->deliver('');
            
            if ($result) {
                $this->Flash->success(__('空メールを送信しました。'));
            } else {
            $this->Flash->error(__('メールの送信中にエラーが発生しました。'));
        }
    } catch (MissingActionException $e) {
        $this->Flash->error(__('メールの送信中にエラーが発生しました。'));
    }
        
        
    }
}
