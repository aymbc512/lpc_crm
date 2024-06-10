<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\InvoiceStatement> $invoiceStatements
 */
?>
<div class="invoiceStatements index content">
    <?= $this->Html->link(__('New Invoice Statement'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Invoice Statements') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('invoice_statement_id') ?></th>
                    <th><?= $this->Paginator->sort('invoice_statement_item') ?></th>
                    <th><?= $this->Paginator->sort('invoice_statement_amount') ?></th>
                    <th><?= $this->Paginator->sort('invoice_statement_tax') ?></th>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($invoiceStatements as $invoiceStatement): ?>
                <tr>
                    <td><?= $this->Number->format($invoiceStatement->invoice_statement_id) ?></td>
                    <td><?= h($invoiceStatement->invoice_statement_item) ?></td>
                    <td><?= $invoiceStatement->invoice_statement_amount === null ? '' : $this->Number->format($invoiceStatement->invoice_statement_amount) ?></td>
                    <td><?= $invoiceStatement->invoice_statement_tax === null ? '' : $this->Number->format($invoiceStatement->invoice_statement_tax) ?></td>
                    <td><?= $invoiceStatement->hasValue('invoice') ? $this->Html->link($invoiceStatement->invoice->invoice_id, ['controller' => 'Invoices', 'action' => 'view', $invoiceStatement->invoice->invoice_id]) : '' ?></td>
                    <td><?= h($invoiceStatement->creator_id) ?></td>
                    <td><?= h($invoiceStatement->created_at) ?></td>
                    <td><?= $invoiceStatement->hasValue('user') ? $this->Html->link($invoiceStatement->user->user_id, ['controller' => 'Users', 'action' => 'view', $invoiceStatement->user->user_id]) : '' ?></td>
                    <td><?= h($invoiceStatement->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $invoiceStatement->invoice_statement_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $invoiceStatement->invoice_statement_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $invoiceStatement->invoice_statement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceStatement->invoice_statement_id)]) ?>
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
