<?php
include "header.php";
?>
<link rel="stylesheet" href="css/product_detail.css">
<section class="product_section">
    <article class="product">
        <div class="product_img">
            <img id="product_image" src="../img/jordan1.jpg" alt="image product">
        </div>
        <div class="product_body">
            <h1 class="product_title">Jordan 1</h1>
            <div class="product_size">
                <select name="size">
                    <option value="">Select size</option>
                </select>
            </div>
            <div class="product_price">
                <h2 class="price_value">100$</h2>
            </div>
            <div class="product_details">
                <p id="product_style">Product Style</p><br>
                <p id="product_color">Product Color</p><br>
                <p id="product_release">Product release</p><br>
            </div>
            <button id="button_card">Add to Card</button>
        </div>
    </article>
</section>