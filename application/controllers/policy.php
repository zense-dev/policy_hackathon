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
            $this->output->enable_profiler(TRUE);
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
                $policy_id = $this->policy_model->modify_scheme($data);


                $eligibility_data['data'] = array(
                    //Update by where parent id
                    'gender'=> $this->input->post('scheme_gender'),
                    'age'=> $this->input->post('scheme_age'),
                    'marital_status'=> $this->input->post('scheme_marital'),
                    'area'=> $this->input->post('scheme_spec_for'),
                    'poverty_level'=> $this->input->post('scheme_gender')
                );

                $eligibility_data['scheme_id'] = $policy_id;

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

    public function live(){
        $this->load->model('policy_model');
        $postdata = $this->input->post('search_data');
        $this->output->set_content_type('application/json');
        $data = $this->policy_model->livesearch($postdata);
        $json = $this->output->set_output(json_encode($data));
        //return to the view once reach here
        return $data;
    }

    public function search(){
        $string = $this->input->get('string');
        $this->load->model('policy_model');
        $results = $this->policy_model->search($string);
        $this->load->view('policy/search', array('content'=>$results));
    }

    public function modify($id){
        if(strlen($id)>0){
            $this->load->model('policy_model');
            $content = $this->policy_model->modification_data($id);
            $this->load->view('policy/modify', array('scheme'=>$content['scheme'], 'eligibility'=>$content['eligibility']));
        }
        else{
            echo "error";
        }
    }









    //Policy Hackathon Code Ends Here










    /* Form submission will call add_article method. Validation is checked in this method name. If validation successful, will pass data to the model and get the response and message back. Once response comes, will pass to the view in the form of JSON. */







    public function delete_article(){
        if($this->input->post())
        {
            //start validation
            $this->load->library( array('form_validation'));
            $this->load->helper('form');

            $this->form_validation->set_rules('article_id', 'Article ID', 'trim|required|xss_clean|min_length[1]');


            if($this->form_validation->run() == false){

                $message = validation_errors();
                $data = array('message' => $message,'status'=>0);
            }
            else{
                $articleId = $this->input->post('article_id');
                $this->load->model('article_model');
                $data['article_id'] = $articleId;
                //Array will be returned from the below function which will have status and message
                $response = $this->article_model->delete_article($data);
                $data = $response;
                //file_put_contents('newfile.dat',$data);
            }
        }
        else{
            //If opened this method without post method, this will be displayed.
            $message = "Invalid";
            $data = array('message' => $message,'status'=>0);
        }

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
        //return to the view once reach here
        return $data;
    }



    public function upload_image(){
        $filename = md5($_FILES['file']['name']);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']	= '100000';
        $config['max_width']  = '10240';
        $config['max_height']  = '7680';
        $config['file_name'] = $filename;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('file'))
        {
            $data = array('error' => $this->upload->display_errors());
        }
        else
        {
            $data = array('filelink' => base_url().'uploads/'.$filename.'.png');
        }
        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
        //return to the view once reach here
        return $data;

    }

    public function get_articles_category(){
        //should return articles of a category
        if($this->input->post())
        {
            //start validation
            $this->load->library( array('form_validation'));
            $this->load->helper('form');

            $this->form_validation->set_rules('category_id', 'Category ID required', 'trim|required|xss_clean|min_length[1]');


            if($this->form_validation->run() == false){
                $message = validation_errors();
                $data = array('message' => $message,'status'=>0);
            }
            else{
                $categoryId = $this->input->post('category_id');
                $this->load->model('article_model');
                $inp['article_category_id'] = $categoryId;
                //Array will be returned from the below function which will have status and message
                $response = $this->article_model->get_articles_category($inp);
                $data = $response;
                //file_put_contents('newfile.dat',$data);
            }
        }
        else{
            //If opened this method without post method, this will be displayed.
            $message = "Invalid Method";
            $data = array('message' => $message,'status'=>0);
        }

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
        //return to the view once reach here
        return $data;
    }

    public function categoryview(){
        $breadcrumb = $this->breadcrumb->output();
        $this->breadcrumb->add('Articles', base_url().'articles');
        $this->breadcrumb->add('Category_Name_to bechanged', current_url());
        $breadcrumb = $this->breadcrumb->output();
        $data = array('breadcrumb'=> $breadcrumb);

        $this->load->view('view_help_header');
        $this->load->view('view_category_one', $data);
        $this->load->view('view_help_footer');
    }

    public function search_articles(){

        if($this->input->get()){
            $search_string = $this->input->get('string');
            $search_string = $this->security->xss_clean($search_string);
            $this->load->model('article_model');
            $data= $this->article_model->search_article($search_string);

        }
        else{
            $data = array('status'=>0, 'message'=>'Invalid Request');
        }
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
        /*
         * Function for searching an article, returns all the articles which match.
         * Search the entire article
         */

    }



    public function share_count(){
        require_once(APPPATH.'libraries/sharecount'.EXT);
        $obj = new shareCount('http://www.mashable.com');
        echo $obj->get_tweets().'<br>'; //to get tweets
        echo $obj->get_fb().'<br>'; //to get facebook total count (likes+shares+comments)
        echo $obj->get_linkedin().'<br>'; //to get linkedin shares
        echo $obj->get_plusones().'<br>'; //to get google plusones
        echo $obj->get_pinterest().'<br>'; //to get pinterest pins
    }
    /* Functions */

    /* Slug creation starts */

    /**
     * Create a uri string
     *
     * This wraps into the _check_uri method to take a character
     * string and convert into ascii characters.
     *
     * @param   mixed (string or array)
     * @param   int
     * @uses    Slug::_check_uri()
     * @uses    Slug::create_slug()
     * @return  string
     */
    public function create_uri($data = '', $id = '')
    {
        if (empty($data))
        {
            return FALSE;
        }

        if (is_array($data))
        {
            if ( ! empty($data[$this->field]))
            {
                return $this->_check_uri($this->create_slug($data[$this->field]), $id);
            }
            elseif ( ! empty($data[$this->title]))
            {
                return $this->_check_uri($this->create_slug($data[$this->title]), $id);
            }
        }
        elseif (is_string($data))
        {
            return $this->_check_uri($this->create_slug($data), $id);
        }

        return FALSE;
    }

    // ------------------------------------------------------------------------

    /**
     * Create Slug
     *
     * Returns a string with all spaces converted to underscores (by default), accented
     * characters converted to non-accented characters, and non word characters removed.
     *
     * @param   string $string the string you want to slug
     * @param   string $replacement will replace keys in map
     * @return  string
     */
    public function create_slug($string)
    {
        $this->load->helper(array('url', 'text', 'string'));
        $string = strtolower(url_title(convert_accented_characters($string), '_'));
        return reduce_multiples($string, $this->_get_replacement(), TRUE);
    }

    // ------------------------------------------------------------------------

    /**
     * Check URI
     *
     * Checks other items for the same uri and if something else has it
     * change the name to "name-1".
     *
     * @param   string $uri
     * @param   int $id
     * @param   int $count
     * @return  string
     */
    private function _check_uri($uri, $id = FALSE, $count = 0)
    {
        $new_uri = ($count > 0) ? $uri.$this->_get_replacement().$count : $uri;
        $data['article_url'] = $new_uri;
        $this->load->model('article_model');
        $response = $this->article_model->check_slug_exists($data);
        if($response == "1"){
            return $this->_check_uri($uri, $id, ++$count);
        }
        else
        {
            return $new_uri;
        }

    }

    // ------------------------------------------------------------------------

    /**
     * Get the replacement type
     *
     * Either a dash or underscore generated off the term.
     *
     * @return str/ing
     */



}