<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AdvisorConsultation> $advisorConsultations
 */
?>
<div class="advisorConsultations index content">
    <?= $this->Html->link(__('New Advisor Consultation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Advisor Consultations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('advisor_consultations_id') ?></th>
                    <th><?= $this->Paginator->sort('consultation_name') ?></th>
                    <th><?= $this->Paginator->sort('consultation_at') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                    <th><?= $this->Paginator->sort('advisor_contract_id') ?></th>
                    <th><?= $this->Paginator->sort('paralegal_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($advisorConsultations as $advisorConsultation): ?>
                <tr>
                    <td><?= $this->Number->format($advisorConsultation->advisor_consultations_id) ?></td>
                    <td><?= h($advisorConsultation->consultation_name) ?></td>
                    <td><?= h($advisorConsultation->consultation_at) ?></td>
                    <td><?= $advisorConsultation->hasValue('stakeholder') ? $this->Html->link($advisorConsultation->stakeholder->name, ['controller' => 'Stakeholders', 'action' => 'view', $advisorConsultation->stakeholder->stakeholder_id]) : '' ?></td>
                    <td><?= h($advisorConsultation->lawyer_id) ?></td>
                    <td><?= $advisorConsultation->hasValue('advisor_contract') ? $this->Html->link($advisorConsultation->advisor_contract->advisor_contracts_id, ['controller' => 'AdvisorContracts', 'action' => 'view', $advisorConsultation->advisor_contract->advisor_contracts_id]) : '' ?></td>
                    <td><?= h($advisorConsultation->paralegal_id) ?></td>
                    <td><?= h($advisorConsultation->creator_id) ?></td>
                    <td><?= h($advisorConsultation->created_at) ?></td>
                    <td><?= $advisorConsultation->hasValue('user') ? $this->Html->link($advisorConsultation->user->user_id, ['controller' => 'Users', 'action' => 'view', $advisorConsultation->user->user_id]) : '' ?></td>
                    <td><?= h($advisorConsultation->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $advisorConsultation->advisor_consultations_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advisorConsultation->advisor_consultations_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advisorConsultation->advisor_consultations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisorConsultation->advisor_consultations_id)]) ?>
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
