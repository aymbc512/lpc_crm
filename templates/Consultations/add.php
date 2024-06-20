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
            <div class="text-wrapper-6"><?= __('新規相談登録') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($consultation) ?>
                <fieldset>
                    <table class="form-table">
                        <tr>
                            <th><?= $this->Form->label('consultation_name', __('Consultation Name')) ?></th>
                            <td><?= $this->Form->control('consultation_name', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('consultation_at', __('Consultation At')) ?></th>
                            <td><?= $this->Form->control('consultation_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('consultation_content', __('Consultation Content')) ?></th>
                            <td><?= $this->Form->control('consultation_content', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('client_search', __('Client')) ?></th>
                            <td>
                                <?= $this->Form->control('client_search', [
                                    'type' => 'text',
                                    'label' => false,
                                    'onchange' => 'this.form.submit()'
                                ]) ?>
                                <?php if (!empty($clients)): ?>
                                    <?= $this->Form->control('client_id', [
                                        'options' => $clients,
                                        'empty' => true,
                                        'label' => false
                                    ]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('lawyer_search', __('Lawyer')) ?></th>
                            <td>
                                <?= $this->Form->control('lawyer_search', [
                                    'type' => 'text',
                                    'label' => false,
                                    'onchange' => 'this.form.submit()'
                                ]) ?>
                                <?php if (!empty($users)): ?>
                                    <?= $this->Form->control('lawyer_id', [
                                        'options' => $users,
                                        'empty' => true,
                                        'label' => false
                                    ]) ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('consultation_kbn', __('Consultation Kbn')) ?></th>
                            <td><?= $this->Form->control('consultation_kbn', ['options' => $consultation_kbns, 'empty' => true]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('creator_id', __('Creator Id')) ?></th>
                            <td><?= $this->Form->control('creator_id', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('created_at', __('Created At')) ?></th>
                            <td><?= $this->Form->control('created_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('updater_id', __('Updater Id')) ?></th>
                            <td><?= $this->Form->control('updater_id', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('updated_at', __('Updated At')) ?></th>
                            <td><?= $this->Form->control('updated_at', ['label' => false]) ?></td>
                        </tr>
                    </table>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('登録'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
