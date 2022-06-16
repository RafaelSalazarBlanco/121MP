<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "includes/clientCurl.php"; ?>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/styles.css"/>

    <title>121 Market Place</title>
</head>
<body>

<?php include "includes/navbar.php"; ?>

<?php
$new = new CurlRequest();
$estado_id = "";
$resultadoTiendas = $new->request("getStores", array("estado_id" => $estado_id), "GET");
$jsonTiendas = json_decode($resultadoTiendas, true);
$tiendas = $jsonTiendas["tiendas"];
?>

<div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
    <?php

    $tiendas = (null != $jsonTiendas && $jsonTiendas["tiendas"]) ? $jsonTiendas["tiendas"] : array();
    if (count($tiendas) > 0) {
        ?>
        <div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
            <h2 style="font-family: MontserratBold, serif;" align="center">TIENDAS</h2>
            <div class="row">
                <?php
                foreach ($tiendas as $row) {
                    ?>
                    <div class="col-lg-4">
                        <div class="container_image_plp" style=" padding: 20px;">
                            <a href="tienda.php?provedor_id=<?php echo $row["provedor_id"];?>">
                                <?php if ($row["provedor_thumb"] == "") { ?>
                                <img src="assets/images/logo.5c4dbc69.png" alt="Thumb" class="image"
                                     style="width:100%; height: 200px; object-fit: contain;"></a>
                                <?php } else { ?>
                                <img src="<?php echo $row["provedor_thumb"]; ?>" alt="Thumb" class="image"
                                     style="width:100%; height: 200px; object-fit: cover;">
                                <?php }?>
                                <div class="middle">
                                    <div class="price_product_plp"><?php echo $row["provedor_nombre"]; ?></div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }

    ?>

</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="assets/js/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

<?php include "includes/footer.php"; ?>
</body>
</html>