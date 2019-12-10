<div class="container">

    <form method="POST" role="form" id="formTutor">

    <div class="panel">

        <div class="panel-body">
            

            <!--End Row-->

            <!--Identificación--->
            <h4 class="text-center">Tutor</h4>
            <hr>

            <div class="row">
                
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="nombres">Nombres</label>
                        <input class="form-control" type="text" name="nombres" id="nombres" placeholder="Nombres" required data-msg-required="Ingrese un nombre">
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input class="form-control" type="text" name="apellidos" id="apellidos" placeholder="Apellidos" required data-msg-required="Ingrese un Apellido">
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-2">
                    <div class="form-group">
                        <label for="sexo">Sexo</label>
                        <select class="custom-select form-control" name="sexo" id="sexo" required>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                    <!---End Form-Group-->
                </div>
                <!--End Col-->

                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="fechanac">Fecha de nacimiento</label>
                        <div class="input-group date form_date col-md-8" data-date="" data-date-format="dd-mm-yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">
                            <input class="form-control" size="5" id="fechanac" name="fecha_nac" value="" type="date" >
                            <!--<span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span><i class="far fa-trash-alt"></i></span>-->
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span><i class="far fa-calendar-alt"></i></span>
                        </div>
                    </div>
                    <!---End Form-Group-->
                </div>
                <!---End Col-->

            </div>
            <!--End Row-->

            <!--End Row-->
            <hr>

            <!--End Row-->

            <!--End Row-->


        </div>
        <!--End Panel-body-->
        <div class="pull-right">
            <button class="btn btn-primary" type="submit">Guardar y continuar</button>
        </div>
    </div>
    <!--End Panel-->


    <!--End Modal-->
</div>
<!--End Container-->
<script> var urlbase="<?php echo base_url("index.php/"); ?>"; </script>

