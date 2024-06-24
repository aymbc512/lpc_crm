<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consultation $consultation
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= h($consultation->consultations_id) ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <h3><?= h($consultation->consultations_id) ?></h3>
                <table class="detail-table">
                    <tr>
                    <tr>
                        <th><?= __('相談ID') ?></th>
                        <td><?= $this->Number->format($consultation->consultations_id) ?></td>
                    </tr>
                        <th><?= __('相談名') ?></th>
                        <td><?= h($consultation->consultation_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('相談日') ?></th>
                        <td><?= h($consultation->consultation_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('顧客名') ?></th>
                        <td><?= $consultation->hasValue('client') ? $this->Html->link($consultation->client->name, ['controller' => 'Clients', 'action' => 'view', $consultation->client->stakeholder_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('担当弁護士') ?></th>
                        <td><?= $consultation->hasValue('lawyer') ? $this->Html->link($consultation->lawyer->user_name, ['controller' => 'Users', 'action' => 'view', $consultation->lawyer->user_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成者') ?></th>
                        <td><?= $consultation->hasValue('creator') ? $this->Html->link($consultation->creator->user_name, ['controller' => 'Users', 'action' => 'view', $consultation->creator->user_id]) : '' ?></td>

                    </tr>
                    <tr>
                        <th><?= __('作成日') ?></th>
                        <td><?= h($consultation->created_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('更新日') ?></th>
                        <td><?= h($consultation->updated_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('相談内容') ?></th>
                        <td><?= h($consultation->consultation_content) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('相談種別区分') ?></th>
                        <td><?= h($consultation->consultation_kbn) ?></td>
                    </tr>
                </table>
                <div class="detail-related-section">
                    <h4><?= __('関連する顧問契約一覧') ?></h4>
                    <div class="add-button-container">
                        <?= $this->Html->link(__('追加'), ['controller' => 'AdvisorContracts', 'action' => 'add', 'consultation_id' => $consultation->consultations_id], ['class' => 'add-button']) ?>
                    </div>
                    <?php if (!empty($consultation->advisor_contracts)) : ?>
                    <table class="detail-data-table">
                        <tr>
                            <th><?= __('顧問契約ID') ?></th>
                            <th><?= __('顧客名') ?></th>
                            <th><?= __('顧問開始日') ?></th>
                            <th><?= __('顧問終了日') ?></th>
                            <th><?= __('顧問費用') ?></th>
                            <th><?= __('担当弁護士') ?></th>
                            <th><?= __('担当パラリーガル') ?></th>
                        </tr>
                        <?php foreach ($consultation->advisor_contracts as $advisorContract) : ?>
                        <tr>
                            <td><?= h($advisorContract->advisor_contracts_id) ?></td>
                            <td><?= h($advisorContract->customer_name) ?></td>
                            <td><?= h($advisorContract->advisor_start_at) ?></td>
                            <td><?= h($advisorContract->advisor_end_at) ?></td>
                            <td><?= h($advisorContract->advisor_fee) ?></td>
                            <td><?= h($advisorContract->lawyer_id) ?></td>
                            <td><?= h($advisorContract->paralegal_id) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <div class="action-buttons">
                        <?= $this->Html->link(__('削除'), ['controller' => 'AdvisorContracts', 'action' => 'delete', $advisorContract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                        <?= $this->Html->link(__('編集'), ['controller' => 'AdvisorContracts', 'action' => 'edit', $advisorContract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                    </div>
                    <?php else : ?>
                    <p><?= __('関連する顧問契約はありません。') ?></p>
                    <?php endif; ?>
                </div>
                <div class="detail-related-section">
                    <h4><?= __('関連する法人連絡担当者') ?></h4>
                    <div class="add-button-container">
                        <?= $this->Html->link(__('追加'), ['controller' => 'CorporateContactsAssignment', 'action' => 'add', 'consultation_id' => $consultation->consultations_id], ['class' => 'add-button']) ?>
                    </div>
                    <?php if (!empty($consultation->corporate_contact_assignment)) : ?>
                    <table class="detail-data-table">
                        <tr>
                            <th><?= __('法人連絡担当者割り当てID') ?></th>
                            <th><?= __('割り当て区分') ?></th>
                            <th><?= __('法人連絡担当者') ?></th>

                        </tr>
                        <?php foreach ($consultation->corporate_contact_assignment as $corporateContactAssignment) : ?>
                        <tr>
                            <td><?= h($corporateContactAssignment->corporate_contact_assignment_id) ?></td>
                            <td><?= h($corporateContactAssignment->assignment_kbn) ?></td>
                            <td><?= h($corporateContactAssignment->corporate_contact_id) ?></td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <div class="action-buttons">
                        <?= $this->Html->link(__('削除'), ['controller' => 'CorporateContactsAssignment', 'action' => 'delete', $corporateContactAssignment->corporate_contact_assignment_id], ['class' => 'detail-small-button']) ?>
                        <?= $this->Html->link(__('編集'), ['controller' => 'CorporateContactsAssignment', 'action' => 'edit', $corporateContactAssignment->corporate_contact_assignment_id], ['class' => 'detail-small-button']) ?>
                    </div>
                    <?php else : ?>
                    <p><?= __('関連する法人連絡担当者はいません。') ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
