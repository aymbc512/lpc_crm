<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">ユーザ一覧</div>
        </div>
    </div>
    <div class="frame">
        <div class="custom-table-container">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th><?= $this->Paginator->sort('ユーザID') ?></th>
                        <th><?= $this->Paginator->sort('ユーザ名') ?></th>
                        <th><?= $this->Paginator->sort('電話番号') ?></th>
                        <th><?= $this->Paginator->sort('メールアドレス') ?></th>
                        <th><?= $this->Paginator->sort('弁護士番号') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $this->Html->link($user->user_id, ['action' => 'view', $user->user_id]) ?></td>
                        <td><?= h($user->user_name) ?></td>
                        <td><?= h($user->phone_number) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= $user->lawyer_no === null ? '' : $this->Number->format($user->lawyer_no) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('最初へ')) ?>
            <?= $this->Paginator->prev('< ' . __('前へ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次へ') . ' >') ?>
            <?= $this->Paginator->last(__('最後へ') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
