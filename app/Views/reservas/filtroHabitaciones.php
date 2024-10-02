<?= $this->extend('layouts/reservas') ?>
<?= $this->section('content') ?>
<h1 class="text-center mb-4">Busca tu alojamiento adecuado</h1>

<form id="reservation-filters" class="mt-4 mx-auto" style="max-width: 800px;">
    <div class="row g-3">
        <div class="col-md-6">
            <div class="row mb-2">
                <label for="checkin" class="col-sm-4 col-form-label text-start">Check-in:</label>
                <div class="col-sm-6">
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="beds" class="col-sm-4 col-form-label text-start">Camas:</label>
                <div class="col-sm-6">
                    <select id="camas" name="camas" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="price" class="col-sm-4 col-form-label text-start">Máx. Precio:</label>
                <div class="col-sm-6">
                    <input type="number" id="precio" name="precio" class="form-control" placeholder="Precio máximo">
                </div>
            </div>

            <div class="row mb-2">
                <label for="guests" class="col-sm-4 col-form-label text-start">Huéspedes:</label>
                <div class="col-sm-6">
                    <select id="capacidad" name="capacidad" class="form-control" required>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="col-md-6">

            <div class="row mb-2">
                <label for="checkout" class="col-sm-4 col-form-label text-start">Check-out:</label>
                <div class="col-sm-6">
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
                </div>
            </div>

            <div class="row mb-2">
                <label for="bathrooms" class="col-sm-4 col-form-label text-start">Baños:</label>
                <div class="col-sm-6">
                    <select id="baños" name="baños" class="form-control">
                        <option value="">Seleccione</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="sort" class="col-sm-4 col-form-label text-start">Ordenar:</label>
                <div class="col-sm-6">
                    <select id="sort" name="sort" class="form-control">
                        <option value="asc">De menor a mayor</option>
                        <option value="desc">De mayor a menor</option>
                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label for="available-only" class="col-sm-4 col-form-label text-start">Disponible:</label>
                <div class="col-sm-6 d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2" id="disponibilidad" name="disponibilidad">
                </div>
            </div>
        </div>
    </div>

    <div class="text-center mt-3">
        <button type="submit" id="search-button" class="btn btn-primary">Buscar Habitaciones</button>
    </div>
</form>


<div id="room-list" class="mt-4">
<h2 class="text-center mb-4">Habitaciones</h2>
    <div class="room-card-list mx-auto">

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="/js/reservas.js"></script>
<?= $this->endSection() ?>
