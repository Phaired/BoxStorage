<?php
include_once ("header.php");
require_once "../src/models/Article.php";
//echo Article::getArticle("0042f5c5-8be4-4a40-982b-1b31dacec04b");
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
            <a id="button_card" href="/card">Add to Card</a>
            <p id="no_stock">Not in stock</p>
        </div>
    </article>
</section>
<script type="module" src="../js/product.js"></script>
