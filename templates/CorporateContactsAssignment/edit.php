<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CorporateContactsAssignment $corporateContactsAssignment
 * @var string[]|\Cake\Collection\CollectionInterface $corporateContacts
 * @var string[]|\Cake\Collection\CollectionInterface $cases
 * @var string[]|\Cake\Collection\CollectionInterface $consultations
 * @var string[]|\Cake\Collection\CollectionInterface $advisorConsultations
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $corporateContactsAssignment->corporate_contact_assignment_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $corporateContactsAssignment->corporate_contact_assignment_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Corporate Contacts Assignment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="corporateContactsAssignment form content">
            <?= $this->Form->create($corporateContactsAssignment) ?>
            <fieldset>
                <legend><?= __('Edit Corporate Contacts Assignment') ?></legend>
                <?php
                    echo $this->Form->control('assignment_kbn');
                    echo $this->Form->control('corporate_contact_id', ['options' => $corporateContacts, 'empty' => true]);
                    echo $this->Form->control('case_id', ['options' => $cases, 'empty' => true]);
                    echo $this->Form->control('consultation_id', ['options' => $consultations, 'empty' => true]);
                    echo $this->Form->control('advisor_consultation_id', ['options' => $advisorConsultations, 'empty' => true]);
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
