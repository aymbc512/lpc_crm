<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Consultation> $consultations
 */
?>
<div class="consultations index content">
    <?= $this->Html->link(__('New Consultation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Consultations') ?></h3>

    <!-- 検索フォーム -->
    <?= $this->Form->create(null, ['type' => 'get', 'url' => ['action' => 'search']]) ?>
    <fieldset>
        <?= $this->Form->control('client_name', ['label' => 'Client Name', 'value' => $this->request->getQuery('client_name')]) ?>
        <?= $this->Form->control('consultation_name', ['label' => 'Consultation Name', 'value' => $this->request->getQuery('consultation_name')]) ?>
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
                    <th><?= $this->Paginator->sort('consultations_id') ?></th>
                    <th><?= $this->Paginator->sort('consultation_name') ?></th>
                    <th><?= $this->Paginator->sort('consultation_at') ?></th>
                    <th><?= $this->Paginator->sort('client_id') ?></th>
                    <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($consultations as $consultation): ?>
                <tr>
                    <td><?= $this->Number->format($consultation->consultations_id) ?></td>
                    <td><?= h($consultation->consultation_name) ?></td>
                    <td><?= h($consultation->consultation_at) ?></td>
                    <td><?= $consultation->hasValue('client') ? $this->Html->link($consultation->client->name, ['controller' => 'Clients', 'action' => 'view', $consultation->client->client_id]) : '' ?></td>
                    <td><?= h($consultation->lawyer_id) ?></td>
                    <td><?= h($consultation->creator_id) ?></td>
                    <td><?= h($consultation->created_at) ?></td>
                    <td><?= $consultation->hasValue('user') ? $this->Html->link($consultation->user->user_id, ['controller' => 'Users', 'action' => 'view', $consultation->user->user_id]) : '' ?></td>
                    <td><?= h($consultation->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $consultation->consultations_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $consultation->consultations_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $consultation->consultations_id], ['confirm' => __('Are you sure you want to delete # {0}?', $consultation->consultations_id)]) ?>
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
