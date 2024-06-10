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
                    <th><?= __('Invoice Address') ?></th>
                    <td><?= h($invoice->invoice_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('Case') ?></th>
                    <td><?= $invoice->hasValue('case') ? $this->Html->link($invoice->case->case_id, ['controller' => 'Cases', 'action' => 'view', $invoice->case->case_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $invoice->hasValue('client') ? $this->Html->link($invoice->client->name, ['controller' => 'Clients', 'action' => 'view', $invoice->client->client_id]) : '' ?></td>
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
            <div class="related">
                <h4><?= __('Related Invoice Statements') ?></h4>
                <?= $this->Html->link(__('Add Invoice Statement'), ['controller' => 'InvoiceStatements', 'action' => 'add', $invoice->invoice_id], ['class' => 'button float-right']) ?>
                <?php if (!empty($invoice->invoice_statements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Invoice Statement Id') ?></th>
                            <th><?= __('Invoice Statement Item') ?></th>
                            <th><?= __('Invoice Statement Amount') ?></th>
                            <th><?= __('Invoice Statement Tax') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($invoice->invoice_statements as $statement) : ?>
                        <tr>
                            <td><?= h($statement->invoice_statement_id) ?></td>
                            <td><?= h($statement->invoice_statement_item) ?></td>
                            <td><?= h($statement->invoice_statement_amount) ?></td>
                            <td><?= h($statement->invoice_statement_tax) ?></td>
                            <td><?= h($statement->created_at) ?></td>
                            <td><?= h($statement->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'InvoiceStatements', 'action' => 'view', $statement->invoice_statement_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'InvoiceStatements', 'action' => 'edit', $statement->invoice_statement_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'InvoiceStatements', 'action' => 'delete', $statement->invoice_statement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $statement->invoice_statement_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
