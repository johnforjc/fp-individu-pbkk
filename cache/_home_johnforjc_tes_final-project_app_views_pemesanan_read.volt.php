<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Backoffice - Learning Phalcon</title>
    <script src="https://kit.fontawesome.com/420910a352.js" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body style="background-image: url('/public/img/background.jpg')">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="/">Restoku</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pemesanan">Reservasi</a>
                </li>
            </ul>
            <?php if ($this->session->has('user')) { ?>
                
                <ul class="nav navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?= $this->session->get('user')->name ?></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/pemesanan/read">List Reservasi</a>
                        <a class="dropdown-item" href="#">Change Password</a>
                        <?php if ($this->session->get('user')->name == 'admin') { ?>
                            <a class="dropdown-item" href="/meja/read">List Meja</a>
                        <?php } ?>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/logout">Log out</a>
                    </div>
                </li>
            </ul>
            <?php } else { ?>
                <div class="nav-item my-2 my-lg-0"><a href="/signin" class="nav-link text-dark">Sign In</a></div>
                <div class="nav-item"><a href="/signup" class="nav-link text-dark">Sign Up</a></div>
            <?php } ?>
        </div>
    </nav>
    

    <section class="py-2 px-5">
        <?php if ($this->session->get('user')->name != 'admin') { ?>
            <a class="text-dark" href="/pemesanan/create">
                <div class="btn btn-primary">
                    Tambah reservasi
                </div>
            </a>
        <?php } ?>
        <section class="py-2">
            <div class="container">

            <?php if ($this->length($pemesanans) > 0) { ?>

                <?php foreach ($pemesanans as $pemesanan) { ?>

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
                                                    <label class="col-md-6 text-left">Nomor Meja</label> : <?= $pemesanan->id_meja ?>
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Biaya</label> : <?= $pemesanan->biaya ?>
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Waktu Mulai </label> : <?= $pemesanan->waktu_reservasi ?>
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Waktu Selesai </label> : <?= $pemesanan->waktu_selesai ?>
                                                </div>
                                            </form>
                                            <?php if ($this->session->get('user')->name == 'admin') { ?>
                                                <div class="btn btn-primary"  data-toggle="modal" data-target="#imgModal<?= $pemesanan->id ?>">
                                                    Bukti Pembayaran
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="imgModal<?= $pemesanan->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran <?= $pemesanan->id ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src=<?= $pemesanan->bukti_pembayaran ?> width="400px">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="ml-5 col-md-3">
                                        <?php if ($this->session->get('user')->name == 'admin') { ?>
                                            <?php if ($pemesanan->lunas == 1 || $pemesanan->lunas == 0) { ?>
                                                <a href=<?= $this->url->get('pemesanan/verifikasi/' . $pemesanan->id) ?>>
                                                    <div class="btn btn-primary">
                                                        Verifikasi
                                                    </div>
                                                </a>
                                            <?php } else { ?>
                                                <div class="btn btn-success disabled">
                                                    Terverifikasi
                                                </div>
                                            <?php } ?>
                                        <?php } else { ?>
                                            <a class="py-2" href=<?= $this->url->get('pemesanan/delete/' . $pemesanan->id) ?>>
                                                <div class="btn btn-lg btn-danger py-2">
                                                    Batalkan
                                                </div>
                                            </a>
                                            <?php if ($pemesanan->lunas == 0) { ?>
                                                <a class="py-2" href=<?= $this->url->get('pemesanan/upload/' . $pemesanan->id) ?>>
                                                    <div class="btn btn-lg btn-warning py-2">
                                                        Upload Pembayaran
                                                    </div>
                                                </a>
                                            <?php } elseif ($pemesanan->lunas == 1) { ?>
                                                <div class="btn btn-lg btn-info disabled  py-2">
                                                    Sedang Diverifikasi
                                                </div>
                                            <?php } else { ?>
                                                <div class="btn btn-lg btn-success disabled py-2">
                                                    Terverifikasi
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php } ?>

            <?php } else { ?>
                <div class="text-md-centre"> 
                    Tidak ada transaksi reservasi
                </div> 
            <?php } ?>
            </div>
        </section>
    </section>



</body>
</html>