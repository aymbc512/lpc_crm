<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateContact $corporateContact
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Corporate Contact'), ['action' => 'edit', $corporateContact->corporate_contact_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Corporate Contact'), ['action' => 'delete', $corporateContact->corporate_contact_id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContact->corporate_contact_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Corporate Contacts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Corporate Contact'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="corporateContacts view content">
            <h3><?= h($corporateContact->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($corporateContact->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($corporateContact->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Corporate Contact Position Kbn') ?></th>
                    <td><?= h($corporateContact->corporate_contact_position_kbn) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stakeholder') ?></th>
                    <td><?= $corporateContact->hasValue('stakeholder') ? $this->Html->link($corporateContact->stakeholder->name, ['controller' => 'Stakeholders', 'action' => 'view', $corporateContact->stakeholder->stakeholder_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Case') ?></th>
                    <td><?= $corporateContact->hasValue('case') ? $this->Html->link($corporateContact->case->case_id, ['controller' => 'Cases', 'action' => 'view', $corporateContact->case->case_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($corporateContact->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $corporateContact->hasValue('user') ? $this->Html->link($corporateContact->user->user_id, ['controller' => 'Users', 'action' => 'view', $corporateContact->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Corporate Contact Id') ?></th>
                    <td><?= $this->Number->format($corporateContact->corporate_contact_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= $corporateContact->phone_number === null ? '' : $this->Number->format($corporateContact->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($corporateContact->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($corporateContact->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Corporate Contact Remarks') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($corporateContact->corporate_contact_remarks)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
