<!-- in templates/Users/request_password_reset.php -->
<div class="users form">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Request Password Reset') ?></legend>
        <?= $this->Form->control('email', ['required' => true, 'label' => 'Email']) ?>
    </fieldset>
    <?= $this->Form->submit(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
