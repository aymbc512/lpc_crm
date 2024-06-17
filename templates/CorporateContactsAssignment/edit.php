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
    </aside>
    <div class="column column-80">
        <div class="corporateContactsAssignment form content">
            <?= $this->Form->create($corporateContactsAssignment) ?>
            <fieldset>
                <legend><?= __('法人連絡担当者割り当て編集') ?></legend>
                <?php
                    echo $this->Form->control('割り当て区分');
                    echo $this->Form->control('割り当て区分', ['options' => $corporateContacts, 'empty' => true]);
                    echo $this->Form->control('案件', ['options' => $cases, 'empty' => true]);
                    echo $this->Form->control('相談', ['options' => $consultations, 'empty' => true]);
                    echo $this->Form->control('顧問相談', ['options' => $advisorConsultations, 'empty' => true]);
                    // echo $this->Form->control('creator_id');
                    // echo $this->Form->control('created_at', ['empty' => true]);
                    // echo $this->Form->control('updater_id', ['options' => $users, 'empty' => true]);
                    // echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('保存')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
