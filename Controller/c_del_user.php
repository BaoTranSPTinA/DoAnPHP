<?php
        require('../model/m_user.php');

        session_start();
        $CustomerName = $_POST['CustomerName'];
    
        $new_building = new User();
        $new_building->delete_1_User($CustomerName);
        


 
?>

<script>
        window.close();
</script>