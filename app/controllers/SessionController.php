<?php

use Phalcon\Security;
use Phalcon\Db;

class SessionController extends BaseController
{
    public function indexAction()
    {
        
    }

    public function signupAction()          // Redirect ke view
    {
        // if ($this->session->has('user-name')) {
        //     // Retrieve its value
        //     $this->flash->notice("You are logged in!!");
        //     $this->view->disable();
        //     return $this->response->redirect("/");
            
        //     // echo $this->session->get('user-name')->name;
        // }

        $users = Users::find();
        foreach ($users as $user)
        {
            echo $user->name . '<br>';
        }
        // return 'Sign Up';
    }
    
    public function registerAction()        // backend register
    {
        $name               = $this->request->getPost('name', 'string');
        $email              = $this->request->getPost('email', 'string');
        $password           = $this->request->getPost('password', 'string');
        $confirm_password   = $this->request->getPost('confirm', 'string');

        // echo $name, $email, $password, $confirm_password;
        
        if($name == "" || $email == "" || $password == "" || $confirm_password == "")
        {
            $this->flash->error("It's look like some field is not filled!");
            return $this->response->redirect('/signup');
        }

        if($password == $confirm_password)
        {
            $user = new Users();

            $user->name     = $name;
            $user->email    = $email;
            $user->password = $this->security->hash($password);

            $result = $user->create();

            if($result === false)
            {
                return $result;
            }
            $this->session->set("user", $user);
            $this->response->redirect('/');
        }
        else
        {
            $this->flash->error("Your password doesn't match with confirm password!");
            //pick up the same view to display the flash session errors
            return $this->view->pick("register");
        }
    }

    public function signinAction()
    {
        // if ($this->session->has('user-name')) {
        //     // Retrieve its value
        //     $this->flash->notice("You are logged in!!");
        //     $this->view->disable();
        //     return $this->response->redirect("/");
        // }
        // return 'Sign In';
    }

    public function loginAction()
    {

        $email              = $this->request->getPost('email', 'string');
        $password           = $this->request->getPost('password', 'string');

        if($email === "" || $password === "")
        {
            $this->flash->error("It's look like some field is not filled!");
            return $this->response->redirect('/signin');
        }

        $user = Users::findFirst("email = '" . $email . "'");

        // echo $user->password, $password, '<br>' $this->security->hash($password);
        if($user)
        {
            if($this->security->checkHash($password, $user->password))
            {
                $this->session->set("user", $user);
                return $this->response->redirect('/');
            }
            else
            {
                $this->flash->error("It's look like your email and password doesn't match with any record!");
                return $this->response->redirect('/signin');
            }
        }
        else
        {
            $this->flash->error("It's look like your email and password doesn't match with any record!");
            return $this->response->redirect('/signin');
        }
        
        // echo 'Jonathan has been hashed: ' . $this->security->hash('Jonathan');
    }

    public function logoutAction()
    {
        $this->session->destroy();
        return $this->response->redirect('/');
    }
}