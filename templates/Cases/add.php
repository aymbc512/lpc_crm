<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $case
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $opponents
 * @var \Cake\Collection\CollectionInterface|string[] $consultations
 * @var \Cake\Collection\CollectionInterface|string[] $advisorConsultations
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('新規案件追加') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($case) ?>
                <fieldset>
                    <table class="form-table">
                        <tr>
                            <th><?= $this->Form->label('case_name', __('案件名')) ?></th>
                            <td><?= $this->Form->control('case_name', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_kbn', __('案件区分')) ?></th>
                            <td><?= $this->Form->control('case_kbn', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('customer_id', __('顧客')) ?></th>
                            <td><?= $this->Form->control('customer_id', ['options' => $customers, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('opponent_id', __('対立相手')) ?></th>
                            <td>  <?= $this->Form->control('opponent_id', ['options' => $opponents, 'empty' => true, 'label' => false]) ?>
                               <?= $this->Html->link(__('対立相手追加'), ['controller' => 'Opponents', 'action' => 'add', '?' => ['redirect' => 'cases/add']] , ['class' => 'detail-small-button','style' => 'margin-left: 200px;']) ?> </td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_content', __('案件の内容')) ?></th>
                            <td><?= $this->Form->control('case_content', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('memo', __('メモ')) ?></th>
                            <td><?= $this->Form->control('memo', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('start_at', __('開始日')) ?></th>
                            <td><?= $this->Form->control('start_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('expected_end_at', __('終了予定日')) ?></th>
                            <td><?= $this->Form->control('expected_end_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('end_at', __('終了日')) ?></th>
                            <td><?= $this->Form->control('end_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('resolution_result', __('解決結果')) ?></th>
                            <td><?= $this->Form->control('resolution_result', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('consultations_id', __('相談')) ?></th>
                            <td><?= $this->Form->control('consultations_id', ['options' => $consultations, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_goal', __('案件目標')) ?></th>
                            <td><?= $this->Form->control('case_goal', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_amount', __('案件金額')) ?></th>
                            <td><?= $this->Form->control('case_amount', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('goal_achievement_deadline_at', __('目標達成期限')) ?></th>
                            <td><?= $this->Form->control('goal_achievement_deadline_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('advisor_consultation_id', __('顧問相談')) ?></th>
                            <td><?= $this->Form->control('advisor_consultation_id', ['options' => $advisorConsultations, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('case_status_kbn', __('案件ステータス区分')) ?></th>
                            <td><?= $this->Form->control('case_status_kbn', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <!-- <th><?= $this->Form->label('creator_id', __('Creator Id')) ?></th>
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
                            <td><?= $this->Form->control('updated_at', ['label' => false]) ?></td> -->
                        </tr>
                    </table>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('保存'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

