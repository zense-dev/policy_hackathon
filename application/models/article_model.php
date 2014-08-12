<?php class Article_model extends CI_Model{
	
	public $articleTable = ARTICLESTABLE;
    public $categoryTable = CATEGORIESTABLE;
	
	public function __construct() {
        parent::__construct();
        $this->db->query("SET time_zone='+5:30'");
    } 

	/* This is for displaying the respective article */
	public function get_article_one($url){
        /*
         * Article will be returned on the basis of article url, so need to fix this function
         */
		$query = $this->db->get_where($this->articleTable, array('article_url'=>$url));

        if($query->num_rows()>0){
            $article_id = $query->row(1)->article_id;
            $category_id = $query->row(1)->article_category_id;
            $category_name = $this->db->get_where($this->categoryTable, array('category_id'=>$category_id));
            $sidebar = $this->db->query('SELECT article_id, article_name, article_url FROM '.$this->articleTable.' WHERE article_category_id ='.$category_id.' AND article_id !='.$article_id);

            $data['status']= '1';
            $data['message'] = 'Successful';
            $data['content'] = $query->result();
            $data['category_name'] = $category_name->row(1)->category_name;
            $data['sidebar'] =  $sidebar->result();
            return $data;
        }
        $data['status'] = 0;
        $data['message'] = 'Invalid URL';
        return $data;
	}

    public function get_articles(){

        /*
         * This function returns article on page click
         * $start and $end help in showing limited articles on a page
         */

        $categories = $this->db->get('category'); //Getting all the categories from the category table


        //$query = $this->db->get($this->articleTable);
        $val = [];
        foreach($categories->result() as $category){
            $articles = $this->db->get_where($this->articleTable, array('article_category_id'=>$category->category_id), 5, 0);//Parsing additional data here
            array_push(
                $val, array(
                    'category_id' => $category->category_id,
                    'category_name' => $category->category_name,
                    'articles' => $articles->result()
                    )
            );


        }; //To be defined

        return $val;
    }

    public function add_article($data){
        /*
         * Inserts article into db and also returns ID of the inserted value
         */
        $message_success = 'Article Added Successfully';
        $this->db->insert($this->articleTable, $data);
        if ($this->db->trans_status() == FALSE)
        {
            $result = array('status'=>0, 'message'=>'DB Error, Try again Later');
            return $result;
        }
        $result = array('status'=>1, 'message'=>$message_success);
        return $result;
    }

    public function edit_article($data){
        $message_success = "Article Modified Successfully";
        $this->db->where('article_id', $data['article_id']);
        $this->db->update($this->articleTable, $data);
        if ($this->db->trans_status() == FALSE)
        {
            $result = array('status'=>0, 'message'=>'The article you are trying to modify, has been deleted');
            return $result;
        }
        $result = array('status'=>1, 'message'=>$message_success);
        return $result;
    }

    public function delete_article($data){
        /*
         * to delete articles from table
         */
        $message_success = "Article Deleted Successfully";
        $this->db->delete($this->articleTable, $data); //Data will contain ID of the article
        if ($this->db->trans_status() == FALSE)
        {
            $result = array('status'=>0, 'message'=>'Error, Unable to Delete');
            return $result;
        }
        $result = array('status'=>1, 'message'=>$message_success);
        return $result;
    }

	/* Slug Creation */
	public function check_slug_exists($data){
		$query = $this->db->get_where($this->articleTable,$updateData = array("article_url"=>$data['article_url']));
		if ($query->num_rows > 0)
		{
			return 1;
		}
		return 0;
	}

    public function search_article($string){
        /*$start and $end are the number of articles which you want to see.*/

        /*
         * This function will be used when a user searches for some article
         * $start and $end to decide the number of articles to be displayed on a page
         * Logic to be written later
         * Indexing the table will be required
         * ALTER TABLE article
            ADD FULLTEXT (article_name, article_content),
         */
        $this->db->where("MATCH (article_name, article_content) AGAINST ('$string*' IN BOOLEAN MODE)",NULL, FALSE);
        $query=$this->db->get('article');

        if($query->num_rows()>0){
            $data = array('status' => 1, 'message'=>'Results Found', 'content'=>$query->result());
            return $data;
        }

        else{
            $data = array('status'=>1, 'message'=>'No Match Found');
            return $data;
        }


    }



    public function modify_article($data){
        /*
         * To modify article from article table
         */
        $message_success = 'Modified Successfully';
        $this->db->where('article_id', $data['article_id']);
        $this->db->update('article', $data);
        if ($this->db->trans_status() == FALSE)
        {
            $result = array('status'=>0, 'message'=>'Update Failed');
            return $result;
        }
        $result = array('status'=>1, 'message'=>$message_success);
        return $result;
    }

    public function get_articles_category($data){
        $this->db->select('category_name');
        $query = $this->db->get_where($this->categoryTable, array('category_id' => $data['article_category_id']), 1, 0);
        $categoryName = $query->row(1)->category_name;
        $this->db->select('article_id, article_name, article_url, article_content');
        $articles = $this->db->get_where($this->articleTable, $data);
        $error_message = 'No articles found';
        if($articles->num_rows()>0){
            $result = array(
                'status'=> 1,
                'message'=>'Data retrieved',
                'content'=>$articles->result(),
                'category_name'=> $categoryName
            );
            return $result;
        }

        else{
            $result = array(
                'status'=> 0,
                'message'=>$error_message
            );
            return $result;
        }
    }



	
}