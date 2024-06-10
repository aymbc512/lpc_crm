<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Consultation $consultation
 * @var \Cake\Collection\CollectionInterface|string[] $stakeholders
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Consultations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="consultations form content">
            <?= $this->Form->create($consultation) ?>
            <fieldset>
                <legend><?= __('Add Consultation') ?></legend>
                <?php
                    echo $this->Form->control('consultation_name');
                    echo $this->Form->control('consultation_at', ['empty' => true]);
                    echo $this->Form->control('consultation_content');
                    
                    // Stakeholder検索
                    echo $this->Form->control('stakeholder_search', [
                        'label' => 'Stakeholder',
                        'type' => 'text',
                        'onchange' => 'this.form.submit()'
                    ]);
                    if (!empty($stakeholders)) {
                        echo $this->Form->control('stakeholder_id', [
                            'options' => $stakeholders,
                            'empty' => true
                        ]);
                    }

                    // Lawyer検索
                    echo $this->Form->control('lawyer_search', [
                        'label' => 'Lawyer',
                        'type' => 'text',
                        'onchange' => 'this.form.submit()'
                    ]);
                    if (!empty($users)) {
                        echo $this->Form->control('lawyer_id', [
                            'options' => $users,
                            'empty' => true
                        ]);
                    }

                    echo $this->Form->control('consultation_kbn');
                    echo $this->Form->control('creator_id');
                    echo $this->Form->control('created_at', ['empty' => true]);
                    echo $this->Form->control('updater_id');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
