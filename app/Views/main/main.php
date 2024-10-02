<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>
<div class="main-image">
</div>

<div class="text-center my-4">
    <h3 class="section_title">Dirección del Hotel eNubes</h3>
    <p>Calle Falsa 123, Madrid, España</p>
    <a href="#" id="show-map" class="btn btn-secondary">Mostrar en el mapa</a>
</div>
<div class="description text-center">
    <h3 class="section_title">Descripción del Hotel</h3>
    <p class="descripcion_hotel">El Hotel eNubes es un exclusivo hotel de lujo ubicado en una de las zonas más privilegiadas, con impresionantes vistas al mar. Ofrecemos una experiencia única de confort y elegancia, donde cada detalle está diseñado para brindar a nuestros huéspedes un servicio de primera clase.

Nuestras instalaciones incluyen habitaciones espaciosas y exquisitamente decoradas, que combinan estilo contemporáneo con elementos clásicos, asegurando un ambiente acogedor y sofisticado. Cada habitación cuenta con comodidades modernas, como Wi-Fi de alta velocidad, televisión de pantalla plana y minibar, así como grandes ventanales que permiten la entrada de luz natural y ofrecen vistas panorámicas del océano.</p>
</div>
<div class="rooms text-center">
    <h3 class="section_title">Nuestros alojamientos</h3>
    <div class="room-card" id="room-carousel-container">
        <div class="room-carousel">
            <button id="prev-room" class="carousel-btn">←</button>
            <div class="room-content">
                <img id="room-image" src="" alt="Imagen de la habitación" class="room-image">
            </div>
            <button id="next-room" class="carousel-btn">→</button>
        </div>
    </div>
    <h2 id="room-name">.</h2>
    <p id="room-description">.</p>
</div>

<?= $this->endSection() ?>

<?= $this->section('footer') ?>
<footer class="footer text-center">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <h5>Conectar</h5>
            <ul class="list-unstyled">
                <li class="d-flex justify-content-center align-items-center">
                    <a href="https://www.linkedin.com/in/juan-manuel-gl/" target="_blank" class="d-flex align-items-center">
                        <i class="fab fa-linkedin me-2"></i> 
                        LinkedIn
                    </a>
                </li>
            </ul>
        </div>
    </div>
</footer>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="/js/habitaciones.js"></script>
<?= $this->endSection() ?>