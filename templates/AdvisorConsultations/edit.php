<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorConsultation $advisorConsultation
 * @var string[]|\Cake\Collection\CollectionInterface $stakeholders
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $advisorContracts
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $advisorConsultation->advisor_consultations_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $advisorConsultation->advisor_consultations_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Advisor Consultations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="advisorConsultations form content">
            <?= $this->Form->create($advisorConsultation) ?>
            <fieldset>
                <legend><?= __('Edit Advisor Consultation') ?></legend>
                <?php
                    echo $this->Form->control('consultation_name');
                    echo $this->Form->control('consultation_at', ['empty' => true]);
                    echo $this->Form->control('consultation_content');
                    echo $this->Form->control('customer_id', ['options' => $stakeholders, 'empty' => true]);
                    echo $this->Form->control('lawyer_id');
                    echo $this->Form->control('advisor_contract_id', ['options' => $advisorContracts, 'empty' => true]);
                    echo $this->Form->control('paralegal_id');
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
