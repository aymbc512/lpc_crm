<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\InvoiceStatement $invoiceStatement
 * @var string[]|\Cake\Collection\CollectionInterface $invoices
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $invoiceStatement->invoice_statement_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $invoiceStatement->invoice_statement_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Invoice Statements'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="invoiceStatements form content">
            <?= $this->Form->create($invoiceStatement) ?>
            <fieldset>
                <legend><?= __('Edit Invoice Statement') ?></legend>
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
