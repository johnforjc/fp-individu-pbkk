a:5:{i:0;s:153:"<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>";s:9:"pageTitle";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:29:"Backoffice - Learning Phalcon";s:4:"file";s:62:"/home/johnforjc/tes/final-project/app/views/layouts/index.volt";s:4:"line";i:6;}}i:1;s:3082:"</title>
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
    ";s:4:"body";a:1:{i:0;a:4:{s:4:"type";i:357;s:5:"value";s:5:"
    ";s:4:"file";s:62:"/home/johnforjc/tes/final-project/app/views/layouts/index.volt";s:4:"line";i:67;}}i:2;s:17:"

</body>
</html>";}