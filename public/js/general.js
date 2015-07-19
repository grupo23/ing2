
function eliminarUsuario(id)
{
   if (confirm("Realmente desea eliminar su Cuenta?"))
   {
      window.location="controllers/delete.php?idUsuario="+id;
   }
}
function eliminarProducto(idProducto)
{
   if (confirm("Realmente desea eliminar este producto?"))
   {
      window.location="controllers/eliminarProducto.php?idProducto="+idProducto;
   }
}
function eliminarOferta(idOferta)
{
   if (confirm("Realmente desea eliminar esta oferta?"))
   {
      window.location="controllers/eliminarOferta.php?idOferta="+idOferta;
   }
}
function elegirGanador(idOfer)
{
   if (confirm("Realmente desea elegir esta razon como ganadora?"))
   {
      window.location="controllers/elegirGanador.php?idOferta="+idOfer;
   }
}
