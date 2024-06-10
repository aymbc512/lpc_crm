<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorContract $advisorContract
 * @var string[]|\Cake\Collection\CollectionInterface $stakeholders
 * @var string[]|\Cake\Collection\CollectionInterface $consultations
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $advisorContract->advisor_contracts_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $advisorContract->advisor_contracts_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Advisor Contracts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="advisorContracts form content">
            <?= $this->Form->create($advisorContract) ?>
            <fieldset>
                <legend><?= __('Edit Advisor Contract') ?></legend>
                <?php
                    echo $this->Form->control('customer_id', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('advisor_start_at', ['empty' => true]);
                    echo $this->Form->control('advisor_end_at', ['empty' => true]);
                    echo $this->Form->control('advisor_fee');
                    echo $this->Form->control('advisor_content');
                    echo $this->Form->control('consultation_id', ['options' => $consultations, 'empty' => true]);
                    echo $this->Form->control('initial_contract_at', ['empty' => true]);
                    echo $this->Form->control('initial_consultation_at', ['empty' => true]);
                    echo $this->Form->control('payment_at', ['empty' => true]);
                    echo $this->Form->control('payment_method_kbn');
                    echo $this->Form->control('lawyer_id');
                    echo $this->Form->control('paralegal_id');
                    echo $this->Form->control('creator_id');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updater_id', ['empty' => true]);
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
