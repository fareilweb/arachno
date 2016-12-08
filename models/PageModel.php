<?php

class PageModel extends Model
{
    public $page_data = NULL;
    public $page_id = NULL;
    public $page_slug = NULL;
    public $page_title = NULL;
    public $page_title_hidden = NULL;
    public $page_content = NULL;
    public $page_module = NULL;
    public $page_css_class = NULL;
    public $page_meta_description = NULL;
    public $page_meta_keywords = NULL;
    public $page_views = NULL;
    public $fk_author_user_id = NULL;
    public $fk_page_category_id = NULL;
    public $fk_page_lang_id = NULL;
    public $lang_id = NULL;
    public $lang_name = NULL;
    public $lang_iso_code = NULL;
    public $lang_internal_code = NULL;


    // INSERT/CREATE a New Page
    function insert($page_data=array())
    {
        foreach($page_data as $field_name => $field_value){
            if(property_exists($this, $field_name)){
                $this->$field_name = $field_value;
            }
        }

        $query =
            "INSERT INTO #_pages (
                page_id,
                page_slug,
                page_css_class,
                page_title,
                page_title_hidden,
                page_content,
                page_module,
                page_meta_description,
                page_meta_keywords,
                fk_page_category_id,
                fk_author_user_id,
                fk_page_lang_id
            ) VALUES (
                NULL,
                '$this->page_slug',
                '$this->page_css_class',
                '$this->page_title',
                '$this->page_title_hidden',
                '$this->page_content',
                '$this->page_module',
                '$this->page_meta_description',
                '$this->page_meta_keywords',
                '$this->fk_page_category_id',
                '$this->fk_author_user_id',
                '$this->fk_page_lang_id'
            );";

