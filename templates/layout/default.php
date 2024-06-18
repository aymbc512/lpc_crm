<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';

// メニューバーを表示しないアクションを指定
$noMenuActions = ['login', 'forgotPassword', 'resetPassword']; // ここにメニューバーを表示しないアクションを追加
$action = $this->request->getParam('action');
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['custom_index_style', 'custom_index_global','custom_detail_style','menu.css']) ?> <!-- カスタムCSSファイルを読み込む -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <div class="body">
        <?php if (!in_array($action, $noMenuActions)): ?>
            
        <div class="menu-bar">
            <ul>
                <li><?= $this->Html->link('ユーザ一覧', ['controller' => 'Users', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('顧客一覧', ['controller' => 'Clients', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('案件一覧', ['controller' => 'Cases', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('相談一覧', ['controller' => 'Consultations', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('請求一覧', ['controller' => 'Invoices', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link('顧問契約一覧', ['controller' => 'AdvisorContracts', 'action' => 'index']) ?></li>
            </ul>
        </div>
        <?php endif; ?>
        <div class="container">
            <?= $this->Flash->render() ?>
            <div class="content">
                <?= $this->fetch('content') ?>
            </div>
        </div>
        </div>
    <footer>
    </footer>
</body>
</html>
