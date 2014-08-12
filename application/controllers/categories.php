<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends CI_Controller {

	public $user_id ='';
	public $user_name ='';
	public $loggedInData ='';
	
	function __construct()
	{
    	parent::__construct();
        $this->breadcrumb->add('Home', base_url());
	}

	public function index()
	{
		$this->view_categories_add();
	}

    public function view_categories_add(){

        /* Breadcrumb starts*/
        $breadcrumb = $this->breadcrumb->output();
        $this->breadcrumb->add('Modify Categories', current_url());
        $breadcrumb = $this->breadcrumb->output();
        /* Breadcrumb ends*/
        $this->load->model('category_model');
        $this->load->view('view_help_header');
        $data = array('breadcrumb'=>$breadcrumb);
        $this->load->view('view_categories_add',$data);
        $this->load->view('view_help_footer');
    }

	public function add_category()
	{
        //$this->output->enable_profiler(TRUE);
		//$this->load->view('add_category');
        if($this->input->post())
        {
            //start validation
            $this->load->library( array('form_validation'));
            $this->load->helper('form');

            $this->form_validation->set_rules('txtcategoryname', 'Category Name', 'trim|required|xss_clean|min_length[2]');
            //$this->form_validation->set_rules('category_description', 'Category Description', 'trim|required|xss_clean|min_length[2]');

            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == false){
                $message = validation_errors();
                $data = array('message' => $message,'status'=>0);
            }
            else{
                $categoryName = $this->input->post('txtcategoryname');
                //$categoryDescription = $this->input->post('category_description');

                $data['category_name'] = $categoryName;
                $this->load->model('category_model');
                //Array will be returned from the below function which will have status and message
                $data = $this->category_model->add_category($data);
            }
        }
        else{
            //If opened this method without post method, this will be displayed.
            $message = "Category details are required";
            $data = array('message' => $message,'status'=>0);
        }

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
        //return to the view once reach here
        return $data;
	}

    public function edit_category(){
        if($this->input->post())
        {
            //start validation
            $this->load->library( array('form_validation'));
            $this->load->helper('form');

            $this->form_validation->set_rules('txtcategoryname', 'Category Name', 'trim|required|xss_clean|min_length[2]');
            $this->form_validation->set_rules('category_id', 'Category ID', 'trim|required|xss_clean|min_length[1]');

            //$this->form_validation->set_rules('category_description', 'Category Description', 'trim|required|xss_clean|min_length[2]');

            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == false){
                $message = validation_errors();
                $data = array('message' => $message,'status'=>0);
            }
            else{
                $categoryName = $this->input->post('txtcategoryname');
                $categoryId = $this->input->post('category_id');

                $data['category_name'] = $categoryName;
                $data['category_id'] = $categoryId;
                $this->load->model('category_model');
                //Array will be returned from the below function which will have status and message
                $data = $this->category_model->edit_category($data);
            }
        }
        else{
            //If opened this method without post method, this will be displayed.
            $message = "Category details are required";
            $data = array('message' => $message,'status'=>0);
        }

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
        //return to the

    }

    public function delete_category(){
        if($this->input->post())
        {
            //start validation
            $this->load->library( array('form_validation'));
            $this->load->helper('form');


            $this->form_validation->set_rules('category_id', 'Category Id', 'trim|required|xss_clean|min_length[1]');
            //$this->form_validation->set_rules('txtcategoryname', 'Category Id', 'trim|required|xss_clean|min_length[2]');
            //$this->form_validation->set_rules('category_description', 'Category Description', 'trim|required|xss_clean|min_length[2]');

            //$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == false){
                $message = validation_errors();
                $data = array('message' => $message,'status'=>0);
            }
            else{
                $categoryName = $this->input->post('txtcategoryname');
                $categoryId = $this->input->post('category_id');
                //$categoryDescription = $this->input->post('category_description');

                $data['category_id'] = $categoryId;
                $this->load->model('category_model');
                //Array will be returned from the below function which will have status and message
                $response = $this->category_model->delete_category($data);
                if($response['status']==1){
                    $response['content'] = array("category_name"=> $categoryName, "category_id"=> $categoryId);
                }
                $data = $response;
            }
        }
        else{
            //If opened this method without post method, this will be displayed.
            $message = "Category details are required";
            $data = array('message' => $message,'status'=>0);
        }

        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($data));
        //return to the

    }

    public function get_categories(){
        $this->load->model('category_model');
        $categories = $this->category_model->get_categories();
        $this->output->set_content_type('application/json');
        $json = $this->output->set_output(json_encode($categories));
    }
}