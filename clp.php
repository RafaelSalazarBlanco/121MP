<?php
if (!isset($_GET["category_id"])) {
    header('Location: index.php');
}
$category_id = $_GET["category_id"];
include "includes/validateSession.php";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/styles.css"/>

    <title>121 Market Place</title>
</head>
<body>
<script src="assets/js/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>

<?php include "includes/navbar.php"; ?>

<?php

$resultadoCategory = $new->request("getCategory", array("categoria_id" => $category_id), "GET");
$jsonCategory = json_decode($resultadoCategory, true);
$category = $jsonCategory["categoria"];
$productos = $category["categoria_productos"];


$resultadoCategories = $new->request("getCategories", array(), "GET");
$jsonCategories = json_decode($resultadoCategories, true);
$categories = $jsonCategories["categories"];

?>
<div class="container" style="padding-top: 40px; padding-bottom: 30px; font-size: medium;">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-lg-9">
            <h2 style="font-family: MontserratBold, serif;"
                align="center"><?php echo $category["categoria_nombre"]; ?></h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3" style="padding-left: 20px; padding-right: 20px;">
            <?php
            foreach ($categories as $category) { ?>
                <div class="category">
                    <a href="clp.php?category_id=<?php echo $category["categoria_id"]; ?>">
                        <div class="col">
                            <?php echo $category["categoria_nombre"]; ?>
                            <br>
                            <hr>
                        </div>
                    </a>
                </div>
            <?php } ?>
        </div>
        <div class="col-9">
            <div class="row">

                <?php
                foreach ($productos as $row) {
                    ?>
                    <div class="col-lg-4">
                        <div class="container_image">
                            <a href="pdp.php?product_id=<?php echo $row["producto_id"]; ?>">
                                <img src="<?php echo $row["producto_thumb"]; ?>" alt="Avatar" class="image"
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

    </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="assets/js/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<?php include "includes/footer.php"; ?>


</body>
</html>