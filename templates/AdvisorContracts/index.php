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
            <div class="text-wrapper-6">顧問契約一覧</div>
        </div>
    </div>
    <div class="overlap">
        <div class="search-container">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search'], 'class' => 'search-form']) ?>
            <?= $this->Form->control('name', ['label' => false, 'value' => $this->request->getQuery('name'), 'placeholder' => '顧客名', 'class' => 'search-input']) ?>
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
                        <th><?= $this->Paginator->sort('顧問契約ID') ?></th>
                        <th><?= $this->Paginator->sort('顧客名') ?></th>
                        <th><?= $this->Paginator->sort('顧問開始日') ?></th>
                        <th><?= $this->Paginator->sort('顧問終了日') ?></th>
                        <th><?= $this->Paginator->sort('顧問費用') ?></th>
                        <!-- <th><?= $this->Paginator->sort('相談') ?></th> -->
                        <!-- <th><?= $this->Paginator->sort('初回契約日') ?></th> -->
                        <!-- <th><?= $this->Paginator->sort('初回相談日') ?></th> -->
                        <th><?= $this->Paginator->sort('支払日') ?></th>
                        <th><?= $this->Paginator->sort('担当弁護士') ?></th>
                        <th><?= $this->Paginator->sort('担当パラリーガル') ?></th>
                        <!-- <th><?= $this->Paginator->sort('作成者') ?></th>
                        <th><?= $this->Paginator->sort('作成日') ?></th>
                        <th><?= $this->Paginator->sort('更新者') ?></th>
                        <th><?= $this->Paginator->sort('更新日') ?></th> -->
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
                        <!-- <td><?= $advisorContract->hasValue('consultation') ? $this->Html->link($advisorContract->consultation->consultations_id, ['controller' => 'Consultations', 'action' => 'view', $advisorContract->consultation->consultations_id]) : '' ?></td> -->
                        <!-- <td><?= h($advisorContract->initial_contract_at) ?></td> -->
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
            <?= $this->Paginator->first('<< ' . __('最初へ')) ?>
            <?= $this->Paginator->prev('< ' . __('前へ')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('次へ') . ' >') ?>
            <?= $this->Paginator->last(__('最後へ') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
