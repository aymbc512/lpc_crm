<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consultation $consultation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Consultation'), ['action' => 'edit', $consultation->consultations_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Consultation'), ['action' => 'delete', $consultation->consultations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultation->consultations_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Consultations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Consultation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="consultations view content">
            <h3><?= h($consultation->consultations_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Consultation Name') ?></th>
                    <td><?= h($consultation->consultation_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $consultation->hasValue('client') ? $this->Html->link($consultation->client->name, ['controller' => 'Clients', 'action' => 'view', $consultation->client->client_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Lawyer Id') ?></th>
                    <td><?= h($consultation->lawyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($consultation->creator_id) ?></td>
                </tr>
            
                <tr>
                    <th><?= __('Consultations Id') ?></th>
                    <td><?= $this->Number->format($consultation->consultations_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Consultation At') ?></th>
                    <td><?= h($consultation->consultation_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($consultation->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($consultation->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Consultation Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($consultation->consultation_content)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Consultation Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($consultation->consultation_kbn)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Advisor Contracts') ?></h4>
                <?php if (!empty($consultation->advisor_contracts)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Advisor Contracts Id') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Advisor Start At') ?></th>
                            <th><?= __('Advisor End At') ?></th>
                            <th><?= __('Advisor Fee') ?></th>
                            <th><?= __('Advisor Content') ?></th>
                            <th><?= __('Consultation Id') ?></th>
                            <th><?= __('Initial Contract At') ?></th>
                            <th><?= __('Initial Consultation At') ?></th>
                            <th><?= __('Payment At') ?></th>
                            <th><?= __('Payment Method Kbn') ?></th>
                            <th><?= __('Lawyer Id') ?></th>
                            <th><?= __('Paralegal Id') ?></th>
                            <th><?= __('Creator Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updater Id') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($consultation->advisor_contracts as $advisorContract) : ?>
                        <tr>
                            <td><?= h($advisorContract->advisor_contracts_id) ?></td>
                            <td><?= h($advisorContract->customer_id) ?></td>
                            <td><?= h($advisorContract->advisor_start_at) ?></td>
                            <td><?= h($advisorContract->advisor_end_at) ?></td>
                            <td><?= h($advisorContract->advisor_fee) ?></td>
                            <td><?= h($advisorContract->advisor_content) ?></td>
                            <td><?= h($advisorContract->consultation_id) ?></td>
                            <td><?= h($advisorContract->initial_contract_at) ?></td>
                            <td><?= h($advisorContract->initial_consultation_at) ?></td>
                            <td><?= h($advisorContract->payment_at) ?></td>
                            <td><?= h($advisorContract->payment_method_kbn) ?></td>
                            <td><?= h($advisorContract->lawyer_id) ?></td>
                            <td><?= h($advisorContract->paralegal_id) ?></td>
                            <td><?= h($advisorContract->creator_id) ?></td>
                            <td><?= h($advisorContract->created_at) ?></td>
                            <td><?= h($advisorContract->updater_id) ?></td>
                            <td><?= h($advisorContract->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'AdvisorContracts', 'action' => 'view', $advisorContract->advisor_contracts_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'AdvisorContracts', 'action' => 'edit', $advisorContract->advisor_contracts_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'AdvisorContracts', 'action' => 'delete', $advisorContract->advisor_contracts_id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisorContract->advisor_contracts_id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
