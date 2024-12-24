<?php
    require('model/m_product.php');

    class c_product {
        public function list_all_product()
        {
            $product = new Product();
            $list_product = $product->list_all_product();
            return $list_product;
        }

        public function get_product_by_id($id) {
            $product = new Product();
            return $product->get_product_by_id($id);
        }

    }

?>