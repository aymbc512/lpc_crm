<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $case
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('案件編集'), ['action' => 'edit', $case->case_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('案件削除'), ['action' => 'delete', $case->case_id], ['confirm' => __('Are you sure you want to delete # {0}?', $case->case_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('案件一覧'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('案件追加'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>

            

        </div>
    </aside>
    <div class="column column-80">
        <div class="cases view content">
            <h3><?= h($case->case_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('案件名') ?></th>
                    <td><?= h($case->case_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('顧客名') ?></th>
                    <td><?= $case->hasValue('customer') ? $this->Html->link($case->customer->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->customer->stakeholder_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('対立相手名') ?></th>
                    <td><?= $case->hasValue('opponent') ? $this->Html->link($case->opponent->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->opponent->stakeholder_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('案件の内容') ?></th>
                    <td><?= h($case->case_content) ?></td>
                </tr>
                <tr>
                    <th><?= __('相談') ?></th>
                    <td><?= $case->hasValue('consultation') ? $this->Html->link($case->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $case->consultation->consultations_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('顧問相談') ?></th>
                    <td><?= $case->hasValue('advisor_consultation') ? $this->Html->link($case->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $case->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('作成者') ?></th>
                    <td><?= h($case->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('更新者') ?></th>
                    <td><?= h($case->updater_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('案件ID') ?></th>
                    <td><?= $this->Number->format($case->case_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('案件金額') ?></th>
                    <td><?= $case->case_amount === null ? '' : $this->Number->format($case->case_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('開始日') ?></th>
                    <td><?= h($case->start_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('終了予定日') ?></th>
                    <td><?= h($case->expected_end_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('終了日') ?></th>
                    <td><?= h($case->end_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('目標達成期限') ?></th>
                    <td><?= h($case->goal_achievement_deadline_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('作成日') ?></th>
                    <td><?= h($case->created_at) ?></td>
                </tr>
                <tr>
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

            <!-- Related Case Assignees -->
            <div class="related">
                <h4><?= __('関連する案件担当者') ?></h4>
                <div class="button-container" style="text-align: right;">
                    <?= $this->Html->link(__('案件担当者追加'), ['controller' => 'CaseAssignees', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'button']) ?>
                </div>
                <?php if (!empty($case->case_assignees)): ?>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th><?= __('案件担当者ID') ?></th>
                                <th><?= __('担当者ID') ?></th>
                                <th><?= __('役割区分') ?></th>
                                <th><?= __('案件ID') ?></th>
                                <th><?= __('作成者ID') ?></th>
                                <th><?= __('作成日') ?></th>
                                <th><?= __('更新者') ?></th>
                                <th><?= __('更新日') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($case->case_assignees as $caseAssignee): ?>
                            <tr>
                                <td><?= h($caseAssignee->case_assignees) ?></td>
                                <td><?= h($caseAssignee->lawyer_id) ?></td>
                                <td><?= h($caseAssignee->case_role_kbn) ?></td>
                                <td><?= h($caseAssignee->case_id) ?></td>
                                <td><?= h($caseAssignee->creator_id) ?></td>
                                <td><?= h($caseAssignee->created_at) ?></td>
                                <td><?= h($caseAssignee->updater_id) ?></td>
                                <td><?= h($caseAssignee->updated_at) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'CaseAssignees', 'action' => 'view', $caseAssignee->case_assignees]) ?>
                                    <?= $this->Html->link(__('編集'), ['controller' => 'CaseAssignees', 'action' => 'edit', $caseAssignee->case_assignees]) ?>
                                    <?= $this->Form->postLink(__('削除'), ['controller' => 'CaseAssignees', 'action' => 'delete', $caseAssignee->case_assignees], ['confirm' => __('Are you sure you want to delete # {0}?', $caseAssignee->case_assignees)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>

            <!-- Related Invoices -->
            <div class="related">
                <h4><?= __('関連する請求') ?></h4>
                <div class="button-container" style="text-align: right;">
                    <?= $this->Html->link(__('Add Invoice'), ['controller' => 'Invoices', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'button']) ?>
                </div>
                <?php if (!empty($case->invoices)): ?>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th><?= __('請求ID') ?></th>
                                <th><?= __('宛先') ?></th>
                                <th><?= __('請求日') ?></th>
                                <th><?= __('請求期限') ?></th>
                                <th><?= __('請求金額') ?></th>
                                <th><?= __('請求状況区分') ?></th>
                                <th><?= __('請求書作成日') ?></th>
                                <th><?= __('請求書更新日') ?></th>
                                <th><?= __('支払日') ?></th>
                                <th><?= __('案件ID') ?></th>
                                <th><?= __('顧客ID') ?></th>
                                <th><?= __('顧問契約ID') ?></th>
                                <th><?= __('作成者') ?></th>
                                <th><?= __('作成日') ?></th>
                                <th><?= __('更新者') ?></th>
                                <th><?= __('更新日') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoice->invoice_id]) ?>
                                    <?= $this->Html->link(__('編集'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id]) ?>
                                    <?= $this->Form->postLink(__('削除'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>

            <!-- Related Corporate Contacts -->
            <div class="related">
                <h4><?= __('関連する法人連絡担当者') ?></h4>
                <div class="button-container" style="text-align: right;">
                    <?= $this->Html->link(__('法人連絡担当者追加'), ['controller' => 'CorporateContactsAssignment', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'button']) ?>
                </div>
                <?php if (!empty($case->corporate_contacts)): ?>
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th><?= __('法人連絡担当者ID') ?></th>
                                <th><?= __('氏名') ?></th>
                                <th><?= __('メールアドレス') ?></th>
                                <th><?= __('電話番号') ?></th>
                                <th><?= __('役職区分') ?></th>
                                <th><?= __('備考') ?></th>
                                <th><?= __('顧客ID') ?></th>
                                <th><?= __('作成者') ?></th>
                                <th><?= __('作成日') ?></th>
                                <th><?= __('更新者') ?></th>
                                <th><?= __('更新日') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <td><?= $this->Html->link($corporateContact->corporate_contacts_id, ['action' => 'view', $corporateContac->corporate_contacts_id]) ?></td>
                            <?php foreach ($case->corporate_contacts as $corporateContact): ?>
                            <tr>
                                <td><?= h($corporateContact->corporate_contact_id) ?></td>
                                <td><?= h($corporateContact->name) ?></td>
                                <td><?= h($corporateContact->email) ?></td>
                                <td><?= h($corporateContact->phone_number) ?></td>
                                <td><?= h($corporateContact->position_kbn) ?></td>
                                <td><?= h($corporateContact->remarks) ?></td>
                                <td><?= h($corporateContact->stakeholder_id) ?></td>
                                <td><?= h($corporateContact->creator_id) ?></td>
                                <td><?= h($corporateContact->created_at) ?></td>
                                <td><?= h($corporateContact->updater_id) ?></td>
                                <td><?= h($corporateContact->updated_at) ?></td>
                                <td class="actions">
                                 
                                    <?= $this->Html->link(__('編集'), ['controller' => 'CorporateContacts', 'action' => 'edit', $corporateContact->corporate_contact_id]) ?>
                                    <?= $this->Form->postLink(__('削除'), ['controller' => 'CorporateContacts', 'action' => 'delete', $corporateContact->corporate_contact_id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContact->corporate_contact_id)]) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
