<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Controller\ComponentRegistry;
use Cake\ORM\Entity;
use Cake\Log\Log;
use Cake\I18n\FrozenTime;
use Psr\Http\Message\ServerRequestInterface;
class CommonComponent extends Component
{
    public function setAuditFields(Entity $entity, ServerRequestInterface $request, bool $isNew = true)
    {
        Log::debug('setAuditFields method called');

        if (!$request instanceof ServerRequestInterface) {
            Log::error('Invalid request object');
            return;
        }
        Log::debug('Valid request object');

        $user = $request->getAttribute('identity');
        if ($user === null) {
            Log::error('User is null');
            return;
        }
        Log::debug('User is not null');

        $userId = $user->get('user_id'); // ここを修正
        Log::debug('User ID retrieved: ' . $userId);

        $currentDateTime = FrozenTime::now();
        Log::debug('Current Date Time: ' . $currentDateTime);
        //ここまでできてる

        if ($isNew) {
            $entity->set('creator_id', $userId);
            Log::debug('Set creator_id to ' . $userId);

            $entity->set('created_at', $currentDateTime);
            Log::debug('Set created_at to ' . $currentDateTime);
        }

        $entity->set('updater_id', $userId);
        Log::debug('Set updater_id to ' . $userId);

        $entity->set('updated_at', $currentDateTime);
        Log::debug('Set updated_at to ' . $currentDateTime);

        Log::debug('Entity after setting audit fields: ' . print_r($entity->toArray(), true));
    }
    
}
