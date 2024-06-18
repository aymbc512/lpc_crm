<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">顧客情報編集</div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($client) ?>
                <fieldset>
                    <legend><?= __($client->name) ?></legend>
                    <table class="detail-table">
                    <?php
                        echo $this->Form->control('名前');
                        echo $this->Form->control('郵便番号');
                        echo $this->Form->control('都道府県');
                        echo $this->Form->control('市');
                        echo $this->Form->control('区町村');
                        echo $this->Form->control('以下住所');
                        echo $this->Form->control('電話番号');
                        echo $this->Form->control('メールアドレス');
                        echo $this->Form->control('関係者区分');
                        echo $this->Form->control('client', ['type' => 'hidden', 'value' => 1]);
                        echo $this->Form->control('opponent', ['type' => 'hidden', 'value' => 0]);
                        echo $this->Form->control('主任弁護士');
                        echo $this->Form->control('備考');
                        // echo $this->Form->control('creator_id');
                        // echo $this->Form->control('created_at', ['empty' => true]);
                        // echo $this->Form->control('updater_id', ['options' => $users, 'empty' => true]);
                        // echo $this->Form->control('updated_at');
                    ?>
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
