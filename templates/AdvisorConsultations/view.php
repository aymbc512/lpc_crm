<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorConsultation $advisorConsultation
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= h($advisorConsultation->consultation_name) ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <table class="detail-table">
                    <tr>
                        <th><?= __('Consultation Name') ?></th>
                        <td><?= h($advisorConsultation->consultation_name) ?></td>
                        <th><?= __('Client') ?></th>
                        <td><?= $advisorConsultation->hasValue('advisor_contract') && $advisorConsultation->advisor_contract->hasValue('client') ? $this->Html->link($advisorConsultation->advisor_contract->client->name, ['controller' => 'Clients', 'action' => 'view', $advisorConsultation->advisor_contract->client->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Lawyer Id') ?></th>
                        <td><?= h($advisorConsultation->lawyer_id) ?></td>
                        <th><?= __('Advisor Contract') ?></th>
                        <td><?= $advisorConsultation->hasValue('advisor_contract') ? $this->Html->link($advisorConsultation->advisor_contract->advisor_contracts_id, ['controller' => 'AdvisorContracts', 'action' => 'view', $advisorConsultation->advisor_contract->advisor_contracts_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Paralegal Id') ?></th>
                        <td><?= h($advisorConsultation->paralegal_id) ?></td>
                        <th><?= __('Creator Id') ?></th>
                        <td><?= h($advisorConsultation->creator_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Advisor Consultations Id') ?></th>
                        <td><?= $this->Number->format($advisorConsultation->advisor_consultations_id) ?></td>
                        <th><?= __('Consultation At') ?></th>
                        <td><?= h($advisorConsultation->consultation_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created At') ?></th>
                        <td><?= h($advisorConsultation->created_at) ?></td>
                        <th><?= __('Updated At') ?></th>
                        <td><?= h($advisorConsultation->updated_at) ?></td>
                    </tr>
                </table>
                <div class="detail-actions">
                    <?= $this->Html->link(__('Edit Advisor Consultation'), ['action' => 'edit', $advisorConsultation->advisor_consultations_id], ['class' => 'detail-action-button']) ?>
                    <?= $this->Form->postLink(__('Delete Advisor Consultation'), ['action' => 'delete', $advisorConsultation->advisor_consultations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisorConsultation->advisor_consultations_id), 'class' => 'detail-action-button']) ?>
                </div>
            </div>

            <div class="detail-related-section">
                <h4><?= __('Related Cases') ?></h4>
                <div class="add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'Cases', 'action' => 'add', '?' => ['advisor_consultation_id' => $advisorConsultation->advisor_consultations_id]], ['class' => 'add-button']) ?>
                </div>
                <?php if (!empty($advisorConsultation->cases)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('Case Id') ?></th>
                        <th><?= __('Case Name') ?></th>
                        <th><?= __('Case Kbn') ?></th>
                    </tr>
                    <?php foreach ($advisorConsultation->cases as $case) : ?>
                    <tr>
                        <td><?= h($case->case_id) ?></td>
                        <td><?= h($case->case_name) ?></td>
                        <td><?= h($case->case_kbn) ?></td>
                        <td class="action-buttons">
                            <?= $this->Html->link(__('Delete'), ['controller' => 'Cases', 'action' => 'delete', $case->case_id], ['class' => 'detail-small-button']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Cases', 'action' => 'edit', $case->case_id], ['class' => 'detail-small-button']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else : ?>
                <p><?= __('No related cases found.') ?></p>
                <?php endif; ?>
            </div>

            <div class="detail-related-section">
                <h4><?= __('Related Advisor Contracts') ?></h4>
                <div class="add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'AdvisorContracts', 'action' => 'add', '?' => ['advisor_consultation_id' => $advisorConsultation->advisor_consultations_id]], ['class' => 'add-button']) ?>
                </div>
                <?php if (!empty($advisorConsultation->advisor_contracts)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('Advisor Contract Id') ?></th>
                        <th><?= __('Advisor Name') ?></th>
                        <th><?= __('Contract Date') ?></th>
                    </tr>
                    <?php foreach ($advisorConsultation->advisor_contracts as $contract) : ?>
                    <tr>
                        <td><?= h($contract->advisor_contracts_id) ?></td>
                        <td><?= h($contract->advisor_content) ?></td>
                        <td><?= h($contract->advisor_start_at) ?></td>
                        <td class="action-buttons">
                            <?= $this->Html->link(__('Delete'), ['controller' => 'AdvisorContracts', 'action' => 'delete', $contract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'AdvisorContracts', 'action' => 'edit', $contract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else : ?>
                <p><?= __('No related advisor contracts found.') ?></p>
                <?php endif; ?>
            </div>

            <div class="detail-related-section">
                <h4><?= __('Related Invoices') ?></h4>
                <div class="add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'Invoices', 'action' => 'add', '?' => ['advisor_consultation_id' => $advisorConsultation->advisor_consultations_id]], ['class' => 'add-button']) ?>
                </div>
                <?php if (!empty($advisorConsultation->cases) || !empty($advisorConsultation->advisor_contracts)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('Invoice Id') ?></th>
                        <th><?= __('Amount') ?></th>
                        <th><?= __('Date') ?></th>
                    </tr>
                    <?php foreach ($advisorConsultation->cases as $case) : ?>
                        <?php foreach ($case->invoices as $invoice) : ?>
                        <tr>
                            <td><?= h($invoice->invoice_id) ?></td>
                            <td><?= h($invoice->invoice_amount) ?></td>
                            <td><?= h($invoice->invoice_at) ?></td>
                            <td class="action-buttons">
                                <?= $this->Html->link(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    <?php foreach ($advisorConsultation->advisor_contracts as $contract) : ?>
                        <?php foreach ($contract->invoices as $invoice) : ?>
                        <tr>
                            <td><?= h($invoice->invoice_id) ?></td>
                            <td><?= h($invoice->invoice_amount) ?></td>
                            <td><?= h($invoice->invoice_at) ?></td>
                            <td class="action-buttons">
                                <?= $this->Html->link(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
                <?php else : ?>
                <p><?= __('No related invoices found.') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

