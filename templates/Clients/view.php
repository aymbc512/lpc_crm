<div class="desktop">
    <div class="overlap-wrapper">
        <div class="overlap-2">
            <div class="view-6"></div>
            <div class="text-wrapper-6"><?= h($client->name) ?></div>
        </div>
    </div>
    <div class="detail-container">
        <div class="detail-content-area">
            <div class="detail-content-frame">
                <table class="detail-table">
                    <tr>
                        <th><?= __('氏名') ?></th>
                        <td><?= h($client->name) ?></td>
                        <th><?= __('都道府県') ?></th>
                        <td><?= h($client->prefectures) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('市') ?></th>
                        <td><?= h($client->city) ?></td>
                        <th><?= __('区町村') ?></th>
                        <td><?= h($client->kuchouson) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('以下住所') ?></th>
                        <td><?= h($client->adress_below) ?></td>
                        <th><?= __('メールアドレス') ?></th>
                        <td><?= h($client->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('主任弁護士ID') ?></th>
                        <td><?= $client->hasValue('lawyer') ? $this->Html->link($client->lawyer->user_id, ['controller' => 'Users', 'action' => 'view', $client->lawyer->user_id]) : '' ?></th>
                        <th><?= __('作成者') ?></th>
                        <td><?= $client->hasValue('creator') ? $this->Html->link($client->creator->user_name, ['controller' => 'Users', 'action' => 'view', $client->creator->user_id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('主任弁護士名') ?></th>
                        <td><?= $client->hasValue('lawyer') ? $this->Html->link($client->lawyer->user_name, ['controller' => 'Users', 'action' => 'view', $client->lawyer->user_id]) : '' ?></td>
                        <th><?= __('関係者ID') ?></th>
                        <td><?= $this->Number->format($client->stakeholder_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('郵便番号') ?></th>
                        <td><?= $client->post_cd === null ? '' : $this->Number->format($client->post_cd) ?></td>
                        <th><?= __('電話番号') ?></th>
                        <td><?= $client->phone_number === null ? '' : $this->Number->format($client->phone_number) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('作成日') ?></th>
                        <td><?= h($client->created_at) ?></td>
                        <th><?= __('更新日') ?></th>
                        <td><?= h($client->updated_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('顧客') ?></th>
                        <td><?= $client->client ? __('Yes') : __('No'); ?></td>
                        <th><?= __('対立相手') ?></th>
                        <td><?= $client->opponent ? __('Yes') : __('No'); ?></td>
                    </tr>
                </table>
                <div class="detail-actions">
                    <?= $this->Html->link(__('顧客編集'), ['action' => 'edit', $client->stakeholder_id], ['class' => 'detail-action-button']) ?>
                    <?= $this->Form->postLink(__('顧客削除'), ['action' => 'delete', $client->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->stakeholder_id), 'class' => 'detail-action-button']) ?>
                </div>
            </div>

            <div class="detail-related-section">
                <h4><?= __('関連案件') ?></h4>
                <div class="detail-add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'Cases', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' => 'detail-add-button']) ?>
                </div>
                <?php if (!empty($client->cases)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('案件ID') ?></th>
                        <th><?= __('案件名') ?></th>
                        <th><?= __('案件ステータス') ?></th>
                    </tr>
                    <?php foreach ($client->cases as $case) : ?>
                    <tr>
                        <td><?= h($case->case_id) ?></td>
                        <td><?= h($case->case_name) ?></td>
                        <td><?= h($case->case_status_kbn) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="action-buttons">
                    <?= $this->Html->link(__('削除'), ['controller' => 'Cases', 'action' => 'delete', $case->case_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('編集'), ['controller' => 'Cases', 'action' => 'edit', $case->case_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('関連する案件はありません。') ?></p>
                <?php endif; ?>
            </div>

            <div class="detail-related-section">
                <h4><?= __('関連顧問契約') ?></h4>
                <div class="detail-add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'AdvisorContracts', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' => 'detail-add-button']) ?>
                </div>
                <?php if (!empty($client->advisor_contracts)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('顧問契約ID') ?></th>
                        <th><?= __('担当弁護士') ?></th>
                        <th><?= __('契約開始日') ?></th>
                    </tr>
                    <?php foreach ($client->advisor_contracts as $contract) : ?>
                    <tr>
                        <td><?= h($contract->advisor_contracts_id) ?></td>
                        <td><?= h($contract->advisor_content) ?></td>
                        <td><?= h($contract->advisor_start_at) ?></td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <div class="action-buttons">
                    <?= $this->Html->link(__('削除'), ['controller' => 'AdvisorContracts', 'action' => 'delete', $contract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('編集'), ['controller' => 'AdvisorContracts', 'action' => 'edit', $contract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('関連する顧問契約はありません。') ?></p>
                <?php endif; ?>
            </div>

            <div class="detail-related-section">
                <h4><?= __('関連請求') ?></h4>
                <div class="add-button-container-title">
                    <?= $this->Html->link(__('追加'), ['controller' => 'Invoices', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' =>'detail.add-button' ]) ?>
                </div>
                <?php if (!empty($client->cases) || !empty($client->advisor_contracts)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('請求ID') ?></th>
                        <th><?= __('請求金額') ?></th>
                        <th><?= __('請求日') ?></th>
                    </tr>
                    <?php foreach ($client->cases as $case) : ?>
                        <?php foreach ($case->invoices as $invoice) : ?>
                        <tr>
                            <td><?= h($invoice->invoice_id) ?></td>
                            <td><?= h($invoice->invoice_amount) ?></td>
                            <td><?= h($invoice->invoice_at) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    <?php foreach ($client->advisor_contracts as $contract) : ?>
                        <?php foreach ($contract->invoices as $invoice) : ?>
                        <tr>
                            <td><?= h($invoice->invoice_id) ?></td>
                            <td><?= h($invoice->invoice_amount) ?></td>
                            <td><?= h($invoice->invoice_at) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
                <div class="action-buttons">
                    <?= $this->Html->link(__('削除'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('編集'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('関連する請求はありません。') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
