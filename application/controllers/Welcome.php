<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        if($this->session->userdata('nb') == "") {
            $this->session->set_userdata('nb', array());
        }
        if($this->session->userdata('list') == "") {
            $this->session->set_userdata('list', array());
        }
        $this->load->helper('url');


        $this->load->model('medicament');
        $randomMedic = $this->medicament->randomMedic();
        $newMedic = $this->medicament->getRecentMedic();

        $data = array();
        $data['randomMedic'] = $randomMedic;
        $data['newMedic'] = $newMedic;
        $data['page'] = "acceuil";

        $this->load->view('index', $data);
    }

    public function connection()
    {
        if(isset($user)) {
            $this->load->helper('url');
            redirect('/welcome/index', 'refresh');
        } else {
            $data['type'] = "connect";
            $this->load->view('connection', $data);
        }
    }

    public function signup()
    {
        if(isset($user)) {
            $this->load->helper('url');
            redirect('/welcome/index', 'refresh');
        } else {
            $data['type'] = "signup";
            $this->load->view('connection', $data);
        }
    }

    public function connect()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('client');
        if($this->client->authentificate($email, $password)) {
            redirect('/Welcome/index', 'refresh');
        } else {
            $data['type'] = "connect";
            $this->load->view('connection', $data);
        }
    }

    public function join()
    {
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $this->load->model('client');
        if($this->client->signup($nom, $prenom, $email, $password)) {
            $this->load->helper('url');
            redirect('/welcome/index', 'refresh');
        } else {
            $data['type'] = "signup";
            $this->load->view('signup', $data);
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('list');
        $this->session->unset_userdata('nb');
        redirect('/welcome/index', 'refresh');
    }

    public function cart()
    {
        $data = array();
        $data['page'] = "cart";
        $this->load->view('index', $data);
    }

}
