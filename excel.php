<?php

$connect = mysqli_connect("localhost","root","","herve");
$output = '';

if(isset($_POST["export_excel"])){
    $sql = "SELECT * FROM tbl_sample ORDER BY id DESC";

    $result = mysqli_query($connect, $sql);

    if(mysqli_num_rows($result) > 0){
        $output .='
             <table class="table" bordered="1">   
             <tr>
             <th>Id</th>
             <th>First Name</th>
             <th>Last Name</th>
             </tr> 
        ';

        while($row = mysqli_fetch_array($result)){
            $output .= '
                  <tr>

                  <td>'.$row["id"].'</td>
                  <td>'.$row["first_name"].'</td>
                  <td>'.$row["last_name"].'</td>

                  </tr>
            ';
        }

        $output .= '</table>';
        header("Content-Type:  application/xls");
        header("Content-Disposition: attachment; filename=download.xls");
        echo $output;
    }
}
?>