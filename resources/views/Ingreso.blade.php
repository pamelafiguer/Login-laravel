<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <div class="box-Ingreso">
        <form action=""> 
            <h2>¡Ingreso Exitoso!</h2>
            <div class="input-Grupo">
                <h2>Bienvenido</h2>
            </div>
            <div class="signup-as">
                <br>
                <button type="button" id="CerrarSesionbtn">Cerrar Sesión</button>
                <br>
                <br>
                <button type="button" id="show-change-password-btn">Cambiar Contraseña</button>
            </div>
        </form>
    </div>

    <div id="CerrarSesionModal" class="modal">
        <div class="modal-content">
            <h3>¿ Seguro que quieres Cerrar la Sesion ? </h3>
            <div class="modal-buttons">
                <button class="cancelar" id="cancelarbtn">Cancelar</button>
                <button class="cerrar-Sesion" id="ConfirmarCerrarSesion">Cerrar Sesion</button>
            </div>
        </div>
    </div>

    <div class="box-change-password" id="change-password" style="display: none;">
        <form action="" id="change-password-form">
            <h2>Cambiar Contraseña</h2>
            <div class="input-Grupo">
                <input type="email" id="change-email" required>
                <label for="">Correo</label>
            </div>
            <div class="input-Grupo">
                <input type="password" id="current-password" required>
                <label for="">Contraseña Actual</label>
            </div>
            <div class="input-Grupo">
                <input type="password" id="new-password" required>
                <label for="">Nueva Contraseña</label>
            </div>
            <button type="submit">Aceptar</button>
            <button type="button" class="cancelar" id="cancelarfrom">Cancelar</button>
        </form>
    </div>

    
</body>
</html>
