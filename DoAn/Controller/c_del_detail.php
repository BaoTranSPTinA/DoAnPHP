<?php
        require('../model/m_detail.php');

        session_start();
        $id = $_POST['id'];
    
        $new_building = new detail();
        $new_building->delete_1_detail($id);
?>