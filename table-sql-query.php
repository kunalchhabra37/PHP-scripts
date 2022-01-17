<!DOCTYPE html>
<html lang=en>

<?php
    // Connecting with sql
    $con = new mysqli("localhost","username","pass","database",port);

    // Checking for erorrs in connection
    if($con->connect_errno){
        echo $con->connect_error;
    }

    // Checking for errors
    try{
        // Running sql Queries
        $sql = "SELECT * FROM employee";
        $result = $con->query($sql);
    }catch(Exception $e){ 
        // Printing Error message and ending the script
        print_r($e->getMessage());
        die();
    }

    // Fetching Columns
    $col = [];
    $res = $result->fetch_field()->name;
    while($res){
        $col[] = $res;
        $res = $result->fetch_field()->name;
    }

    //Making SQL Table Output
    echo '<table border="1">';
        // Heading
        echo '<tr>';
            foreach($col as $val){
                echo  '<th>'.$val.'</th>';
            }
        echo '</tr>';

        //Rows
        while($res = $result->fetch_row()){
            echo '<tr>';
                foreach($res as $val){
                    echo '<td>'. $val.'</td>';
                }
            echo '</tr>';
        }
    echo '</table>';
?> 
</html>