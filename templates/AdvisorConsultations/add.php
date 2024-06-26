<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorConsultation $advisorConsultation
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $advisorContracts
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('新規顧問相談登録') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($advisorConsultation) ?>
                <table class="detail-table">
                    <tr>
                        <th><?= $this->Form->label('相談名', __('相談名')) ?></th>
                        <td><?= $this->Form->control('相談名', ['label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('相談日', __('相談日')) ?></th>
                        <td><?= $this->Form->control('相談日', ['empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('相談内容', __('相談内容')) ?></th>
                        <td><?= $this->Form->control('相談内容', ['label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('顧客名', __('顧客名')) ?></th>
                        <td><?= $this->Form->control('顧客名', ['options' => $clients, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('担当弁護士', __('担当弁護士')) ?></th>
                        <td><?= $this->Form->control('担当弁護士', ['options' => $lawyers, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('担当パラリーガル', __('担当パラリーガル')) ?></th>
                        <td><?= $this->Form->control('担当パラリーガル', ['options' => $paralegals, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $this->Form->control('顧問契約', ['type' => 'hidden']) ?></td>
                    </tr>
                </table>
                <div class="detail-actions">
                    <?= $this->Form->button(__('保存'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

