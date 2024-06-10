<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $case
 * @var \Cake\Collection\CollectionInterface|string[] $customers
 * @var \Cake\Collection\CollectionInterface|string[] $opponents
 * @var \Cake\Collection\CollectionInterface|string[] $consultations
 * @var \Cake\Collection\CollectionInterface|string[] $advisorConsultations
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cases'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cases form content">
            <?= $this->Form->create($case) ?>
            <fieldset>
                <legend><?= __('Add Case') ?></legend>
                <?php
                    echo $this->Form->control('case_name');
                    echo $this->Form->control('case_kbn');
                    echo $this->Form->control('customer_id', ['options' => $customers, 'empty' => true]);
                    echo $this->Form->control('opponent_id', ['options' => $opponents, 'empty' => true]);
                    echo $this->Form->control('case_content');
                    echo $this->Form->control('memo');
                    echo $this->Form->control('start_at', ['empty' => true]);
                    echo $this->Form->control('expected_end_at', ['empty' => true]);
                    echo $this->Form->control('end_at', ['empty' => true]);
                    echo $this->Form->control('resolution_result');
                    echo $this->Form->control('consultations_id', ['options' => $consultations, 'empty' => true]);
                    echo $this->Form->control('case_goal');
                    echo $this->Form->control('case_amount');
                    echo $this->Form->control('goal_achievement_deadline_at', ['empty' => true]);
                    echo $this->Form->control('advisor_consultation_id', ['options' => $advisorConsultations, 'empty' => true]);
                    echo $this->Form->control('case_status_kbn');
                    echo $this->Form->control('creator_id');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updater_id');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
