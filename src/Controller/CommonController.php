<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\ORM\Entity;

class CommonController extends Controller
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Auth');
    }

    /**
     * 自動入力メソッド
     * 
     * @param \Cake\ORM\Entity $entity The entity to be updated
     * @param bool $isNew Indicates whether the entity is new (true for add, false for edit)
     * @return void
     */
    public function setAuditFields(Entity $entity, bool $isNew = true): void
    {
        $userId = $this->Auth->user('id');
        $currentDateTime = date('Y-m-d H:i:s');
        
        if ($isNew) {
            if ($entity->has('creator_id')) {
                $entity->set('creator_id', $userId);
            }
            if ($entity->has('created_at')) {
                $entity->set('created_at', $currentDateTime);
            }
        }
        
        if ($entity->has('updater_id')) {
            $entity->set('updater_id', $userId);
        }
        if ($entity->has('updated_at')) {
            $entity->set('updated_at', $currentDateTime);
        }
    }
}
