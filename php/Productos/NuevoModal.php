
<!-- Modal -->
<div class="modal fade" id="nuevoModal" tabindex="-1" aria-labelledby="nuevoModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoModalLabel">Agregar Registro</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="guarda.php" method="post" enctype="multipart/form-data">
            
            <div class="mb-3">
                <label for="nombre" class= "form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="idCategoria" class="form-label">Id Categoria:</label>
                <select name="idCategoria" id="idCategoria" class="form-select" required>
                    <option value="">Seleccionar...</option>
                    <?php while ($row_categoria = $categorias->fetch_assoc()){ ?>
                        <option value="<?php echo $row_categoria["id_categoria"]; ?>"><?= $row_categoria["categoria"]; ?></option>
                        <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="precio" class= "form-label">Precio:</label>
                <input type="text" name="precio" id="precio" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="stock" class= "form-label">Stock:</label>
                <input type="text" name="stock" id="stock" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="fechaVencimiento" class= "form-label">Fecha vencimiento:</label>
                <input type="date" name="fechaVencimiento" id="fechaVencimiento" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control" accept="image/
                    jpg/jpeg/png">
            </div>

            <div class="">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
            </div>

        </form>
      </div>
    </div>
  </div>
</div>