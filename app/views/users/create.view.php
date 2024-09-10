<form action="<?= URL ?>/users/store" method="POST" class="form">
  <div class="imput-group">
    <label for="first_name">Nombre</label>
    <input type="text" class="imput" name="first_name" id="first_name">
  </div>
  <div class="imput-group">
    <label for="last_name">Apellidos</label>
    <input type="text" class="imput" name="last_name" id="lats_name">
  </div>
  <div class="imput-group">
    <label for="email">Email</label>
    <input type="text" class="imput" name="email" id="email">
  </div>
  <div class="imput-group">
    <label for="phone">Télefono</label>
    <input type="text" class="imput" name="phone" id="phone">
  </div>
  <div class="imput-group">
    <label for="dni">Documento</label>
    <input type="text" class="imput" name="dni" id="dni">
  </div>
  <button type="submit" class="btn btn--outline">Guardar</button>
</form>