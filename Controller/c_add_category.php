<?php
        require('../model/m_category.php');

        session_start();
        $CategoryName = $_POST['Category_Name'];
        


        $new_building = new Category();
        $new_building->create_1_category($CategoryName);
?>

<script>
        window.close();
</script>