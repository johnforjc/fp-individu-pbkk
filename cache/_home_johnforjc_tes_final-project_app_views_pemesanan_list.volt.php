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
                    <a class="nav-link" href="/pemesanan/create">Reservasi</a>
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
    

    <form id="login-form" class="form" action="/pemesanan/list" method="post">
        <h3 class="text-center text-white">Reservasi</h3>
        <div class="form-group">
            <label for="date" class="text-white col-md-2">Tanggal Reservasi:</label>
            <input type="date" name="date" id="datepicker" class="col-md-6" value=<?= $date ?>>
        </div>
        <div class="form-group">
            <label for="waktu" class="text-white col-md-2">Waktu Reservasi:</label>
            <input type="time" name="waktu" id="waktu" class="col-md-6" value=<?= $waktu ?>>
            <small class="text-white">Use AM PM</small>
        </div>
        <div class="form-group">
            <label for="durasi" class="text-white col-md-2">Durasi:</label>
            <input type="number" name="durasi" id="durasi" class="col-md-6" value=<?= $durasi ?>>
        </div>
        <div class="form-group justify-content-center align-items-center">
            <input type="submit" name="submit" class="btn btn-info btn-md justify-content-center align-items-center" value="Cari meja">
        </div>
    </form>

    <div class="container">

            <?php if ($this->length($mejas) > 0) { ?>

                <?php foreach ($mejas as $meja) { ?>

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
                                                    <label class="col-md-6 text-left">Meja</label> : <?= $meja->id ?>
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Kapasitas</label> : <?= $meja->kapasitas ?>
                                                </div>
                                                <div class="form-group col-md-12 d-flex">
                                                    <label class="col-md-6 text-left">Harga tiap jam </label> : <?= $meja->harga ?>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="py-5 col-md-1 mr-2">
                                        <form action="/pemesanan/save" method="post">
                                                <input type="hidden" name="durasi" value=<?= $durasi ?>>
                                                <input type="hidden" name="waktu" value=<?= $waktu ?>>
                                                <input type="hidden" name="meja" value=<?= $meja->id ?>>
                                                <input type="hidden" name="mulai" value=<?= $mulai ?>>
                                                <input type="hidden" name="harga" value=<?= $meja->harga * $durasi ?>>
                                                <input type="submit" name="submit" class="btn btn-primary" value="Reservasi">
                                            </a>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                <?php } ?>

            <?php } else { ?>
            <div class="text-md-centre"> 
                Table for reservation not found
            </div> 
            <?php } ?>
            </div>



</body>
</html>