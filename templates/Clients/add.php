<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="desktop detail-view">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6">新規顧客追加</div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <?= $this->Form->create($client) ?>
                <fieldset>
                    <table class="detail-table">
                        <tr>
                            <th><?= $this->Form->label('name', __('名前')) ?></th>
                            <td><?= $this->Form->control('name', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('post_cd', __('郵便番号')) ?></th>
                            <td><?= $this->Form->control('post_cd', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('prefectures', __('都道府県')) ?></th>
                            <td><?= $this->Form->control('prefectures', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('city', __('市')) ?></th>
                            <td><?= $this->Form->control('city', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('kuchouson', __('区町村')) ?></th>
                            <td><?= $this->Form->control('kuchouson', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('adress_below', __('以下住所')) ?></th>
                            <td><?= $this->Form->control('adress_below', ['label' => false]) ?></td>
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
                            <th><?= $this->Form->label('stakeholder_kbn', __('関係者区分')) ?></th>
                            <td><?= $this->Form->control('stakeholder_kbn',['label' => false,'options'=>$stakeholder_kbns,'empty'=>'Select Stakeholder_kbn']) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('lawyer_id', __('主任弁護士')) ?></th>
                            <td><?= $this->Form->control('lawyer_id', ['label' => '弁護士','options' => $lawyers, 'empty' => true]); ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('stakeholder_remarks', __('備考')) ?></th>
                            <td><?= $this->Form->control('stakeholder_remarks', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('creator_id', __('作成者')) ?></th>
                            <td><?= $this->Form->control('creator_id', ['label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('created_at', __('作成日')) ?></th>
                            <td><?= $this->Form->control('created_at', ['empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('updater_id', __('更新者')) ?></th>
                            <td><?= $this->Form->control('updater_id', [ 'empty' => true, 'label' => false]) ?></td>
                        </tr>
                        <tr>
                            <th><?= $this->Form->label('updated_at', __('更新日')) ?></th>
                            <td><?= $this->Form->control('updated_at', ['label' => false]) ?></td>
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
</div>
