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
    </aside>
    <div class="column column-80">
        <div class="advisorConsultations form content">
            <?= $this->Form->create($advisorConsultation) ?>
            <fieldset>
                <legend><?= __('顧問相談寧陽編集') ?></legend>
                <?php
                    echo $this->Form->control('相談名');
                    echo $this->Form->control('相談日', ['empty' => true]);
                    echo $this->Form->control('相談内容');
                    echo $this->Form->control('顧客名', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('担当弁護士');
                    echo $this->Form->control('担当パラリーガル');
                    echo $this->Form->control('顧問契約', ['options' => $advisorContracts, 'empty' => true]);
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
