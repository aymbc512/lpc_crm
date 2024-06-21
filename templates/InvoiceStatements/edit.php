<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceStatement $invoiceStatement
 * @var string[]|\Cake\Collection\CollectionInterface $invoices
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="desktop detail-view">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">明細情報編集</div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($invoiceStatement) ?>
                <fieldset>
                    <table class="form-table">
                        <tr>
                            <th><?= $this->Form->label('invoice_statement_item', __('請求項目')) ?></th>
                            <td><?= $this->Form->control('invoice_statement_item', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_statement_amount', __('金額')) ?></th>
                            <td><?= $this->Form->control('invoice_statement_amount', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_statement_tax', __('消費税')) ?></th>
                            <td><?= $this->Form->control('invoice_statement_tax', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_id', __('請求')) ?></th>
                            <td><?= $this->Form->control('invoice_id', ['options' => $invoices, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                    </table>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('保存'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
