<!DOCTYPE html>
<html lang="ja">
<head>
    <title><?= h($title) ?></title>
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

        .request-reset-container {
            width: 65%;
            padding: 40px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0px 2px 3px 3px #00000040;
            box-sizing: border-box;
            margin-top: 10%;
            text-align: center;
        }

        .request-reset-container h3 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 7%;
            margin-top: 2%;
        }

        .request-reset-container fieldset {
            border: none;
            padding: 0;
            margin: 0 0 20px 0;
        }

        .request-reset-container legend {
            font-size: 16px; /* 文字を大きくしました */
            margin-bottom: 5%;
            color: #555;
        }

        .request-reset-container .form-group {
            display: flex;
            justify-content: center; /* 入力ボックスを左に */
            align-items: center; /* 垂直方向に中央揃え */
            margin-bottom: 3%;
            text-align: left;
        }

        .request-reset-container .form-group label {
            color: #555;
            font-size: 18px; /* 文字を大きくしました */
            margin-right: 20px;
        }

        .request-reset-container .form-group input {
            width: 100%;  /* フィールドを中央揃えに */
            max-width: 300px; /* 入力フィールドの最大幅を設定 */
            padding: 15px; /* パディングを調整しました */
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .request-reset-container .submit-container {
            text-align: center;
        }

        .request-reset-container .submit-container input {
            width: 100%; /* 幅を100%に設定しました */
            max-width: 200px; /* 最大幅を設定して狭めました */
            padding: 10px;
            background-color: #00BFFF; /* ボタンの色を変更しました */
            border: none;
            border-radius: 3px;
            color: #3c3c3c; /* ボタンの文字を濃いグレーに設定 */
            font-size: 16px;
            cursor: pointer;
            box-shadow: 2px 4px 4px #00000040;
        }

        .request-reset-container .submit-container input:hover {
            background-color: #104e8b;
            color: #ffffff;
        }

        .request-reset-container .link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #00BFFF;
            text-decoration: none;
            font-size: 16px;
        }

        .request-reset-container .link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body class="nomenu">
    <div class="request-reset-container">
        <?= $this->Flash->render() ?>
        <h3>パスワードをお忘れの方</h3>
        <?= $this->Form->create(null, ['url' => ['action' => 'requestPasswordReset']]) ?>
        <fieldset>
            <legend><?= __('ユーザIDを入力してください') ?></legend>
            <div class="form-group">
                <?= $this->Form->label('user_id', 'ユーザID') ?>
                <?= $this->Form->control('user_id', ['type' => 'text', 'required' => true, 'label' => false]) ?>
            </div>
        </fieldset>
        <div class="submit-container">
            <?= $this->Form->submit(__('メールを送信'), ['type' => 'submit']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</body>
</html>


