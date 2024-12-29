<?php
    require_once('Model/m_category.php');

    class c_category {
        public function list_all_category()
        {
            $category = new Category();
            $list_category = $category->list_all_category();
            return $list_category;
        }
    }

?>