<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce<?php if (isset($data['title'])) {
                            echo $data['title'];
                        } ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/base/base.css?<?= time(); ?>">
    <?php
    if (isset($data['css'])) {
        foreach ($data['css'] as $fileName) { ?>
            <link rel="stylesheet" href="<?= BASEURL; ?>/css/<?= $fileName ?>.css?<?= time(); ?>">
        <?php
        }
        ?>
    <?php
    }
    ?>
</head>

<body>