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
            <div class="text-wrapper-6"><?= h($client->name) ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($client) ?>
                <fieldset>
                    <legend><?= __('Edit Client') ?></legend>
                    <?php
                        echo $this->Form->control('name');
                        echo $this->Form->control('post_cd');
                        echo $this->Form->control('prefectures');
                        echo $this->Form->control('city');
                        echo $this->Form->control('kuchouson');
                        echo $this->Form->control('adress_below');
                        echo $this->Form->control('phone_number');
                        echo $this->Form->control('email');
                        echo $this->Form->control('stakeholder_kbn');
                        echo $this->Form->control('client', ['type' => 'hidden', 'value' => 1]);
                        echo $this->Form->control('opponent', ['type' => 'hidden', 'value' => 0]);
                        echo $this->Form->control('lawyer_id');
                        echo $this->Form->control('stakeholder_remarks');
                        echo $this->Form->control('creator_id');
                        echo $this->Form->control('created_at', ['empty' => true]);
                        echo $this->Form->control('updater_id', ['options' => $users, 'empty' => true]);
                        echo $this->Form->control('updated_at');
                    ?>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('Submit'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
