
以下に指定されたCSSを適用し、HTML構造を調整したコードを示します。

php
コードをコピーする
<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CaseAssignee $caseAssignee
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var int $caseId
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('Add Case Assignee') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($caseAssignee) ?>
                <table class="detail-table">
                    <tr>
                        <th><?= $this->Form->label('lawyer_id', __('担当弁護士')) ?></th>
                        <td><?= $this->Form->control('lawyer_id', ['options' => $users, 'empty' => true, 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <th><?= $this->Form->label('case_role_kbn', __('役割区分')) ?></th>
                        <td><?= $this->Form->control('case_role_kbn', ['options' => $case_role_kbns, 'empty' => 'Select Case_role_kbn', 'label' => false]) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?= $this->Form->hidden('case_id', ['value' => $caseId]) ?></td>
                    </tr>
                </table>
                <div class="detail-actions">
                    <?= $this->Form->button(__('Submit'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>