<?php

class PageModel extends Model
{
    public $db;
    public $page_data;

    public function getPageData( $page_slug )
    {
        $this->page_data =           
            $this->getObjectData(
                "SELECT * "
                . "FROM #_pages "
                . "LEFT JOIN #_users ON #_users.user_id = #_pages.fk_author_user_id "
                . "WHERE page_slug = '$page_slug'"
            );
        
        return $this->page_data;
    }

}