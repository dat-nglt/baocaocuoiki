<div class="container-statistical">
    <div class="count-div">
        <div>Số đơn hàng đã bán ra</div>
        <div>
            <?= $countBillSucces ?>
        </div>
    </div>
    <div class="count-div">
        <div>Số sản phầm còn trong kho</div>
        <div>
            <?= $countProduct['sum(soLuong)'] ?>
        </div>
    </div>
</div>