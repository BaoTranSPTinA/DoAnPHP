<?php
        require('../model/m_category.php');

        session_start();
        $id = $_POST['id'];
        $CategoryName = $_POST['Category_Name'];
        


        $new_building = new Category();
        $new_building->update_1_category($id, $CategoryName);
?>

<script>
        window.close();
</script>