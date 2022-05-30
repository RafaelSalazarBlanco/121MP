<?php
if (!isset($_GET["product_id"])) {
    header('Location: index.php');
}
$product_id = $_GET["product_id"];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php include "includes/clientCurl.php"; ?>
    <?php
    setlocale(LC_MONETARY,"es_MX");
    $new = new CurlRequest();
    $resultadoproduct = $new->request("getProductDetail", array("producto_id" => $product_id), "GET");
    $jsonProducto = json_decode($resultadoproduct, true);

    $producto = $jsonProducto["producto"];
    $number = $producto["producto_precio"] * 1;

    $price = money_format("%.2n", $number);
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/styles.css"/>
    <meta property="og:title" content="<?php echo $producto["producto_nombre"]; ?>" />
    <meta property="og:description" content="<?php echo $producto["producto_descripcion"]; ?>" />
    <meta property="og:image" content="<?php echo $producto["producto_thumb"]; ?>" />

    <meta name="twitter:card" content="summary" />
    <meta property="og:url" content="<?php echo $_SERVER['SERVER_NAME']; ?>/pdp.php?product_id=<?php echo $product_id; ?>" />
    <meta property="og:title" content="<?php echo $producto["producto_nombre"]; ?>" />
    <meta property="og:description" content="<?php echo $producto["producto_descripcion"]; ?>" />
    <meta property="og:image" content="<?php echo $producto["producto_thumb"]; ?>" />
    <meta property="og:summary_large_image" content="<?php echo $producto["producto_thumb"]; ?>" />

    <title>121 Market Place</title>
</head>
<body>

<?php include "includes/navbar.php"; ?>



<div class="row">
    <div class="col-2">

    </div>
    <div class="col-5">
        <img src="<?php echo $producto["producto_image"]; ?>"
             style="width: 100%; aspect-ratio: 1 / 1; padding: 5px; padding-right: 15px; padding-left: 15px;"/>
    </div>
    <div class="col-5">
        <div class="row">
            <div class="title_product"> <?php echo $producto["producto_nombre"]; ?></div>
        </div>
        <div class="row">
            <div class="price_product"> <?php echo $price; ?></div>
        </div>
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6">
                <div class="row">
                    <div class="share_product">COMPARTIR</div>
                    <div class="share_product">
                        <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo $_SERVER['SERVER_NAME']; ?>/pdp.php?product_id=<?php echo $product_id; ?>&p[title]=<?php echo $producto["producto_nombre"]; ?>&p[summary]=<?php echo $producto["producto_descripcion"]; ?>&p[images][0]=<?php echo $producto["producto_thumb"]; ?>" target="_blank"><img src="assets/images/facebook_share.png" width="25px" style="margin-right: 5px;"></a>
                        <a href="http://twitter.com/share?url==<?php echo $_SERVER['SERVER_NAME']; ?>/pdp.php?product_id=<?php echo $product_id; ?>&text=<?php echo $producto["producto_nombre"]; ?>" target="_blank"><img src="assets/images/twitter_share.png" width="25px" style="margin-right: 5px;"></a>
                        <a href=""><img src="assets/images/whatsapp_share.png" width="25px" style="margin-right: 5px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

<script>
    var myCarousel = document.querySelector('#myCarousel')
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000,
        wrap: true,
        touch: true
    })

    var myCarouselAnnouncements = document.querySelector('#myCarouselAnnouncements')
    var carouselAnnouncements = new bootstrap.Carousel(myCarouselAnnouncements, {
        interval: 2000,
        wrap: true,
        touch: true
    })

</script>

</body>
</html>