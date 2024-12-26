<?php
        require('../model/m_bill.php');

        session_start();
        $id = $_POST['id'];
        


        $bill = new Bill();
        $bill->delete_1_bill($id);
?>
<script>
        window.close();
</script>