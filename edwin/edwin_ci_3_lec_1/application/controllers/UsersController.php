<?php


class UsersController extends CI_Controller{

    public function show(){
        // loading model in controller
        $this->load->model('UsersModel', 'user');
        $data = [];
        $data['users'] = $this->user->get();
        $this->load->view('users', $data);
        return;
    }

    public function getUser($id){
        $this->load->model('UsersModel', 'user');
        print_r($this->user->getUser('satyam.sharmadev@gmail.com', 'password'));
        return;
    }

    public function create(){
        $this->load->model('UsersModel', 'user');
        $user['name'] = 'Guddu Sharma';
        $user['user_name'] = 'guddu.sharma';
        $user['email'] = 'guddu.sharma@gmail.com';
        $user['dob'] = '23/04/1999';
        $user['password'] = 'Password';
        var_dump($this->user->insert($user));
    }


    public function update(){
        $this->load->model('UsersModel', 'user');
        $user['name'] = 'Mahendra Sharma';
        var_dump($this->user->update(3, $user));
    }

    /**
     * deletes user data
     */
    public function delete(int $id){
        $this->load->model('UsersModel', 'user');
        var_dump($this->user->delete($id));
    }


    /**
     * deletes user data
     */
    public function login(){
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            return redirect(base_url('home/index'));
        }else{
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->load->model('UsersModel', 'user');
            $user_id = $this->user->loginUser($username, $password);
            if($user_id){
                $data = [
                    'user_id' => $user_id,
                    'username' => $username,
                    'logged_in' => true
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('login_success', 'Logged in successfully.');
                redirect(base_url('home/index'), 'refresh');
            }else{
                $this->session->set_flashdata('login_failed', 'Sorry, you\'re not logged in.');
                redirect(base_url('home/index'), 'refresh');                
            }

        }
    }


    /**
     * Logs out user
     */
    public function logout(){
        $this->session->unset_userdata('logged_in');
        return redirect('home/index');
    }
}