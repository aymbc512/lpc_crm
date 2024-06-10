<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Invoice'), ['action' => 'edit', $invoice->invoice_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Invoice'), ['action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Invoice'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="invoices view content">
            <h3><?= h($invoice->invoice_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Invoice Adress') ?></th>
                    <td><?= h($invoice->invoice_adress) ?></td>
                </tr>
                <tr>
                    <th><?= __('Case') ?></th>
                    <td><?= $invoice->hasValue('case') ? $this->Html->link($invoice->case->case_id, ['controller' => 'Cases', 'action' => 'view', $invoice->case->case_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Stakeholder') ?></th>
                    <td><?= $invoice->hasValue('stakeholder') ? $this->Html->link($invoice->stakeholder->name, ['controller' => 'Stakeholders', 'action' => 'view', $invoice->stakeholder->stakeholder_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor Contract') ?></th>
                    <td><?= $invoice->hasValue('advisor_contract') ? $this->Html->link($invoice->advisor_contract->advisor_contracts_id, ['controller' => 'AdvisorContracts', 'action' => 'view', $invoice->advisor_contract->advisor_contracts_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($invoice->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $invoice->hasValue('user') ? $this->Html->link($invoice->user->user_id, ['controller' => 'Users', 'action' => 'view', $invoice->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Id') ?></th>
                    <td><?= $this->Number->format($invoice->invoice_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Amount') ?></th>
                    <td><?= $invoice->invoice_amount === null ? '' : $this->Number->format($invoice->invoice_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice At') ?></th>
                    <td><?= h($invoice->invoice_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Deadline At') ?></th>
                    <td><?= h($invoice->invoice_deadline_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Creation At') ?></th>
                    <td><?= h($invoice->invoice_creation_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Updated At') ?></th>
                    <td><?= h($invoice->invoice_updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Payment At') ?></th>
                    <td><?= h($invoice->invoice_payment_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($invoice->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($invoice->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Invoice Status Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($invoice->invoice_status_kbn)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
