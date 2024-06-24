<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Opponent $opponent
 */
?>
<?= $this->Html->css('detail.css') ?>

<div class="row detail-view">
    <aside class="column">
    </aside>
    <div class="column column-80">
        <div class="opponents view content">
            <h3><?= h($opponent->name) ?></h3>
            <table class="detail-table">
                <tr>
                    <th><?= __('対立相手名') ?></th>
                    <td><?= h($opponent->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('都道府県') ?></th>
                    <td><?= h($opponent->prefectures) ?></td>
                </tr>
                <tr>
                    <th><?= __('市') ?></th>
                    <td><?= h($opponent->city) ?></td>
                </tr>
                <tr>
                    <th><?= __('区町村') ?></th>
                    <td><?= h($opponent->kuchouson) ?></td>
                </tr>
                <tr>
                    <th><?= __('以下住所') ?></th>
                    <td><?= h($opponent->adress_below) ?></td>
                </tr>
                <tr>
                    <th><?= __('メールアドレス') ?></th>
                    <td><?= h($opponent->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('作成者') ?></th>
                    <td><?= h($opponent->creator_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('対立相手ID') ?></th>
                    <td><?= $this->Number->format($opponent->stakeholder_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('郵便番号') ?></th>
                    <td><?= $opponent->post_cd === null ? '' : $this->Number->format($opponent->post_cd) ?></td>
                </tr>
                <tr>
                    <th><?= __('電話番号') ?></th>
                    <td><?= $opponent->phone_number === null ? '' : $this->Number->format($opponent->phone_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('作成日') ?></th>
                    <td><?= h($opponent->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('更新日') ?></th>
                    <td><?= h($opponent->updated_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('顧客') ?></th>
                    <td><?= $opponent->client ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('対立相手') ?></th>
                    <td><?= $opponent->opponent ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('対立相手区分') ?></th>
                    <td><?=($opponent->stakeholder_kbn); ?></td>
                </tr>
                <tr>
                    <th><?= __('備考') ?></th>
                    <td><?= ($opponent->stakeholder_remarks); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('対立相手区分') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($opponent->stakeholder_kbn)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>

