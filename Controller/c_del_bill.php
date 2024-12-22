<?php
        require('../model/m_bill.php');

        session_start();
        $id = $_POST['id'];
        


        $new_building = new Bill();
        $new_building->delete_1_bill($id);
?>
<script>
        window.close();
</script>