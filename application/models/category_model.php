<?php

class Category_model extends CI_Model{

    /*
     * In this model you'll mostly deal with table name "category"
     */

    public $articleTable = ARTICLESTABLE;
    public $categoryTable = CATEGORIESTABLE;

    public function __construct() {
        parent::__construct();
        $this->db->query("SET time_zone='+5:30'");
    }

    public function add_category($data){
        /*
         * Adds a new category into the category table
         */
        $message_success ='Category Added Successfully';
        $message_fail = 'Unable to Add Category';
        $category_name = $data['category_name'];
        $query = $this->db->get_where($this->categoryTable, array('category_name'=> $category_name)); //Checks if category exists in table
        if($query->num_rows()>0){
            $data = array('status'=>0, 'message'=>$message_fail.'Category already exists');
            return $data; //Category name exists, no insertion done
        }
        else{
            $insert_id = $this->db->insert($this->categoryTable, $data);//Category doesn't exist, insertion done
            $data['status'] = 1;//Category insertion successful
            $data['message'] = $message_success;
            return $data;
        }
    }

    public function get_categories(){
        $query = $this->db->get('category');
        return $query->result();
    }


    public function edit_category($data){
        //$this->output->enable_profiler('true');
        /*
         * modifies a category and the data is passed in the array
         */
        $message_error = "Category ID doesn't exist";
        $message_error_match = "Category name already present";
        $message_success = "Category modified successfully";
        $query = $this->db->get_where($this->categoryTable, array('category_id'=>$data['category_id']));
        if($query->num_rows()<1){
            $data['status'] = 0;
            $data['message'] = $message_error;
            return $data; // Category doesn't exist.
        }

        $query =$this->db->get_where($this->categoryTable, array('category_name'=>$data['category_name']));
        if($query->num_rows()>0){
            $data= array('status'=>0, 'message'=>$message_error_match);
            return $data;
        }
        else{
            $this->db->where('category_id', $data['category_id']);
            $this->db->update($this->categoryTable, array('category_name'=>$data['category_name']));
            if ($this->db->trans_status() === FALSE)
            {
                $data = array('status'=>0, 'message'=>'Update Failed, DB Error, Please try again'); //update failed
                return $data;
            }
            $data['status']= 1;
            $data['message']= $message_success;
            return $data; //update successful
        }

    }

    public function delete_category($data){
        /*
         * Deletes a category passed in the array
         */
        $message_success = "Category Deleted Successfully";
        $message_error = "Unable to delete, Error";
        $query = $this->db->get_where($this->categoryTable, array('category_id'=>$data['category_id']));
        if($query->num_rows()<1){
            $data = array('status'=>0, 'message'=>$message_error); //Category Doesn't exist
            return $data;
        }
        $this->db->delete($this->categoryTable, $data);
        if ($this->db->trans_status() === FALSE)
        {
            $data = array('status'=>0, 'message'=>$message_error); //Category Doesn't exist
            return $data;
        }
        $data = array('status'=>1, 'message'=>$message_success); //Category Doesn't exist
        return $data;

    }

}