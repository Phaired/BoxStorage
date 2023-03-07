<?php
session_start();
if (isset($_SESSION["role"]) && ($_SESSION["role"] !== true) ){
    header('Location: /login');
}
?>
<html>
<body>
<link rel="stylesheet" href="../css/admin.css">
<title>Admin</title>
<?php
require_once "../src/models/Article.php";
$data =  json_decode(Article::getArticles(null,-1, -1), true);
echo "<button id='additem'>Ajouter un produit</button>";
echo "<div id='root'><table>";
foreach ($data as $item) {
    echo "<tr>";
    echo "<td>{$item["brand"]}</td>";

    echo "<td>{$item["colorway"]}</td>";
    echo "<td>{$item["condition"]}</td>";
    echo "<td>{$item["countryOfManufacture"]}</td>";
    echo "<td>{$item["shortDescription"]}</td>";
    echo "<td><a class='deletelink' href='/admincontroller/{$item["shoeId"]}' >Delete</a></td>";
    echo "<td><button data-id='{$item["shoeId"]}' class='modifbtn'>Modif</button></td>";
    /*
    echo "<td>".
    "<button
 type='button'
 onclick='()=>{fetch(\"/admincontroller/".$item["shoeId"].")}'>Supprimer</button>".
    "</td>";
*/
    echo "</td>";

}
echo "</table></div>";

?>

</body>
<script src="../js/admin.js"></script>

</html>