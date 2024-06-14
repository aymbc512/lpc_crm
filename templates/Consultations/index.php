<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Consultation> $consultations
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">Consultations</div>
        </div>
    </div>
    <div class="overlap">
        <div class="search-container">
            <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search'], 'class' => 'search-form']) ?>
            <fieldset>
                <?= $this->Form->control('client_name', ['label' => false, 'placeholder' => '顧客名', 'value' => $this->request->getQuery('client_name'), 'class' => 'search-input']) ?>
                <?= $this->Form->control('consultation_name', ['label' => false,'placeholder' => '相談名', 'value' => $this->request->getQuery('consultation_name'), 'class' => 'search-input']) ?>
            </fieldset>
            <div class="button-group">
            <?= $this->Html->link(__('絞込解除'), ['action' => 'index'], ['class' => 'clear-link']) ?>
                <?= $this->Form->button(__('Search'), ['class' => 'search-button']) ?>
                
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
                        <th><?= $this->Paginator->sort('consultations_id') ?></th>
                        <th><?= $this->Paginator->sort('consultation_name') ?></th>
                        <th><?= $this->Paginator->sort('consultation_at') ?></th>
                        <th><?= $this->Paginator->sort('client_id') ?></th>
                        <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                        <th><?= $this->Paginator->sort('creator_id') ?></th>
                        <th><?= $this->Paginator->sort('created_at') ?></th>
                        <th><?= $this->Paginator->sort('updater_id') ?></th>
                        <th><?= $this->Paginator->sort('updated_at') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($consultations as $consultation): ?>
                    <tr>
                        <td><?= $this->Html->link($consultation->consultations_id, ['action' => 'view', $consultation->consultations_id]) ?></td>
                        <td><?= h($consultation->consultation_name) ?></td>
                        <td><?= h($consultation->consultation_at) ?></td>
                        <td><?= $consultation->hasValue('client') ? $this->Html->link($consultation->client->name, ['controller' => 'Clients', 'action' => 'view', $consultation->client->client_id]) : '' ?></td>
                        <td><?= h($consultation->lawyer_id) ?></td>
                        <td><?= h($consultation->creator_id) ?></td>
                        <td><?= h($consultation->created_at) ?></td>
                        <td><?= $consultation->hasValue('user') ? $this->Html->link($consultation->user->user_id, ['controller' => 'Users', 'action' => 'view', $consultation->user->user_id]) : '' ?></td>
                        <td><?= h($consultation->updated_at) ?></td>
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
