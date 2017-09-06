<?php
include("db.php");

  $limit = 5;
       if(isset($_POST["page"]))  
        { $page = intval($_POST["page"]);  
         }
          else  {
           $page =1 ;
           }
         $start_page = (($page-1) * $limit);
         $result = mysqli_query($conn, "select * from Employee order by id desc Limit $start_page, $limit");
         $number=mysqli_num_rows($result);
            if ( $number> 0) {
              while($row = mysqli_fetch_array($result)) {      
              $tmp[] = $row;
          }
        }


else {
    echo "0 results";
    }

$result = mysqli_query($conn,"select count(*) from Employee");
// $rows = mysqli_num_rows($result);
$total = $result->fetch_row()[0];

echo  "{ \"data\":".json_encode($tmp).", \"count\":". $total." }";
$conn->close();

?>
