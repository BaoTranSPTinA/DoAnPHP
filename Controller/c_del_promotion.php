<?php
        require('../model/m_promotion.php');

        session_start();
        $id = $_POST['id'];
    
        $new_building = new Promotion();
        $new_building->delete_1_Promotion($id);
?>