<?php
include_once ("header.php");
require_once "../src/controllers/cardController.php";
//echo Article::getArticle("0042f5c5-8be4-4a40-982b-1b31dacec04b");

var_dump(cardController::getCart());
?>
<link rel="stylesheet" href="../css/product_detail.css">
<title>Product</title>
<section class="product_section">
    <article class="product">
        <div class="product_img">
            <img id="product_image" src="" alt="image product">
        </div>
        <div class="product_body">
            <h1 id="title" class="product_title">Jordan 1</h1>
            <div class="product_size">
                <select id="size" name="size">
                    <option value="">Select size</option>
                </select>
            </div>
            <div class="product_price">
                <h2 id="price" class="price_value">180$</h2>
            </div>
            <div class="product_details">
                <p id="product_color">Product Color</p><br>
                <p id="product_release">Product release</p><br>
                <p id="product_desc">Product Style</p><br>
            </div>
            <div id="order">
                <button id="button_card">Add to Card</button>
                <button id="button_order">Order</button>
                <p id="no_stock">Out of stock</p>
            </div>
        </div>
    </article>
</section>
<script type="module" src="../js/product.js"></script>
