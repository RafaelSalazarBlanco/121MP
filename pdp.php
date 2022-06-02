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
    setlocale(LC_MONETARY, "es_MX");
    $new = new CurlRequest();
    $resultadoproduct = $new->request("getProductDetail", array("producto_id" => $product_id), "GET");
    $jsonProducto = json_decode($resultadoproduct, true);

    $producto = $jsonProducto["producto"];
    $number = $producto["producto_precio"] * 1;
    $promedio = intval($producto["promedio"]);


    $favorite = $producto["favorite"];
    $providerFavorite = $producto["provedor_favorite"];

    $comments = $producto["producto_comentarios"];
    $images = $producto["producto_imagenes"];

    $price = money_format("%.2n", $number);
    ?>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/styles.css"/>
    <meta property="og:title" content="<?php echo $producto["producto_nombre"]; ?>"/>
    <meta property="og:description" content="<?php echo $producto["producto_descripcion"]; ?>"/>
    <meta property="og:image" content="<?php echo $producto["producto_thumb"]; ?>"/>

    <meta name="twitter:card" content="summary"/>
    <meta property="og:url"
          content="<?php echo $_SERVER['SERVER_NAME']; ?>/pdp.php?product_id=<?php echo $product_id; ?>"/>
    <meta property="og:title" content="<?php echo $producto["producto_nombre"]; ?>"/>
    <meta property="og:description" content="<?php echo $producto["producto_descripcion"]; ?>"/>
    <meta property="og:image" content="<?php echo $producto["producto_thumb"]; ?>"/>
    <meta property="og:summary_large_image" content="<?php echo $producto["producto_thumb"]; ?>"/>

    <title>121 Market Place</title>
</head>
<body>

<?php include "includes/navbar.php"; ?>


<div class="row">
    <div class="col-2">
        <div style="overflow-scrolling: auto;" align="center">
            <img src="<?php echo $producto["producto_thumb"]; ?>" class="image_pdp_selection"/>

            <?php
                if (count($images) > 0){
                    foreach ($images as $image){?>
                    <img src="<?php echo $image["image_thumb"]; ?>" class="image_pdp_selection"/>
                <?php }
                }
            ?>
        </div>
    </div>
    <div class="col-6" align="center">
        <img src="<?php echo $producto["producto_image"]; ?>"
             style="width: 75%; margin-top: 10px;"/>
    </div>
    <div class="col-4">
        <div class="row">
            <div class="title_product"> <?php echo $producto["producto_nombre"]; ?></div>
        </div>
        <div class="row">
            <div class="price_product"> <?php echo $price; ?></div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <img src="assets/images/rate_<?php echo $promedio; ?>.png" width="125px"/>
                </div>
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="share_product">COMPARTIR</div>
                    <div class="share_product">
                        <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo $_SERVER['SERVER_NAME']; ?>/pdp.php?product_id=<?php echo $product_id; ?>&p[title]=<?php echo $producto["producto_nombre"]; ?>&p[summary]=<?php echo $producto["producto_descripcion"]; ?>&p[images][0]=<?php echo $producto["producto_thumb"]; ?>"
                           target="_blank"><img src="assets/images/facebook_share.png" width="25px"
                                                style="margin-right: 5px;"></a>
                        <a href="http://twitter.com/share?url==<?php echo $_SERVER['SERVER_NAME']; ?>/pdp.php?product_id=<?php echo $product_id; ?>&text=<?php echo $producto["producto_nombre"]; ?>"
                           target="_blank"><img src="assets/images/twitter_share.png" width="25px"
                                                style="margin-right: 5px;"></a>
                        <a href=""><img src="assets/images/whatsapp_share.png" width="25px" style="margin-right: 5px;"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col description_store">
                <?php echo "</br>" . $producto["provedor_nombre"] . "</br>" . $producto["provedor_contacto"] . "</br></br><a href='tel:" . $producto["provedor_telefono"] . "' style = 'font-family: MontserratLight, serif; color: #000000; text-decoration: none;'>" . $producto["provedor_telefono"] . "</a></br><a href='mailto:" . $producto["provedor_correo"] . "' style = 'font-family: MontserratLight, serif; color: #000000; text-decoration: none;'>" . $producto["provedor_correo"] . "</a></br>"; ?>
            </div>
            <div class="col-2"></div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-8"></div>
            <div class="col">
                <a href="#"><img
                            src="assets/images/<?php echo ($favorite) ? "icon_favorite_on.png" : "icon_favorite_off.png" ?>"
                            width="40px" style="margin-right: 5px;">
                </a>
                <a href="#"><img
                            src="assets/images/<?php echo ($providerFavorite) ? "icon_favorite_store_on.png" : "icon_favorite_store_off.png" ?>"
                            width="40px" style="margin-right: 5px;">
                </a>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
    <div class="col-1"></div>
    <div class="col-10">
        <div class="subtitle_product">Descripci&oacute;n</div>
        <div class="description_product"><br><?php echo $producto["producto_descripcion"]; ?></div>
    </div>
    <div class="col-1"></div>
</div>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <hr>
    </div>
    <div class="col-1"></div>
</div>
<div class="row" style="margin-top: 15px; margin-bottom: 15px;">
    <div class="col-1"></div>
    <div class="col-7">
        <div class="subtitle_product">Comentarios</div>
    </div>
    <div class="col-2 button_orange">Opini&oacute;n</div>
    <div class="col-2"></div>
</div>

<?php
foreach ($comments as $comment) {
    $rate = intval($comment["calificacion"]);
    ?>
    <div class="row" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="col-1"></div>
        <div class="col-10 box_comment">
            <div class="row">
                <div class="col">
                    <div class="nickname_comment"><?php echo $comment["usuario_nombre"]; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <img src="assets/images/rate_<?php echo $rate; ?>.png" width="125px"/>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="date_comment"><?php echo $comment["fecha"]; ?></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="detail_comment"><?php echo $comment["comentario"]; ?></div>
                </div>
            </div>
        </div>
        <div class="col-1"></div>
    </div>
<?php }
?>
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

