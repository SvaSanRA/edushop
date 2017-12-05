<div class="smalcart">
    <strong>Товаров в корзине:</strong><?php if(isset($small_cart))echo $small_cart['cart_count']?> шт.
<br/><strong>На сумму:</strong><?php if(isset($small_cart))echo $small_cart['cart_price']?> руб.
<br/><a href=''>Оформить заказ</a>
    <br/><a href="product/clearcart">Очистить корзину</a>
</div>