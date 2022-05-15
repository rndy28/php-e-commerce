
<main class="orders-container">
    <table class="table-orders">
        <thead>
            <tr>
                <th>Id Transaksi</th>
                <th>Nama Product</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($data['orders'] as $order) {
            ?>
                <tr>
                    <td> <?= $order['idTransaksi'] ?></td>
                    <td> <?= $order['NamaPrinter'] ?></td>
                    <td> <?= $order['Jumlah'] ?></td>
                    <td class="js-harga-printer"> <?= $order['subtotal'] ?></td>
                    <td>
                        <?php
                        if ($order['status'] == 1) {
                            echo '<span  class="btn btn-confirm">Not Confirmed</span>';
                        } else {
                            echo '<span class="btn btn-confirm confirmed">Confirmed</span>';
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</main>
