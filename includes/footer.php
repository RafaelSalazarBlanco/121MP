<div id="modal_contact" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style=" border-bottom: 1px solid #F04648; margin-left: 30px; margin-right: 30px;">
                <div style="width: 100%; text-align: center; font-family: MontserratSemiBold, serif; font-size: 18px;">Cont&aacute;ctanos</div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form></form>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div style="bottom: 0; width: 100%; background: #2D2D2D;">

    <div class="row" style="width: 100%; padding-top: 25px;">
        <div class="col" style="margin-left: 40px;">
            <p class="footerP">Acerca de</p>
            <ul class="footerUl">
                <li><a class="footerAnchor" href="index.php">121 MarketPlace</a></li>
                <li><a class="footerAnchor" href="/admin/files/termsAndConditions.php" target="_blank">T&eacute;rminos y Condiciones</a></li>
                <li><a class="footerAnchor" href="/admin/files/privacy.php" target="_blank">Pol&iacute;ticas de Privacidad</a></li>
                <li><a class="footerAnchor" href="mailto:contacto@121marketplace.com?subject=Atención al cliente">Atenci&oacute;n al cliente</a></li>
                <li><a name="contacto_anchord" class="footerAnchor" href="#">Contacto</a></li>
            </ul>
        </div>
        <div class="col">
            <p class="footerP">Servicios y productos</p>
            <ul class="footerUl">
                <li><a class="footerAnchor" href="index.php">Categor&iacute;as</a></li>
                <li><a class="footerAnchor" href="index.php">Servicios</a></li>
                <li><a class="footerAnchor" href="index.php">Preguntas frecuentes FAQ</a></li>
            </ul>
        </div>
        <div class="col">
            <p class="footerP">Mi cuenta</p>
            <ul class="footerUl">
                <li><a class="footerAnchor" href="index.php">Vender</a></li>
                <li><a class="footerAnchor" href="index.php">Editar mi perfil</a></li>
                <li><a class="footerAnchor" href="index.php">Salir</a></li>
            </ul>
        </div>
        <div class="col">
            <div class="row">
                <p class="footerP">121 MarketPlace App</p>
            </div>
            <div class="row">
                <img src="assets/images/android_icon.bdc9594f.svg" style="padding-top: 5px; width: 35px;"/>
                <img src="assets/images/apple_icon.f1805f1b.svg" style="padding-top: 5px; margin-left: 5px; width: 35px;"/>
            </div>
            <div class="row" style="margin-top: 25px;">
                <p class="footerP">Redes Sociales</p>
            </div>
            <div class="row">
            </div>
        </div>
        <div class="col">
            <img src="assets/images/footer.88b9cbba.png" style="padding-top: 5px; width: 350px;"/>
        </div>
    </div>
</div>

<script>
    $(document).on("click", "a[name=contacto_anchord]", function (e) {
        e.preventDefault();
        $("#modal_contact").modal("show");
    });

</script>