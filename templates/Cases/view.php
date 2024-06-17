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
                        <th><?= __('Case Name') ?></th>
                        <td><?= h($case->case_name) ?></td>
                        <th><?= __('Customer') ?></th>
                        <td><?= $case->hasValue('customer') ? $this->Html->link($case->customer->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->customer->stakeholder_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Opponent') ?></th>
                        <td><?= $case->hasValue('opponent') ? $this->Html->link($case->opponent->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->opponent->stakeholder_id]) : '' ?></td>
                        <th><?= __('Case Content') ?></th>
                        <td><?= h($case->case_content) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Consultation') ?></th>
                        <td><?= $case->hasValue('consultation') ? $this->Html->link($case->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $case->consultation->consultations_id]) : '' ?></td>
                        <th><?= __('Advisor Consultation') ?></th>
                        <td><?= $case->hasValue('advisor_consultation') ? $this->Html->link($case->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $case->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Creator Id') ?></th>
                        <td><?= h($case->creator_id) ?></td>
                        <th><?= __('Updater Id') ?></th>
                        <td><?= h($case->updater_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Case Id') ?></th>
                        <td><?= $this->Number->format($case->case_id) ?></td>
                        <th><?= __('Case Amount') ?></th>
                        <td><?= $case->case_amount === null ? '' : $this->Number->format($case->case_amount) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Start At') ?></th>
                        <td><?= h($case->start_at) ?></td>
                        <th><?= __('Expected End At') ?></th>
                        <td><?= h($case->expected_end_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('End At') ?></th>
                        <td><?= h($case->end_at) ?></td>
                        <th><?= __('Goal Achievement Deadline At') ?></th>
                        <td><?= h($case->goal_achievement_deadline_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created At') ?></th>
                        <td><?= h($case->created_at) ?></td>
                        <th><?= __('Updated At') ?></th>
                        <td><?= h($case->updated_at) ?></td>
                    </tr>
                </table>

                <div class="text">
                    <strong><?= __('Case Kbn') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->case_kbn)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('Memo') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->memo)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('Resolution Result') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->resolution_result)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('Case Goal') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->case_goal)); ?>
                    </blockquote>
                </div>
                <div class="text">
                    <strong><?= __('Case Status Kbn') ?></strong>
                    <blockquote>
                        <?= $this->Text->autoParagraph(h($case->case_status_kbn)); ?>
                    </blockquote>
                </div>

                <div class="detail-actions">
                    <?= $this->Html->link(__('Edit Case'), ['action' => 'edit', $case->case_id], ['class' => 'detail-action-button']) ?>
                    <?= $this->Form->postLink(__('Delete Case'), ['action' => 'delete', $case->case_id], ['confirm' => __('Are you sure you want to delete # {0}?', $case->case_id), 'class' => 'detail-action-button']) ?>
                </div>
            </div>
        </div>

        <div class="detail-related-section">
            <h4><?= __('Related Case Assignees') ?></h4>
            <div class="add-button-container">
                <?= $this->Html->link(__('追加'), ['controller' => 'CaseAssignees', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'add-button']) ?>
            </div>
            <?php if (!empty($case->case_assignees)): ?>
            <table class="detail-data-table">
                <tr>
                    <th><?= __('Case Assignees Id') ?></th>
                    <th><?= __('Lawyer Id') ?></th>
                    <th><?= __('Case Role Kbn') ?></th>
                    <th><?= __('Case Id') ?></th>
                    <th><?= __('Creator Id') ?></th>
                    <th><?= __('Created At') ?></th>
                    <th><?= __('Updater Id') ?></th>
                    <th><?= __('Updated At') ?></th>
                </tr>
                <?php foreach ($case->case_assignees as $caseAssignee): ?>
                <tr>
                    <td><?= h($caseAssignee->case_assignees_id) ?></td>
                    <td><?= h($caseAssignee->lawyer_id) ?></td>
                    <td><?= h($caseAssignee->case_role_kbn) ?></td>
                    <td><?= h($caseAssignee->case_id) ?></td>
                    <td><?= h($caseAssignee->creator_id) ?></td>
                    <td><?= h($caseAssignee->created_at) ?></td>
                    <td><?= h($caseAssignee->updater_id) ?></td>
                    <td><?= h($caseAssignee->updated_at) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else : ?>
            <p><?= __('No related case assignees found.') ?></p>
            <?php endif; ?>
        </div>

        <div class="detail-related-section">
            <h4><?= __('Related Invoices') ?></h4>
            <div class="add-button-container">
                <?= $this->Html->link(__('追加'), ['controller' => 'Invoices', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'add-button']) ?>
            </div>
            <?php if (!empty($case->invoices)): ?>
            <table class="detail-data-table">
                <tr>
                    <th><?= __('Invoice Id') ?></th>
                    <th><?= __('Invoice Address') ?></th>
                    <th><?= __('Invoice At') ?></th>
                    <th><?= __('Invoice Deadline At') ?></th>
                    <th><?= __('Invoice Amount') ?></th>
                    <th><?= __('Invoice Status Kbn') ?></th>
                    <th><?= __('Invoice Creation At') ?></th>
                    <th><?= __('Invoice Updated At') ?></th>
                    <th><?= __('Invoice Payment At') ?></th>
                    <th><?= __('Case Id') ?></th>
                    <th><?= __('Stakeholder Id') ?></th>
                    <th><?= __('Advisor Contracts Id') ?></th>
                    <th><?= __('Creator Id') ?></th>
                    <th><?= __('Created At') ?></th>
                    <th><?= __('Updater Id') ?></th>
                    <th><?= __('Updated At') ?></th>
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
            <p><?= __('No related invoices found.') ?></p>
            <?php endif; ?>
        </div>

        <div class="detail-related-section">
            <h4><?= __('Related Corporate Contacts') ?></h4>
            <div class="add-button-container">
                <?= $this->Html->link(__('追加'), ['controller' => 'CorporateContactsAssignment', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'add-button']) ?>
            </div>
            <?php if (!empty($case->corporate_contacts)): ?>
            <table class="detail-data-table">
                <tr>
                    <th><?= __('Corporate Contact Id') ?></th>
                    <th><?= __('Name') ?></th>
                    <th><?= __('Email') ?></th>
                    <th><?= __('Phone Number') ?></th>
                    <th><?= __('Position Kbn') ?></th>
                    <th><?= __('Remarks') ?></th>
                    <th><?= __('Stakeholder Id') ?></th>
                    <th><?= __('Creator Id') ?></th>
                    <th><?= __('Created At') ?></th>
                    <th><?= __('Updater Id') ?></th>
                    <th><?= __('Updated At') ?></th>
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
                    <td><?= h($corporateContact->creator_id) ?></td>
                    <td><?= h($corporateContact->created_at) ?></td>
                    <td><?= h($corporateContact->updater_id) ?></td>
                    <td><?= h($corporateContact->updated_at) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php else : ?>
            <p><?= __('No related corporate contacts found.') ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>

