<!-- in /templates/Users/reset_password.php -->
<style>
    body.nomenu {
        font-family: 'Noto Sans JP', Helvetica, sans-serif;
        background-color: #ffffff;
        color: #3c3c3c; /* 濃いグレー */
        margin: 0;
        padding: 0;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw; /* ビューポート全体の幅を確保 */
    }

    .resetpassword-container {
        width: 75%;
        padding: 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 0px 2px 3px 3px #00000040;
        box-sizing: border-box;
        margin-top: 10%;
        text-align: center;
    }

    .resetpassword-container h3 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .resetpassword-container fieldset {
        border: none;
        padding: 0;
        margin: 0 0 20px 0;
        width: 100%;
    }

    .resetpassword-container legend {
        font-size: 20px; /* 文字を大きくしました */
        margin-bottom: 5%;
        color: #555;
    }

    .resetpassword-form-group {
        display: flex;
        justify-content: center; /*入力ボックスに左に*/
        align-items: center; /* 垂直方向に中央揃え */
        margin-bottom: 3%;
        text-align: left;
    }

    .resetpassword-form-group label {
        margin-right: -130px;
        color: #555;
        font-size: 18px; /* 文字を大きくしました */
        width: 50%; /* ラベルの固定幅を設定 */
    }

    .resetpassword-form-group input {
        width: 100%; /* フィールドを中央揃えに */
        padding: 15px; /* パディングを調整しました */
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .resetpassword-container .resetpassword-submit-container {
        text-align: center;
    }

    .resetpassword-submit-container input[type="submit"] {
        width: 100%; /* 幅を100%に設定しました */
        max-width: 200px; /* 最大幅を設定して狭めました */
        padding: 10px;
        background-color: #00BFFF; /* 他画面と同じ色に設定しました */
        border: none;
        border-radius: 3px;
        color: #3c3c3c; /* ボタンの文字を濃いグレーに設定 */
        font-size: 16px;
        cursor: pointer;
        box-shadow: 2px 4px 4px #00000040;
    }

    .resetpassword-submit-container input[type="submit"]:hover {
        background-color: #104e8b;
    }
</style>

<div class="resetpassword-container">
    <?= $this->Flash->render() ?>
    <h3>パスワード再設定</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('新しいパスワードを入力してください') ?></legend>
        <div class="resetpassword-form-group">
            <?= $this->Form->label('新しいパスワード') ?>
            <?= $this->Form->control('password', ['required' => true, 'label' => false]) ?>
        </div>
        <div class="resetpassword-form-group">
            <?= $this->Form->label('パスワード確認') ?>
            <?= $this->Form->control('password_confirm', ['required' => true, 'type' => 'password', 'label' => false]) ?>
        </div>
    </fieldset>
    <div class="resetpassword-submit-container">
        <?= $this->Form->submit(__('再設定')) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
