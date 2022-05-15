<?php
$links = [
    BASEURL."/dashboard/barang" => "Barang",
    BASEURL."/dashboard/transaksi" => "Transaksi",
    BASEURL."/logout" => "Logout"
    
];
$currentPage = explode('/', $_SERVER['REQUEST_URI']);
$currentPage = end($currentPage);
?>

<div class="dashboard-container">
    <aside>
        <div class="sidebar">
            <ul class="sidebar-list">
                <?php
                foreach ($links as $key => $link) {
                ?>
                    <li <?php
                        if ($currentPage == strtolower($link)) {
                        ?> class="active" <?php
                                        }
                                            ?>>
                        <a href="<?=$key?>"><?= $link ?></a>
                    </li>
                <?php
                }
                ?>
            </ul>
                <?php if($currentPage == 'barang') {
                    echo "<span class='btn btn-add-product js-open-modal'>Tambah</span>";
                } ?>
            </div>
    </aside>
    <main class="main">
        <?php
        $controller = new Controller;
        switch ($currentPage) {
            case 'barang':
                $controller->view('admin/barang', $data);
                break;
            case 'transaksi':
                $controller->view('admin/transaksi', $data);
                break;
            default:
                $controller->view('admin/barang', $data);
                break;
        }
        ?>
    </main>
</div>