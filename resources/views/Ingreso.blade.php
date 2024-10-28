
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>



    <div class="box-Ingreso">
        @if(session()->has('user_id'))
        @else
        <form method="GET" action="{{ route('ingreso') }}"> 
            
            <h2>¡Ingreso Exitoso!</h2>
            <div class="input-Grupo">
                <h2>Bienvenido</h2>
            </div>
            <div class="signup-as">
                <br>
                
                <button type="button" id="CerrarSesionbtn">
                    Cerrar Sesión </button>
                <br>
            
                <br>
                <button type="button" id="show-change-password-btn">
                    Cambiar Contraseña</button>
            </div>
            
        </form>
    </div>
    @endif
    
    
    
    
        
    <div id="CerrarSesionModal" class="modal">
        @if(session()->has('user_id'))
        @else
        <div class="modal-content">
            <h3>¿ Seguro que quieres Cerrar la Sesion ? </h3>
            <div class="modal-buttons">
                <button class="cancelar" id="cancelarbtn">Cancelar</button>
                <button class="cerrar-Sesion" id="ConfirmarCerrarSesion"><a href="{{ route('login')}}"  style="color: white;text-decoration: unset;">Cerrar Sesion</a></button>
            </div>
        </div>
    </div>
    @endif
 
    
    <div class="box-change-password" id="change-password" action="{{ route('actualizar_password') }}">
        @if(session()->has('user_id'))
        @else
        <form  id="change-password-form" action="{{ route('actualizar_password') }}" method="POST">
            @csrf
            <h2>Cambiar Contraseña</h2>
            <div class="input-Grupo">
                <input type="email" id="change-email" name="email" required>
                <label for="">Correo</label>
            </div>
            <div class="input-Grupo">
                <input type="password" id="current-password" name="password_viejo" required>
                <label for="">Contraseña Actual</label>
            </div>
            <div class="input-Grupo">
                <input type="password" id="new-password" name="nueva_password" required>
                <label for="">Nueva Contraseña</label>
            </div>
            <button type="submit">Aceptar</button>
            <button type="button" class="cancelar"  id="cancelarfrom">Cancelar</button>
        </form>
    </div>

    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            const showChangePasswordBtn = document.getElementById('show-change-password-btn');
            const cancelarBtn = document.getElementById('cancelarfrom');
            const changePasswordBox = document.getElementById('change-password');
            const showCerrarSesionoBtn = document.getElementById('CerrarSesionbtn');
            const btnCancelarSesion = document.getElementById('cancelarbtn');
            const ShowCerrarSesion = document.getElementById('CerrarSesionModal');
            
            
            if (showCerrarSesionoBtn && ShowCerrarSesion) {
                showCerrarSesionoBtn.addEventListener('click', function() {
                    ShowCerrarSesion.style.display = 'block';
                });
            }

            if (btnCancelarSesion && ShowCerrarSesion) {
                btnCancelarSesion.addEventListener('click', function() {
                    ShowCerrarSesion.style.display = 'none';  
                });
            }
            
            if (showChangePasswordBtn && changePasswordBox) {
                showChangePasswordBtn.addEventListener('click', function() {
                    changePasswordBox.style.display = 'block';
                });
            }

            if (cancelarBtn && changePasswordBox) {
                cancelarBtn.addEventListener('click', function() {
                    changePasswordBox.style.display = 'none'; 
                });
            }
        });
    </script>



</html>

    


