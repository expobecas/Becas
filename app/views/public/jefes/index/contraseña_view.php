<div class="row">
<div class="col offset-l3 l8">
<form method="POST" autocomplete="off" class="card-panel white">
    <div class="row">
        <!--Vista para cambiar de contraseÃ±a-->  
<div class="container">
<form method='post'>
    <div class='row center-align'>
        <label>CLAVE ACTUAL</label>
    </div>
    <!--Clave actual-->
    <div class='row'>
        <div class='input-field col s12 m6'>
            <input id='clave_actual_1' type='password' name='clave_actual_1' class='validate'/>
            <label for='clave_actual_1'>Clave <i class='material-icons icon-form'>lock_outline</i></label>
        </div>
        <!--ConfirmaciÃ³n actual-->
        <div class='input-field col s12 m6'>
            <input id='clave_actual_2' type='password' name='clave_actual_2' class='validate'/>
            <label for='clave_actual_2'>Confirmar clave <i class='material-icons icon-form'>lock</i></label>
        </div>
    </div>
    <div class='row center-align'>
        <label>CLAVE NUEVA</label>
    </div>
    <!--Nueva clave-->
    <div class='row'>
        <div class='input-field col s12 m6'>
            <input id='clave_nueva_1' type='password' name='clave_nueva_1' class='validate'/>
            <label for='clave_nueva_1'>Clave <i class='material-icons icon-form'>lock_outline</i></label>
        </div>
        <!--ConfirmaciÃ³n nueva clave-->
        <div class='input-field col s12 m6'>
            <input id='clave_nueva_2' type='password' name='clave_nueva_2' class='validate'/>
            <label for='clave_nueva_2'>Confirmar clave <i class='material-icons icon-form'>lock</i></label>
        </div>
    </div>
    <!--BotÃ³n para cambiar clave -->
    <div class='row center-align'>
        <a href='../../dashboard/index/index.php' class='btn waves-effect boton-editar2 sg1' >Cancelar</a>
        <button type='submit' name='cambiar' class='btn waves-effect boton-editar2 sg3'>Modificar</button>
    </div>
</form>
</div>
    </div>
</form>
</div></div>