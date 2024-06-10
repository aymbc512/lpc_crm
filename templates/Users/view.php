<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->user_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->user_id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->user_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->user_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= h($user->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Name') ?></th>
                    <td><?= h($user->user_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= h($user->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator') ?></th>
                    <td><?= $user->creator ? $this->Html->link($user->creator->user_name, ['controller' => 'Users', 'action' => 'view', $user->creator->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Updater') ?></th>
                    <td><?= $user->updater ? $this->Html->link($user->updater->user_name, ['controller' => 'Users', 'action' => 'view', $user->updater->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Lawyer No') ?></th>
                    <td><?= $user->lawyer_no === null ? '' : $this->Number->format($user->lawyer_no) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($user->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($user->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Role Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->role_kbn)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Department Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->department_kbn)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Expertise Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($user->expertise_kbn)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
