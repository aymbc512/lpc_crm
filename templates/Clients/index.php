<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Client> $clients
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">顧客一覧</div>
        </div>
    </div>
    <div class="overlap">
        <div class="search-container">
            <?= $this->Form->create(null, ['url' => ['action' => 'search'], 'type' => 'post', 'class' => 'search-form']) ?>
            <fieldset>
            <?= $this->Form->control('case_name', ['label' => false,'placeholder' => '案件名', 'class' => 'search-input']) ?>
                <?= $this->Form->control('name', ['label' => false, 'placeholder' => '顧客名','class' => 'search-input']) ?>
                <?= $this->Form->control('prefectures', ['label' => false, 'placeholder' => '都道府県','class' => 'search-input']) ?>
                <?= $this->Form->control('kuchouson', ['label' => false, 'placeholder' => '区町村','class' => 'search-input']) ?>
                <?= $this->Form->control('phone_number', ['label' =>false, 'placeholder' => '電話番号','class' => 'search-input']) ?>
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
                        <th><?= $this->Paginator->sort('顧客ID') ?></th>
                        <th><?= $this->Paginator->sort('名前') ?></th>
                        <th><?= $this->Paginator->sort('郵便番号') ?></th>
                        <th><?= $this->Paginator->sort('都道府県') ?></th>
                        <th><?= $this->Paginator->sort('市') ?></th>
                        <th><?= $this->Paginator->sort('区町村') ?></th>
                        <th><?= $this->Paginator->sort('以下住所') ?></th>
                        <th><?= $this->Paginator->sort('電話番号') ?></th>
                        <th><?= $this->Paginator->sort('メールアドレス') ?></th>
                        <th><?= $this->Paginator->sort('主任弁護士') ?></th>
                        <!-- <th><?= $this->Paginator->sort('creator_id') ?></th>
                        <th><?= $this->Paginator->sort('created_at') ?></th>
                        <th><?= $this->Paginator->sort('updater_id') ?></th>
                        <th><?= $this->Paginator->sort('updated_at') ?></th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($clients as $client): ?>
                    <tr>
                        <td><?= $this->Html->link($client->stakeholder_id, ['action' => 'view', $client->stakeholder_id]) ?></td>
                        <td><?= h($client->name) ?></td>
                        <td><?= $client->post_cd === null ? '' : $this->Number->format($client->post_cd) ?></td>
                        <td><?= h($client->prefectures) ?></td>
                        <td><?= h($client->city) ?></td>
                        <td><?= h($client->kuchouson) ?></td>
                        <td><?= h($client->adress_below) ?></td>
                        <td><?= $client->phone_number === null ? '' : $this->Number->format($client->phone_number) ?></td>
                        <td><?= h($client->email) ?></td>
                        <td><?= $client->hasValue('lawyer') ? $this->Html->link($client->lawyer->user_id, ['controller' => 'Users', 'action' => 'view', $client->lawyer->user_id]) : '' ?></th>
                         <!--<th><?= h($client->created_at) ?></th>
                        <th><?= $client->hasValue('updater') ? $this->Html->link($client->updater->user_name, ['controller' => 'Users', 'action' => 'view', $client->updater->user_id]) : '' ?></th>
                        <th><?= h($client->updated_at) ?></th>  -->
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
