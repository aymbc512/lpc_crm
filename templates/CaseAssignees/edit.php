<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CaseAssignee $caseAssignee
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $cases
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $caseAssignee->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $caseAssignee->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Case Assignees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="caseAssignees form content">
            <?= $this->Form->create($caseAssignee) ?>
            <fieldset>
                <legend><?= __('Edit Case Assignee') ?></legend>
                <?php
                    echo $this->Form->control('lawyer_id', ['options' => $users, 'empty' => true, 'label' => 'Lawyer']);
                    echo $this->Form->control('case_role_kbn',['options'=>$case_role_kbns,'empty'=>'Select Case_role_kbn']);
                    echo $this->Form->control('case_id', ['options' => $cases, 'empty' => true]);
                    // creator_id と updater_id は setAuditFields メソッドで自動設定されるため、フォームで入力する必要はなし
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
