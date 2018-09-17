<!--FORMULARIO PARA RENOVAR CONTRASEÑA-->
<div class="row">
    <div class="col s12 m12 l10 center">
        <div class="card col offset-m1 offset-l4 m10">
            <div class="card-content">
                <span class="card-title pad-top-conv ">Cambiar contraseña</span>
                <div class="divider"></div>
                <div class="row">
                    <form method="POST" class="col s12 m12 l12" autocomplete="off">
                        <div class="row">
                            <label for="usuario">Contraseña actual</label>
                            <div class="divider"></div>
                            <div class="input-field col s12 m5 l6">
                                <input id="contraactual" type="password" class="validate" name="contraactual" oncopy="return false" onpaste="return false">
                                <label for="contraactual">Contraseña <i class='material-icons icon-form'>lock_outline</i></label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input id="contraactual2" type="password" class="validate" name="contraactual2" oncopy="return false" onpaste="return false">
                                <label for="contraactual2">Repita la contraseña <i class='material-icons icon-form'>lock</i></label>
                            </div>
                        </div>
                        <div class="row">
                            <label for="usuario">Contraseña nueva</label>
                            <div class="divider"></div>
                            <div class="input-field col s12 m6 l6">
                                <input id="contranueva" type="password" class="validate" name="contranueva" oncopy="return false" onpaste="return false">
                                <label for="contranueva">Contraseña <i class='material-icons icon-form'>lock_outline</i></label>
                            </div>
                            <div class="input-field col s12 m6 l6">
                                <input id="contranueva2" type="password" class="validate" name="contranueva2" oncopy="return false" onpaste="return false">
                                <label for="contranueva2">Repita la contraseña <i class='material-icons icon-form'>lock</i></label>
                            </div>
                        </div>
                        <div class="input-field col s12 m12 l11">
                            <button id="button-margin" class="btn waves-effect waves-light but-rounded but-st-blue-moon sg3" type="submit" name="actualizar">Modificar
                                <span>
                                        <i class="material-icons white-text right">check</i>
                                </span>
                            </button>
                            <a id="button-margin" class="waves-effect waves-light btn but-rounded but-st-blue-moon sg1" href="../../dashboard/index/index.php">
                                <i class="material-icons right white-text">clear</i>Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>