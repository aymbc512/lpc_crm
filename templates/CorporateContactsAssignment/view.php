<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateContactsAssignment $corporateContactsAssignment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Corporate Contacts Assignment'), ['action' => 'edit', $corporateContactsAssignment->corporate_contact_assignment_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Corporate Contacts Assignment'), ['action' => 'delete', $corporateContactsAssignment->corporate_contact_assignment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContactsAssignment->corporate_contact_assignment_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Corporate Contacts Assignment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Corporate Contacts Assignment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="corporateContactsAssignment view content">
            <h3><?= h($corporateContactsAssignment->corporate_contact_assignment_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Assignment Kbn') ?></th>
                    <td><?= h($corporateContactsAssignment->assignment_kbn) ?></td>
                </tr>
                <tr>
                    <th><?= __('Corporate Contact') ?></th>
                    <td><?= $corporateContactsAssignment->hasValue('corporate_contact') ? $this->Html->link($corporateContactsAssignment->corporate_contact->name, ['controller' => 'CorporateContacts', 'action' => 'view', $corporateContactsAssignment->corporate_contact->corporate_contact_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Case') ?></th>
                    <td><?= $corporateContactsAssignment->hasValue('case') ? $this->Html->link($corporateContactsAssignment->case->case_id, ['controller' => 'Cases', 'action' => 'view', $corporateContactsAssignment->case->case_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Consultation') ?></th>
                    <td><?= $corporateContactsAssignment->hasValue('consultation') ? $this->Html->link($corporateContactsAssignment->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $corporateContactsAssignment->consultation->consultations_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor Consultation') ?></th>
                    <td><?= $corporateContactsAssignment->hasValue('advisor_consultation') ? $this->Html->link($corporateContactsAssignment->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $corporateContactsAssignment->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($corporateContactsAssignment->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $corporateContactsAssignment->hasValue('user') ? $this->Html->link($corporateContactsAssignment->user->user_id, ['controller' => 'Users', 'action' => 'view', $corporateContactsAssignment->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Corporate Contact Assignment Id') ?></th>
                    <td><?= $this->Number->format($corporateContactsAssignment->corporate_contact_assignment_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($corporateContactsAssignment->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($corporateContactsAssignment->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
