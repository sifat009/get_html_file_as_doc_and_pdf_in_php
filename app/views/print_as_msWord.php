<?php
  include('../src/database.php');
  $user_id = $_REQUEST['id'];

  $stmnt = $db->query("SELECT * FROM users WHERE user_id = $user_id") or die("CONNECTION ERROR");
  $result = $stmnt->fetch(PDO::FETCH_ASSOC);

    include('../src/app.php');

?>


<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 50%;
    margin: 0 auto;
}

td{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 12px;
}

th{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 20px;
    background: #000;
    color: #fff;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>

<table>
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Date</th>
  </tr>
  <tr>
    <td><?= $result['name'] ?></td>
    <td><?= $result['email'] ?></td>
    <td><?= date('jS F, Y') ?></td>
  </tr>
  
</table>

</body>
</html>
<?php

  header("Refresh: 5; url= personal_content.php?id=$user_id");
?>