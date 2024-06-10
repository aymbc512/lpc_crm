<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AdvisorContract> $advisorContracts
 */
?>
<div class="advisorContracts index content">
    <?= $this->Html->link(__('New Advisor Contract'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Advisor Contracts') ?></h3>
      <!-- 検索フォーム -->
<?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search'], 'class' => 'form-inline']) ?>
<?= $this->Form->control('name', ['label' => false, 'value' => $this->request->getQuery('name'), 'placeholder' => 'Customer', 'class' => 'form-control']) ?>
<?= $this->Form->button(__('Search'), ['class' => 'btn btn-primary ml-2']) ?>
<?= $this->Form->button(__('Clear'), [
    'type' => 'button', 
    'class' => 'btn btn-secondary ml-2', 
    'onclick' => 'location.href=\'' . $this->Url->build(['action' => 'index']) . '\''
]) ?>
<?= $this->Form->end() ?>


    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('advisor_contracts_id') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('advisor_start_at') ?></th>
                    <th><?= $this->Paginator->sort('advisor_end_at') ?></th>
                    <th><?= $this->Paginator->sort('advisor_fee') ?></th>
                    <th><?= $this->Paginator->sort('consultation_id') ?></th>
                    <th><?= $this->Paginator->sort('initial_contract_at') ?></th>
                    <th><?= $this->Paginator->sort('initial_consultation_at') ?></th>
                    <th><?= $this->Paginator->sort('payment_at') ?></th>
                    <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                    <th><?= $this->Paginator->sort('paralegal_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($advisorContracts as $advisorContract): ?>
                <tr>
                    <td><?= $this->Number->format($advisorContract->advisor_contracts_id) ?></td>
                    <td><?= $advisorContract->hasValue('stakeholder') ? $this->Html->link($advisorContract->stakeholder->name, ['controller' => 'Stakeholders', 'action' => 'view', $advisorContract->stakeholder->stakeholder_id]) : '' ?></td>
                    <td><?= h($advisorContract->advisor_start_at) ?></td>
                    <td><?= h($advisorContract->advisor_end_at) ?></td>
                    <td><?= $advisorContract->advisor_fee === null ? '' : $this->Number->format($advisorContract->advisor_fee) ?></td>
                    <td><?= $advisorContract->hasValue('consultation') ? $this->Html->link($advisorContract->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $advisorContract->consultation->consultations_id]) : '' ?></td>
                    <td><?= h($advisorContract->initial_contract_at) ?></td>
                    <td><?= h($advisorContract->initial_consultation_at) ?></td>
                    <td><?= h($advisorContract->payment_at) ?></td>
                    <td><?= h($advisorContract->lawyer_id) ?></td>
                    <td><?= h($advisorContract->paralegal_id) ?></td>
                    <td><?= h($advisorContract->creator_id) ?></td>
                    <td><?= h($advisorContract->created_at) ?></td>
                    <td><?= $advisorContract->hasValue('user') ? $this->Html->link($advisorContract->user->user_id, ['controller' => 'Users', 'action' => 'view', $advisorContract->user->user_id]) : '' ?></td>
                    <td><?= h($advisorContract->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $advisorContract->advisor_contracts_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $advisorContract->advisor_contracts_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $advisorContract->advisor_contracts_id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisorContract->advisor_contracts_id)]) ?>
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
