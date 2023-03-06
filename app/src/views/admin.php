<?php
session_start();?>
<html>
<body>
<div id="root"></div>
<script src="../js/admin.js"></script>
<link rel="stylesheet" href="../css/admin.css">
<title>Admin</title>
<?php
if (isset($_SESSION["role"])){
    if ($_SESSION["role"] !== true) {
         header('Location: /login');
    }
}
require_once "../src/models/Article.php";
$data =  json_decode(Article::getArticles(null,-1, -1), true);
echo "<table>";
foreach ($data as $item) {
    echo "<tr>";
    echo "<td>{$item["brand"]}</td>";

    echo "<td>{$item["colorway"]}</td>";
    echo "<td>{$item["condition"]}</td>";
    echo "<td>{$item["countryOfManufacture"]}</td>";
    echo "<td>{$item["shortDescription"]}</td>";


    echo "<td><a href='/admincontroller/{$item["shoeId"]}' >Delete</a></td>";
    /*
    echo "<td>".
    "<button
 type='button'
 onclick='()=>{fetch(\"/admincontroller/".$item["shoeId"].")}'>Supprimer</button>".
    "</td>";
*/
    echo "</td>";

}
echo "</table>";

?>

</body>
</html>