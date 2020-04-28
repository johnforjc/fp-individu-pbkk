{% extends "layouts/index.volt" %}
{% block body %}

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


{% endblock %}