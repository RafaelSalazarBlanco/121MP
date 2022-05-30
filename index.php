<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
?>
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

$resultadoCategories = $new->request("getCategories", array(), "GET");
$jsonCategories = json_decode($resultadoCategories, true);
/*
$resultadoAnnouncements = $new -> request("getAnnouncements",array(),"GET");
$jsonAnnouncements = json_decode($resultadoAnnouncements, true);
*/

?>

<div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="assets/images/image_1_home.png" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="assets/images/image_2_home.png" class="d-block w-100" alt="...">
        </div>
    </div>
</div>

<?php
$productos = (null != $jsonNews && $jsonNews["productos"]) ? $jsonNews["productos"] : array();
$anuncios = (null != $jsonNews && $jsonNews["anuncios"]) ? $jsonNews["anuncios"] : array();
$categorias = (null != $jsonCategories && $jsonCategories["categories"]) ? $jsonCategories["categories"] : array();

if (count($productos) > 0) {
    ?>
    <div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
        <h2 style="font-family: MontserratBold, serif;" align="center">NOVEDADES</h2>
        <div class="row">
            <?php
            foreach ($productos as $row) {
                ?>
                <div class="col-lg-4">
                    <div class="container_image">
                        <a href="pdp.php?product_id=<?php echo $row["producto_id"];?>">
                            <img src="<?php echo $row["producto_image"]; ?>" alt="Avatar" class="image"
                                 style="width:100%">
                            <div class="middle">
                                <div class="text"><?php echo strtoupper($row["producto_nombre"]); ?></div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php }

if (count($anuncios) > 0) { ?>
    <div id="myCarouselAnnouncements" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php
            foreach ($anuncios as $anuncio) {
                $type = $anuncio["anuncio_tipo"] * 1;
                ?>
                <div class="carousel-item active">
                    <a href="<?php echo ($type == 1) ? "pdp": ""; ?>.php?product_id=<?php echo $row["producto_id"];?>">
                        <img src="<?php echo $anuncio["anuncio_imagen"]; ?>" class="d-block w-100" alt="...">
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>

    <?php
}

if (count($categorias) > 0) {
    ?>
    <div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
        <h2 style="font-family: MontserratBold, serif;" align="center">CATEGOR&Iacute;AS</h2>
        <div class="row">
            <?php
            foreach ($categorias as $row) {
                ?>
                <div class="col-lg-4">
                    <div class="container_image">
                        <img src="<?php echo $row["categoria_thumb"]; ?>" alt="Avatar" class="image" style="width:100%">
                        <div class="middle">
                            <div class="text"><?php echo $row["categoria_nombre"]; ?></div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>


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