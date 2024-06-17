<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorContract $advisorContract
 * @var \Cake\Collection\CollectionInterface|string[] $stakeholders
 * @var \Cake\Collection\CollectionInterface|string[] $consultations
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Advisor Contracts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="advisorContracts form content">
            <?= $this->Form->create($advisorContract) ?>
            <fieldset>
                <legend><?= __('新規顧問契約登録') ?></legend>
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
                    // echo $this->Form->control('creator_id');
                    // echo $this->Form->control('created_at', ['empty' => true]);
                    // echo $this->Form->control('updater_id', ['empty' => true]);
                    // echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('保存')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
