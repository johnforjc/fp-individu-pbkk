{% extends "layouts/index.volt" %}

{% block body %}

    <form id="login-form" class="form" action="/pemesanan/list" method="post">
        <h3 class="text-center text-info">Reservasi</h3>
        <div class="form-group">
            <label for="date" class="text-info col-md-2">Tanggal Reservasi:</label>
            <input type="date" name="date" id="datepicker" class="col-md-6" value={{date}}>
        </div>
        <div class="form-group">
            <label for="waktu" class="text-info col-md-2">Waktu Reservasi:</label>
            <input type="time" name="waktu" id="waktu" class="col-md-6" value={{waktu}}>
            <small>Use AM PM</small>
        </div>
        <div class="form-group">
            <label for="durasi" class="text-info col-md-2">Durasi:</label>
            <input type="number" name="durasi" id="durasi" class="col-md-6" value={{durasi}}>
        </div>
        <div class="form-group justify-content-center align-items-center">
            <input type="submit" name="submit" class="btn btn-info btn-md justify-content-center align-items-center" value="Cari meja">
        </div>
    </form>

    <div class="container">

            {% if  mejas|length  > 0 %}

                {% for meja in mejas %}

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row text-center ">
                                        <div class="col-md-1 mr-2">
                                            <i class="fas fa-couch fa-5x"></i>
                                        </div>
                                        <div class="col-md-6">
                                            <form>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Meja</label> : {{meja.id}}
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Kapasitas</label> : {{meja.kapasitas}}
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Harga tiap jam </label> : {{meja.harga}}
                                                </div>
                                            </form>
                                        </div>
                                        <div class="py-5 col-md-1 mr-2">
                                        <form action="/pemesanan/save" method="post">
                                                <input type="hidden" name="durasi" value={{ durasi }}>
                                                <input type="hidden" name="waktu" value={{ waktu }}>
                                                <input type="hidden" name="meja" value={{ meja.id }}>
                                                <input type="hidden" name="mulai" value={{ mulai }}>
                                                <input type="hidden" name="harga" value={{ meja.harga * durasi }}>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Reservasi">
                                            </a>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                {% endfor %}

            {% else %}
            <div class="text-md-centre"> 
                Table for reservation not found
            </div> 
            {% endif %}
            </div>

{% endblock %}