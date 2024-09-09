<?php

// var_dump($data['users']);
?>
<table border="1">
  <thead>
    <th>Id</th>
    <th>Nombre</th>
    <th>Apellido</th>
    <th>Correo</th>
    <th>Telefono</th>
    <th>DNI</th>
    <th>Acciones</th>
  </thead>
  <tbody>
    <?php
    for ($i = 0; $i < count($data['users']); $i++) {
    ?>
      <tr>
        <td> <?= $data['users'][$i]['id'] ?> </td>
        <td> <?= $data['users'][$i]['first_name'] ?> </td>
        <td> <?= $data['users'][$i]['last_name'] ?> </td>
        <td> <?= $data['users'][$i]['email'] ?> </td>
        <td> <?= $data['users'][$i]['phone'] ?> </td>
        <td> <?= $data['users'][$i]['dni'] ?> </td>
        <td>
          <div>
            <a href="<?= URL ?>/users/edit/<?= $data['users'][$i]['id'] ?>">Editar</a>
            <form action="<?= URL ?>/users/destroy/" method="POST">
              <input type="hidden" name="id" value="<?= $data['users'][$i]['id'] ?>">
              <button type="submit">Eliminar</button>
            </form>
          </div>
        </td>
      </tr>
    <?php
    }
    ?>
  </tbody>
</table>