<?php
    require_once('Model/m_product.php');

    class c_product {
        public function list_all_product()
        {
            $product = new Product();
            $list_product = $product->list_all_product();
            return $list_product;
        }

        public function get_products_by_category($CategoryID) {
            $product = new Product();
            return $product->get_products_by_category($CategoryID);
        }

        public function get_product_by_id($id) {
            $product = new Product();
            return $product->get_product_by_id($id);
        }

    }

?>