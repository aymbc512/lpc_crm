<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateContactsAssignment $corporateContactsAssignment
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= h('法人連絡担当者割り当て情報') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <h3><?= h($corporateContactsAssignment->corporate_contact_assignment_id) ?></h3>
                <table class="detail-table">
                    <tr>
                        <th><?= __('割り当て区分') ?></th>
                        <td><?= h($corporateContactsAssignment->assignment_kbn) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('法人連絡担当者') ?></th>
                        <td><?= $corporateContactsAssignment->hasValue('corporate_contact') ? $this->Html->link($corporateContactsAssignment->corporate_contact->name, ['controller' => 'CorporateContacts', 'action' => 'view', $corporateContactsAssignment->corporate_contact->corporate_contact_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('案件') ?></th>
                        <td><?= $corporateContactsAssignment->hasValue('case') ? $this->Html->link($corporateContactsAssignment->case->case_id, ['controller' => 'Cases', 'action' => 'view', $corporateContactsAssignment->case->case_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('相談') ?></th>
                        <td><?= $corporateContactsAssignment->hasValue('consultation') ? $this->Html->link($corporateContactsAssignment->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $corporateContactsAssignment->consultation->consultations_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('顧問相談') ?></th>
                        <td><?= $corporateContactsAssignment->hasValue('advisor_consultation') ? $this->Html->link($corporateContactsAssignment->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $corporateContactsAssignment->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成者') ?></th>
                        <td><?= h($corporateContactsAssignment->creator_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('ユーザー') ?></th>
                        <td><?= $corporateContactsAssignment->hasValue('user') ? $this->Html->link($corporateContactsAssignment->user->user_id, ['controller' => 'Users', 'action' => 'view', $corporateContactsAssignment->user->user_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('法人連絡担当者割り当てID') ?></th>
                        <td><?= $this->Number->format($corporateContactsAssignment->corporate_contact_assignment_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成日') ?></th>
                        <td><?= h($corporateContactsAssignment->created_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('更新日') ?></th>
                        <td><?= h($corporateContactsAssignment->updated_at) ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
/div>
