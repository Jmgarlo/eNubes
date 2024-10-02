<?= $this->extend('layouts/index') ?>

<?= $this->section('title') ?>Perfil<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="container profile-container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="profile-content">
        <h1>Perfil de Usuario</h1>

        <div id="profile-view" class="profile-view">
            <form>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['nombre'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Apellido:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['apellido'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contraseña:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext">*********</p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Correo Electrónico:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['email'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">País:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['pais'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Teléfono:</label>
                    <div class="col-sm-9">
                        <p class="form-control-plaintext"><?= $user['telefono'] ?></p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="button" id="edit-profile-btn" class="btn btn-primary">Editar Perfil</button>
                        <button type="button" class="btn btn-danger" id="delete-account-btn">Eliminar Cuenta</button>
                    </div>
                </div>
            </form>
        </div>

        <div id="edit-profile-view" class="edit-profile-view">
            <form id="editProfileForm">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nombre:</label>
                    <div class="col-sm-9">
                        <input type="text" id="nombre" class="form-control" name="nombre" value="<?= $user['nombre'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Apellido:</label>
                    <div class="col-sm-9">
                        <input type="text" id="apellido" class="form-control" name="apellido" value="<?= $user['apellido'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" id="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Contraseña:</label>
                    <div class="col-sm-9">
                        <input type="password" id="password" class="form-control" name="password" value="<?= $user['password'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">País:</label>
                    <div class="col-sm-9">
                        <input type="text" id="pais" class="form-control" name="pais" value="<?= $user['pais'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Teléfono:</label>
                    <div class="col-sm-9">
                        <input type="tel" id="telefono" class="form-control" name="telefono" value="<?= $user['telefono'] ?>" required>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-12 text-right">
                        <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        <button type="button" id="cancel-edit-btn" class="btn btn-secondary">Cancelar</button>
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