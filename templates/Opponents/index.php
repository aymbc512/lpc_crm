<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Opponent> $opponents
 */
?>
<div class="opponents index content">
    <?= $this->Html->link(__('New Opponent'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Opponents') ?></h3>
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
                    <th><?= $this->Paginator->sort('lawyer_id') ?></th>
                    <th><?= $this->Paginator->sort('creator_id') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updater_id') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($opponents as $opponent): ?>
                <tr>
                    <td><?= $this->Number->format($opponent->stakeholder_id) ?></td>
                    <td><?= h($opponent->name) ?></td>
                    <td><?= $opponent->post_cd === null ? '' : $this->Number->format($opponent->post_cd) ?></td>
                    <td><?= h($opponent->prefectures) ?></td>
                    <td><?= h($opponent->city) ?></td>
                    <td><?= h($opponent->kuchouson) ?></td>
                    <td><?= h($opponent->adress_below) ?></td>
                    <td><?= $opponent->phone_number === null ? '' : $this->Number->format($opponent->phone_number) ?></td>
                    <td><?= h($opponent->email) ?></td>
                    <td><?= h($opponent->lawyer_id) ?></td>
                    <td><?= h($opponent->creator_id) ?></td>
                    <td><?= h($opponent->created_at) ?></td>
                    <td><?= $opponent->hasValue('user') ? $this->Html->link($opponent->user->user_id, ['controller' => 'Users', 'action' => 'view', $opponent->user->user_id]) : '' ?></td>
                    <td><?= h($opponent->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $opponent->stakeholder_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $opponent->stakeholder_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $opponent->stakeholder_id], ['confirm' => __('Are you sure you want to delete # {0}?', $opponent->stakeholder_id)]) ?>
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
