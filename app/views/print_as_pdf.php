<?php
  include('../src/database.php');
  require_once 'dompdf/autoload.inc.php';
  $user_id = $_REQUEST['id'];

  $stmnt = $db->query("SELECT * FROM users WHERE user_id = $user_id") or die("CONNECTION ERROR");
  $result = $stmnt->fetch(PDO::FETCH_ASSOC);

  ob_start();

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
  $template = ob_get_clean();
  // reference the Dompdf namespace
  use Dompdf\Dompdf;

  // instantiate and use the dompdf class
  $dompdf = new Dompdf();
  $dompdf->loadHtml($template);

  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'landscape');

  // Render the HTML as PDF
  $dompdf->render();

  // Output the generated PDF to Browser
  $dompdf->stream('my_info-'.time());  
  header("Refresh: 5; url= personal_content.php?id=$user_id");
?>