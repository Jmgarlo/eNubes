<?= $this->extend('layouts/index') ?>
<?= $this->section('content') ?>
<div class="main-image">
</div>

<div class="text-center my-4">
    <h3 class="section_title"><?= lang('index.hotel_address_title'); ?></h3>
    <p><?= lang('index.hotel_address'); ?></p>
</div>
<div class="description text-center">
    <h3 class="section_title"><?= lang('index.hotel_description_title'); ?></h3>
    <p class="descripcion_hotel"><?= lang('index.hotel_description'); ?></p>
</div>
<div class="rooms text-center">
    <h3 class="section_title"><?= lang('index.our_accommodations_title'); ?></h3>
    <div class="room-card" id="room-carousel-container">
        <div class="room-carousel">
            <button id="prev-room" class="carousel-btn">←</button>
            <div class="room-content">
                <img id="room-image" src="" alt="<?= lang('index.room_image_alt'); ?>" class="room-image">
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
<script type="module" src="/js/habitaciones.js"></script>
<?= $this->endSection() ?>
