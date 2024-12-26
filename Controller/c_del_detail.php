<?php
        require('../model/m_detail.php');

        session_start();
        $id = $_POST['id'];
    
        $detail = new Detail();
        $detail->delete_1_detail($id);
?>