<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Opponent $opponent
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Opponents'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="opponents form content">
            <?= $this->Form->create($opponent) ?>
            <fieldset>
                <legend><?= __('Add Opponent') ?></legend>
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
                    echo $this->Form->control('client', ['type' => 'hidden', 'value' => 0]);
                    echo $this->Form->control('opponent', ['type' => 'hidden', 'value' => 1]);
                    echo $this->Form->control('lawyer_id');
                    echo $this->Form->control('stakeholder_remarks');
                    echo $this->Form->control('creator_id');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updater_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('updated_at');
                    echo $this->Form->hidden('redirect', ['value' => $this->request->getQuery('redirect')]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
