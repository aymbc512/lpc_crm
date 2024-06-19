<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $case
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= h($case->case_id) ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <table class="detail-table">
                    <tr>
                        <th><?= __('案件名') ?></th>
                        <td><?= h($case->case_name) ?></td>
                        <th><?= __('顧客名') ?></th>
                        <td><?= $case->hasValue('customer') ? $this->Html->link($case->customer->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->customer->stakeholder_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('対立相手') ?></th>
                        <td><?= $case->hasValue('opponent') ? $this->Html->link($case->opponent->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->opponent->stakeholder_id]) : '' ?></td>
                        <th><?= __('案件の内容') ?></th>
                        <td><?= h($case->case_content) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('相談') ?></th>
                        <td><?= $case->hasValue('consultation') ? $this->Html->link($case->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $case->consultation->consultations_id]) : '' ?></td>
                        <th><?= __('顧問相談') ?></th>
                        <td><?= $case->hasValue('advisor_consultation') ? $this->Html->link($case->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $case->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成者') ?></th>
                        <td><?= h($case->creator_id) ?></td>
                        <th><?= __('更新者') ?></th>
                        <td><?= h($case->updater_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('案件ID') ?></th>
                        <td><?= $this->Number->format($case->case_id) ?></td>
                        <th><?= __('案件金額') ?></th>
                        <td><?= $case->case_amount === null ? '' : $this->Number->format($case->case_amount) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('開始日') ?></th>
                        <td><?= h($case->start_at) ?></td>
                        <th><?= __('終了予定日') ?></th>
                        <td><?= h($case->expected_end_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('終了日') ?></th>
                        <td><?= h($case->end_at) ?></td>
                        <th><?= __('目標達成期限') ?></th>
                        <td><?= h($case->goal_achievement_deadline_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成日') ?></th>
                        <td><?= h($case->created_at) ?></td>
                        <th><?= __('更新日') ?></th>
                        <td><?= h($case->updated_at) ?></td>
                    </tr>
                </table>

                <div class="text">
                    <strong><?= __('案件区分') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->case_kbn)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('メモ') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->memo)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('解決結果') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->resolution_result)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('案件目標') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->case_goal)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('案件ステータス区分') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->case_status_kbn)); ?>
                    </blockquote>
                </div>

                <div class="detail-actions">
                    <?= $this->Html->link(__('編集'), ['action' => 'edit', $case->case_id], ['class' => 'detail-action-button']) ?>
                    <?= $this->Form->postLink(__('削除'), ['action' => 'delete', $case->case_id], ['confirm' => __('Are you sure you want to delete # {0}?', $case->case_id), 'class' => 'detail-action-button']) ?>
                </div>
            </div>
        </div>

        <div class="detail-related-section">
            <h4><?= __('関連する案件担当者') ?></h4>
            <div class="add-button-container">
                <?= $this->Html->link(__('追加'), ['controller' => 'CaseAssignees', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'add-button']) ?>
            </div>
            <?php if (!empty($case->case_assignees)): ?>
            <table class="detail-data-table">
                <tr>
                    <th><?= __('案件担当者ID') ?></th>
                    <th><?= __('担当者ID') ?></th>
                    <th><?= __('役割') ?></th>
                    <th><?= __('案件ID') ?></th>
                </tr>
                <?php foreach ($case->case_assignees as $caseAssignee): ?>
                <tr>
                    <td><?= h($caseAssignee->case_assignees_id) ?></td>
                    <td><?= h($caseAssignee->lawyer_id) ?></td>
                    <td><?= h($caseAssignee->case_role_kbn) ?></td>
                    <td><?= h($caseAssignee->case_id) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else : ?>
            <p><?= __('関連する案件担当者はいません。') ?></p>
            <?php endif; ?>
        </div>

        <div class="detail-related-section">
            <h4><?= __('関連する請求') ?></h4>
            <div class="add-button-container">
                <?= $this->Html->link(__('追加'), ['controller' => 'Invoices', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'add-button']) ?>
            </div>
            <?php if (!empty($case->invoices)): ?>
            <table class="detail-data-table">
                <tr>
                    <th><?= __('請求ID') ?></th>
                    <th><?= __('宛先') ?></th>
                    <th><?= __('請求日') ?></th>
                    <th><?= __('請求期限') ?></th>
                    <th><?= __('請求金額') ?></th>
                    <th><?= __('請求状況区分') ?></th>
                    <th><?= __('請求書作成日') ?></th>
                    <th><?= __('請求所更新日') ?></th>
                    <th><?= __('支払日') ?></th>
                    <th><?= __('案件ID') ?></th>
                    <th><?= __('関係者ID') ?></th>
                    <th><?= __('顧問契約ID') ?></th>
                    <th><?= __('作成者') ?></th>
                    <th><?= __('作成日') ?></th>
                    <th><?= __('更新者') ?></th>
                    <th><?= __('更新日') ?></th>
                </tr>
                <?php foreach ($case->invoices as $invoice): ?>
                <tr>
                    <td><?= h($invoice->invoice_id) ?></td>
                    <td><?= h($invoice->invoice_address) ?></td>
                    <td><?= h($invoice->invoice_at) ?></td>
                    <td><?= h($invoice->invoice_deadline_at) ?></td>
                    <td><?= h($invoice->invoice_amount) ?></td>
                    <td><?= h($invoice->invoice_status_kbn) ?></td>
                    <td><?= h($invoice->invoice_creation_at) ?></td>
                    <td><?= h($invoice->invoice_updated_at) ?></td>
                    <td><?= h($invoice->invoice_payment_at) ?></td>
                    <td><?= h($invoice->case_id) ?></td>
                    <td><?= h($invoice->stakeholder_id) ?></td>
                    <td><?= h($invoice->advisor_contracts_id) ?></td>
                    <td><?= h($invoice->creator_id) ?></td>
                    <td><?= h($invoice->created_at) ?></td>
                    <td><?= h($invoice->updater_id) ?></td>
                    <td><?= h($invoice->updated_at) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else : ?>
            <p><?= __('関連する請求がありません。') ?></p>
            <?php endif; ?>
        </div>


        <div class="detail-related-section">
            <h4><?= __('関連する顧問契約はありません。') ?></h4>
            <div class="add-button-container">
                <?= $this->Html->link(__('追加'), ['controller' => 'CorporateContactsAssignment', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'add-button']) ?>
            </div>
            <?php if (!empty($case->corporate_contacts)): ?>
            <table class="detail-data-table">
                <tr>
                    <th><?= __('顧問契約ID') ?></th>
                    <th><?= __('氏名') ?></th>
                    <th><?= __('メールアドレス') ?></th>
                    <th><?= __('電話番号') ?></th>
                    <th><?= __('役職区分') ?></th>
                    <th><?= __('備考') ?></th>
                    <th><?= __('関係者ID') ?></th>
                </tr>
                <?php foreach ($case->corporate_contacts as $corporateContact): ?>
                <tr>
                    <td><?= h($corporateContact->corporate_contact_id) ?></td>
                    <td><?= h($corporateContact->name) ?></td>
                    <td><?= h($corporateContact->email) ?></td>
                    <td><?= h($corporateContact->phone_number) ?></td>
                    <td><?= h($corporateContact->position_kbn) ?></td>
                    <td><?= h($corporateContact->remarks) ?></td>
                    <td><?= h($corporateContact->stakeholder_id) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else : ?>
            <p><?= __('関連する法人連絡担当者はいません。') ?></p>
            <?php endif; ?>

        </div>
    </div>
</div>

