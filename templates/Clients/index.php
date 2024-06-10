<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Client> $clients
 */
?>
<div class="clients index content">
    <?= $this->Form->create(null, ['url' => ['action' => 'search'], 'type' => 'post']) ?>
    <fieldset>
　　　　<!-- 検索フォーム -->
        <legend><?= __('Search Clients') ?></legend>
        <?= $this->Form->control('case_name', ['label' => '案件名']) ?>
        <?= $this->Form->control('name', ['label' => '顧客名']) ?>
        <?= $this->Form->control('prefectures', ['label' => '都道府県']) ?>
        <?= $this->Form->control('kuchouson', ['label' => '区町村']) ?>
        <?= $this->Form->control('phone_number', ['label' => '電話番号']) ?>
    </fieldset>
    <?= $this->Form->button(__('検索')) ?>
    <?= $this->Html->link('絞込解除', ['action' => 'index'], ['class' => 'button']) ?>
    <?= $this->Form->end() ?>

    <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Clients') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('stakeholder_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('post_cd') ?></th>
                    <th><?= $this->Paginator->sort('prefectures') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('kuchouson') ?></th>
                    <th><?= $this->Paginator->sort('adress_below') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clients as $client): ?>
                <tr>
                    <td><?= $this->Number->format($client->stakeholder_id) ?></td>
                    <td><?= h($client->name) ?></td>
                    <td><?= $client->post_cd === null ? '' : $this->Number->format($client->post_cd) ?></td>
                    <td><?= h($client->prefectures) ?></td>
                    <td><?= h($client->city) ?></td>
                    <td><?= h($client->kuchouson) ?></td>
                    <td><?= h($client->adress_below) ?></td>
                    <td><?= $client->phone_number === null ? '' : $this->Number->format($client->phone_number) ?></td>
                    <td><?= h($client->email) ?></td>
                    <td><?= h($client->lawyer_id) ?></td>
                    <td><?= h($client->creator_id) ?></td>
                    <td><?= h($client->created_at) ?></td>
                    <td><?= $client->hasValue('user') ? $this->Html->link($client->user->user_id, ['controller' => 'Users', 'action' => 'view', $client->user->user_id]) : '' ?></td>
                    <td><?= h($client->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $client->stakeholder_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $client->stakeholder_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $client->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->stakeholder_id)]) ?>
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
