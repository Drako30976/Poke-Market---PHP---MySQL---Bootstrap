<h2 class="d-flex justify-content-center"><?= $titulo ?></h2>
<div class="contenedor">
<div class="container border bg-light p-3">
    <section class="row justify-content-center p-3">
        <div class="col-12 bg-light p-3">
            <form action="datos/procesar_datos.php" method="POST">
                <div class="row g-2">
                    <p class="fs-5 fw-bold text-center">Puedes contactar con nosotros y realizarnos cualquier consulta mediante este corto formulario</p>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese su nombre">
                            <label for="nombre" class="form-label">Ingrese su Nombre</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 ">
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Ingrese su apellido">
                            <label for="apellido" class="form-label">Ingrese su apellido</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 ">
                            <input type="mail" class="form-control" id="mail" name="mail" placeholder="Ingrese su mail">
                            <label for="mail" class="form-label">Ingrese Correo electronico</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3 ">
                            <input class="form-control" type="date" name="nacimiento" id="nacimiento">
                            <label for="nacimiento">Fecha de nacimiento:</label>
                        </div>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Leave a comment here" id="textarea" name="textarea"></textarea>
                        <label for="textarea">Comentarios</label>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn btn-primary w-50">Enviar</button>
        </form>
</div>
</div>

