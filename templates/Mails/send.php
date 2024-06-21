<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Mailes $mail
 */
//$this->fetchTable('Users');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    
    <title><?= h($title) ?></title>
</head>


<body>
<?= $this->Form->create(null, ['url' => ['action' => 'send']]) ?>
<?= $this->Form->control('user_id', ['type'=>'text','label' => 'ユーザID']) ?>
<?= $this->Form->button(__('送信'), ['type' => 'submit']) ?>
<?= $this->Form->end() ?>
</body>
</html>




