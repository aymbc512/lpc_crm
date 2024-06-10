<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CaseAssignee> $caseAssignees
 */
?>
<div class="caseAssignees index content">
    <?= $this->Html->link(__('New Case Assignee'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Case Assignees') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('case_assignees') ?></th>
                    <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                    <th><?= $this->Paginator->sort('case_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($caseAssignees as $caseAssignee): ?>
                <tr>
                    <td><?= $this->Number->format($caseAssignee->case_assignees) ?></td>
                    <td><?= h($caseAssignee->lawyer_id) ?></td>
                    <td><?= $caseAssignee->hasValue('case') ? $this->Html->link($caseAssignee->case->case_id, ['controller' => 'Cases', 'action' => 'view', $caseAssignee->case->case_id]) : '' ?></td>
                    <td><?= h($caseAssignee->creator_id) ?></td>
                    <td><?= h($caseAssignee->created_at) ?></td>
                    <td><?= $caseAssignee->hasValue('user') ? $this->Html->link($caseAssignee->user->user_id, ['controller' => 'Users', 'action' => 'view', $caseAssignee->user->user_id]) : '' ?></td>
                    <td><?= h($caseAssignee->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $caseAssignee->case_assignees]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $caseAssignee->case_assignees]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $caseAssignee->case_assignees], ['confirm' => __('Are you sure you want to delete # {0}?', $caseAssignee->case_assignees)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
