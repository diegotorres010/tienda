var $_TERCEROS,$_PRODUCTOS;
$(document).ready(function () {
    cargarTerceros_entradas();
    cargarProductos_entradas();
    console.log('Prueba');
});

function cargarTerceros_entradas() {
    var busquedaTerceros = [];
    var datos = new FormData();
    datos.append("mostrarTerceros", true);

    $.ajax({
        url: "ajax/terceros.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            console.log(respuesta)
            $_TERCEROS = respuesta;
            for (var i = 0; i < respuesta.length; i++) {
                tercerosItem = {
                    label: respuesta[i].documento + ' - ' + respuesta[i].descripcion,
                    value: respuesta[i].idUsuario
                }
                busquedaTerceros.push(tercerosItem);
            }

            $("#seleccionarCliente").autocomplete({
                source: busquedaTerceros,
                select: function (e, ui) {
                    $(this).val(ui.item.label).attr('value', ui.item.value)
                    return false;
                }
            })
        }
    });
}

function cargarProductos_entradas() {
    var busquedaProductos = [];

    var datos = new FormData();
    datos.append("traerProductos", "ok");

    $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            $_PRODUCTOS = respuesta;
            productosArray = respuesta;
            for (var i = 0; i < respuesta.length; i++) {
                productosItem = {
                    label: respuesta[i].codigoBarras + ' - ' + respuesta[i].descripcion,
                    value: respuesta[i].idProducto
                }
                busquedaProductos.push(productosItem);
            }

            $("#nuevoProducto").autocomplete({
                source: busquedaProductos,
                select: function (e, ui) {
                    $(this).val(ui.item.label).attr('value', ui.item.value)
                    return false;
                }
            }).autocomplete("instance")._renderItem = function (ul, item) {
                return $("<li>")
                    .append("<div>" + item.label + "</div>")
                    .appendTo(ul);
            };
        }
    });
}