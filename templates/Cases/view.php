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
            <?= $this->Html->link(__('Edit Case'), ['action' => 'edit', $case->case_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Case'), ['action' => 'delete', $case->case_id], ['confirm' => __('Are you sure you want to delete # {0}?', $case->case_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Cases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Case'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cases view content">
            <h3><?= h($case->case_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Case Name') ?></th>
                    <td><?= h($case->case_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Customer') ?></th>
                    <td><?= $case->hasValue('customer') ? $this->Html->link($case->customer->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->customer->stakeholder_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Opponent') ?></th>
                    <td><?= $case->hasValue('opponent') ? $this->Html->link($case->opponent->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->opponent->stakeholder_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Case Content') ?></th>
                    <td><?= h($case->case_content) ?></td>
                </tr>
                <tr>
                    <th><?= __('Consultation') ?></th>
                    <td><?= $case->hasValue('consultation') ? $this->Html->link($case->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $case->consultation->consultations_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor Consultation') ?></th>
                    <td><?= $case->hasValue('advisor_consultation') ? $this->Html->link($case->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $case->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($case->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updater Id') ?></th>
                    <td><?= h($case->updater_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Case Id') ?></th>
                    <td><?= $this->Number->format($case->case_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Case Amount') ?></th>
                    <td><?= $case->case_amount === null ? '' : $this->Number->format($case->case_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Start At') ?></th>
                    <td><?= h($case->start_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Expected End At') ?></th>
                    <td><?= h($case->expected_end_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('End At') ?></th>
                    <td><?= h($case->end_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Goal Achievement Deadline At') ?></th>
                    <td><?= h($case->goal_achievement_deadline_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($case->created_at) ?></td>
                </tr>
                <tr>
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

            <!-- Related Case Assignees -->
            <div class="related clearfix" style="overflow-x: auto;">
                <h4><?= __('Related Case Assignees') ?></h4>
                <?php if (!empty($case->case_assignees)): ?>
                <table>
                    <thead>
                        <tr>
                            <th><?= __('Case Assignees Id') ?></th>
                            <th><?= __('Lawyer Id') ?></th>
                            <th><?= __('Case Role Kbn') ?></th>
                            <th><?= __('Case Id') ?></th>
                            <th><?= __('Creator Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updater Id') ?></th>
                            <th><?= __('Updated At') ?></th>
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
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CaseAssignees', 'action' => 'edit', $caseAssignee->case_assignees]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CaseAssignees', 'action' => 'delete', $caseAssignee->case_assignees], ['confirm' => __('Are you sure you want to delete # {0}?', $caseAssignee->case_assignees)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>

            <!-- Related Invoices -->
            <div class="related clearfix" style="overflow-x: auto;">
                <h4><?= __('Related Invoices') ?></h4>
                <div class="button float-right">
                    <?= $this->Html->link(__('Add Invoice'), ['controller' => 'Invoices', 'action' => 'add', '?' => ['case_id' => $case->case_id]], ['class' => 'button']) ?>
                </div>
                <?php if (!empty($case->invoices)): ?>
                <table>
                    <thead>
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
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>

            <!-- Related Corporate Contacts -->
            <div class="related clearfix" style="overflow-x: auto;">
                <h4><?= __('Related Corporate Contacts') ?></h4>
                <?php if (!empty($case->corporate_contacts)): ?>
                <table>
                    <thead>
                        <tr>
                            <th><?= __('Corporate Contact Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('Email') ?></th>
                            <th><?= __('Phone Number') ?></th>
                            <th><?= __('Position Kbn') ?></th>
                            <th><?= __('Remarks') ?></th>
                            <th><?= __('Stakeholder Id') ?></th>
                            <th><?= __('Case Id') ?></th>
                            <th><?= __('Creator Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updater Id') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($case->corporate_contacts as $corporateContact): ?>
                        <tr>
                            <td><?= h($corporateContact->corporate_contact_id) ?></td>
                            <td><?= h($corporateContact->name) ?></td>
                            <td><?= h($corporateContact->email) ?></td>
                            <td><?= h($corporateContact->phone_number) ?></td>
                            <td><?= h($corporateContact->position_kbn) ?></td>
                            <td><?= h($corporateContact->remarks) ?></td>
                            <td><?= h($corporateContact->stakeholder_id) ?></td>
                            <td><?= h($corporateContact->case_id) ?></td>
                            <td><?= h($corporateContact->creator_id) ?></td>
                            <td><?= h($corporateContact->created_at) ?></td>
                            <td><?= h($corporateContact->updater_id) ?></td>
                            <td><?= h($corporateContact->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'CorporateContacts', 'action' => 'view', $corporateContact->corporate_contact_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'CorporateContacts', 'action' => 'edit', $corporateContact->corporate_contact_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'CorporateContacts', 'action' => 'delete', $corporateContact->corporate_contact_id], ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContact->corporate_contact_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
