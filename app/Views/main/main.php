<?= $this->extend('layouts/index') ?> <!-- Extiende la plantilla principal -->
<?= $this->section('content') ?> <!-- Inicia la sección de contenido -->
    <!-- Image/Video Section -->
    <div class="main-image">
        <!-- Placeholder for video or image -->
    </div>

    <!-- Address and Map -->
    <div class="text-center my-4">
        <h3>Dirección del Hotel eNubes</h3>
        <p>Calle Falsa 123, Madrid, España</p>
        <a href="#" id="show-map" class="btn btn-secondary">Mostrar en el mapa</a>
    </div>

    <!-- Hotel Description -->
    <div class="description text-center">
        <h3>Descripción del Hotel</h3>
        <p>El Hotel eNubes es un hotel de lujo con vistas al mar y servicios de primera clase para una estancia inolvidable.</p>
    </div>

    <!-- Offers Section -->
    <div class="offers text-center">
        <h3>Ofertas Especiales</h3>
        <p>Descuento del 20% para estancias de más de 3 noches.</p>
    </div>

    <!-- Best Rated Rooms Section -->
    <div class="best-rooms text-center">
        <h3>Habitaciones Mejor Valoradas</h3>
        <!-- Placeholder for best-rated rooms, you can add Bootstrap cards or any other style here -->
        <div class="row">
            <div class="col-md-4">Habitación 1</div>
            <div class="col-md-4">Habitación 2</div>
            <div class="col-md-4">Habitación 3</div>
        </div>
    </div>

    <!-- Suites and Hotel Images -->
    <div class="hotel-images text-center">
        <h3>Fotos de nuestras suites y áreas</h3>
        <div class="row">
            <div class="col-md-4">Suite 1</div>
            <div class="col-md-4">Suite 2</div>
            <div class="col-md-4">Suite 3</div>
        </div>
    </div>

    <!-- Amenities Section -->
    <div class="amenities text-center">
        <h3>Comodidades del Hotel</h3>
        <div class="row">
            <div class="col-md-3">Gimnasio</div>
            <div class="col-md-3">Spa</div>
            <div class="col-md-3">Masajes</div>
            <div class="col-md-3">Piscina</div>
        </div>
    </div>
<?= $this->endSection() ?> <!-- Finaliza la sección de contenido -->