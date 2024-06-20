<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="desktop detail-view">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= __('新規ユーザ追加') ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($user) ?>
                <fieldset>
                    <table class="form-table">
                        <tr>
                            <th><?= $this->Form->label('user_id', __('ユーザID')) ?></th>
                            <td><?= $this->Form->control('user_id', ['type' => 'text', 'label' => false]) ?></td>
                        </tr>

                        <tr>
                            <th><?= $this->Form->label('password', __('パスワード')) ?></th>
                            <td><?= $this->Form->control('password', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('user_name', __('ユーザ名')) ?></th>
                            <td><?= $this->Form->control('user_name', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('role_kbn', __('属性区分')) ?></th>
                            <td><?= $this->Form->control('role_kbn', ['options' => $roles , 'empty' => 'Select Role']) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('department_kbn', __('所属部署区分')) ?></th>
                            <td><?= $this->Form->control('department_kbn', ['options' => $departments, 'empty' => 'Select Department']) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('expertise_kbn', __('専門領域区分')) ?></th>
                            <td><?= $this->Form->control('expertise_kbn',  ['options' => $expertises, 'empty' => 'Select Expertise']) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('phone_number', __('電話番号')) ?></th>
                            <td><?= $this->Form->control('phone_number', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('email', __('メールアドレス')) ?></th>
                            <td><?= $this->Form->control('email', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('lawyer_no', __('弁護士番号')) ?></th>
                            <td><?= $this->Form->control('lawyer_no', ['label' => false]) ?></td>
                        </tr>
                    </table>
                </fieldset>
                <div class="detail-actions">
                    <?= $this->Form->button(__('保存'), ['class' => 'detail-action-button']) ?>
                </div>
                <?= $this->Form->end() ?>
</div>
    </div>
</div>
