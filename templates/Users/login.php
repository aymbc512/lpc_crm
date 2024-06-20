<!-- in /templates/Users/login.php -->
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

    .login-container {
        width: 75%;
        padding: 40px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 2px 4px 4px #00000040;
        box-sizing: border-box;
        margin-top: 10%;
        text-align: center;
        
    }

    .login-container h3 {
        text-align: center;
        color: #333;
        font-size: 24px;
        margin-bottom: 20px;
    }

    .login-container fieldset {
        border: none;
        padding: 0;
        margin: 0 0 20px 0;
    }

    .login-container legend {
        font-size: 20px; /* 文字を大きくしました */
        margin-bottom: 5%;
        color: #555;
    }

    .form-group {
        display: flex;
        justify-content: center;/*入力ボックスに左に*/
        align-items: center; /* 垂直方向に中央揃え */
        margin-bottom: 3%;
        text-align: left;
    }

    .form-group label {
        margin-right: 10px;
        color: #555;
        font-size: 18px; /* 文字を大きくしました */
        width: 120px; /* ラベルの固定幅を設定 */
    }

    .form-group input {
        width: : calc(100% - 140px);  /* フィールドを中央揃えに */
        max-width: 300px; /* 入力フィールドの最大幅を設定 */
        padding: 15px; /* パディングを調整しました */
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        font-size: 16px;
    }

    .login-container .submit-container {
        text-align: center;
    }

    .submit-container input[type="submit"] {
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

    .submit-container input hover {
        background-color: #104e8b;
    }

    .login-container .link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #00BFFF;
        text-decoration: none;
        font-size: 16px;
    }

    .login-container .link:hover {
        text-decoration: underline;
    }
</style>

<div class="login-container">
    <?= $this->Flash->render() ?>
    <h3>ログイン</h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('ユーザー名とパスワードを入力してください') ?></legend>
        <div class="form-group">
            <?= $this->Form->label('user_id', 'ユーザID') ?>
            <?= $this->Form->control('user_id', ['type' => 'text','required' => true, 'label' => false, 'style' => 'width:100%; max-width:300px;']) ?>
        </div>
        <div class="form-group">
            <?= $this->Form->label('password', 'Password') ?>
            <?= $this->Form->control('password', ['required' => true, 'label' => false, 'style' => 'width:100%; max-width:300px;']) ?>
        </div>
    </fieldset>
    <div class="submit-container">
        <?= $this->Form->submit(__('ログイン')) ?>
    </div>
    <?= $this->Form->end() ?>

    <?= $this->Html->link("ユーザ追加", ['action' => 'add'], ['class' => 'link']) ?>
</div>


