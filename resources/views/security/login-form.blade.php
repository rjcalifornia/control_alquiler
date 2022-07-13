
<form  id="loginForm" method="POST" action="{{ route('authenticate-user') }}">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
    <input type="email"  id="email" name="email" placeholder="Escriba su correo electronico" required>
    <input type="password"  id="password" name="password" required>

    <button type="submit" >Ingresar</button>
</form>
