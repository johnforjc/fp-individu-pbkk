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
    

<div id="login">
    <div class="container pt-5">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="/register" method="post">
                        <h3 class="text-center text-white">Sign Up</h3>
                        <div class="form-group">
                            <label for="name" class="text-white">Name:</label><br>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-white">Email:</label><br>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-white">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="confirm" class="text-white">Confirm Password:</label><br>
                            <input type="password" name="confirm" id="confirm" class="form-control">
                        </div>
                        <div class="form-group justify-content-center align-items-center">
                            <input type="submit" name="submit" class="btn btn-info btn-md justify-content-center align-items-center" value="submit">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="/signin" class="text-white">Sign in here</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




</body>
</html>