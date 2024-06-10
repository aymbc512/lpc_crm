<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorConsultation $advisorConsultation
 * @var \Cake\Collection\CollectionInterface|string[] $stakeholders
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $advisorContracts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Advisor Consultations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="advisorConsultations form content">
            <?= $this->Form->create($advisorConsultation) ?>
            <fieldset>
                <legend><?= __('Add Advisor Consultation') ?></legend>
                <?php
                    echo $this->Form->control('consultation_name');
                    echo $this->Form->control('consultation_at', ['empty' => true]);
                    echo $this->Form->control('consultation_content');
                    echo $this->Form->control('customer_id', ['options' => $stakeholders, 'empty' => true]);
                    echo $this->Form->control('lawyer_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('advisor_contract_id', ['type' => 'hidden']);
                    echo $this->Form->control('paralegal_id', ['options' => $users, 'empty' => true]);
                    // creator_id, updater_id, created_at, updated_at are set automatically, so no need to display them
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
