<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?><?= lang('login.page_title') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-form-section d-flex justify-content-center align-items-center vh-100">
    <div class="login-container">
        <h1 class="form-title"><?= lang('login.form_title') ?></h1>

        <form id="loginForm" class="login-form">
            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="<?= lang('login.email_placeholder') ?>" required>
                <div class="error-message" id="email-error"></div>
            </div>

            <div class="form-group">
                <input type="password" id="password" name="password" class="form-control" placeholder="<?= lang('login.password_placeholder') ?>" required>
                <div class="error-message" id="password-error"></div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="submitBtn"><?= lang('login.submit_button') ?></button>
            </div>

            <div id="success-message" style="display: none; color: green;">
                <?= lang('login.success_message') ?>
            </div>
        </form>

        <p><?= lang('login.register_text') ?> <a href="/register">Regístrate aquí</a>.</p>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="module" src="/js/login.js"></script>
<?= $this->endSection() ?>
