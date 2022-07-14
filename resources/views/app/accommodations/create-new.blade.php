<form  id="loginForm" method="POST" action="{{ route('authenticate-user') }}">
    <input type="text"  id="nombre" name="nombre" placeholder="Escriba el nombre del alojamiento" required>
    <input type="text"  id="ubicacion" name="ubicacion" placeholder="Escriba la dirección" required>
    <button type="submit" >Ingresar</button>
</form>
