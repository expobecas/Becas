<form method="POST" autocomplete="off" class="card-panel white">
    <div class="row">
        <div class="input-field col s4 l6">
            <input id="nombre" type="text" name='nombre' class='validate' value='<?php print($usuario->getNombres());?>' required/>
            <label for="nombre">Nombres</label>
        </div>
        <div class="input-field col s4 l6">
            <input id="apellido" type="text" name='apellido' class='validate' value='<?php print($usuario->getApellidos());?>' required/>
            <label for="apellido">Apellidos</label>
        </div>
        <div class="input-field col s4 l6">
            <input id="correo" type="email" name='correo' class='validate' value='<?php print($usuario->getCorreo());?>' required/>
            <label for="correo" data-error="correo invalido" data-success="correo valido">Correo electrónico</label>
        </div>
        <div class="input-field col s4 l6">
            <input id="usuario" type="text" name='usuario' class='validate' value='<?php print($usuario->getUsuario());?>' required/>
            <label for="usuario">Usuario</label>
        </div>
        <div class="input-field col s4 l6">
            <input id="contraseña" type="password" name='contraseña' class='validate' value='<?php print($usuario->getClave());?>' required/>
            <label for="contraseña">Contraseña</label>
        </div>
        <div class="input-field col s4 l6">
            <input id="contraseña_c" type="password" name='contraseña_c' class='validate' required/>
            <label for="contraseña_c" >Confirmar contraseña</label>
        </div>
    </div>
    <div class="center">
        <button class="waves-effect waves-light btn" type='submit' name='crear'>Agregar</button>
    </div>
</form>