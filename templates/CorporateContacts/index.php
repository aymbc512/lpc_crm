<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CorporateContact> $corporateContacts
 */
?>
<div class="corporateContacts index content">
    <?= $this->Html->link(__('New Corporate Contact'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Corporate Contacts') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('corporate_contact_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('corporate_contact_position_kbn',['options'=>$corporate_contact_position_kbns,'empty'=>'Select Corporate_contact_position_kbn']) ?></th>
                    <th><?= $this->Paginator->sort('stakeholder_id') ?></th>
                    <th><?= $this->Paginator->sort('case_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($corporateContacts as $corporateContact): ?>
                <tr>
                    <td><?= $this->Number->format($corporateContact->corporate_contact_id) ?></td>
                    <td><?= h($corporateContact->name) ?></td>
                    <td><?= h($corporateContact->email) ?></td>
                    <td><?= $corporateContact->phone_number === null ? '' : $this->Number->format($corporateContact->phone_number) ?></td>
                    <td><?= h($corporateContact->corporate_contact_position_kbn) ?></td>
                    <td><?= $corporateContact->hasValue('stakeholder') ? $this->Html->link($corporateContact->stakeholder->name, ['controller' => 'Stakeholders', 'action' => 'view', $corporateContact->stakeholder->stakeholder_id]) : '' ?></td>
                    <td><?= $corporateContact->hasValue('case') ? $this->Html->link($corporateContact->case->case_id, ['controller' => 'Cases', 'action' => 'view', $corporateContact->case->case_id]) : '' ?></td>
                    <td><?= h($corporateContact->creator_id) ?></td>
                    <td><?= h($corporateContact->created_at) ?></td>
                    <td><?= $corporateContact->hasValue('user') ? $this->Html->link($corporateContact->user->user_id, ['controller' => 'Users', 'action' => 'view', $corporateContact->user->user_id]) : '' ?></td>
                    <td><?= h($corporateContact->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $corporateContact->corporate_contact_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $corporateContact->corporate_contact_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $corporateContact->corporate_contact_id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContact->corporate_contact_id)]) ?>
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
