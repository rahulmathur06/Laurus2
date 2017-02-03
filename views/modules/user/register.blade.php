<h1> Bienvenid@ {{$data['name']." ".$data['last_name']}} </h1>


<p><strong>Haz click en el enlace al final del correo para confirmar tu cuenta y personalizar tu password:</strong></p>

<p>Deberás teclear tu correo y la nueva contraseña que tu eligas con un mínimo de 6 caracteres, tu correo es: {{$data['email']}} </p>


<a href="{{url()}}/password/email/">Resetear mi password</a>

