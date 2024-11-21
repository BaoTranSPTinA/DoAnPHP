

        <?php
        require('../model/m_promotion.php');

        session_start();
        $PromotionCode = $_POST['promotionCode'];
        $percent = $_POST['percent'];
        $start = $_POST['Startdate'];
        $end = $_POST['Enddate'];
        $productid = $_POST['ProductID'];

      


        


        $new_building = new Promotion();
        $new_building->create_1_promotion($PromotionCode, $percent, $start, $end , $productid);
?>