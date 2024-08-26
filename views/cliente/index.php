<h1 class="text-center">Formulario de Cliente</h1>
<div class="row justify-content-center mb-4">
    <form id="formCliente" class="border shadow p-4 col-lg-4">
        <input type="hidden" name="cli_id" id="cli_id">
        <div class="row mb-3">
            <div class="col">
                <label for="cli_nombre">Nombre del cliente</label>
                <input type="text" name="cli_nombre" id="cli_nombre" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_telefono">Tefono</label>
                <input type="number" name="cli_telefono" id="cli_telefono" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label for="cli_sexo">Sexo</label>
                <input type="text" name="cli_sexo" id="cli_sexo" class="form-control">
            </div>
        </div>
     
        <div class="row">
            <div class="col">
                <button type="submit" id="btnGuardar" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="col table-responsive">
        <table class="table table-bordered table-hover" id="tablaCliente">
            <thead>
                <tr>
                    <th>NO.</th>
                    <th>Nombre</th>
                    <th>telefono</th>
                    <th>sexo</th>
                    <th>modificar</th>
                    <th>eliminar</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

<script src="<?= asset('./build/js/cliente/index.js') ?>"></script>