        if(
          $this->queryExec($query)
          && $this->setPageViews($page_data, $this->mysqli->insert_id)
        ){
            return $this->mysqli->insert_id;
        }else{
            return FALSE;
        }
    }



    // UPDATE a Page
    function update($page_data=array())
    {
        $load_res = $this->loadById($page_data['page_id']);

        if(!$load_res){
            return FALSE;
        }else{

            // Update Loaded Data With Data From The Form
            foreach($page_data as $field_name => $field_value){
                if(property_exists($this, $field_name)){
                    $this->$field_name = $field_value;
                }
            }

            $query =
                "UPDATE #_pages
                 SET
                    page_slug = '$this->page_slug',
                    page_css_class = '$this->page_css_class',
                    page_title = '$this->page_title',
                    page_title_hidden = '$this->page_title_hidden',
                    page_content = '$this->page_content',
                    page_module = '$this->page_module',
                    page_meta_description = '$this->page_meta_description',
                    page_meta_keywords = '$this->page_meta_keywords',
                    fk_page_category_id = '$this->fk_page_category_id',
                    fk_author_user_id = '$this->fk_author_user_id',
                    fk_page_lang_id = '$this->fk_page_lang_id'
                 WHERE #_pages.page_id = $this->page_id;";

            if(
              $this->queryExec($query)
              && $this->setPageViews($page_data, $this->page_id)
            ){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }


    // Delete a Page
    public function delete($page_id=NULL){

        if($page_id!==NULL){
            $this->page_id = $page_id;
        }

        if(isset($this->page_id))
        {
            $query = "DELETE FROM #_pages WHERE #_pages.page_id = '$this->page_id';";
            $query_res = $this->queryExec($query);

            if(
              $query_res &&
                $this->delPageViews($this->page_id)
            ){
                return TRUE;
            }else{
                return FALSE;
            }
        }
    }


    // LOAD a Page by its ID
    public function loadById($page_id=NULL)
    {
        array_push($this->excluded_from_loading, 'page_data');

        $query = "SELECT * "
            . "FROM #_pages "
            . "LEFT JOIN #_categories ON #_categories.category_id = #_pages.fk_page_category_id "
            . "LEFT JOIN #_languages ON #_languages.lang_id = #_pages.fk_page_lang_id "
            . "LEFT JOIN #_users ON #_users.user_id = #_pages.fk_author_user_id "
            . "WHERE page_id = '$page_id'";

        $result_obj = $this->getObjectData($query);

        if($result_obj!=FALSE)
        {
            if($this->loadByObject($result_obj))
            {
                $this->page_views = $this->getPageViews($this->page_id);

                if($this->page_views===FALSE){
                    return FALSE;
                }else{
                    return TRUE;
                }

            }else{
                return FALSE;
            }

        }else{
            return FALSE;
        }
    }


    // LOAD a Page by its Slug
    public function loadBySlug($page_slug=NULL)
    {
        array_push($this->excluded_from_loading, 'page_data');

        $query = "SELECT * "
            . "FROM #_pages "
            . "LEFT JOIN #_languages ON #_languages.lang_id = #_pages.fk_page_lang_id "
            . "LEFT JOIN #_users ON #_users.user_id = #_pages.fk_author_user_id "
            . "WHERE page_slug = '$page_slug'";

        $result_obj = $this->getObjectData($query);

        if($result_obj!=FALSE)
        {
            if($this->loadByObject($result_obj))
            {
                $this->page_views = $this->getPageViews($this->page_id);

                if($this->page_views===FALSE){
                    return FALSE;
                }else{
                    return TRUE;
                }

            }else{
                return FALSE;
            }

        }else{
            return FALSE;
        }
    }


    // Get Included Views
    function getPageViews($page_id=NULL)
    {
        $query =
            "SELECT * FROM #_pages_views
             WHERE #_pages_views.fk_page_id = '$page_id';";

        $results = $this->queryExec($query);

        $data = array();
        while($row_obj = $results->fetch_object()){
            array_push($data, $row_obj);
        }

        return $data;
    }


    // Insert Page Views
    function setPageViews($page_data, $page_id)
    {
        if(isset($page_data["view_slug"]) && count($page_data["view_slug"]) > 0)
        {
            foreach($page_data["view_slug"] as $key => $val)
            {
                $view_id        = $page_data["view_id"][$key];
                $view_slug      = $page_data["view_slug"][$key];
                $view_position  = $page_data["view_position"][$key];

                if($view_id !== ""){
                    $query =
                      "UPDATE #_pages_views
                       SET view_slug = '$view_slug', view_position = '$view_position', fk_page_id = '$page_id'
                       WHERE #_pages_views.view_id = '$view_id';";

                    if(!$this->queryExec($query)){
                        return FALSE;
                    }

                }else{
                    $query =
                      "INSERT INTO #_pages_views (view_id, view_slug, view_position, fk_page_id)
                       VALUES (NULL, '$view_slug', '$view_position', '$page_id');";

                     if(!$this->queryExec($query)){
                        return FALSE;
                     }
                }
            }

        }
        return TRUE;
    }

    // Delete All Views Of A Page
    function delPageViews($page_id=NULL)
    {
        if($page_id!==NULL)
        {
            $query = "DELETE FROM #_pages_views WHERE #_pages_views.fk_page_id = '$page_id';";
            if(!$this->queryExec($query)){
                return FALSE;
            }else{
                return TRUE;
            }
        }else{ exit; }
    }

    // Delete A View By ID
    function delPageView($view_id=NULL)
    {
        if($view_id!==NULL)
        {
            $query = "DELETE FROM #_pages_views WHERE #_pages_views.view_id = '$view_id';";
            if(!$this->queryExec($query)){
                return FALSE;
            }else{
                return TRUE;
            }
        }else{ exit; }
    }

    // Get All Pages
    public function getAll()
    {
        $all_pages_array = array();
        $query =
            "SELECT * FROM #_pages " .
            "LEFT JOIN #_categories ON #_pages.fk_page_category_id = #_categories.category_id " .
            "LEFT JOIN #_languages ON #_languages.lang_id = #_pages.fk_page_lang_id " .
            "LEFT JOIN #_users ON #_users.user_id = #_pages.fk_author_user_id;";

        $query_res = $this->queryExec($query);

        if($query_res){
            while($row_obj = $query_res->fetch_object()){
                array_push($all_pages_array, $row_obj);
            }
            return $all_pages_array;
        }else{
            return FALSE;
        }
    }



    // DEPRECATED - GET Date Of A Page by its Slug
    public function getPageData( $page_slug )
    {
        $this->page =
            $this->getObjectData(
                "SELECT * "
                . "FROM #_pages "
                . "LEFT JOIN #_users ON #_users.user_id = #_pages.fk_author_user_id "
                . "LEFT JOIN #_languages ON #_languages.lang_id = #_pages.fk_page_lang_id "
                . "WHERE page_slug = '$page_slug'"
            );

        return $this->page;
    }

}
