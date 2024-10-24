<?php
include "koneksi.php";
    $last_rowcount = $_POST["rowcount"];
    $rowcount = $_POST["rowcount"] + 5; 

    $display_query = "select id,email,message,created_date from feedback order by id desc limit $last_rowcount,5";
    $results = mysqli_query($koneksi, $display_query);
    $count = mysqli_num_rows($results);
    if ($count > 0) {
        $dynamic_data = "";
        while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $dynamic_data .=
                "<tr><td>" .
                $data_row["id"] .
                "</td><td>" .
                $data_row["email"] .
                "</td><td>" .
                $data_row["message"] .
                "</td><td>".$data_row["created_date"].
                "</td>
                <td> 
                    <button class='btn btn-primary'><a href='update.php?id=" . $data_row["id"] . "' class='text-light'>Update</a></button>
                    <button class='btn btn-danger'><a href='delete.php?id=" . $data_row["id"] . "' class='text-light'>Delete</a></button>
                </td>
                </tr>"
                ;
        }
        $data = [
            "status" => true,
            "rowcount" => $rowcount,
            "msg" => "Successfully!",
            "data" => $dynamic_data,
        ];
    } else {
        $data = [
            "status" => false,
            "msg" => "Error!",
        ];
    }
    echo json_encode($data);
?>