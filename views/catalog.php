<h1>Каталог продуктов:</h1>
<?php foreach ($products as $product) { ?>
    <div>
        <?= $product['name'] ?><br>
        <?= $product['price'] ?><br>
        <a href="product/addincart?in-cart-product-id=<?= $product['id']?>">Добавить в корзину</a><br><br>

    </div>
<?php } ?>
<a href="product/addnewproduct">Добавить новую книгу</a>


