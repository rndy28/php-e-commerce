<table class="table-transaksi">
    <thead>
        <tr>
            <th>Id Transaksi</th>
            <th>Nama Printer</th>
            <th>Customer</th>
            <th>Jumlah</th>
            <th>Sub total</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody class="js-table-barang">
        <?php
        foreach ($data['transaksi'] as $transaksi) {
        ?>
            <tr>
                <td><?= $transaksi['idTransaksi'] ?></td>
                <td><?= $transaksi['NamaPrinter'] ?></td>
                <td><?= $transaksi['Username'] ?></td>
                <td><?= $transaksi['Jumlah'] ?></td>
                <td class="js-harga-printer"><?= $transaksi['subtotal'] ?></td>
                <td>
                    <?php 
                    if($transaksi['status'] == 1) {
                        echo '<a href="'.BASEURL.'/dashboard/transaksi/confirm/'.$transaksi['idTransaksi'].'" class="btn btn-confirm">Confirm</a>';
                    } else {
                        echo '<a class="btn btn-confirm confirmed">Confirmed</a>';
                    }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>