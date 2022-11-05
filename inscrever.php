<?php
    session_start();
    ob_start();
    require 'head.php'; 
    require 'config.php';
    
?>
    
<div id="area">
    <form id="formulario" action="cadastrar_login.php" method="post">
        <fieldset>
            <legend>Adicionar Usuário</legend>
                <div class="mb-3">
                    <label for="" class="form-label">
                        Nome: <br/>
                        <input type="text" name="name" class="form-control">
                    </label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">
                        E-mail: <br/>
                        <input type="email" name="email" class="form-control">
                    </label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">
                        Senha: <br/>
                        <input type="password" name="password" class="form-control">
                    </label>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">
                        Confirmar a Senha: <br/>
                        <input type="password" name="password_confirm" class="form-control">
                    </label>
                </div>
                
                <input type="submit" value="Adicionar" class="btn btn-primary"/>
            </fieldset>
        </form>
    </div>



<?php require 'footer.php'; ?>