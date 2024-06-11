<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CorporateContactsAssignment> $corporateContactsAssignment
 */
?>
<div class="corporateContactsAssignment index content">
    <?= $this->Html->link(__('New Corporate Contacts Assignment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Corporate Contacts Assignment') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('corporate_contact_assignment_id') ?></th>
                    <th><?= $this->Paginator->sort('assignment_kbn') ?></th>
                    <th><?= $this->Paginator->sort('corporate_contact_id') ?></th>
                    <th><?= $this->Paginator->sort('case_id') ?></th>
                    <th><?= $this->Paginator->sort('consultation_id') ?></th>
                    <th><?= $this->Paginator->sort('advisor_consultation_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($corporateContactsAssignment as $corporateContactsAssignment): ?>
                <tr>
                    <td><?= $this->Number->format($corporateContactsAssignment->corporate_contact_assignment_id) ?></td>
                    <td><?= h($corporateContactsAssignment->assignment_kbn) ?></td>
                    <td><?= $corporateContactsAssignment->hasValue('corporate_contact') ? $this->Html->link($corporateContactsAssignment->corporate_contact->name, ['controller' => 'CorporateContacts', 'action' => 'view', $corporateContactsAssignment->corporate_contact->corporate_contact_id]) : '' ?></td>
                    <td><?= $corporateContactsAssignment->hasValue('case') ? $this->Html->link($corporateContactsAssignment->case->case_id, ['controller' => 'Cases', 'action' => 'view', $corporateContactsAssignment->case->case_id]) : '' ?></td>
                    <td><?= $corporateContactsAssignment->hasValue('consultation') ? $this->Html->link($corporateContactsAssignment->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $corporateContactsAssignment->consultation->consultations_id]) : '' ?></td>
                    <td><?= $corporateContactsAssignment->hasValue('advisor_consultation') ? $this->Html->link($corporateContactsAssignment->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $corporateContactsAssignment->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                    <td><?= h($corporateContactsAssignment->creator_id) ?></td>
                    <td><?= h($corporateContactsAssignment->created_at) ?></td>
                    <td><?= $corporateContactsAssignment->hasValue('user') ? $this->Html->link($corporateContactsAssignment->user->user_id, ['controller' => 'Users', 'action' => 'view', $corporateContactsAssignment->user->user_id]) : '' ?></td>
                    <td><?= h($corporateContactsAssignment->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $corporateContactsAssignment->corporate_contact_assignment_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corporateContactsAssignment->corporate_contact_assignment_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $corporateContactsAssignment->corporate_contact_assignment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContactsAssignment->corporate_contact_assignment_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
