<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">請求情報詳細</div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <h3><?= h($invoice->invoice_id) ?></h3>
                <table class="detail-table">
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
                        <th><?= __('作成者') ?></th>
                        <td><?= h($invoice->creator_id) ?></td>
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
                        <th><?= __('支払日') ?></th>
                        <td><?= h($invoice->invoice_payment_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成日') ?></th>
                        <td><?= h($invoice->created_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('更新日') ?></th>
                        <td><?= h($invoice->updated_at) ?></td>
                    </tr>
                </table>
                <div class="text">
                    <strong><?= __('請求ステータス区分') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($invoice->invoice_status_kbn)); ?>
                    </blockquote>
                </div>
                <div class="detail-related-section">
                    <h4><?= __('関連する明細') ?></h4>
                    <div class="add-button-container">
                        <?= $this->Html->link(__('追加'), ['controller' => 'InvoiceStatements', 'action' => 'add', $invoice->invoice_id], ['class' => 'add-button']) ?>
                    </div>
                    <?php if (!empty($invoice->invoice_statements)) : ?>
                    <table class="detail-data-table">
                        <tr>
                            <th><?= __('明細ID') ?></th>
                            <th><?= __('請求項目') ?></th>
                            <th><?= __('金額') ?></th>
                            <th><?= __('消費税') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($invoice->invoice_statements as $statement) : ?>
                        <tr>
                            <td><?= h($statement->invoice_statement_id) ?></td>
                            <td><?= h($statement->invoice_statement_item) ?></td>
                            <td><?= h($statement->invoice_statement_amount) ?></td>
                            <td><?= h($statement->invoice_statement_tax) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('編集'), ['controller' => 'InvoiceStatements', 'action' => 'edit', $statement->invoice_statement_id]) ?>
                                <?= $this->Form->postLink(__('削除'), ['controller' => 'InvoiceStatements', 'action' => 'delete', $statement->invoice_statement_id], ['confirm' => __('Are you sure you want to delete # {0}?', $statement->invoice_statement_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

