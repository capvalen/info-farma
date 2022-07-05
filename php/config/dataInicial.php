<?php 
include '../conectkarl.php';
$query = "SELECT * FROM economia";

if ($result = mysqli_query($conection, $query)) {
  $out = array();

  while ($row = $result->fetch_assoc()) {
    $out[] = $row;
  }

  /* encode array as json and output it for the ajax script*/
  echo json_encode($out);

  /* free result set */
  mysqli_free_result($result);

  /* close connection*/
  $conection->close();
}

 ?>