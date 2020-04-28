{% extends "layouts/index.volt" %}

{% block body %}

    <section class="py-2 px-5">
        <div class="btn btn-primary">
            <a class="text-dark" href="/meja/create">Tambah Meja</a>
        </div>
        <section class="py-2">
            <div class="container">

            {% if  mejas|length  > 0 %}

                {% for meja in mejas %}

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="row text-center ">
                                        <div class="col-md-1 mr-2">
                                            <i class="fas fa-couch fa-5x" ></i>
                                        </div>
                                        <div class="col-md-6 px-2">
                                            <form>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Nomor Meja</label> : {{meja.id}}
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Biaya</label> : {{meja.harga}}
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Kapasitas </label> : {{meja.kapasitas}}
                                                </div>
                                            </form>
                                        </div>
                                        <div class="py-5 col-md-1 mr-2">
                                            <a href={{ url("meja/delete/" ~  meja.id) }}>
                                                <div class="btn btn-danger">
                                                    Delete
                                                </div>
                                            </a>
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
        </section>
    </section>

{% endblock %}