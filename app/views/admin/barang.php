<?php
if (isset($_SESSION['insert_success'])) {
    echo "<h2>Barang berhasil ditambahkan</h2>";
    unset($_SESSION['insert_success']);
}
?>


<table>
    <thead>
        <tr>
            <th>Id Printer</th>
            <th>Thumbnail Printer</th>
            <th>Nama Printer</th>
            <th>Spesifikasi Printer</th>
            <th>Harga Printer</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody class="js-table-barang">
        <?php
        foreach ($data['barang'] as $barang) {
        ?>
            <tr>
                <td><?= $barang['IdPrinter'] ?></td>
                <td class="thumbnail-printer"><img src="<?= BASEURL.'/assets/img/printer/'.$barang['ThumbnailPrinter'] ?>" alt=""></td>
                <td><?= $barang['NamaPrinter'] ?></td>
                <td><?= $barang['SpesifikasiPrinter'] ?></td>
                <td class="js-harga-printer"><?= $barang['HargaPrinter'] ?></td>
                <td class="options">
                    <a href="<?= BASEURL ?>/dashboard/barang/delete/<?= $barang['IdPrinter'] ?>"></a>
                    <img src="<?= BASEURL ?>/assets/icon/edit.svg" class="js-edit-btn" />
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<div class="modal-container js-modal">
    <div class="modal">
        <img src="<?= BASEURL; ?>/assets/icon/cross.svg" class="js-close-modal" />
        <form class="form-modal js-form-modal" action="<?= BASEURL ?>/dashboard/barang/create" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_printer" id="id_printer">
            <div class="input-file-container">
                <label for="thumbnail_printer">Thumbnail Printer</label>
                <input  type="file" id="thumbnail_printer" name="thumbnail_printer" />
            </div>
            <div class="input-container">
                <label for="nama_printer">Nama Printer</label>
                <input required type="text" id="nama_printer" name="nama_printer" />
            </div>
            <div class="input-container">
                <label for="spesifikasi_printer">Spesifikasi Printer</label>
                <textarea name="spesifikasi_printer" id="spesifikasi_printer" cols="30" rows="10"></textarea>
            </div>
            <div class="input-container">
                <label for="harga_printer">Harga Printer</label>
                <input required type="number" id="harga_printer" name="harga_printer" />
            </div>
            <button type="submit" class="btn">Tambah</button>
        </form>
    </div>
</div>