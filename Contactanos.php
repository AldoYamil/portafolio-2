<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactanos</title>
</head>
<body>
    <section>
        <h2>Contacto</h2>
        imagen
    </section>
    <section>
        <h2>Llena el formulario de contacto</h2>
        <form action="">
            <!-- nombre,gmail,-->
             <fieldset>
              <legend>Información personal</legend>   
                 <div>
                    <label for="name">Nombre</label>
                    <input type="text" name = "name" id = "name">
                 </div>
                 <div>
                     <label for="email">Email</label>
                     <input type="text" name = "email" id = "email">
                 </div>
                 <div>
                     <label for="phone">Telefono</label>
                     <input type="text" name = "phone" id = "phone">
                 </div>         
                    <div>
                        <label for="msg">Mensaje</label>
                        <textarea name="msg" id="msg"></textarea>    
                    </div>
             </fieldset>
             <fieldset>
                <legend>Informacion de la propiedad</legend>
                <div>
                    <label for="ventacompra">Vende o compra ?</label>
                    <input type="text" name= "ventacompra" id = "ventacompra">
                </div>
                <div>
                    <label for="cantidad">Cantidad</label>
                    <input type="number" name= "cantidad" id = "cantidad">
                </div>
             </fieldset>

             <fieldset>
                <legend>Contacto</legend>
                <div>
                    <label for="tel">Telefono</label>
                    <input type="radio" name = "tel" id = "tel">
                    <label for="mail">Email</label>
                    <input type="radio" name = "mail" id = "mail">
                </div>
             </fieldset>
             <div>
                <button type="sumit"></button>
             </div>
        </form>
    </section>
    <?php include "includes/footer.php"?>