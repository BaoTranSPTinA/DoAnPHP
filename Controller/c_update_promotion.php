

<?php
        require('../model/m_promotion.php');

        session_start();
        $id = $_POST['id'];
        $PromotionCode = $_POST['promotionCode'];
        $percent = $_POST['percent'];
        $start = $_POST['Startdate'];
        $end = $_POST['Enddate'];
        $productid = $_POST['ProductID'];

      


        


        $new_building = new Promotion();
        $new_building->update_1_promotion($id,$PromotionCode, $percent, $start, $end , $productid);
?>