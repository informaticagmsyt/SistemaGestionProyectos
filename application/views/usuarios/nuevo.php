<div class="container">
    <form action="">
        <div class="panel">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                            <label for="cedula">Cédula</label>
                            <input class="form-control" type="text" id="cedula" name="cedula" placeholder="Cédula" required data-msg-required="Este campo es obligatorio">
                    </div>
                    <!--End Col--->
                    <div class="col-md-4">
                            <label for=""></label>
                            <br>
                            <button class="btn btn-primary" onclick="consultarPersona();" type="button">Consultar</button>
                    </div>
                    <!--End Col-->
                </div>
                <!--End row-->

                <div class="row">
                    <div class="col-md-4">
                        <label for="">Tipo de Usuario</label>
                        <select class="custom-select form-control" name="" id="">
                            <option value="">Administrador</option>
                            <option value="">Usuario</option>
                        </select>
                    </div>
                    <!--End Col-->
                    <div class="col-md-4">
                        <label for=""></label>
                    </div>
                </div>
                <!--End Row-->

            </div>
            <!--End Panel-body-->
        </div>
        <!--End Panel-->
    </form>
</div>
<!--End Container-->