<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Alimentación</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container p-5">

<h3 class="mb-4 text-primary">Registro de Alimentación</h3>

<form action="alimentacion.php" method="POST">

  <div class="mb-3">
    <label>Fecha:</label>
    <input type="date" class="form-control" name="fecha" required>
  </div>

  <div class="mb-3">
    <label>Desayuno:</label>
    <input type="text" class="form-control" name="desayuno">
  </div>

  <div class="mb-3">
    <label>Comida:</label>
    <input type="text" class="form-control" name="comida">
  </div>

  <div class="mb-3">
    <label>Cena:</label>
    <input type="text" class="form-control" name="cena">
  </div>

  <div class="mb-3">
    <label>Vasos de agua:</label>
    <input type="number" class="form-control" name="agua" min="0">
  </div>

  <div class="mb-3">
    <label>Notas:</label>
    <textarea class="form-control" name="notas"></textarea>
  </div>

  <button class="btn btn-success">Guardar</button>

</form>

</body>
</html>
