<?= $this->extend('layouts/auth') ?>

<?= $this->section('title') ?><?= lang('register.page_title') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="auth-form-section d-flex justify-content-center align-items-center vh-100">
    <div class="register-container">
        <h1 class="form-title"><?= lang('register.form_title') ?></h1>

        <form id="registerForm" class="register-form">
            <div class="form-group">
                <input type="text" id="nombre" name="nombre" class="form-control" placeholder="<?= lang('register.nombre_placeholder') ?>" required>
                <div class="error-message" id="nombre-error"></div>
            </div>

            <div class="form-group">
                <input type="text" id="apellido" name="apellido" class="form-control" placeholder="<?= lang('register.apellido_placeholder') ?>" required>
                <div class="error-message" id="apellido-error"></div>
            </div>

            <div class="form-group">
                <input type="text" id="pais" name="pais" class="form-control" placeholder="<?= lang('register.pais_placeholder') ?>" required>
                <div class="error-message" id="pais-error"></div>
            </div>

            <div class="form-group">
                <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="<?= lang('register.telefono_placeholder') ?>" pattern="[0-9]{9}" required>
                <div class="error-message" id="telefono-error"></div>
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="<?= lang('register.email_placeholder') ?>" required>
                <div class="error-message" id="email-error"></div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary" id="submitBtn"><?= lang('register.submit_button') ?></button>
            </div>

            <div id="success-message" style="display: none; color: green;">
                <?= lang('register.success_message') ?>
            </div>
        </form>

        <p><?= lang('register.login_text') ?> <a href="/login">Inicia sesión aquí</a>.</p>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="module" src="/js/registro.js"></script>
<?= $this->endSection() ?>
