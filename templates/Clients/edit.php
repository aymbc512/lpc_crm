<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $client->stakeholder_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $client->stakeholder_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clients form content">
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
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
