<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consultation $consultation
 * @var \Cake\Collection\CollectionInterface|string[] $clients
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('Edit Consultation') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($consultation) ?>
                <fieldset>
                    <legend><?= __('Edit Consultation') ?></legend>
                    <?php
                        echo $this->Form->control('consultation_name');
                        echo $this->Form->control('consultation_at', ['empty' => true]);
                        echo $this->Form->control('consultation_content');
                        echo $this->Form->control('consultation_kbn',['options'=>$consultation_kbns,'empty'=>'Select Consultation_kbn']);
                        echo $this->Form->control('creator_id');
                        echo $this->Form->control('created_at', ['empty' => true]);
                        echo $this->Form->control('updater_id');
                        echo $this->Form->control('updated_at');
                    ?>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('Submit'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

