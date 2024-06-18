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
                        <th><?= __('Name') ?></th>
                        <td><?= h($client->name) ?></td>
                        <th><?= __('Prefectures') ?></th>
                        <td><?= h($client->prefectures) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('City') ?></th>
                        <td><?= h($client->city) ?></td>
                        <th><?= __('Kuchouson') ?></th>
                        <td><?= h($client->kuchouson) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Adress Below') ?></th>
                        <td><?= h($client->adress_below) ?></td>
                        <th><?= __('Email') ?></th>
                        <td><?= h($client->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Lawyer Id') ?></th>
                        <td><?= h($client->lawyer_id) ?></td>
                        <th><?= __('Creator Id') ?></th>
                        <td><?= h($client->creator_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User') ?></th>
                        <td><?= $client->hasValue('user') ? $this->Html->link($client->user->user_id, ['controller' => 'Users', 'action' => 'view', $client->user->user_id]) : '' ?></td>
                        <th><?= __('Stakeholder Id') ?></th>
                        <td><?= $this->Number->format($client->stakeholder_id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Post Cd') ?></th>
                        <td><?= $client->post_cd === null ? '' : $this->Number->format($client->post_cd) ?></td>
                        <th><?= __('Phone Number') ?></th>
                        <td><?= $client->phone_number === null ? '' : $this->Number->format($client->phone_number) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created At') ?></th>
                        <td><?= h($client->created_at) ?></td>
                        <th><?= __('Updated At') ?></th>
                        <td><?= h($client->updated_at) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Client') ?></th>
                        <td><?= $client->client ? __('Yes') : __('No'); ?></td>
                        <th><?= __('Opponent') ?></th>
                        <td><?= $client->opponent ? __('Yes') : __('No'); ?></td>
                    </tr>
                </table>
                <div class="detail-actions">
                    <?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->stakeholder_id], ['class' => 'detail-action-button']) ?>
                    <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->stakeholder_id), 'class' => 'detail-action-button']) ?>
                </div>
            </div>

            <div class="detail-related-section">
                <h4><?= __('Related Cases') ?></h4>
                <div class="add-button-container">
                    <?= $this->Html->link(__('追加'), ['controller' => 'Cases', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' => 'detail-add-button']) ?>
                </div>
                <?php if (!empty($client->cases)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('Case Id') ?></th>
                        <th><?= __('Case Name') ?></th>
                        <th><?= __('Case Status') ?></th>
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
                    <?= $this->Html->link(__('Delete'), ['controller' => 'Cases', 'action' => 'delete', $case->case_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Cases', 'action' => 'edit', $case->case_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('No related cases found.') ?></p>
                <?php endif; ?>
            </div>

            <div class="detail-related-section">
                <h4><?= __('Related Advisor Contracts') ?></h4>
                <div class="add-button-container-title">
                    <?= $this->Html->link(__('追加'), ['controller' => 'AdvisorContracts', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' => 'detail.add-button']) ?>
                </div>
                <?php if (!empty($client->advisor_contracts)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('Advisor Contract Id') ?></th>
                        <th><?= __('Advisor Name') ?></th>
                        <th><?= __('Contract Date') ?></th>
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
                    <?= $this->Html->link(__('Delete'), ['controller' => 'AdvisorContracts', 'action' => 'delete', $contract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AdvisorContracts', 'action' => 'edit', $contract->advisor_contracts_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('No related advisor contracts found.') ?></p>
                <?php endif; ?>
            </div>

            <div class="detail-related-section">
                <h4><?= __('Related Invoices') ?></h4>
                <div class="add-button-container-title">
                    <?= $this->Html->link(__('追加'), ['controller' => 'Invoices', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' => 'add-button-title']) ?>
                </div>
                <?php if (!empty($client->cases) || !empty($client->advisor_contracts)) : ?>
                <table class="detail-data-table">
                    <tr>
                        <th><?= __('Invoice Id') ?></th>
                        <th><?= __('Amount') ?></th>
                        <th><?= __('Date') ?></th>
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
                    <?= $this->Html->link(__('Delete'), ['controller' => 'Invoices', 'action' => 'delete', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id], ['class' => 'detail-small-button']) ?>
                </div>
                <?php else : ?>
                <p><?= __('No related invoices found.') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
