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
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Case Assignees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="caseAssignees form content">
            <?= $this->Form->create($caseAssignee) ?>
            <fieldset>
                <legend><?= __('Add Case Assignee') ?></legend>
                <?php
                    echo $this->Form->control('lawyer_id', ['options' => $users, 'empty' => true, 'label' => 'Lawyer']);
                    echo $this->Form->control('case_role_kbn');
                    echo $this->Form->hidden('case_id', ['value' => $caseId]);
                    // creator_id と updater_id は setAuditFields メソッドで自動設定されるため、フォームで入力する必要はなし
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
