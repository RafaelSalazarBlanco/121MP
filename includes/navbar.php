<nav class="navbar navbar-expand-lg navbar-light bg-white" style="background: #0b2e13; ">
    <div style="width: 100%">
        <div class="row">
            <div class="col" align="center">
                <a class="navbar-brand" href="index.php"><img src="assets/images/logo.5c4dbc69.png" width="120"
                                                              alt="Inicio"></a>
            </div>
            <div class="col-7" style="display: grid; align-items: center; padding-right: 80px; padding-left: 80px;">
                <input type="search" placeholder="Search" aria-label="Search">
            </div>
            <div class="col">
                <a name="locations" href="#">
                    <div class="row">
                        <div class="col-4"
                             style="align-content: center; text-align: center; font-family: MontserratLight, serif; font-size: 12px; color: #000000;"><?php echo $estadoNombre; ?></div>
                        <div class="col-4"><img src="assets/images/location.png" width="20px"/></div>
                        <div class="col-4"><img src="favicon-96x96.png" width="28px"/></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categor&iacute;as</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tiendas.php">Tiendas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="novedades.php">Novedades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ayuda</a>
                    </li>
                </ul>
            </div>
            <div class="col-7"></div>
            <div class="col">
                <div class="row" style="height: 100%;">
                    <div class="col-11" style="display: grid; align-items: center;"><a href="#">Inicia Sesi&oacute;n
                            <img src="assets/images/user-icon.aac87c04.svg" width="20px"></a></div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>


</nav>

<div id="modal_locations" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style=" border-bottom: 1px solid #F04648; margin-left: 30px; margin-right: 30px;">
                <div style="width: 100%; alignment: center;"><img src="assets/images/logo.5c4dbc69.png" width="120"/>
                </div>
                <a name="closeLocations" href="#">
                    <img src="assets/images/btn_close.png" width="20px"/>
                </a>
            </div>
            <div class="modal-body">
                <form style="padding-left: 30px; padding-right: 30px;" id="form_locations" method="post">

                    <div class="mb-3">
                        <label for="country" class="form-label">Pa&iacute;s</label>
                        <select name="state" class="form-control" id="country">
                            <optgroup label="">
                                <option value=""></option>
                            </optgroup>
                            <?php
                            foreach ($countries as $country) {
                                $states = (null != $country && $country["states"]) ? $country["states"] : array();
                                $countryName = (null != $country && $country["pais_nombre"]) ? $country["pais_nombre"] : "";
                                ?>
                                <optgroup label="<?php echo $countryName; ?>">

                                    <?php
                                    foreach ($states as $state) {
                                        $stateId = $state["estado_id"] * 1;
                                        $stateName = $state["estado_nombre"]; ?>
                                        <option value="<?php echo $stateId; ?>"><?php echo $stateName; ?></option>
                                        <?php
                                    }
                                    ?>

                                </optgroup>

                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="language" class="form-label">Idioma</label>
                        <select class="form-control" id="state">
                            <option value="es">Español</option>
                            <option value="en">Ingl&eacute;s</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a name="submit_locations" href="#" style="text-align: center; font-family: MontserratSemiBold, serif; font-size: 18px; color: white; background-color: #ef5151; padding: 12px;" >Enviar</a>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).on("click", "a[name=locations]", function (e) {
        e.preventDefault();
        $("#modal_locations").modal("show");
    });

    $(document).on("click", "a[name=closeLocations]", function (e) {
        e.preventDefault();
        $("#modal_locations").modal("hide");
    });

    $(document).on("click", "a[name=submit_locations]", function (e) {
        e.preventDefault();
        $("#form_locations").submit();
    });



</script>