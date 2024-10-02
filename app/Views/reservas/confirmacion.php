<?= $this->extend('layouts/reservas') ?>
<?= $this->extend('layouts/reservas') ?>
<?= $this->section('content') ?>
<h1 class="text-center mb-4">Resumen de la Reserva</h1>

<div class="container">
    <h5>Detalles de la Habitación</h5>
    <p><strong>Nombre de la Habitación:</strong> nombreHabitacion </p>
    <p><strong>Check-in:</strong> fechaInicio</p>
    <p><strong>Check-out:</strong> fechaFin</p>
    <p><strong>Precio Total:</strong> precioTotal </p>
    
    <h5>Método de Pago</h5>
    <form id="payment-simulation-form">
        <div class="mb-3">
            <label for="card-number" class="form-label">Nombre en la Tarjeta</label>
            <input type="text" class="form-control" id="card-name" required>
        </div>
        <div class="mb-3">
            <label for="card-number" class="form-label">Número de Tarjeta</label>
            <input type="text" class="form-control" id="card-number" placeholder="0000 0000 0000 0000" required>
        </div>
        <div class="mb-3">
            <label for="card-expiry" class="form-label">Fecha de Expiración</label>
            <input type="text" class="form-control" id="card-expiry" placeholder="MM/YY" required>
        </div>
        <div class="mb-3">
            <label for="card-cvc" class="form-label">CVC</label>
            <input type="text" class="form-control" id="card-cvc" placeholder="123" required>
        </div>
        <button type="submit" class="btn btn-primary">Simular Pago</button>
    </form>
    <div id="payment-result" class="mt-3"></div>
</div>

<?= $this->endSection() ?>