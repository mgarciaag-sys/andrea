<!doctype html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registrar Accidente</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
  body { background: #f4f4f4; }
  .card { margin-top: 40px; }
</style>
</head>

<body>
<div class="container">
  <div class="card shadow">
    <div class="card-header bg-danger text-white">
      <h4 class="mb-0">Registro de Accidente</h4>
    </div>

    <div class="card-body">
      <form action="guardar_accidente.php" method="POST" id="formAccidente">

        <label class="form-label">Fecha</label>
        <input type="date" name="fecha" class="form-control" required>

        <label class="form-label mt-3">Hora</label>
        <input type="time" name="hora" class="form-control" required>

        <label class="form-label mt-3">Nombre de la Víctima</label>
        <input type="text" name="nombre_victima" class="form-control" required>

        <label class="form-label mt-3">Tipo de Accidente</label>
        <select name="tipo_accidente" class="form-control" required>
            <option value="">Seleccione...</option>
            <option>Caída</option>
            <option>Golpe</option>
            <option>Corte</option>
            <option>Fuga de Gas</option>
            <option>Incendio</option>
        </select>

        <label class="form-label mt-3">Nivel de Gravedad</label>
        <select name="nivel_gravedad" class="form-control" required>
            <option value="">Seleccione...</option>
            <option>Leve</option>
            <option>Moderado</option>
            <option>Grave</option>
            <option>Crítico</option>
        </select>

        <label class="form-label mt-3">Lugar</label>
        <input type="text" name="lugar" class="form-control" required>

        <label class="form-label mt-3">Descripción</label>
        <textarea name="descripcion" class="form-control" required></textarea>

        <button class="btn btn-danger mt-4 w-100">Registrar Accidente</button>
      </form>
    </div>
  </div>
</div>

<script>
document.getElementById("formAccidente").addEventListener("submit", function(){
    alert("Registro enviado correctamente");
});
</script>

</body>
</html>
