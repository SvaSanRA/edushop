<h1>Каталог продуктов:</h1>
<?php foreach ($products as $product) { ?>
    <div>
        <?= $product['name'] ?><br>
        <?= $product['price'] ?><br><br>
    </div>
<?php } ?>
<a href="product/addnewproduct">Добавить новую книгу</a>


