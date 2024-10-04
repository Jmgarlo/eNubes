<?= $this->extend('layouts/index') ?>

<?= $this->section('title') ?><?= lang('profile.page_title') ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container profile-container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="profile-content">
        <h1><?= lang('profile.user_profile_title') ?></h1>

        <div id="profile-view" class="profile-view">
            <form>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.name_label') ?></label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['nombre'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.last_name_label') ?></label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['apellido'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.password_label') ?></label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext">*********</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.email_label') ?></label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['email'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.country_label') ?></label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['pais'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.phone_label') ?></label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['telefono'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="button" id="edit-profile-btn" class="btn btn-primary"><?= lang('profile.edit_profile_button') ?></button>
                        <button type="button" class="btn btn-danger" id="delete-account-btn"><?= lang('profile.delete_account_button') ?></button>
                    </div>
                </div>
            </form>
            <div class="reservas-container mt-4" style="max-height: 400px; overflow-y: auto;">
                <div class="reserva-card-list">
 
                </div>
            </div>
        </div>

        <div id="edit-profile-view" class="edit-profile-view">
            <form id="editProfileForm">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.name_label') ?></label>
                    <div class="col-sm-9">
                        <input type="text" id="nombre" class="form-control" name="nombre" value="<?= $user['nombre'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.last_name_label') ?></label>
                    <div class="col-sm-9">
                        <input type="text" id="apellido" class="form-control" name="apellido" value="<?= $user['apellido'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.email_label') ?></label>
                    <div class="col-sm-9">
                        <input type="email" id="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.password_label') ?></label>
                    <div class="col-sm-9">
                        <input type="password" id="password" class="form-control" name="password" value="<?= $user['password'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.country_label') ?></label>
                    <div class="col-sm-9">
                        <input type="text" id="pais" class="form-control" name="pais" value="<?= $user['pais'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"><?= lang('profile.phone_label') ?></label>
                    <div class="col-sm-9">
                        <input type="tel" id="telefono" class="form-control" name="telefono" value="<?= $user['telefono'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-success"><?= lang('profile.save_changes_button') ?></button>
                        <button type="button" id="cancel-edit-btn" class="btn btn-secondary"><?= lang('profile.cancel_button') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="/js/perfil.js"></script>
<?= $this->endSection() ?>
