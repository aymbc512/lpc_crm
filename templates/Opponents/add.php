<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Opponent $opponent
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="desktop detail-view">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('対立相手追加') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($opponent) ?>
                <fieldset>
                    <table class="detail-table">
                        <tr>
                            <th><?= $this->Form->label('名前') ?></th>
                            <td><?= $this->Form->control('名前', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('郵便番号') ?></th>
                            <td><?= $this->Form->control('郵便番号', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('都道府県') ?></th>
                            <td><?= $this->Form->control('都道府県', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('市') ?></th>
                            <td><?= $this->Form->control('市', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('区町村') ?></th>
                            <td><?= $this->Form->control('区町村', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('以下住所') ?></th>
                            <td><?= $this->Form->control('以下住所', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('電話番号') ?></th>
                            <td><?= $this->Form->control('電話番号', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('メールアドレス') ?></th>
                            <td><?= $this->Form->control('メールアドレス', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('関係者区分') ?></th>
                            <td><?= $this->Form->control('関係者区分', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('主任弁護士') ?></th>
                            <td><?= $this->Form->control('主任弁護士', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('備考') ?></th>
                            <td><?= $this->Form->control('備考', ['label' => false]) ?></td>
                        </tr>
                    </table>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('保存'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
