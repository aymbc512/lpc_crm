<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorConsultation $advisorConsultation
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $advisorContracts
 */
?>
<div class="row">
    <aside class="column">
     
    </aside>
    <div class="column column-80">
        <div class="advisorConsultations form content">
            <?= $this->Form->create($advisorConsultation) ?>
            <fieldset>
                <legend><?= __('新規顧問相談登録') ?></legend>
                <?php
                    echo $this->Form->control('相談名');
                    echo $this->Form->control('相談日', ['empty' => true]);
                    echo $this->Form->control('相談内容');
                    echo $this->Form->control('顧客名', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('担当弁護士', ['options' => $lawyers, 'empty' => true]);
                    echo $this->Form->control('担当パラリーガル', ['options' => $paralegals, 'empty' => true]);
                    echo $this->Form->control('顧問契約', ['type' => 'hidden']);
                    // creator_id, updater_id, created_at, updated_at are set automatically, so no need to display them
                ?>
            </fieldset>
            <?= $this->Form->button(__('保存')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
