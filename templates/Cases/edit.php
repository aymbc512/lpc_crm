<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $case
 * @var string[]|\Cake\Collection\CollectionInterface $customers
 * @var string[]|\Cake\Collection\CollectionInterface $opponents
 * @var string[]|\Cake\Collection\CollectionInterface $consultations
 * @var string[]|\Cake\Collection\CollectionInterface $advisorConsultations
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('Edit Case') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($case) ?>
                <fieldset>
                    <legend><?= __('Edit Case') ?></legend>
                    <table class="form-table">
                        <tr>
                            <th><?= $this->Form->label('case_name', __('Case Name')) ?></th>
                            <td><?= $this->Form->control('case_name', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_kbn', __('Case Kbn')) ?></th>
                            <td><?= $this->Form->control('case_kbn', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('customer_id', __('Customer')) ?></th>
                            <td><?= $this->Form->control('customer_id', ['options' => $customers, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('opponent_id', __('Opponent')) ?></th>
                            <td><?= $this->Form->control('opponent_id', ['options' => $opponents, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_content', __('Case Content')) ?></th>
                            <td><?= $this->Form->control('case_content', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('memo', __('Memo')) ?></th>
                            <td><?= $this->Form->control('memo', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('start_at', __('Start At')) ?></th>
                            <td><?= $this->Form->control('start_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('expected_end_at', __('Expected End At')) ?></th>
                            <td><?= $this->Form->control('expected_end_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('end_at', __('End At')) ?></th>
                            <td><?= $this->Form->control('end_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('resolution_result', __('Resolution Result')) ?></th>
                            <td><?= $this->Form->control('resolution_result', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('consultations_id', __('Consultations')) ?></th>
                            <td><?= $this->Form->control('consultations_id', ['options' => $consultations, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_goal', __('Case Goal')) ?></th>
                            <td><?= $this->Form->control('case_goal', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_amount', __('Case Amount')) ?></th>
                            <td><?= $this->Form->control('case_amount', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('goal_achievement_deadline_at', __('Goal Achievement Deadline At')) ?></th>
                            <td><?= $this->Form->control('goal_achievement_deadline_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('advisor_consultation_id', __('Advisor Consultation')) ?></th>
                            <td><?= $this->Form->control('advisor_consultation_id', ['options' => $advisorConsultations, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_status_kbn', __('Case Status Kbn')) ?></th>
                            <td><?= $this->Form->control('case_status_kbn', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('creator_id', __('Creator Id')) ?></th>
                            <td><?= $this->Form->control('creator_id', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('created_at', __('Created At')) ?></th>
                            <td><?= $this->Form->control('created_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('updater_id', __('Updater Id')) ?></th>
                            <td><?= $this->Form->control('updater_id', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('updated_at', __('Updated At')) ?></th>
                            <td><?= $this->Form->control('updated_at', ['label' => false]) ?></td>
                        </tr>
                    </table>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('Submit'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
