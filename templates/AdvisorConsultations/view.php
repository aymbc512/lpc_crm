<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorConsultation $advisorConsultation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Advisor Consultation'), ['action' => 'edit', $advisorConsultation->advisor_consultations_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Advisor Consultation'), ['action' => 'delete', $advisorConsultation->advisor_consultations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $advisorConsultation->advisor_consultations_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Advisor Consultations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Advisor Consultation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="advisorConsultations view content">
            <h3><?= h($advisorConsultation->advisor_consultations_id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Consultation Name') ?></th>
                    <td><?= h($advisorConsultation->consultation_name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $advisorConsultation->hasValue('advisor_contract') && $advisorConsultation->advisor_contract->hasValue('client') ? $this->Html->link($advisorConsultation->advisor_contract->client->name, ['controller' => 'Clients', 'action' => 'view', $advisorConsultation->advisor_contract->client->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Lawyer Id') ?></th>
                    <td><?= h($advisorConsultation->lawyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Advisor Contract') ?></th>
                    <td><?= $advisorConsultation->hasValue('advisor_contract') ? $this->Html->link($advisorConsultation->advisor_contract->advisor_contracts_id, ['controller' => 'AdvisorContracts', 'action' => 'view', $advisorConsultation->advisor_contract->advisor_contracts_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Paralegal Id') ?></th>
                    <td><?= h($advisorConsultation->paralegal_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($advisorConsultation->creator_id) ?></td>
                </tr>
              
                <tr>
                    <th><?= __('Advisor Consultations Id') ?></th>
                    <td><?= $this->Number->format($advisorConsultation->advisor_consultations_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Consultation At') ?></th>
                    <td><?= h($advisorConsultation->consultation_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($advisorConsultation->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($advisorConsultation->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Consultation Content') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($advisorConsultation->consultation_content)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Cases') ?></h4>
                <?php if (!empty($advisorConsultation->cases)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Case Id') ?></th>
                            <th><?= __('Case Name') ?></th>
                            <th><?= __('Case Kbn') ?></th>
                            <th><?= __('Customer Id') ?></th>
                            <th><?= __('Opponent Id') ?></th>
                            <th><?= __('Case Content') ?></th>
                            <th><?= __('Memo') ?></th>
                            <th><?= __('Start At') ?></th>
                            <th><?= __('Expected End At') ?></th>
                            <th><?= __('End At') ?></th>
                            <th><?= __('Resolution Result') ?></th>
                            <th><?= __('Consultations Id') ?></th>
                            <th><?= __('Case Goal') ?></th>
                            <th><?= __('Case Amount') ?></th>
                            <th><?= __('Goal Achievement Deadline At') ?></th>
                            <th><?= __('Advisor Consultation Id') ?></th>
                            <th><?= __('Case Status Kbn') ?></th>
                            <th><?= __('Creator Id') ?></th>
                            <th><?= __('Created At') ?></th>
                            <th><?= __('Updater Id') ?></th>
                            <th><?= __('Updated At') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($advisorConsultation->cases as $case) : ?>
                        <tr>
                            <td><?= h($case->case_id) ?></td>
                            <td><?= h($case->case_name) ?></td>
                            <td><?= h($case->case_kbn) ?></td>
                            <td><?= h($case->customer_id) ?></td>
                            <td><?= h($case->opponent_id) ?></td>
                            <td><?= h($case->case_content) ?></td>
                            <td><?= h($case->memo) ?></td>
                            <td><?= h($case->start_at) ?></td>
                            <td><?= h($case->expected_end_at) ?></td>
                            <td><?= h($case->end_at) ?></td>
                            <td><?= h($case->resolution_result) ?></td>
                            <td><?= h($case->consultations_id) ?></td>
                            <td><?= h($case->case_goal) ?></td>
                            <td><?= h($case->case_amount) ?></td>
                            <td><?= h($case->goal_achievement_deadline_at) ?></td>
                            <td><?= h($case->advisor_consultation_id) ?></td>
                            <td><?= h($case->case_status_kbn) ?></td>
                            <td><?= h($case->creator_id) ?></td>
                            <td><?= h($case->created_at) ?></td>
                            <td><?= h($case->updater_id) ?></td>
                            <td><?= h($case->updated_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Cases', 'action' => 'view', $case->case_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Cases', 'action' => 'edit', $case->case_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Cases', 'action' => 'delete', $case->case_id], ['confirm' => __('Are you sure you want to delete # {0}?', $case->case_id)]) ?>
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
