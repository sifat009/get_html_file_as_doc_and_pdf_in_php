<?php
  include('../src/database.php');
  $user_id = $_REQUEST['id'];

  $stmnt = $db->query("SELECT * FROM users WHERE user_id = $user_id") or die("CONNECTION ERROR");
  $result = $stmnt->fetch(PDO::FETCH_ASSOC);

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

.line{
  text-align: center;
  margin-top: 10px;
}

input[type="submit"] {
  width: 20%;
  height: 40px;
  margin-bottom: 5px;
  background: royalblue;
  color: #fff;
  font-weight: 900;
  cursor: pointer;
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
<div class="line">
  <form class="doc" action="print_as_msWord.php?id= <?= $user_id?>" method="post">
    <input type="submit" name="print" value="Get Document (.doc)">
  </form>
  <form class="pdf" action="print_as_pdf.php?id= <?= $user_id?>" method="post">
    <input type="submit" name="print" value="PDF">
  </form>
</div>

</body>
</html>