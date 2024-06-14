<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\AdvisorContract> $advisorContracts
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">Advisor Contracts</div>
        </div>
    </div>
    <div class="overlap">
        <div class="search-container">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search'], 'class' => 'search-form']) ?>
            <?= $this->Form->control('name', ['label' => false, 'value' => $this->request->getQuery('name'), 'placeholder' => 'Customer', 'class' => 'search-input']) ?>
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
                        <th><?= $this->Paginator->sort('advisor_contracts_id') ?></th>
                        <th><?= $this->Paginator->sort('customer_id') ?></th>
                        <th><?= $this->Paginator->sort('advisor_start_at') ?></th>
                        <th><?= $this->Paginator->sort('advisor_end_at') ?></th>
                        <th><?= $this->Paginator->sort('advisor_fee') ?></th>
                        <th><?= $this->Paginator->sort('consultation_id') ?></th>
                        <th><?= $this->Paginator->sort('initial_contract_at') ?></th>
                        <!-- <th><?= $this->Paginator->sort('initial_consultation_at') ?></th> -->
                        <th><?= $this->Paginator->sort('payment_at') ?></th>
                        <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                        <th><?= $this->Paginator->sort('paralegal_id') ?></th>
                        <!-- <th><?= $this->Paginator->sort('creator_id') ?></th>
                        <th><?= $this->Paginator->sort('created_at') ?></th>
                        <th><?= $this->Paginator->sort('updater_id') ?></th>
                        <th><?= $this->Paginator->sort('updated_at') ?></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($advisorContracts as $advisorContract): ?>
                    <tr>
                        <td><?= $this->Html->link($advisorContract->advisor_contracts_id, ['action' => 'view', $advisorContract->advisor_contracts_id]) ?></td>
                        <td><?= $advisorContract->hasValue('client') ? $this->Html->link($advisorContract->client->name, ['controller' => 'Clients', 'action' => 'view', $advisorContract->client->stakeholder_id]) : '' ?></td>
                        <td><?= h($advisorContract->advisor_start_at) ?></td>
                        <td><?= h($advisorContract->advisor_end_at) ?></td>
                        <td><?= $advisorContract->advisor_fee === null ? '' : $this->Number->format($advisorContract->advisor_fee) ?></td>
                        <td><?= $advisorContract->hasValue('consultation') ? $this->Html->link($advisorContract->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $advisorContract->consultation->consultations_id]) : '' ?></td>
                        <td><?= h($advisorContract->initial_contract_at) ?></td>
                        <!-- <td><?= h($advisorContract->initial_consultation_at) ?></td> -->
                        <td><?= h($advisorContract->payment_at) ?></td>
                        <td><?= h($advisorContract->lawyer_id) ?></td>
                        <td><?= h($advisorContract->paralegal_id) ?></td>
                        <!-- <td><?= h($advisorContract->creator_id) ?></td>
                        <td><?= h($advisorContract->created_at) ?></td>
                        <td><?= $advisorContract->hasValue('user') ? $this->Html->link($advisorContract->user->user_id, ['controller' => 'Users', 'action' => 'view', $advisorContract->user->user_id]) : '' ?></td>
                        <td><?= h($advisorContract->updated_at) ?></td> -->
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
