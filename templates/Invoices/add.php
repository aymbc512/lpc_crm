<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var string[]|\Cake\Collection\CollectionInterface $cases
 * @var string[]|\Cake\Collection\CollectionInterface $stakeholders
 * @var string[]|\Cake\Collection\CollectionInterface $advisorContracts
 */
?>
<div class="desktop detail-view">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('新規請求追加') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($invoice) ?>
                <fieldset>
                    <table class="form-table">
                        <tr>
                            <th><?= $this->Form->label('invoice_at', __('Invoice At')) ?></th>
                            <td><?= $this->Form->control('invoice_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_deadline_at', __('請求期限')) ?></th>
                            <td><?= $this->Form->control('invoice_deadline_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_amount', __('請求金額')) ?></th>
                            <td><?= $this->Form->control('invoice_amount', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_status_kbn', __('請求ステータス区分')) ?></th>
                            <td><?= $this->Form->control('invoice_status_kbn', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_creation_at', __('請求書作成日')) ?></th>
                            <td><?= $this->Form->control('invoice_creation_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_updated_at', __('請求書更新日')) ?></th>
                            <td><?= $this->Form->control('invoice_updated_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('invoice_payment_at', __('請求支払日')) ?></th>
                            <td><?= $this->Form->control('invoice_payment_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_id', __('案件')) ?></th>
                            <td><?= $this->Form->control('case_id', ['options' => $cases, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('stakeholder_id', __('顧客')) ?></th>
                            <td><?= $this->Form->control('stakeholder_id', ['options' => $clients, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('advisor_contract_id', __('顧問契約')) ?></th>
                            <td><?= $this->Form->control('advisor_contract_id', ['options' => $advisorContracts, 'empty' => true, 'default' => $invoice->advisor_contract_id, 'label' => false]) ?></td>
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

