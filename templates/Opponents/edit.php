<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Opponent $opponent
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <div class="column column-80">
        <div class="opponents form content">
            <?= $this->Form->create($opponent) ?>
            <fieldset>
                <legend><?= __('対立相手情報編集') ?></legend>
                <?php
                    echo $this->Form->control('名前');
                    echo $this->Form->control('郵便番号');
                    echo $this->Form->control('都道府県');
                    echo $this->Form->control('市');
                    echo $this->Form->control('区町村');
                    echo $this->Form->control('以下住所');
                    echo $this->Form->control('電話番号');
                    echo $this->Form->control('メールアドレス');
                    echo $this->Form->control('関係者区分',['type' => 'select','options'=>$stakeholder_kbns,'empty'=>'Select Stakeholder_kbn']);
                    echo $this->Form->control('顧客', ['type' => 'hidden', 'value' => 0]);
                    echo $this->Form->control('対立相手', ['type' => 'hidden', 'value' => 1]);
                    echo $this->Form->control('主任弁護士');
                    echo $this->Form->control('備考');
                    echo $this->Form->control('作成者');
                    echo $this->Form->control('作成日', ['empty' => true]);
                    echo $this->Form->control('更新者', [ 'empty' => true]);
                    echo $this->Form->control('更新日');
                ?>
            </fieldset>
            <?= $this->Form->button(__('保存')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
