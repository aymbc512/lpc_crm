
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

<div class="row">
    <aside class="column">
     
    </aside>
    <div class="column column-80">
        <div class="caseAssignees form content">
            <?= $this->Form->create($caseAssignee) ?>
            <fieldset>
                <legend><?= __('新規案件担当者登録') ?></legend>
                <?php
                    echo $this->Form->control('従業員ID', ['options' => $users, 'empty' => true, ]);
                    echo $this->Form->control('役割', ['options'=>$case_role_kbns,'empty' => true,]);
                    echo $this->Form->control('案件ID', ['type' => 'hidden']);
                  
                ?>
            </fieldset>
            <?= $this->Form->button(__('保存')) ?>
            <?= $this->Form->end() ?>
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