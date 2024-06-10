<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stakeholder $stakeholder
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Stakeholder'), ['action' => 'edit', $stakeholder->stakeholder_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Stakeholder'), ['action' => 'delete', $stakeholder->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stakeholder->stakeholder_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Stakeholders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Stakeholder'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="stakeholders view content">
            <h3><?= h($stakeholder->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($stakeholder->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prefectures') ?></th>
                    <td><?= h($stakeholder->prefectures) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($stakeholder->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kuchouson') ?></th>
                    <td><?= h($stakeholder->kuchouson) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adress Below') ?></th>
                    <td><?= h($stakeholder->adress_below) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($stakeholder->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lawyer Id') ?></th>
                    <td><?= h($stakeholder->lawyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($stakeholder->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $stakeholder->hasValue('user') ? $this->Html->link($stakeholder->user->user_id, ['controller' => 'Users', 'action' => 'view', $stakeholder->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Stakeholder Id') ?></th>
                    <td><?= $this->Number->format($stakeholder->stakeholder_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Post Cd') ?></th>
                    <td><?= $stakeholder->post_cd === null ? '' : $this->Number->format($stakeholder->post_cd) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= $stakeholder->phone_number === null ? '' : $this->Number->format($stakeholder->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($stakeholder->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($stakeholder->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $stakeholder->client ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Opponent') ?></th>
                    <td><?= $stakeholder->opponent ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Stakeholder Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($stakeholder->stakeholder_kbn)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Stakeholder Remarks') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($stakeholder->stakeholder_remarks)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
