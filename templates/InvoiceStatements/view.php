<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceStatement $invoiceStatement
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoice Statement'), ['action' => 'edit', $invoiceStatement->invoice_statement_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoice Statement'), ['action' => 'delete', $invoiceStatement->invoice_statement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceStatement->invoice_statement_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoice Statements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoice Statement'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="invoiceStatements view content">
            <h3><?= h($invoiceStatement->invoice_statement_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Invoice Statement Item') ?></th>
                    <td><?= h($invoiceStatement->invoice_statement_item) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice') ?></th>
                    <td><?= $invoiceStatement->hasValue('invoice') ? $this->Html->link($invoiceStatement->invoice->invoice_id, ['controller' => 'Invoices', 'action' => 'view', $invoiceStatement->invoice->invoice_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($invoiceStatement->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $invoiceStatement->hasValue('user') ? $this->Html->link($invoiceStatement->user->user_id, ['controller' => 'Users', 'action' => 'view', $invoiceStatement->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Statement Id') ?></th>
                    <td><?= $this->Number->format($invoiceStatement->invoice_statement_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Statement Amount') ?></th>
                    <td><?= $invoiceStatement->invoice_statement_amount === null ? '' : $this->Number->format($invoiceStatement->invoice_statement_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Statement Tax') ?></th>
                    <td><?= $invoiceStatement->invoice_statement_tax === null ? '' : $this->Number->format($invoiceStatement->invoice_statement_tax) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($invoiceStatement->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($invoiceStatement->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
