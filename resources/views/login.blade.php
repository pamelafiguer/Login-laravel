<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="wrapper">

    @if (Request::is('/'))

    <div class="box sign-in" id="sign-in">
        <br><br>
        <form  id="sign-in-form" action="{{ route('procesar_login') }}"  method="POST">
            @csrf
            <h2>Iniciar Sesión</h2>
            <div class="input-Grupo">
                <input type="text" id="email" name="email">
                <label for="">Usuario</label>
            </div>
            <div class="input-Grupo">
                <input type="password" id="password" name="password" required>
                <label for="">Contraseña</label>
            </div>
            <div class="remember">
                <label><input type="checkbox">Recordar</label>
                <p><a href="{{ route('recuperarPassword') }}" id="show-from-recover" >¿Olvidaste tu contraseña?</a></p>
            </div>
            
            <button type="submit" action="{{ route('ingreso') }}">Iniciar Sesión</button>
            <div class="signup">
                <p>¿No tienes cuenta? <a href= "{{ route('registrarse')}}" id="show-sign-up" >Registrarse</a></p>
            </div>
            <div class="plataform">
                <p> O iniciar sesion con </p>
                <div class="icons">
                    <a href="{{ route('auth.social', 'facebook')}}" id="facebook-login"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="{{ route('auth.social', 'google')}}" id="google-login"><i class="fa-brands fa-google"></i></a>
                    <a href="{{ route('auth.social', 'github')}}" id="github-login" ><i class="fa-brands fa-github"></i></a>
                </div>
            </div>
        </form>
    </div>
    @endif

    @if (Request::is('registrarse'))
    <div class="box sign-up" id="sign-up">
        <br><br>
        <form id="sign-up-form" action="{{ route('registrarse') }}" method="POST">
            @csrf
            <h2>Registrarse</h2>
            <div class="input-Grupo">
                <input type="text" id="new-username" name="nombres" required>
                <label for="user-name">Nombre de Usuario</label>
            </div>
            <div class="input-Grupo">
                <input type="email" id="new-email" name="email" required>
                <label for="new-email">Correo</label>
            </div>
            <div class="input-Grupo">
                <input type="password" id="new-password" name="password" required>
                <label for="">Contraseña</label>
            </div>
            <button type="submit" >Registrarse</button>
            <div class="signup">
                <p>¿Ya tienes cuenta? <a href="{{ route('login') }}" id="show-sign-in-from-register">Iniciar Sesión</a></p>
            </div>
        </form>
    </div>
    
        
    @endif
    
    
    @if (Request::is('recuperarPassword'))
    <div class="box recover-password" id="recover-password">
        <br><br><br><br><br><br>
        <form id="recover-form" action="{{ route('procesar_recuperacion') }}" method="POST">
            @csrf
            <h2>Recuperar Contraseña</h2>
            <div class="input-Grupo">
                <input type="email" id="recover-email" name="email" required>
                <label for="recover-email">Correo</label>
            </div>
            <button type="submit">Enviar</button>
            <div class="signup">
                <p><a href="{{ route('login') }}" id="show-sign-in-from-recover"  >Regresar a Iniciar Sesión</a></p>
            </div>
        </form>
    </div>
    @endif

    @if (Request::is('verificar'))
    <div class="verification" action="{{ route('verificar') }}" id="verification-message">
        @csrf
        <br><br><br><br><br><br><br>
        <h2>Se ha enviado un correo de verificación</h2>
        <div class="input-Grupo">
            <h4>Revisa tu correo y podrás cambiar la contraseña con éxito</h4>
        </div>
        <div class="signup">
            <p><a href="{{ route('login') }}" id="show-sign-in-from-verification" >Volver a Iniciar</a></p>
        </div>
    </div>
    @endif
</div>

</body>
</html>
