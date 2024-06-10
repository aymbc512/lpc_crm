<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CaseAssignee $caseAssignee
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Case Assignee'), ['action' => 'edit', $caseAssignee->case_assignees], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Case Assignee'), ['action' => 'delete', $caseAssignee->case_assignees], ['confirm' => __('Are you sure you want to delete # {0}?', $caseAssignee->case_assignees), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Case Assignees'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Case Assignee'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="caseAssignees view content">
            <h3><?= h($caseAssignee->case_assignees) ?></h3>
            <table>
                <tr>
                    <th><?= __('Lawyer Id') ?></th>
                    <td><?= h($caseAssignee->lawyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Case') ?></th>
                    <td><?= $caseAssignee->hasValue('case') ? $this->Html->link($caseAssignee->case->case_id, ['controller' => 'Cases', 'action' => 'view', $caseAssignee->case->case_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($caseAssignee->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $caseAssignee->hasValue('user') ? $this->Html->link($caseAssignee->user->user_id, ['controller' => 'Users', 'action' => 'view', $caseAssignee->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Case Assignees') ?></th>
                    <td><?= $this->Number->format($caseAssignee->case_assignees) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($caseAssignee->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($caseAssignee->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Case Role Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($caseAssignee->case_role_kbn)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
