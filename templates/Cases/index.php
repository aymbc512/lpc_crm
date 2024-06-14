<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\Cake\Datasource\EntityInterface> $cases
 */ 
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">Cases</div>
        </div>
    </div>
    <div class="overlap">
        <div class="search-container">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search'], 'class' => 'search-form']) ?>
            <fieldset>
            <?= $this->Form->control('customer_name', ['label' => false, 'value' => $this->request->getQuery('customer_name'), 'placeholder' => 'Customer Name', 'class' => 'search-input']) ?>
            <?= $this->Form->control('case_name', ['label' => false, 'value' => $this->request->getQuery('case_name'), 'placeholder' => 'Case Name', 'class' => 'search-input']) ?>
            </fieldset>
            <div class="button-group">
                <?= $this->Html->link(__('絞込解除'), ['action' => 'index'], ['class' => 'clear-link']) ?>
                <?= $this->Form->button(__('検索'), ['class' => 'search-button']) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
    <div class="div-wrapper">
        <?= $this->Html->link(__('追加'), ['action' => 'add'], ['class' => 'add-button']) ?>
    </div>
    <div class="frame">
        <div class="custom-table-container">
            <table class="custom-table">
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cases as $case): ?>
                    <tr>
                        <td><?= $this->Html->link($case->case_id, ['action' => 'view', $case->case_id]) ?></td>
                        <td><?= h($case->case_name) ?></td>
                        <td><?= $case->hasValue('customer') ? $this->Html->link($case->customer->name, ['controller' => 'Clients', 'action' => 'view', $case->customer->stakeholder_id]) : '' ?></td>
                        <td><?= $case->hasValue('opponent') ? $this->Html->link($case->opponent->name, ['controller' => 'Stakeholders', 'action' => 'view', $case->opponent->stakeholder_id]) : '' ?></td>
                        <td><?= h($case->case_content) ?></td>
                        <td><?= h($case->start_at) ?></td>
                        <td><?= h($case->expected_end_at) ?></td>
                        <td><?= h($case->end_at) ?></td>
                        <td><?= $case->hasValue('consultation') ? $this->Html->link($case->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $case->consultation->consultations_id]) : '' ?></td>
                        <td><?= $case->case_amount === null ? '' : $this->Number->format($case->case_amount) ?></td>
                        <td><?= h($case->goal_achievement_deadline_at) ?></td>
                        <td><?= $case->hasValue('advisor_consultation') ? $this->Html->link($case->advisor_consultation->advisor_consultations_id, ['controller' => 'AdvisorConsultations', 'action' => 'view', $case->advisor_consultation->advisor_consultations_id]) : '' ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
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

