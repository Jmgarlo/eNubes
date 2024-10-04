<?= $this->extend('layouts/reservas') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-center align-items-center">
    <div class="container col-md-6">
        <h1 class="text-center mb-4"><?= lang('actualizacion.updateReservationTitle') ?></h1> <!-- Título de la página -->

        <div class="card p-4">
            <h5><?= lang('actualizacion.reservationDetails') ?></h5> <!-- Detalles de la reserva -->
            <p class="localizadorReserva" id="<?= $localizador ?>"><strong><?= lang('actualizacion.reservationLocator') ?>:</strong> <?= $localizador ?></p>
            
            <form id="update-reservation-form">
                <div class="mb-3">
                    <label for="room-name" class="form-label"><?= lang('actualizacion.roomName') ?></label> <!-- Nombre de la habitación -->
                    <input type="text" class="form-control" id="room-name" name="room-name" value="<?= $nombre ?>" required>
                </div>
                
                <div class="mb-3">
                    <label for="check-in" class="form-label"><?= lang('actualizacion.checkIn') ?></label> <!-- Check-in -->
                    <input type="date" class="form-control" id="check-in" name="check-in" value="<?= $fecha_inicio ?>" required>
                </div>

                <div class="mb-3">
                    <label for="check-out" class="form-label"><?= lang('actualizacion.checkOut') ?></label> <!-- Check-out -->
                    <input type="date" class="form-control" id="check-out" name="check-out" value="<?= $fecha_fin ?>" required>
                </div>

                <div class="mb-3">
                    <label for="num-days" class="form-label"><?= lang('actualizacion.numDays') ?></label> <!-- Días de estancia -->
                    <input type="number" class="form-control" id="num-days" name="num-days" value="<?= $dias ?>" min="1" required>
                </div>

                <div class="mb-3">
                    <label for="price-per-day" class="form-label"><?= lang('actualizacion.pricePerDay') ?> (€)</label> <!-- Precio por día -->
                    <input type="number" class="form-control" id="price-per-day" name="price-per-day" value="<?= $precioDia ?>" step="0.01" required>
                </div>

                <div class="mb-3">
                    <label for="total-price" class="form-label"><?= lang('actualizacion.totalPrice') ?> (€)</label> <!-- Precio total -->
                    <input type="number" class="form-control" id="total-price" name="total-price" value="<?= $precioTotal ?>" step="0.01" readonly>
                </div>

                <div class="d-flex justify-content-center gap-3 mt-4">
                    <button type="submit" class="btn btn-success"><?= lang('actualizacion.saveChanges') ?></button> <!-- Guardar Cambios -->
                    <button type="button" class="btn btn-danger" id="cancel-update"><?= lang('actualizacion.cancel') ?></button> <!-- Cancelar -->
                </div>
            </form>

            <h5 class="mt-4"><?= lang('actualizacion.paymentMethod') ?></h5> <!-- Método de Pago -->
            <form id="payment-simulation-form">
                <div class="mb-3">
                    <label for="card-name" class="form-label"><?= lang('actualizacion.cardName') ?></label> <!-- Nombre en la Tarjeta -->
                    <input type="text" class="form-control form-control-sm" id="card-name" required>
                </div>
                <div class="mb-3">
                    <label for="card-number" class="form-label"><?= lang('actualizacion.cardNumber') ?></label> <!-- Número de Tarjeta -->
                    <input type="text" class="form-control form-control-sm" id="card-number" placeholder="0000 0000 0000 0000" required>
                </div>
                <div class="mb-3">
                    <label for="card-expiry" class="form-label"><?= lang('actualizacion.cardExpiry') ?></label> <!-- Fecha de Expiración -->
                    <input type="text" class="form-control form-control-sm" id="card-expiry" placeholder="MM/YY" required>
                </div>
                <div class="mb-3">
                    <label for="card-cvc" class="form-label"><?= lang('actualizacion.cardCVC') ?></label> <!-- CVC -->
                    <input type="text" class="form-control form-control-sm" id="card-cvc" placeholder="123" required>
                </div>
                <button type="submit" class="btn btn-primary"><?= lang('actualizacion.confirmPayment') ?></button> <!-- Confirmar Pago -->
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="module" src="/js/flujoReservas.js"></script>
<?= $this->endSection() ?>
