<?php


class Home extends CI_Controller{
    public function index(){
        $data['view'] = 'home_view';
        $this->load->view('layout/main', $data);
    }
}