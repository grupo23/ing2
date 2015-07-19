<script type="text/javascript">
            $(function ()
            {
                $('#myDataButton').click(function ()
                {
                   $("#complementos/modificarDatos.inc");
                });
                $('#backToMyDataButton').click(function ()
                {
                    $("form[name=formulariomodificar]").parent().hide();
                    $("form[name=registrarProducto]").parent().hide();
                    $("form[name=formularioverOfertas]").parent().hide();
                });
                $('#cancelButton').click(function ()
                {
                    $("form[name=formulariomodificar]").parent().hide();
                    $("form[name=registrarProducto]").parent().hide();
                    $("form[name=formularioverOfertas]").parent().hide();
                });
                $('#newproductButton').click(function ()
                {
                    $("form[name=formulariomodificar]").parent().hide();
                    $("form[name=registrarProducto]").parent().fadeToggle();
                    $("form[name=formularioverOfertas]").parent().hide();
                });
                $('#myofertButton').click(function ()
                {
                    $("form[name=formulariomodificar]").parent().hide();
                    $("form[name=registrarProducto]").parent().hide();
                    $("form[name=formularioverOfertas]").parent().fadeToggle();

                });
                $('#backToMyDataButton2').click(function ()
                {
                    $("form[name=formulariomodificar]").parent().hide();
                    $("form[name=registrarProducto]").parent().hide();
                    $("form[name=formularioverOfertas]").parent().hide();
                });

                $('#botonactualizar').click(function (e)
                {
                    $("#controllers/modificarDatos.php");
                });
                $('#botondardebaja').click(function (e)
                {
               
                });

            });
</script>