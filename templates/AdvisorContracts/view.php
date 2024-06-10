<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorContract $advisorContract
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Advisor Contract'), ['action' => 'edit', $advisorContract->advisor_contracts_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Advisor Contract'), ['action' => 'delete', $advisorContract->advisor_contracts_id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisorContract->advisor_contracts_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Advisor Contracts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Advisor Contract'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="advisorContracts view content">
            <h3><?= h($advisorContract->advisor_contracts_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $advisorContract->hasValue('client') ? $this->Html->link($advisorContract->client->name, ['controller' => 'Clients', 'action' => 'view', $advisorContract->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Consultation') ?></th>
                    <td><?= $advisorContract->hasValue('consultation') ? $this->Html->link($advisorContract->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $advisorContract->consultation->consultations_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Lawyer Id') ?></th>
                    <td><?= h($advisorContract->lawyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Paralegal Id') ?></th>
                    <td><?= h($advisorContract->paralegal_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($advisorContract->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updater Id') ?></th>
                    <td><?= h($advisorContract->updater_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor Contracts Id') ?></th>
                    <td><?= $this->Number->format($advisorContract->advisor_contracts_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor Fee') ?></th>
                    <td><?= $advisorContract->advisor_fee === null ? '' : $this->Number->format($advisorContract->advisor_fee) ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor Start At') ?></th>
                    <td><?= h($advisorContract->advisor_start_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor End At') ?></th>
                    <td><?= h($advisorContract->advisor_end_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Initial Contract At') ?></th>
                    <td><?= h($advisorContract->initial_contract_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Initial Consultation At') ?></th>
                    <td><?= h($advisorContract->initial_consultation_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment At') ?></th>
                    <td><?= h($advisorContract->payment_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($advisorContract->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($advisorContract->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Advisor Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($advisorContract->advisor_content)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Payment Method Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($advisorContract->payment_method_kbn)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Advisor Consultations') ?></h4>
                <?= $this->Html->link(__('Add Advisor Consultation'), ['controller' => 'AdvisorConsultations', 'action' => 'add', 'advisor_contract_id' => $advisorContract->advisor_contracts_id], ['class' => 'button float-right']) ?>
                <?php if (!empty($advisorContract->advisor_consultations)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Advisor Consultations Id') ?></th>
                            <th><?= __('Consultation Name') ?></th>
                            <th><?= __('Consultation At') ?></th>
                            <th><?= __('Consultation Content') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Lawyer Id') ?></th>
                            <th><?= __('Advisor Contract Id') ?></th>
                            <th><?= __('Paralegal Id') ?></th>
                            <th><?= __('Creator Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updater Id') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($advisorContract->advisor_consultations as $advisorConsultation) : ?>
                        <tr>
                            <td><?= h($advisorConsultation->advisor_consultations_id) ?></td>
                            <td><?= h($advisorConsultation->consultation_name) ?></td>
                            <td><?= h($advisorConsultation->consultation_at) ?></td>
                            <td><?= h($advisorConsultation->consultation_content) ?></td>
                            <td><?= h($advisorConsultation->customer_id) ?></td>
                            <td><?= h($advisorConsultation->lawyer_id) ?></td>
                            <td><?= h($advisorConsultation->advisor_contract_id) ?></td>
                            <td><?= h($advisorConsultation->paralegal_id) ?></td>
                            <td><?= h($advisorConsultation->creator_id) ?></td>
                            <td><?= h($advisorConsultation->created_at) ?></td>
                            <td><?= h($advisorConsultation->updater_id) ?></td>
                            <td><?= h($advisorConsultation->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdvisorConsultations', 'action' => 'view', $advisorConsultation->advisor_consultations_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdvisorConsultations', 'action' => 'edit', $advisorConsultation->advisor_consultations_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdvisorConsultations', 'action' => 'delete', $advisorConsultation->advisor_consultations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisorConsultation->advisor_consultations_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <!-- Related Invoices Section -->
            <div class="related">
                <h4><?= __('Related Invoices') ?></h4>
                <?= $this->Html->link(__('Add Invoice'), ['controller' => 'Invoices', 'action' => 'add', 'advisor_contract_id' => $advisorContract->advisor_contracts_id], ['class' => 'button float-right']) ?>
                <?php if (!empty($advisorContract->invoices)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Invoice ID') ?></th>
                            <th><?= __('Amount') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('Status') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($advisorContract->invoices as $invoice) : ?>
                        <tr>
                            <td><?= h($invoice->invoice_id) ?></td>
                            <td><?= h($invoice->invoice_amount) ?></td>
                            <td><?= h($invoice->invoice_date) ?></td>
                            <td><?= h($invoice->invoice_status) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoice->invoice_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php else: ?>
                <p><?= __('No related invoices found.') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
