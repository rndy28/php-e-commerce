

<script src="<?=BASEURL?>/js/index.js" defer type="module"></script>
<?php
if (isset($data['js'])) {
?>
    <script src="<?= BASEURL; ?>/js/<?= $data['js']; ?>.js?<?= time() ?>" defer type="module"></script>
<?php
}
?>
</body>

</html>