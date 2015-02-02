<?php $data = array('id'=>'fomulari', 'class'=>'form-signin', 'role' => 'form');
 	echo form_open('',$data);?>
    <h2 class="form-signin-heading">Inicio de sesión</h2>
    <input type="username" name = "username" id = "username" class="form-control" placeholder="Nombre de Usuario " required autofocus>
    <input type="password" name = "password" id = "password" class="form-control" placeholder="Contraseña" required>
    <label class="checkbox">
      <input type="checkbox" value="remember-me"> Remember me
    </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Iniciar sesión</button>
</form>

