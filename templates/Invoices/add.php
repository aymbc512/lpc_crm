<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var \Cake\Collection\CollectionInterface|string[] $cases
 * @var \Cake\Collection\CollectionInterface|string[] $stakeholders
 * @var \Cake\Collection\CollectionInterface|string[] $advisorContracts
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="invoices form content">
            <?= $this->Form->create($invoice) ?>
            <fieldset>
                <legend><?= __('Add Invoice') ?></legend>
                <?php
                    echo $this->Form->control('invoice_adress');
                    echo $this->Form->control('invoice_at', ['empty' => true]);
                    echo $this->Form->control('invoice_deadline_at', ['empty' => true]);
                    echo $this->Form->control('invoice_amount');
                    echo $this->Form->control('invoice_status_kbn');
                    echo $this->Form->control('invoice_creation_at', ['empty' => true]);
                    echo $this->Form->control('invoice_updated_at', ['empty' => true]);
                    echo $this->Form->control('invoice_payment_at', ['empty' => true]);
                    echo $this->Form->control('case_id', ['options' => $cases, 'empty' => true]);
                    echo $this->Form->control('stakeholder_id', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('advisor_contract_id', ['options' => $advisorContracts, 'empty' => true, 'default' => $invoice->advisor_contract_id]);
                    echo $this->Form->control('creator_id', ['type' => 'hidden', 'value' => $invoice->creator_id]);
                    echo $this->Form->control('created_at', ['type' => 'hidden', 'value' => $invoice->created_at]);
                    echo $this->Form->control('updater_id', ['type' => 'hidden', 'value' => $invoice->updater_id]);
                    echo $this->Form->control('updated_at', ['type' => 'hidden', 'value' => $invoice->updated_at]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
