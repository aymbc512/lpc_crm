<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateContactsAssignment $corporateContactsAssignment
 * @var \Cake\Collection\CollectionInterface|string[] $corporateContacts
 * @var \Cake\Collection\CollectionInterface|string[] $cases
 * @var \Cake\Collection\CollectionInterface|string[] $consultations
 * @var \Cake\Collection\CollectionInterface|string[] $advisorConsultations
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('法人連絡担当者割り当て追加') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($corporateContactsAssignment) ?>
                <table class="detail-table">
                    <tr>
                        <th><?= $this->Form->label('assignment_kbn', __('割り当て区分')) ?></th>
                        <td><?= $this->Form->control('assignment_kbn', ['options' => $corporateContacts, 'empty' => 'Select CorporateContact', 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('corporate_contact_id', __('法人連絡担当者')) ?></th>
                        <td><?= $this->Form->control('corporate_contact_id', ['options' => $corporateContacts, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('case_id', __('案件')) ?></th>
                        <td><?= $this->Form->control('case_id', ['options' => $cases, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('consultation_id', __('相談')) ?></th>
                        <td><?= $this->Form->control('consultation_id', ['options' => $consultations, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('advisor_consultation_id', __('顧問相談')) ?></th>
                        <td><?= $this->Form->control('advisor_consultation_id', ['options' => $advisorConsultations, 'empty' => true, 'label' => false]) ?></td>
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

