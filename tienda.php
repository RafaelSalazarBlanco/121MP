<?php
if (!isset($_GET["provedor_id"])) {
    header('Location: index.php');
}
$provedor_id = $_GET["provedor_id"];
$categoria_id = $_GET["categoria_id"];
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

$usuario_id = "";

$resultadoTienda = $new->request("getCompanyInfo", array("provedor_id" => $provedor_id, "usuario_id" => $usuario_id), "GET");
$jsonTienda = json_decode($resultadoTienda, true);
$provedor = $jsonTienda["provedor"];
$providerFavorite = $provedor["favorite"];
$categorias = $provedor["categorias"];

$resultadoCategories = $new->request("getCategory", array("provedor_id" => $provedor_id, "categoria_id" => $categoria_id), "GET");
$jsonProductos = json_decode($resultadoCategories, true);
$categoria = $jsonProductos["categoria"];
$categoria_nombre = $categoria["categoria_nombre"];
$productos = $categoria["categoria_productos"];

if (!isset($_GET["categoria_id"])) {
    $header = "Location: tienda.php?categoria_id=" . $categorias[0]["categoria_id"] . "&provedor_id=" . $provedor_id;
    header($header);
}

?>
<div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-lg-9">
            <h2 style="font-family: MontserratBold, serif;"
                align="center"><?php echo strtoupper($categoria_nombre); ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3" style="padding-left: 20px; padding-right: 20px;">
            <div style="width: 100%; ">
                <img class="circular--square" src="assets/images/logo.5c4dbc69.png" width="120" />
            </div>
            <?php
            foreach ($categorias as $category) { ?>
                <div class="category">
                    <a href="tienda.php?categoria_id=<?php echo $category["categoria_id"] . "&provedor_id=" . $provedor_id; ?>">
                        <div class="col">
                            <?php echo $category["categoria_nombre"]; ?>
                            <br>
                            <hr>
                        </div>
                    </a>
                </div>
            <?php } ?>
            <div class="share_product">COMPARTIR</div>
            <div class="share_product">
                <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo $_SERVER['SERVER_NAME']; ?>/tienda.php?categoria_id=<?php echo $categoria_id; ?>&provedor_id=<?php echo $provedor_id;?>&p[title]=<?php echo $provedor["provedor_nombre"]; ?>&p[summary]=<?php echo $provedor["provedor_nombre"]; ?>&p[images][0]=<?php echo $provedor["provedor_thumb"]; ?>"
                   target="_blank"><img src="assets/images/facebook_share.png" width="25px"
                                        style="margin-right: 5px;"></a>
                <a href="http://twitter.com/share?url==<?php echo $_SERVER['SERVER_NAME']; ?>/tienda.php?categoria_id=<?php echo $categoria_id; ?>&provedor_id=<?php echo $provedor_id;?>&text=<?php echo $provedor["provedor_nombre"]; ?>"
                   target="_blank"><img src="assets/images/twitter_share.png" width="25px"
                                        style="margin-right: 5px;"></a>
                <a href=""><img src="assets/images/whatsapp_share.png" width="25px" style="margin-right: 5px;"></a>
            </div>
            <br/>
            <div class="col description_store">
                <div class="price_product_plp"><?php echo "Contacto"; ?></div>
                <?php echo "</br>" . $provedor["provedor_nombre"] . "</br>" . $provedor["provedor_contacto"] . "</br></br><a href='tel:" . $provedor["provedor_telefono"] . "' style = 'font-family: MontserratLight, serif; color: #000000; text-decoration: none;'>" . $provedor["provedor_telefono"] . "</a></br><a href='mailto:" . $provedor["provedor_correo"] . "' style = 'font-family: MontserratLight, serif; color: #000000; text-decoration: none;'>" . $provedor["provedor_correo"] . "</a></br>"; ?>
            </div>
            <br/>
            <div class="col">
                <a href="#"><img
                            src="assets/images/<?php echo ($providerFavorite) ? "icon_favorite_on.png" : "icon_favorite_off.png" ?>"
                            width="40px" style="margin-right: 5px;">
                </a>
            </div>
        </div>
        <div class="col-9">
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


</body>
</html>