<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var string[]|\Cake\Collection\CollectionInterface $cases
 * @var string[]|\Cake\Collection\CollectionInterface $stakeholders
 * @var string[]|\Cake\Collection\CollectionInterface $advisorContracts
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('請求情報編集') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($invoice) ?>
                <table class="detail-table">
                    <tr>
                        <th><?= $this->Form->label('invoice_adress', __('請求住所')) ?></th>
                        <td><?= $this->Form->control('invoice_adress', ['label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('invoice_at', __('請求日')) ?></th>
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
                        <td><?= $this->Form->control('invoice_status_kbn', ['options' => $invoice_status_kbns, 'empty' => 'Select Invoice_status_kbn', 'label' => false]) ?></td>
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
                        <th><?= $this->Form->label('invoice_payment_at', __('支払日')) ?></th>
                        <td><?= $this->Form->control('invoice_payment_at', ['empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('case_id', __('案件ID')) ?></th>
                        <td><?= $this->Form->control('case_id', ['options' => $cases, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('stakeholder_id', __('顧客ID')) ?></th>
                        <td><?= $this->Form->control('stakeholder_id', ['options' => $clients, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('advisor_contracts_id', __('顧問契約ID')) ?></th>
                        <td><?= $this->Form->control('advisor_contracts_id', ['options' => $advisorContracts, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('creator_id', __('作成者ID')) ?></th>
                        <td><?= $this->Form->control('creator_id', ['label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('created_at', __('作成日')) ?></th>
                        <td><?= $this->Form->control('created_at', ['empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('updater_id', __('更新者ID')) ?></th>
                        <td><?= $this->Form->control('updater_id', ['empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('updated_at', __('更新日')) ?></th>
                        <td><?= $this->Form->control('updated_at', ['empty' => true, 'label' => false]) ?></td>
                    </tr>
                </table>
                <div class="detail-actions">
                    <?= $this->Form->button(__('Submit'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
