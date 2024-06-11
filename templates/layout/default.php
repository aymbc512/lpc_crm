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

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake', 'menu']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <!-- <nav class="top-nav">
        <div class="top-nav-title">
            <a href="<?= $this->Url->build('/') ?>"><span>Cake</span>PHP</a>
        </div>
        <div class="top-nav-links">
            <a target="_blank" rel="noopener" href="https://book.cakephp.org/5/">Documentation</a>
            <a target="_blank" rel="noopener" href="https://api.cakephp.org/">API</a>
        </div>
    </nav> -->
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>

            <?php if (!in_array($action, $noMenuActions)): ?>
            <div class="menu-bar">
                <ul>
                    <li><?= $this->Html->link('ユーザー一覧', ['controller' => 'Users', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link('顧客一覧', ['controller' => 'Clients', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link('案件一覧', ['controller' => 'Cases', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link('相談一覧', ['controller' => 'Consultations', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link('請求一覧', ['controller' => 'Invoices', 'action' => 'index']) ?></li>
                    <li><?= $this->Html->link('顧問契約一覧', ['controller' => 'AdvisorContracts', 'action' => 'index']) ?></li>
                </ul>
            </div>
            <?php endif; ?>

            <div class="content">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>
