<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorContract $advisorContract
 * @var \Cake\Collection\CollectionInterface|string[] $stakeholders
 * @var \Cake\Collection\CollectionInterface|string[] $consultations
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="desktop detail-view">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('新規顧問契約登録') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($advisorContract) ?>
                <fieldset>
                    <legend><?= __('新規顧問契約登録') ?></legend>
                    <table class="form-table">
                        <tr>
                            <th><?= $this->Form->label('customer_id', __('顧客')) ?></th>
                            <td><?= $this->Form->control('customer_id', ['options' => $clients, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('advisor_start_at', __('顧問開始日')) ?></th>
                            <td><?= $this->Form->control('advisor_start_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('advisor_end_at', __('顧問終了日')) ?></th>
                            <td><?= $this->Form->control('advisor_end_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('advisor_fee', __('顧問費用')) ?></th>
                            <td><?= $this->Form->control('advisor_fee', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('advisor_content', __('顧問内容')) ?></th>
                            <td><?= $this->Form->control('advisor_content', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('consultation_id', __('相談ID')) ?></th>
                            <td><?= $this->Form->control('consultation_id', ['options' => $consultations, 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('initial_contract_at', __('初回契約日')) ?></th>
                            <td><?= $this->Form->control('initial_contract_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('initial_consultation_at', __('初回相談日')) ?></th>
                            <td><?= $this->Form->control('initial_consultation_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('payment_at', __('支払日')) ?></th>
                            <td><?= $this->Form->control('payment_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('payment_method_kbn', __('支払方法区分')) ?></th>
                            <td><?= $this->Form->control('payment_method_kbn', ['options' => $payment_methods, 'empty' => 'select Payment_method', 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('lawyer_id', __('担当弁護士ID')) ?></th>
                            <td><?= $this->Form->control('lawyer_id', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('paralegal_id', __('担当パラリーガルID')) ?></th>
                            <td><?= $this->Form->control('paralegal_id', ['label' => false]) ?></td>
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
