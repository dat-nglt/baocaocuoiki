<div class="container user-cart">
    <h1 class="title-form_account" style="padding: 20px 20px 0;">LỊCH SỬ MUA HÀNG</h1>
    <div class="product-cart" style="padding:0 20px 20px; border: none;">
        <?php
        if (count($listBill) < 1) { ?>
            <div id="meme">Không có lịch sử mua hàng</div>
        <?php } else { ?>
            <table class="list-history-bill">
                <tr>
                    <th style="width:15%">Mã đơn hàng</th>
                    <th style="width:15%">Trạng thái</th>
                    <th style="width:15%">Ngày đặt hàng</th>
                    <th style="width:40%">Tổng tiền hàng</th>
                    <th style="width:10%"></th>
                </tr>
                <?php foreach ($listBill as $key => $value) {
                    extract($value);
                    if ($value[3] == 1) {
                        $status = "Thành công";
                    } else {
                        $status = "Đang xử lý";
                    }
                    $date = date("d/m/Y", strtotime($value[2]));
                    $link = "index.php?page=detailbill&id=" . $value[0];
                    ?>
                    <tr>
                        <td><?= $value[0] ?></td>
                        <td><?= $status ?></td>
                        <td><?= $date ?></td>
                        <td><?php echo number_format($value[4], 0, '.', '.') ?><span id="vnd">&#8363;</span></td>
                        <td><a href="<?= $link ?>">Xem chi tiết</a></td>
                    </tr>

                <?php } ?>
            </table>
        <?php } ?>
    </div>
</div>