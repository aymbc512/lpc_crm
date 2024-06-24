<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Invoice> $invoices
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">請求一覧</div>
        </div>
    </div>
    <div class="overlap">
        <div class="search-container">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search'], 'class' => 'search-form']) ?>
            <?= $this->Form->control('invoice_status_kbn', ['label' => false,'placeholder' => '請求状況区分',  'value' => $this->request->getQuery('invoice_status_kbn'),'class' => 'search-input']); ?>
            <div class="button-group">
                <?= $this->Html->link(__('絞込解除'), ['action' => 'index'], ['class' => 'clear-button']) ?>
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
                        <th><?= $this->Paginator->sort('請求ID') ?></th>
                        <th><?= $this->Paginator->sort('請求日') ?></th>
                        <th><?= $this->Paginator->sort('請求期限') ?></th>
                        <th><?= $this->Paginator->sort('請求金額') ?></th>
                        <th><?= $this->Paginator->sort('支払日') ?></th>
                        <th><?= $this->Paginator->sort('案件') ?></th>
                        <th><?= $this->Paginator->sort('顧客') ?></th>
                        <th><?= $this->Paginator->sort('顧問契約') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($invoices as $invoice): ?>
                    <tr>
                        <td><?= $this->Html->link($invoice->invoice_id, ['action' => 'view', $invoice->invoice_id]) ?></td>
                        <td><?= h($invoice->invoice_at) ?></td>
                        <td><?= h($invoice->invoice_deadline_at) ?></td>
                        <td><?= $invoice->invoice_amount === null ? '' : $this->Number->format($invoice->invoice_amount) ?></td>
                        <td><?= h($invoice->invoice_payment_at) ?></td>
                        <td><?= $invoice->hasValue('case') ? $this->Html->link($invoice->case->case_id, ['controller' => 'Cases', 'action' => 'view', $invoice->case->case_id]) : '' ?></td>
                        <td><?= $invoice->hasValue('client') ? $this->Html->link($invoice->client->name, ['controller' => 'Clients', 'action' => 'view', $invoice->client->stakeholder_id]) : '' ?></td>
                        <td><?= $invoice->hasValue('advisor_contract') ? $this->Html->link($invoice->advisor_contract->advisor_contracts_id, ['controller' => 'AdvisorContracts', 'action' => 'view', $invoice->advisor_contract->advisor_contracts_id]) : '' ?></td>

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
