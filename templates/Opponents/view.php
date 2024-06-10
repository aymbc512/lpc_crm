<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Opponent $opponent
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Opponent'), ['action' => 'edit', $opponent->stakeholder_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Opponent'), ['action' => 'delete', $opponent->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $opponent->stakeholder_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Opponents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Opponent'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="opponents view content">
            <h3><?= h($opponent->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($opponent->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prefectures') ?></th>
                    <td><?= h($opponent->prefectures) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($opponent->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kuchouson') ?></th>
                    <td><?= h($opponent->kuchouson) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adress Below') ?></th>
                    <td><?= h($opponent->adress_below) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($opponent->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lawyer Id') ?></th>
                    <td><?= h($opponent->lawyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($opponent->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $opponent->hasValue('user') ? $this->Html->link($opponent->user->user_id, ['controller' => 'Users', 'action' => 'view', $opponent->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Stakeholder Id') ?></th>
                    <td><?= $this->Number->format($opponent->stakeholder_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Post Cd') ?></th>
                    <td><?= $opponent->post_cd === null ? '' : $this->Number->format($opponent->post_cd) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= $opponent->phone_number === null ? '' : $this->Number->format($opponent->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($opponent->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($opponent->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $opponent->client ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Opponent') ?></th>
                    <td><?= $opponent->opponent ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Stakeholder Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($opponent->stakeholder_kbn)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Stakeholder Remarks') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($opponent->stakeholder_remarks)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
