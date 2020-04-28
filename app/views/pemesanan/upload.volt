{% extends "layouts/index.volt" %}

{% block body %}

<form accept-charset="UTF-8" class="text-white" action="/pemesanan/change" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <input type="hidden" name="id" class="form-control disabled text-white" id="id" value={{ pemesanan.id }}>
    </div>
    <div class="form-group">
        <label for="biaya" class="col-md-4 text-white">Biaya</label> : {{pemesanan.biaya}}
    </div>
    <div class="form-group">
        <label for="biaya" class="col-md-4 text-white">Waktu Mulai </label> : {{pemesanan.waktu_reservasi}}
    </div>
    <div class="form-group">
        <label for="biaya" class="col-md-4 text-white">Waktu Selesai </label> : {{pemesanan.waktu_selesai}}
    </div>
    <hr>
    <div class="form-group col-md-5 mt-3">
        <label class="mr-2 text-white">Upload bukti pembayaran:</label><br>
        <input class="form-control"type="file" name="file" required><br>
        <small class="text-white">Only support jpg file</small>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary text-white">Submit</button>
</form>

{% endblock %}