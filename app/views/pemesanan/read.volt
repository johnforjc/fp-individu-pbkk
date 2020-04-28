{% extends "layouts/index.volt" %}

{% block body %}

    <section class="py-2 px-5">
        {% if session.get('user').name != "admin" %}
            <a class="text-dark" href="/pemesanan/create">
                <div class="btn btn-primary">
                    Tambah reservasi
                </div>
            </a>
        {% endif %}
        <section class="py-2">
            <div class="container">

            {% if  pemesanans|length  > 0 %}

                {% for pemesanan in pemesanans %}

                    <div class="row mb-8 py-2">
                        <div class="col-md-12">
                            <div class="card shadow py-2">
                                <div class="card-body py-2">
                                    <div class="row text-center ">
                                        <div class="col-md-2 mr-2">
                                            <i class="fas fa-couch fa-5x"></i>
                                        </div>
                                        <div class="col-md-6 mr-3">
                                            <form>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Nomor Meja</label> : {{pemesanan.id_meja}}
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Biaya</label> : {{pemesanan.biaya}}
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Waktu Mulai </label> : {{pemesanan.waktu_reservasi}}
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Waktu Selesai </label> : {{pemesanan.waktu_selesai}}
                                                </div>
                                            </form>
                                            {% if session.get('user').name == "admin" %}
                                                <div class="btn btn-primary"  data-toggle="modal" data-target="#imgModal{{ pemesanan.id }}">
                                                    Bukti Pembayaran
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="imgModal{{ pemesanan.id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran {{ pemesanan.id }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src={{ pemesanan.bukti_pembayaran}} width="400px">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            {% endif %}
                                        </div>
                                        <div class="ml-5 col-md-3">
                                        {% if session.get('user').name == "admin" %}
                                            {% if pemesanan.lunas == 1 OR pemesanan.lunas == 0%}
                                                <a href={{ url("pemesanan/verifikasi/" ~  pemesanan.id) }}>
                                                    <div class="btn btn-primary">
                                                        Verifikasi
                                                    </div>
                                                </a>
                                            {% else %}
                                                <div class="btn btn-success disabled">
                                                    Terverifikasi
                                                </div>
                                            {% endif %}
                                        {% else %}
                                            <a class="py-2" href={{ url("pemesanan/delete/" ~  pemesanan.id) }}>
                                                <div class="btn btn-lg btn-danger py-2">
                                                    Batalkan
                                                </div>
                                            </a>
                                            {% if pemesanan.lunas == 0 %}
                                                <a class="py-2" href={{ url("pemesanan/upload/" ~  pemesanan.id) }}>
                                                    <div class="btn btn-lg btn-warning py-2">
                                                        Upload Pembayaran
                                                    </div>
                                                </a>
                                            {% elseif pemesanan.lunas == 1 %}
                                                <div class="btn btn-lg btn-info disabled  py-2">
                                                    Sedang Diverifikasi
                                                </div>
                                            {% else %}
                                                <div class="btn btn-lg btn-success disabled py-2">
                                                    Terverifikasi
                                                </div>
                                            {% endif %}
                                        {% endif %}
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                {% endfor %}

            {% else %}
                <div class="text-md-centre"> 
                    Tidak ada transaksi reservasi
                </div> 
            {% endif %}
            </div>
        </section>
    </section>

{% endblock %}