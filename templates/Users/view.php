<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">ユーザ情報詳細</div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <table class="detail-table">
                    <tr>
                        <th><?= __('ユーザID') ?></th>
                        <td><?= h($user->user_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('ユーザ名') ?></th>
                        <td><?= h($user->user_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('電話番号') ?></th>
                        <td><?= h($user->phone_number) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('メールアドレス') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('弁護士番号') ?></th>
                        <td><?= $user->lawyer_no === null ? '' : $this->Number->format($user->lawyer_no) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('属性区分') ?></th>
                        <td><?= h($role_kbn_Name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('所属部署区分') ?></th>
                        <td><?= h($department_kbn_Name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('専門領域区分') ?></th>
                        <td><?= h($expertise_kbn_Name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成者') ?></th>
                        <td><?= $user->creator ? $this->Html->link($user->creator->user_name, ['controller' => 'Users', 'action' => 'view', $user->creator->user_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成日') ?></th>
                        <td><?= h($user->created_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('更新者') ?></th>
                        <td><?= $user->updater ? $this->Html->link($user->updater->user_name, ['controller' => 'Users', 'action' => 'view', $user->updater->user_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('更新日') ?></th>
                        <td><?= h($user->updated_at) ?></td>
                    </tr>
                </table>
                <div class="detail-actions">
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $user->user_id], ['confirm' => __('本当に{0}を削除しますか？', $user->user_id), 'class' => 'detail-action-button']) ?>
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $user->user_id], ['class' => 'detail-action-button']) ?>
                </div>
            </div>
        </div>
    </div>
</div>

