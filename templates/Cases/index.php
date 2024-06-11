<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $cases
 */
?>
<div class="cases index content">
    <?= $this->Html->link(__('New Case'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Cases') ?></h3>

    <!-- 検索フォーム -->
    <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search']]) ?>
    <fieldset>
        <?= $this->Form->control('customer_name', ['label' => 'Customer Name', 'value' => $this->request->getQuery('customer_name')]) ?>
        <?= $this->Form->control('case_name', ['label' => 'Case Name', 'value' => $this->request->getQuery('case_name')]) ?>
    </fieldset>
    <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->button(__('Clear'), [
        'type' => 'button', 
        'class' => 'btn btn-secondary ml-2', 
        'onclick' => 'location.href=\'' . $this->Url->build(['action' => 'index']) . '\''
    ]) ?>
    <?= $this->Form->end() ?>

    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('case_id') ?></th>
                    <th><?= $this->Paginator->sort('case_name') ?></th>
                    <th><?= $this->Paginator->sort('customer_id') ?></th>
                    <th><?= $this->Paginator->sort('opponent_id') ?></th>
                    <th><?= $this->Paginator->sort('case_content') ?></th>
                    <th><?= $this->Paginator->sort('start_at') ?></th>
                    <th><?= $this->Paginator->sort('expected_end_at') ?></th>
                    <th><?= $this->Paginator->sort('end_at') ?></th>
                    <th><?= $this->Paginator->sort('consultations_id') ?></th>
                    <th><?= $this->Paginator->sort('case_amount') ?></th>
                    <th><?= $this->Paginator->sort('goal_achievement_deadline_at') ?></th>
                    <th><?= $this->Paginator->sort('advisor_consultation_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cases as $case): ?>
                <tr>
                    <td><?= $this->Number->format($case->case_id) ?></td>
                    <td><?= h($case->case_name) ?></td>
                    <td><?= $case->hasValue('customer') ? $this->Html->link($case->customer->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->customer->stakeholder_id]) : '' ?></td>
                    <td><?= $case->hasValue('opponent') ? $this->Html->link($case->opponent->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->opponent->stakeholder_id]) : '' ?></td>
                    <td><?= h($case->case_content) ?></td>
                    <td><?= h($case->start_at) ?></td>
                    <td><?= h($case->expected_end_at) ?></td>
                    <td><?= h($case->end_at) ?></td>
                    <td><?= $case->hasValue('consultation') ? $this->Html->link($case->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $case->consultation->consultations_id]) : '' ?></td>
                    <td><?= $case->case_amount === null ? '' : $this->Number->format($case->case_amount) ?></td>
                    <td><?= h($case->goal_achievement_deadline_at) ?></td>
                    <td><?= $case->hasValue('advisor_consultation') ? $this->Html->link($case->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $case->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                    <td><?= h($case->creator_id) ?></td>
                    <td><?= h($case->created_at) ?></td>
                    <td><?= h($case->updater_id) ?></td>
                    <td><?= h($case->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $case->case_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $case->case_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $case->case_id], ['confirm' => __('Are you sure you want to delete # {0}?', $case->case_id)]) ?>
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
