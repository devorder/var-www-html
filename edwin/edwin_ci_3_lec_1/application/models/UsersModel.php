<?php

class UsersModel extends CI_Model{

    public function get(){
        // return $this->db->get('users')->result();
        // return $this->db->select('id, name, user_name, email, dob')->get('users')->result();
        $query = $this->db->query('SELECT * FROM `users`');
        echo 'Num Fields'. $query->num_fields();
        echo 'Num Rows'. $query->num_rows();
        return $query->result();
    }

    public function getUser($user_name, $password){
        return $this->db
                    ->where(['user_name' => $user_name, 'password' => $password])
                    ->or_where(['email' => $user_name, 'password' => $password])
                    ->get('users')
                    ->result();
    }

    /**
     * Inserts data into db
     */
    public function insert(array $user_data){
        if( empty( $this->getUser($user_data['user_name'], $user_data['password']) ) ){
            return $this->db->insert('users', $user_data) ? $this->db->insert_id() : false;
        }else{
            return false;
        }
    }


    /**
     * updates user details
     */
    public function update(int $id, array $user_data){
        if( ! empty( $this->db->where(['id' => $id])->get('users')->result() ) ){
            return $this->db->where(['id' => $id])->update('users', $user_data);
        }else{
            return false;
        }
    }

    /**
     * deletes user data
     */
    public function delete(int $id){
        return $this->db->where(['id' => $id])->delete('users');
    }

    /**
     * Logs a user in
     */
    public function loginUser($username, $password){
        $this->db->where(['user_name' => $username, 'password' => $password]);
        $this->db->or_where(['email' => $username, 'password' => $password]);
        $result = $this->db->get('users');
        if($result->num_rows() == 1){
            // legitimate user
            return $result->row(0)->id;
        }else{
            return false;
        }
    }
}