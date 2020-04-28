<?php

class IndexController extends BaseController
{
    public function indexAction()
    {
        if($this->session->has('user')) $this->view->user = $this->session->get('user');
        else $this->view->user = "";
    }
}