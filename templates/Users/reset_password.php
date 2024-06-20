<!-- in /templates/Users/reset_password.php -->
<style>
    .reset-container {
        width: 100%;
        max-width: 500px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .reset-container h3 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .reset-container fieldset {
        border: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .reset-container legend {
        font-size: 20px;
        margin-bottom: 10px;
        color: #555;
    }

    .reset-container label {
        display: block;
        margin-bottom: 5px;
        color: #555;
        font-size: 18px;
        text-align: left;
    }

    .reset-container input[type="text"],
    .reset-container input[type="password"] {
        width: 100%;
        padding: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        font-size: 16px;
        margin-bottom: 15px;
    }

    .reset-container .submit-container {
        text-align: center;
    }

    .submit-container input[type="submit"] {
        width: 100%;
        max-width: 200px;
        padding: 10px;
        background-color: var(--primary-color);
        border: none;
        border-radius: 3px;
        color: #3c3c3c;
        font-size: 16px;
        cursor: pointer;
        box-shadow: 2px 4px 4px #00000040;
    }

    .submit-container input[type="submit"]:hover {
        background-color: #104e8b;
        color: #ffffff;
    }
</style>

<div class="reset-container">
    <?= $this->Flash->render() ?>
    <h3>パスワード再設定</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('新しいパスワードを入力してください') ?></legend>
        <?= $this->Form->control('password', ['required' => true, 'label' => '新しいパスワード']) ?>
        <?= $this->Form->control('password_confirm', ['required' => true, 'type' => 'password', 'label' => 'パスワード確認']) ?>
    </fieldset>
    <div class="submit-container">
        <?= $this->Form->submit(__('再設定')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
