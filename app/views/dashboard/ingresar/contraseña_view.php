<div class="row">
<<<<<<< HEAD
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
=======
        <div class="col s12 m12 l9 center">
            <div class="card col offset-m3 col offset-l4 m11">
                <div class="card-content">
                    <span class="card-title pad-top-conv ">Cambiar contraseña</span>
                    <div class="divider"></div>
                    <div class="row">
                        <form method="POST" class="col s12 m12 l12" autocomplete="off">
                            <div class="row">
                            <label for="usuario">Contraseña actual</label>
                            <div class="divider"></div>
                                <div class="input-field col s12 m5 l6">
                                    <input id="contraactual" type="password" class="validate" name="contraactual"  oncopy="return false" onpaste="return false" >
                                    <label for="contraactual">Contraseña</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="contraactual2" type="password" class="validate" name="contraactual2"  oncopy="return false" onpaste="return false" >
                                    <label for="contraactual2">Repita la contraseña</label>
                                </div>
                                </div>
                                <div class="row">
                                <label for="usuario">Contraseña nueva</label>
                                <div class="divider"></div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="contranueva" type="password" class="validate" name="contranueva"  oncopy="return false" onpaste="return false" >
                                    <label for="contranueva">Contraseña</label>
                                </div>
                                <div class="input-field col s12 m6 l6">
                                    <input id="contranueva2" type="password" class="validate" name="contranueva2"  oncopy="return false" onpaste="return false" >
                                    <label for="contranueva2">Repita la contraseña</label>
                                </div>
                            </div>
                            <div class="input-field col s12 m6 l11">
                                <button id="button-margin" class="btn waves-effect waves-light but-rounded but-st-blue-moon " type="submit" name="actualizar">Modificar
                                    <span>
                                        <i class="material-icons white-text right">check</i>
                                    </span>
                                </button>
                                <a id="button-margin" class="waves-effect waves-light btn but-rounded but-st-blue-moon" href="../../dashboard/ingresar/logout.php">
                                    <i class="material-icons right white-text">clear</i>Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
>>>>>>> 630b00313ae5aa0d8b5ec741c128d0609a27e4b6
