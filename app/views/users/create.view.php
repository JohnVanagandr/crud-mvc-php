<form action="<?= URL ?>/users/store" method="POST">
  <div>
    <label for="first_name">Nombre</label>
    <input type="text" name="first_name" id="first_name">
  </div>
  <div>
    <label for="last_name">Apellidos</label>
    <input type="text" name="last_name" id="lats_name">
  </div>
  <div>
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
  </div>
  <div>
    <label for="phone">Télefono</label>
    <input type="text" name="phone" id="phone">
  </div>
  <div>
    <label for="dni">Documento</label>
    <input type="text" name="dni" id="dni">
  </div>
  <button type="submit">Guardar</button>
</form>