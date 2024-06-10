<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Stakeholder $stakeholder
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Stakeholders'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="stakeholders form content">
            <?= $this->Form->create($stakeholder) ?>
            <fieldset>
                <legend><?= __('Add Stakeholder') ?></legend>
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
                    echo $this->Form->control('client');
                    echo $this->Form->control('opponent');
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
