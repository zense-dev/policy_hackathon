<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Policy extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->breadcrumb->add('Home', base_url());

    }

    public function api(){
        $key = $this->input->get('key');
        $data = $this->get_all_schemes();
        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
    }

    private function get_all_schemes(){
        $this->load->model('policy_model');
        $data = $this->policy_model->get_schemes();
        return $data;
    }

    public function index()
    {
        if($this->check_login()==0){
            $this->load->view('policy/login');

        }
        else{
            $this->home();
        }

    }

    public function login(){
        if($this->check_login()==1){
            $this->home();
        }
        else{
            $this->load->view('policy/login', array('content'=>''));
        }
    }

    public function home(){
        if($this->check_login()==1){
            $this->load->model('policy_model');
            $data = $this->policy_model->get_schemes();

            $this->load->view('policy/viewscheme', array('content'=>$data));
        }
        else{
            $this->load->view('policy/login', array('content'=>''));
        }

        //User already logged in
    }

    public function home1(){
        if($this->check_login()==1){
            $this->load->model('policy_model');
            $data = $this->policy_model->get_schemes();

            $this->load->view('policy/viewscheme1', array('content'=>$data));
        }
        else{
            $this->load->view('policy/login', array('content'=>''));
        }

        //User already logged in
    }

    public function schemes_json(){
        $this->load->model('policy_model');
        $val = $this->policy_model->schemes_json();

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($val));
        //return to the view once reach here
        return $val;
    }

    public function home_first(){
        //First time user or not logged in user coming to home
    }

    public function modifyscheme(){
        $this->load->model('policy_model');
        $data = $this->policy_model->get_schemes();

        $this->load->view('policy/modifyscheme', array('content'=> $data));
    }


    public function register(){
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'User Name', 'trim|required|xss_clean|min_length[3]');
            $this->form_validation->set_rules('email', 'Password', 'trim|required|xss_clean|min_length[3]');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');
            $this->form_validation->set_rules('number', 'Phone Number', 'trim|required|xss_clean|min_length[10]');


            if($this->form_validation->run() == false){
                $this->load->view('policy_login', array('content'=> ''));
            }
            else{
                $username = $this->input->post('name');
                $password = $this->input->post('password');
                $email = $this->input->post('email');
                $number = $this->input->post('number');
                echo $username.'<br>';
                echo $email.'<br>';
                echo $password.'<br>';
                echo $number.'<br>';
                $data = array(
                    'user_name'=>$username,
                    'user_email'=> $this->input->post('email'),
                    'user_password'=> md5($this->input->post('password')),
                    'user_number'=> $this->input->post('number'),
                    'user_type'=> 2
                );

                $this->load->model('policy_model');
                $this->policy_model->insert_user($data);
                header('Location: '.base_url().'policy/home');

            }
        }
    }

    private function check_login(){
        if($this->input->cookie('session_key')){
            $key = $this->input->cookie('session_key', TRUE);
            $this->load->model('policy_model');
            $status = $this->policy_model->verify_session(array('session_key'=>$key));
            if($status==1){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }

        /*
         * Will check for all the calls if a user is logged in or not.
         * Will check sessions and all other authentication parameters here itself.
         */


        return 0;
    }

    public  function authenticate_login(){
        //$this->output->enable_profiler(TRUE);

        if($this->input->post()){
            //$this->output->enable_profiler(TRUE);
                $this->form_validation->set_rules('username', 'User Name', 'trim|required|xss_clean|min_length[3]');
                $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[8]');


                if($this->form_validation->run() == false){
                    $this->load->view('policy_login', array('content'=> ''));
                }
                else{
                    $username = $this->input->post('username');
                    $password = $this->input->post('password');
                    echo $username;
                    echo $password;
                    $data = array(
                        'username'=>$username,
                        'password'=>$password
                    );

                    $this->load->model('policy_model');

                    $status = $this->policy_model->check_login($data);
                    if($status==1){
                        $random_number = md5('vikas'.rand(999, 199999));
                        $this->policy_model->insert_session(array('session_key'=>$random_number));
                        //Insert the session into database To do
                        //assign a cookie
                        echo $random_number;
                        $expire = time()+(60*60*24);

                        setcookie('session_key',$random_number, $expire,'/','', FALSE);
                        header('Location: '.base_url().'policy/home'); //Redirect To the respective page
                    }

            }
        }
    }


    public function logout(){
        $session_id = $this->input->cookie('session_key', TRUE);

        $message = '';
        if($this->input->cookie('session_key')){
            setcookie('session_key','', time()-1,'/','', FALSE);
            $this->load->model('policy_model');
            $this->policy_model->delete_session(array('session_key'=>$session_id));
            $message = 'Logged out successfully';
        }
        else{
            $message = 'You are not logged in';
        }
        $this->load->view('nios_header');
        $this->load->view('nios_login', array('content'=> $message));
        $this->load->view('nios_footer');

    }

    public function viewpage($id){
        //Assume all the pages which you are querying do exist
        if(strlen($id)>=1){
            $this->load->model('policy_model');
            $content = $this->policy_model->page_view(array('scheme_id'=>$id));
            $this->load->view('policy/scheme_full', array('content'=> $content));

        }
        else{
            echo 'Error';
        }
    }

    public function report(){
        $this->load->view('policy/reportfinal');
    }

    public function edit_scheme($id){
        if($this->input->post()){
            //
        }
        else{
            if(strlen($id)>=1){
                $this->load->model('policy_model');
                $content = $this->policy_model->page_view(array('scheme_id'=>$id));
                $this->load->view('policy_scheme', array('content'=> $content));
            }
            else{
                echo 'Error';
            }
        }

    }

    public function verify_scheme(){
        /*
         * User Level Identification
         * Conditions
         * If user has the admin rights to the category -> let him verify it officially
         * Else if user has the non admin rights let him validate it as a user
         */
    }

    public function submit(){
        $this->load->view('policy/submit');
    }

    public function validate($id){
        if(strlen($id)>0){
            $this->load->model('policy_model');
            $content = $this->policy_model->page_view(array('scheme_id'=>$id));
            $this->load->view('policy/validate', array('content'=>$content));
            $this->policy_model->verify_scheme($id);
        }
    }

    public function submit_data(){
        /*
         * formdatascheme_name=&scheme_department=1&scheme_objective=&scheme_spec_for=on&
scheme_gender=on&scheme_poverty=on&scheme_marital=on&
scheme_age=on&scheme_family=on&scheme_why=&scheme_help=&scheme_other_details=
         */
        if($this->input->post()){
            //$this->output->enable_profiler(TRUE);
            $this->form_validation->set_rules('scheme_name', 'User Name', 'trim|xss_clean|min_length[3]');
            $this->form_validation->set_rules('scheme_id', 'Scheme ID', 'trim|xss_clean|min_length[1]');
            $this->form_validation->set_rules('scheme_department', 'Department', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_spec_for', 'Area', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_objective', 'Objectives', '');
            $this->form_validation->set_rules('scheme_reginfo', 'Registration Information', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_benefits', 'Scheme Benefits', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_documents', 'Documents Needed', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_gender', 'Gender', 'trim|xss_clean|min_length[1]');
            $this->form_validation->set_rules('scheme_spec_for', 'Scheme Specific For', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_poverty', 'Poverty', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_marital', 'Marital Status', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_age', 'Age', 'trim|xss_clean|min_length[0]');

            if($this->form_validation->run() == false){
                $this->load->view('policy/submit', array('content'=> ''));
            }

            else{
                $this->input->post('scheme_objective');
                $data = array(
                    'scheme_name'=>$this->input->post('scheme_name'),
                    'scheme_funding'=>1,
                    'scheme_dept'=>$this->input->post('scheme_department'),
                    'scheme_objectives'=>$this->input->post('scheme_objective'),
                    'scheme_reginfo'=>$this->input->post('scheme_reginfo'),
                    'scheme_documents'=>$this->input->post('scheme_objective'),
                    'scheme_benefits' =>$this->input->post('scheme_benefits'),
                    'scheme_validation_count' => $this->input->post('scheme_objective')
                );

                $this->load->model('policy_model');
                $policy_id = $this->policy_model->insert_scheme($data);

                $eligibility_data = array(
                    //Update by where parent id
                    'parent_id'=>$policy_id,
                    'gender'=> $this->input->post('scheme_gender'),
                    'age'=> $this->input->post('scheme_age'),
                    'marital_status'=> $this->input->post('scheme_marital'),
                    'area'=> $this->input->post('scheme_spec_for'),
                    'poverty_level'=> $this->input->post('scheme_gender')
                );

                $this->policy_model->insert_eligibility($eligibility_data);
            }

            $new = array('success'=>1);
            $this->output->set_content_type('application/json');
            $json = $this->output->set_output(json_encode($new));
            //return to the view once reach here
            return $new;
        }
    }

    public function modify_data(){
        /*
         * formdatascheme_name=&scheme_department=1&scheme_objective=&scheme_spec_for=on&
scheme_gender=on&scheme_poverty=on&scheme_marital=on&
scheme_age=on&scheme_family=on&scheme_why=&scheme_help=&scheme_other_details=
         */
        if($this->input->post()){
            //$this->output->enable_profiler(TRUE);
            $this->form_validation->set_rules('scheme_name', 'User Name', 'trim|xss_clean|min_length[3]');
            $this->form_validation->set_rules('scheme_id', 'Scheme ID', 'trim|xss_clean|min_length[1]');
            $this->form_validation->set_rules('scheme_department', 'Department', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_spec_for', 'Area', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_objective', 'Objectives', '');
            $this->form_validation->set_rules('scheme_reginfo', 'Registration Information', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_benefits', 'Scheme Benefits', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_documents', 'Documents Needed', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_gender', 'Gender', 'trim|xss_clean|min_length[1]');
            $this->form_validation->set_rules('scheme_spec_for', 'Scheme Specific For', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_poverty', 'Poverty', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_marital', 'Marital Status', 'trim|xss_clean|min_length[0]');
            $this->form_validation->set_rules('scheme_age', 'Age', 'trim|xss_clean|min_length[0]');

            if($this->form_validation->run() == false){
                $this->load->view('policy/submit', array('content'=> ''));
            }

            else{
                $this->input->post('scheme_objective');
                $data['data'] = array(
                    'scheme_name'=>$this->input->post('scheme_name'),
                    'scheme_funding'=>1,
                    'scheme_dept'=>$this->input->post('scheme_department'),
                    'scheme_objectives'=>$this->input->post('scheme_objective'),
                    'scheme_reginfo'=>$this->input->post('scheme_reginfo'),
                    'scheme_documents'=>$this->input->post('scheme_objective'),
                    'scheme_benefits' =>$this->input->post('scheme_benefits'),
                    'scheme_validation_count' => $this->input->post('scheme_objective')
                );
                $data['scheme_id'] = $this->input->post('scheme_id');

                $this->load->model('policy_model');
                $this->policy_model->modify_scheme($data);


                $eligibility_data['data'] = array(
                    //Update by where parent id
                    'gender'=> $this->input->post('scheme_gender'),
                    'age'=> $this->input->post('scheme_age'),
                    'marital_status'=> $this->input->post('scheme_marital'),
                    'area'=> $this->input->post('scheme_spec_for'),
                    'poverty_level'=> $this->input->post('scheme_gender')
                );

                $eligibility_data['scheme_id'] = $this->input->post('scheme_id');

                $this->policy_model->modify_eligibility($eligibility_data);
            }

            $new = array('success'=>1);
            $this->output->set_content_type('application/json');
            $json = $this->output->set_output(json_encode($new));
            //return to the view once reach here
            return $new;
        }
    }


    public function numbers(){
        header('access-control-allow-origin: *');
        //$this->header('access-control-allow-origin: *');
        $this->load->model('policy_model');
        $old_data = $this->policy_model->get_numbers();
        $data = array("dataArray"=>$old_data);
        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
        //return to the view once reach here
        return $data;
    }
}