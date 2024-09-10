<form action="<?= URL ?>/users/update" method="POST" class="form">
  <input type="hidden" name="id" value="<?= $data['user']['id'] ?>">
  <div class="imput-group">
    <label for="first_name">Nombre</label>
    <input type="text" name="first_name" class="imput" id="first_name" value="<?= $data['user']['first_name'] ?>">
  </div>
  <div class="imput-group">
    <label for="last_name">Apellidos</label>
    <input type="text" name="last_name" class="imput" id="lats_name" value="<?= $data['user']['last_name'] ?>">
  </div>
  <div class="imput-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="imput" id="email" value="<?= $data['user']['email'] ?>">
  </div>
  <div class="imput-group">
    <label for="phone">Télefono</label>
    <input type="text" name="phone" class="imput" id="phone" value="<?= $data['user']['phone'] ?>">
  </div>
  <div class="imput-group">
    <label for="dni">Documento</label>
    <input type="text" name="dni" class="imput" id="dni" value="<?= $data['user']['dni'] ?>">
  </div>
  <button type="submit" class="btn btn--outline">Actualizar</button>
</form>