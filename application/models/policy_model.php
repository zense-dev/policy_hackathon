<?php class Policy_model extends CI_Model{

    public $articleTable = ARTICLESTABLE;
    public $categoryTable = CATEGORIESTABLE;

    public function __construct() {
        parent::__construct();
        $this->db->query("SET time_zone='+5:30'");
    }

    public function get_numbers(){
        $query = $this->db->get('sms_table');
        return $query->result();

    }

    public function livesearch($data){
        $this->db->select('number, sms');
        $this->db->like('sms', $data, 'after');
        return $this->db->get('sms_table')->result();
    }

    public function check_login($data){
        $query = $this->db->get_where('users', array('user_name'=>$data['username']));
        if($query->num_rows()==1){
            //Username exists go ahead and verify password
            $password = $query->row()->user_password;
            if(md5($data['password'])==$password){
                //Give access
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0; //Means the user does not exist
        }
        /*checks if the username and password are correct or not*/
    }

    public function insert_session($data){
        $this->db->insert('session', $data);
    }

    public function verify_session($data){
        $query = $this->db->get_where('session', $data);
        if($query->num_rows()>0){
            return 1;
        }
        else{
            return 0;
        }
        /*Verifies if a session exists or not*/
    }

    public function delete_session($data){
        $this->db->delete('session', $data);
        return 1;
    }

    public function page_view($data){
        $query = $this->db->get_where('schemes', $data);
        return $query->result();
    }

    public function insert_scheme($data){
        $this->db->insert('schemes', $data);
        return $this->db->insert_id();
    }

    public function insert_eligibility($data){
        $this->db->insert('eligibility', $data);
    }

    public function modify_scheme($data){
        $this->db->where('scheme_id', $data['scheme_id']);
        $this->db->update('schemes', $data['data']);
    }

    public function modify_eligibility($data){
        $this->db->where('parent_id', $data['scheme_id']);
        $this->db->update('eligibility', $data['data']);
    }

    public function verify_scheme($data){
            $this->db->query('UPDATE  schemes SET scheme_validation_count = scheme_validation_count +1, scheme_flag=1 WHERE scheme_id ='.$data);
    }

    public function get_schemes(){
        $query = $this->db->get('schemes');
        return $query->result();
    }

    public function user_type($id){

    }

    public function insert_user($data){
        $this->db->insert('users', $data);
    }


    public function search($string){
        $this->db->like('scheme_name', $string, 'both');
        //$this->db->like('scheme_name', $string, 'after');
        $query = $this->db->get('schemes');
        return $query->result();
    }

    public function modification_data($id){
        $query = $this->db->get_where('schemes', array('scheme_id'=>$id));
        $data['scheme']= $query->result();
        $query = $this->db->get_where('eligibility', array('parent_id'=>$id));
        $data['eligibility']=$query->result();

        return $data;

    }


}