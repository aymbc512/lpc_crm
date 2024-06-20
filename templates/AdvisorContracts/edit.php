<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\AdvisorContract $advisorContract
 * @var string[]|\Cake\Collection\CollectionInterface $stakeholders
 * @var string[]|\Cake\Collection\CollectionInterface $consultations
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
    </aside>
    <div class="column column-80">
        <div class="advisorContracts form content">
            <?= $this->Form->create($advisorContract) ?>
            <fieldset>
                <legend><?= __('顧問契約内容編集') ?></legend>
                <?php
                    echo $this->Form->control('顧客名', ['options' => $clients, 'empty' => true]);
                    echo $this->Form->control('顧問開始日', ['empty' => true]);
                    echo $this->Form->control('顧問終了日', ['empty' => true]);
                    echo $this->Form->control('顧問費用');
                    echo $this->Form->control('顧問内容');
                    echo $this->Form->control('相談', ['options' => $consultations, 'empty' => true]);
                    echo $this->Form->control('初回契約日', ['empty' => true]);
                    echo $this->Form->control('初回相談日', ['empty' => true]);
                    echo $this->Form->control('支払日', ['empty' => true]);
                    echo $this->Form->control('支払方法区分',['options'=>$payment_methods,'empty'=>'select payment_method']);
                    echo $this->Form->control('担当弁護士');
                    echo $this->Form->control('担当パラリーガル');
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
