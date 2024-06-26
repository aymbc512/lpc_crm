<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorContract $advisorContract
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">顧問契約情報</div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <table class="detail-table">
                    <tr>
                        <th><?= __('顧客名') ?></th>
                        <td><?= $advisorContract->hasValue('client') ? $this->Html->link($advisorContract->client->name, ['controller' => 'Clients', 'action' => 'view', $advisorContract->client->stakeholder_id]) : '' ?></td>
                        <th><?= __('相談') ?></th>
                        <td><?= $advisorContract->hasValue('consultation') ? $this->Html->link($advisorContract->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $advisorContract->consultation->consultations_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('担当弁護士') ?></th>
                        <td><?= $advisorContract->hasValue('lawyer') ? $this->Html->link($advisorContract->lawyer->user_name, ['controller' => 'Users', 'action' => 'view', $advisorContract->lawyer->user_id]) : '' ?></td>
                        <th><?= __('担当パラリーガル') ?></th>
                        <td><?= $advisorContract->hasValue('paralegal') ? $this->Html->link($advisorContract->paralegal->user_name, ['controller' => 'Users', 'action' => 'view', $advisorContract->paralegal->user_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成者') ?></th>
                        <td><?= $advisorContract->hasValue('creator') ? $this->Html->link($advisorContract->creator->user_name, ['controller' => 'Users', 'action' => 'view', $advisorContract->creator->user_id]) : '' ?></td>
                        <th><?= __('更新者') ?></th>
                        <td><?= $advisorContract->hasValue('updater') ? $this->Html->link($advisorContract->updater->user_name, ['controller' => 'Users', 'action' => 'view', $advisorContract->updater->user_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('顧問契約') ?></th>
                        <td><?= $this->Number->format($advisorContract->advisor_contracts_id) ?></td>
                        <th><?= __('顧問費用') ?></th>
                        <td><?= $advisorContract->advisor_fee === null ? '' : $this->Number->format($advisorContract->advisor_fee) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('顧問開始日') ?></th>
                        <td><?= h($advisorContract->advisor_start_at) ?></td>
                        <th><?= __('顧問終了日') ?></th>
                        <td><?= h($advisorContract->advisor_end_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('初回契約日') ?></th>
                        <td><?= h($advisorContract->initial_contract_at) ?></td>
                        <th><?= __('初回相談日') ?></th>
                        <td><?= h($advisorContract->initial_consultation_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('支払日') ?></th>
                        <td><?= h($advisorContract->payment_at) ?></td>
                        <th><?= __('作成日') ?></th>
                        <td><?= h($advisorContract->created_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('更新日') ?></th>
                        <td><?= h($advisorContract->updated_at) ?></td>
                        <th><?= __('支払い方法区分') ?></th>
                        <td><?= h($advisorContract->payment_method_kbn) ?></td>
                    </tr>
                </table>
            </div>
            <div class="detail-related-section">
                <h4><?= __('関連する顧問相談一覧') ?></h4>
                <div class="detail-add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'AdvisorConsultations', 'action' => 'add', 'advisor_contract_id' => $advisorContract->advisor_contracts_id], ['class' => 'detail-add-button']) ?>
                </div>
                <?php if (!empty($advisorContract->advisor_consultations)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('顧問相談ID') ?></th>
                        <th><?= __('顧問相談名') ?></th>
                        <th><?= __('相談日') ?></th>
                        <th><?= __('相談内容') ?></th>
                        <th><?= __('顧客名') ?></th>
                    </tr>
                    <?php foreach ($advisorContract->advisor_consultations as $advisorConsultation) : ?>
                    <tr>
                        <td><?= h($advisorConsultation->advisor_consultations_id) ?></td>
                        <td><?= h($advisorConsultation->consultation_name) ?></td>
                        <td><?= h($advisorConsultation->consultation_at) ?></td>
                        <td><?= h($advisorConsultation->consultation_content) ?></td>
                        <td><?= h($advisorConsultation->customer_id) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="action-buttons">
                    <?= $this->Html->link(__('削除'), ['controller' => 'AdvisorConsultations', 'action' => 'delete', $advisorConsultation->advisor_consultations_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('編集'), ['controller' => 'AdvisorConsultations', 'action' => 'edit', $advisorConsultation->advisor_consultations_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('関連する顧問相談はありません。') ?></p>
                <?php endif; ?>
            </div>
            <div class="detail-related-section">
                <h4><?= __('関連する請求一覧') ?></h4>
                <div class="detail-add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'Invoices', 'action' => 'add', 'advisor_contract_id' => $advisorContract->advisor_contracts_id], ['class' => 'detail-add-button']) ?>
                </div>
                <?php if (!empty($advisorContract->invoices)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('請求ID') ?></th>
                        <th><?= __('金額') ?></th>
                        <th><?= __('請求日') ?></th>
                    </tr>
                    <?php foreach ($advisorContract->invoices as $invoice) : ?>
                    <tr>
                        <td><?= h($invoice->invoice_id) ?></td>
                        <td><?= h($invoice->invoice_amount) ?></td>
                        <td><?= h($invoice->invoice_at) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="action-buttons">
                    <?= $this->Html->link(__('削除'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('編集'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('関連する請求はありません。') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

