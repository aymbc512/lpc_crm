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
            <?= $this->Html->link(__('編集'), ['action' => 'edit', $invoice->invoice_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id), 'class' => 'side-nav-item']) ?>
            
            <?= $this->Html->link(__('追加'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="invoices view content">
            <h3><?= h($invoice->invoice_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('宛先') ?></th>
                    <td><?= h($invoice->invoice_address) ?></td>
                </tr>
                <tr>
                    <th><?= __('案件') ?></th>
                    <td><?= $invoice->hasValue('case') ? $this->Html->link($invoice->case->case_id, ['controller' => 'Cases', 'action' => 'view', $invoice->case->case_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('顧客') ?></th>
                    <td><?= $invoice->hasValue('client') ? $this->Html->link($invoice->client->name, ['controller' => 'Clients', 'action' => 'view', $invoice->client->client_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('顧問契約') ?></th>
                    <td><?= $invoice->hasValue('advisor_contract') ? $this->Html->link($invoice->advisor_contract->advisor_contracts_id, ['controller' => 'AdvisorContracts', 'action' => 'view', $invoice->advisor_contract->advisor_contracts_id]) : '' ?></td>
                </tr>
                
                <tr>
                    <th><?= __('請求ID') ?></th>
                    <td><?= $this->Number->format($invoice->invoice_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('請求金額') ?></th>
                    <td><?= $invoice->invoice_amount === null ? '' : $this->Number->format($invoice->invoice_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('請求日') ?></th>
                    <td><?= h($invoice->invoice_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('請求期限') ?></th>
                    <td><?= h($invoice->invoice_deadline_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('請求書作成日') ?></th>
                    <td><?= h($invoice->invoice_creation_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('請求書更新日') ?></th>
                    <td><?= h($invoice->invoice_updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('請求状況区分') ?></th>
                    <td><?= h($invoice->invoice_status_kbn) ?></td>
                </tr>
            
                <tr>
                    <th><?= __('支払日') ?></th>
                    <td><?= h($invoice->invoice_payment_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('作成者') ?></th>
                    <td><?= h($invoice->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('作成日') ?></th>
                    <td><?= h($invoice->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('更新者') ?></th>
                    <td><?= h($invoice->updater_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('更新日') ?></th>
                    <td><?= h($invoice->updated_at) ?></td>
                </tr>
            </table>
            
            </div>
            <div class="related">
                <h4><?= __('関連する請求明細書') ?></h4>
                <?= $this->Html->link(__('明細追加'), ['controller' => 'InvoiceStatements', 'action' => 'add', $invoice->invoice_id], ['class' => 'button float-right']) ?>
                <?php if (!empty($invoice->invoice_statements)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('請求Id') ?></th>
                            <th><?= __('請求項目') ?></th>
                            <th><?= __('金額') ?></th>
                            <th><?= __('消費税') ?></th>
                            <th><?= __('作成日') ?></th>
                            <th><?= __('更新日') ?></th>
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
                               
                                <?= $this->Html->link(__('編集'), ['controller' => 'InvoiceStatements', 'action' => 'edit', $statement->invoice_statement_id]) ?>
                                <?= $this->Form->postLink(__('削除'), ['controller' => 'InvoiceStatements', 'action' => 'delete', $statement->invoice_statement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $statement->invoice_statement_id)]) ?>
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
