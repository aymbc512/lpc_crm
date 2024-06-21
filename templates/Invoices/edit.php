<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Invoice $invoice
 * @var string[]|\Cake\Collection\CollectionInterface $cases
 * @var string[]|\Cake\Collection\CollectionInterface $stakeholders
 * @var string[]|\Cake\Collection\CollectionInterface $advisorContracts
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoice->invoice_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoice->invoice_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Invoices'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="invoices form content">
            <?= $this->Form->create($invoice) ?>
            <fieldset>
                <legend><?= __('Edit Invoice') ?></legend>
                <?php
                    echo $this->Form->control('invoice_adress');
                    echo $this->Form->control('invoice_at', ['empty' => true]);
                    echo $this->Form->control('invoice_deadline_at', ['empty' => true]);
                    echo $this->Form->control('invoice_amount');
                    echo $this->Form->control('invoice_status_kbn',['options'=>$invoice_status_kbns,'empty'=>'Select Invoice_status_kbn']);
                    echo $this->Form->control('invoice_creation_at', ['empty' => true]);
                    echo $this->Form->control('invoice_updated_at', ['empty' => true]);
                    echo $this->Form->control('invoice_payment_at', ['empty' => true]);
                    echo $this->Form->control('case_id', ['options' => $cases, 'empty' => true]);
                    echo $this->Form->control('stakeholder_id', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('advisor_contracts_id', ['options' => $advisorContracts, 'empty' => true]);
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
