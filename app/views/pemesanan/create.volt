{% extends "layouts/index.volt" %}

{% block body %}

    <form id="login-form" class="form" action="/pemesanan/list" method="post">
        <h3 class="text-center text-white">Reservasi</h3>
        <div class="form-group">
            <label for="date" class="text-white col-md-2">Tanggal Reservasi:</label>
            <input type="date" name="date" id="datepicker" class="col-md-6">
        </div>
        <div class="form-group">
            <label for="waktu" class="text-white col-md-2">Waktu Reservasi:</label>
            <input type="time" name="waktu" id="waktu" min="09:00" max="20:00" class="col-md-6" required>
            <small class="text-white">Use AM PM</small>
        </div>
        <div class="form-group">
            <label for="durasi" class="text-white col-md-2">Durasi:</label>
            <input type="number" name="durasi" id="durasi" class="col-md-6">
        </div>
        <div class="form-group justify-content-center align-items-center">
            <input type="submit" name="submit" class="btn btn-info btn-md justify-content-center align-items-center" value="Cari meja">
        </div>
    </form>

{% endblock %}