<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Client $client
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Client'), ['action' => 'edit', $client->stakeholder_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Client'), ['action' => 'delete', $client->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $client->stakeholder_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Clients'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Client'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="clients view content">
            <h3><?= h($client->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($client->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Prefectures') ?></th>
                    <td><?= h($client->prefectures) ?></td>
                </tr>
                <tr>
                    <th><?= __('City') ?></th>
                    <td><?= h($client->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Kuchouson') ?></th>
                    <td><?= h($client->kuchouson) ?></td>
                </tr>
                <tr>
                    <th><?= __('Adress Below') ?></th>
                    <td><?= h($client->adress_below) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($client->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Lawyer Id') ?></th>
                    <td><?= h($client->lawyer_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Creator Id') ?></th>
                    <td><?= h($client->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $client->hasValue('user') ? $this->Html->link($client->user->user_id, ['controller' => 'Users', 'action' => 'view', $client->user->user_id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Stakeholder Id') ?></th>
                    <td><?= $this->Number->format($client->stakeholder_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Post Cd') ?></th>
                    <td><?= $client->post_cd === null ? '' : $this->Number->format($client->post_cd) ?></td>
                </tr>
                <tr>
                    <th><?= __('Phone Number') ?></th>
                    <td><?= $client->phone_number === null ? '' : $this->Number->format($client->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($client->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($client->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Client') ?></th>
                    <td><?= $client->client ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Opponent') ?></th>
                    <td><?= $client->opponent ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Stakeholder Kbn') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($client->stakeholder_kbn)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Stakeholder Remarks') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($client->stakeholder_remarks)); ?>
                </blockquote>
            </div>

            <div class="related">
                <h4><?= __('Related Cases') ?> <?= $this->Html->link(__('Add Case'), ['controller' => 'Cases', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' => 'button float-right']) ?></h4>
                <?php if (!empty($client->cases)) : ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Case Id') ?></th>
                        <th><?= __('Case Name') ?></th>
                        <th><?= __('Case Status') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($client->cases as $case) : ?>
                    <tr>
                        <td><?= h($case->case_id) ?></td>
                        <td><?= h($case->case_name) ?></td>
                        <td><?= h($case->case_status_kbn) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'Cases', 'action' => 'view', $case->case_id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'Cases', 'action' => 'edit', $case->case_id]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else : ?>
                <p><?= __('No related cases found.') ?></p>
                <?php endif; ?>
            </div>

            <div class="related">
                <h4><?= __('Related Advisor Contracts') ?> <?= $this->Html->link(__('Add Advisor Contract'), ['controller' => 'AdvisorContracts', 'action' => 'add', '?' => ['customer_id' => $client->stakeholder_id]], ['class' => 'button float-right']) ?></h4>
                <?php if (!empty($client->advisor_contracts)) : ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Advisor Contract Id') ?></th>
                        <th><?= __('Advisor Name') ?></th>
                        <th><?= __('Contract Date') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($client->advisor_contracts as $contract) : ?>
                    <tr>
                        <td><?= h($contract->advisor_contracts_id) ?></td>
                        <td><?= h($contract->advisor_content) ?></td>
                        <td><?= h($contract->advisor_start_at) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'AdvisorContracts', 'action' => 'view', $contract->advisor_contracts_id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'AdvisorContracts', 'action' => 'edit', $contract->advisor_contracts_id]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table>
                <?php else : ?>
                <p><?= __('No related advisor contracts found.') ?></p>
                <?php endif; ?>
            </div>

            <div class="related">
                <h4><?= __('Related Invoices') ?></h4>
                <?php if (!empty($client->cases) || !empty($client->advisor_contracts)) : ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Invoice Id') ?></th>
                        <th><?= __('Amount') ?></th>
                        <th><?= __('Date') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($client->cases as $case) : ?>
                        <?php foreach ($case->invoices as $invoice) : ?>
                        <tr>
                            <td><?= h($invoice->invoice_id) ?></td>
                            <td><?= h($invoice->invoice_amount) ?></td>
                            <td><?= h($invoice->invoice_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoice->invoice_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                    <?php foreach ($client->advisor_contracts as $contract) : ?>
                        <?php foreach ($contract->invoices as $invoice) : ?>
                        <tr>
                            <td><?= h($invoice->invoice_id) ?></td>
                            <td><?= h($invoice->invoice_amount) ?></td>
                            <td><?= h($invoice->invoice_at) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Invoices', 'action' => 'view', $invoice->invoice_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Invoices', 'action' => 'edit', $invoice->invoice_id]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </table>
                <?php else : ?>
                <p><?= __('No related invoices found.') ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
