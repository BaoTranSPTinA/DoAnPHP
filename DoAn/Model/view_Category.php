<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_user.css">
    <title>XEM DANH MỤC</title>
</head>
<body>
    <h2><center>XEM DANH SÁCH DANH MỤC</center></h2>
    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>


                       


                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                               
                                
                            </tr>
                       
                       
                           
                        </tbody>
                    </table>

<?php
require ("database.php");
$db = new database();
$sql = "SELECT  * 
            FROM Category";
            $db->set_query($sql);

            // echo "$this->query <br>";0799

            $result = $db->execute_query();
            $list_user = array();
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td> ||   " . $row["Category_ID"] . "</td> ";
                echo "<td> ||   " . $row["Category_Name"].  "||<td> <br> ";
                echo "</tr>";
                $list_user[] = $row ;

                }}
$db->set_query($sql);
$db->execute_query();
?>
</body>
</html>