<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Stakeholder> $stakeholders
 */
?>
<div class="stakeholders index content">
    <?= $this->Html->link(__('New Stakeholder'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Stakeholders') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('stakeholder_id') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('post_cd') ?></th>
                    <th><?= $this->Paginator->sort('prefectures') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('kuchouson') ?></th>
                    <th><?= $this->Paginator->sort('adress_below') ?></th>
                    <th><?= $this->Paginator->sort('phone_number') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('client') ?></th>
                    <th><?= $this->Paginator->sort('opponent') ?></th>
                    <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($stakeholders as $stakeholder): ?>
                <tr>
                    <td><?= $this->Number->format($stakeholder->stakeholder_id) ?></td>
                    <td><?= h($stakeholder->name) ?></td>
                    <td><?= $stakeholder->post_cd === null ? '' : $this->Number->format($stakeholder->post_cd) ?></td>
                    <td><?= h($stakeholder->prefectures) ?></td>
                    <td><?= h($stakeholder->city) ?></td>
                    <td><?= h($stakeholder->kuchouson) ?></td>
                    <td><?= h($stakeholder->adress_below) ?></td>
                    <td><?= $stakeholder->phone_number === null ? '' : $this->Number->format($stakeholder->phone_number) ?></td>
                    <td><?= h($stakeholder->email) ?></td>
                    <td><?= h($stakeholder->client) ?></td>
                    <td><?= h($stakeholder->opponent) ?></td>
                    <td><?= h($stakeholder->lawyer_id) ?></td>
                    <td><?= h($stakeholder->creator_id) ?></td>
                    <td><?= h($stakeholder->created_at) ?></td>
                    <td><?= $stakeholder->hasValue('user') ? $this->Html->link($stakeholder->user->user_id, ['controller' => 'Users', 'action' => 'view', $stakeholder->user->user_id]) : '' ?></td>
                    <td><?= h($stakeholder->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $stakeholder->stakeholder_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $stakeholder->stakeholder_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $stakeholder->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $stakeholder->stakeholder_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
