<?= $this->extend('layouts/reservas') ?>
<?= $this->section('content') ?>

<h1 class="text-center mb-4"><?= lang('confirmacion.reservationConfirmationTitle') ?></h1> <!-- Confirmación de reserva -->

<div class="container">
    <h5><?= lang('confirmacion.roomDetails') ?></h5> <!-- Detalles de la habitación -->
    <p><strong><?= lang('confirmacion.roomName') ?>:</strong> <?= $nombre ?></p> <!-- Nombre de la habitación -->
    <p><strong><?= lang('confirmacion.checkIn') ?>:</strong> <?= $fecha_inicio ?></p> <!-- Check-in -->
    <p><strong><?= lang('confirmacion.checkOut') ?>:</strong> <?= $fecha_fin ?></p> <!-- Check-out -->
    <p><strong><?= lang('confirmacion.numDays') ?>:</strong> <?= $dias ?></p> <!-- Días de estancia -->
    <p><strong><?= lang('confirmacion.pricePerDay') ?>:</strong> <?= number_format($precioDia, 2) ?> €</p> <!-- Precio por día -->
    <p><strong><?= lang('confirmacion.totalPrice') ?>:</strong> <?= number_format($precioTotal, 2) ?> €</p> <!-- Precio total -->

    <h5><?= lang('confirmacion.reservationStatus') ?></h5> <!-- Estado de la reserva -->
    <p class="estado_reserva" id="<?= $id_estado ?>"><strong><?= lang('confirmacion.status') ?>:</strong> <span class="badge <?= $clase ?>"><?= $descripcion ?></span></p>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <button class="btn btn-danger" id="cancel-reservation" disabled><?= lang('confirmacion.cancelReservation') ?></button> <!-- Cancelar reserva -->
        <button class="btn btn-primary" id="pay-now" disabled><?= lang('confirmacion.payNow') ?></button> <!-- Pagar -->
    </div>

    <div id="payment-section" style="display:none;">
        <h5 class="mt-4"><?= lang('confirmacion.paymentMethod') ?></h5> <!-- Método de pago -->
        <form id="payment-simulation-form">
            <div class="mb-3">
                <label for="card-name" class="form-label"><?= lang('confirmacion.cardName') ?></label> <!-- Nombre en la tarjeta -->
                <input type="text" class="form-control form-control-sm" id="card-name" required>
            </div>
            <div class="mb-3">
                <label for="card-number" class="form-label"><?= lang('confirmacion.cardNumber') ?></label> <!-- Número de tarjeta -->
                <input type="text" class="form-control form-control-sm" id="card-number" placeholder="0000 0000 0000 0000" required>
            </div>
            <div class="mb-3">
                <label for="card-expiry" class="form-label"><?= lang('confirmacion.cardExpiry') ?></label> <!-- Fecha de expiración -->
                <input type="text" class="form-control form-control-sm" id="card-expiry" placeholder="MM/YY" required>
            </div>
            <div class="mb-3">
                <label for="card-cvc" class="form-label"><?= lang('confirmacion.cardCVC') ?></label> <!-- CVC -->
                <input type="text" class="form-control form-control-sm" id="card-cvc" placeholder="123" required>
            </div>
            <button type="submit" class="btn btn-primary"><?= lang('confirmacion.simulatePayment') ?></button> <!-- Simular pago -->
        </form>
        <div id="payment-result" class="mt-3"></div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script type="module" src="/js/flujoReservas.js"></script>
<?= $this->endSection() ?>
