<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceStatement $invoiceStatement
 * @var \Cake\Collection\CollectionInterface|string[] $invoices
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Invoice Statements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="invoiceStatements form content">
            <?= $this->Form->create($invoiceStatement) ?>
            <fieldset>
                <legend><?= __('Add Invoice Statement') ?></legend>
                <?php
                    echo $this->Form->control('invoice_statement_item');
                    echo $this->Form->control('invoice_statement_amount');
                    echo $this->Form->control('invoice_statement_tax');
                    echo $this->Form->control('invoice_id', ['options' => $invoices, 'empty' => true]);
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
