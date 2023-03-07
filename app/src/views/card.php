<?php
include "header.php";
?>
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/item_catalog.css">
    <link rel="shortcut icon" href="./img/logo_simple.png" />
    <section class="card_section">
        <article class="card_text">
            <h1>Your Card</h1>
            <div class="card_text_price">
                <h2>
                    <span>Total : </span> <br>
                    <span id="card_text_price_value">0$</span>
                </h2>
                <div class="card_text_btns">
                    <a id="checkout" href="/login">Check Out</a>
                    <?php
                    if(!isset($_SESSION['username']))
                    {
                        echo '<a href="/login">Login</a>';
                    }
                    ?>
                </div>
            </div>
        </article>
        <div id="card_products"></div>
    </section>
    <script type="module" src="../js/card.js"></script>