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

$resultadoNews = $new->request("getNews", array(), "GET");
$jsonNews = json_decode($resultadoNews, true);

?>
<div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
    <?php

    $productos = (null != $jsonNews && $jsonNews["productos"]) ? $jsonNews["productos"] : array();
    if (count($productos) > 0) {
        ?>
        <div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
            <h2 style="font-family: MontserratBold, serif;" align="center">NOVEDADES</h2>
            <div class="row">
                <?php
                foreach ($productos as $row) {
                    ?>
                    <div class="col-lg-4">
                        <div class="container_image_plp" style=" padding: 20px;">
                            <a href="pdp.php?product_id=<?php echo $row["producto_id"];?>">
                                <img src="<?php echo $row["producto_thumb"]; ?>" alt="Avatar" class="image"
                                     style="width:100%; height: 200px; object-fit: cover;">
                                <div class="middle">
                                    <div class="title_product_plp"><?php echo $row["producto_nombre"]; ?></div>
                                    <div class="price_product_plp"><?php echo "$".number_format($row["producto_precio"]) . ".00"; ?></div>
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

<?php include "includes/footer.php"; ?>

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


</body>
</html>