<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Invoice> $invoices
 */
?>
<div class="invoices index content">
    <?= $this->Html->link(__('New Invoice'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Invoices') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th><?= $this->Paginator->sort('invoice_adress') ?></th>
                    <th><?= $this->Paginator->sort('invoice_at') ?></th>
                    <th><?= $this->Paginator->sort('invoice_deadline_at') ?></th>
                    <th><?= $this->Paginator->sort('invoice_amount') ?></th>
                    <th><?= $this->Paginator->sort('invoice_creation_at') ?></th>
                    <th><?= $this->Paginator->sort('invoice_updated_at') ?></th>
                    <th><?= $this->Paginator->sort('invoice_payment_at') ?></th>
                    <th><?= $this->Paginator->sort('case_id') ?></th>
                    <th><?= $this->Paginator->sort('stakeholder_id') ?></th>
                    <th><?= $this->Paginator->sort('advisor_contracts_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoices as $invoice): ?>
                <tr>
                    <td><?= $this->Number->format($invoice->invoice_id) ?></td>
                    <td><?= h($invoice->invoice_adress) ?></td>
                    <td><?= h($invoice->invoice_at) ?></td>
                    <td><?= h($invoice->invoice_deadline_at) ?></td>
                    <td><?= $invoice->invoice_amount === null ? '' : $this->Number->format($invoice->invoice_amount) ?></td>
                    <td><?= h($invoice->invoice_creation_at) ?></td>
                    <td><?= h($invoice->invoice_updated_at) ?></td>
                    <td><?= h($invoice->invoice_payment_at) ?></td>
                    <td><?= $invoice->hasValue('case') ? $this->Html->link($invoice->case->case_id, ['controller' => 'Cases', 'action' => 'view', $invoice->case->case_id]) : '' ?></td>
                    <td><?= $invoice->hasValue('stakeholder') ? $this->Html->link($invoice->stakeholder->name, ['controller' => 'Stakeholders', 'action' => 'view', $invoice->stakeholder->stakeholder_id]) : '' ?></td>
                    <td><?= $invoice->hasValue('advisor_contract') ? $this->Html->link($invoice->advisor_contract->advisor_contracts_id, ['controller' => 'AdvisorContracts', 'action' => 'view', $invoice->advisor_contract->advisor_contracts_id]) : '' ?></td>
                    <td><?= h($invoice->creator_id) ?></td>
                    <td><?= h($invoice->created_at) ?></td>
                    <td><?= $invoice->hasValue('user') ? $this->Html->link($invoice->user->user_id, ['controller' => 'Users', 'action' => 'view', $invoice->user->user_id]) : '' ?></td>
                    <td><?= h($invoice->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoice->invoice_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoice->invoice_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id)]) ?>
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
