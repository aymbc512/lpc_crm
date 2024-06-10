<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateContact $corporateContact
 * @var string[]|\Cake\Collection\CollectionInterface $stakeholders
 * @var string[]|\Cake\Collection\CollectionInterface $cases
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $corporateContact->corporate_contact_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContact->corporate_contact_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Corporate Contacts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="corporateContacts form content">
            <?= $this->Form->create($corporateContact) ?>
            <fieldset>
                <legend><?= __('Edit Corporate Contact') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phone_number');
                    echo $this->Form->control('corporate_contact_position_kbn');
                    echo $this->Form->control('corporate_contact_remarks');
                    echo $this->Form->control('stakeholder_id', ['options' => $stakeholders, 'empty' => true]);
                    echo $this->Form->control('case_id', ['options' => $cases, 'empty' => true]);
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
