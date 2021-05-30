<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin USBCentral</title>

    <!-- Bootstrap Core CSS -->
	<?php echo link_tag('web/css/bootstrap.min.css');  ?>

    <!-- MetisMenu CSS -->
	<?php echo link_tag('web/css/metisMenu.min.css');  ?>

    <!-- Timeline CSS -->
	<?php echo link_tag('web/css/timeline.css');  ?>
   

    <!-- Custom CSS -->
	<?php echo link_tag('web/css/sb-admin-2.css');  ?>

    <!-- Custom Fonts -->
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

   <?php  $this->load->view('header');  ?>

        <?php  $this->load->view('menu');  ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Buscador</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <form method="post" action="<?php echo site_url("admin/buscar");  ?> ">
                <div class="col-lg-8">
                <label>Nombre Computadora</label>
                <input type="text" class="form-control" name="pc" placeholder="nombre computadora">
                </div>  <div class="col-lg-4">
                    <br>

                    <input class="btn btn-primary" type="submit" value="Buscar datos">
                </div>

                <div class="col-lg-8">
                    <label>Usuario</label>
                    <input type="text" class="form-control" name="usuario" placeholder="usuario computadora">
                </div>

                <div class="col-lg-8">

                    <label>Acci&oacute;n</label>
                    <select class="form-control" name="accion">
                        <option value="nada"> Seleccione Acci&oacute;n </option>
                        <option value="Copied"> Copiado </option>
                        <option value="Modified"> Modificado </option>
                        <option value="Removed"> Eliminado </option>
                    </select>
                </div>

                <div class="col-lg-8">

                    <label>Tipo de fichero</label>
                    <select class="form-control" name="tipo">
                        <option value="nada"> Seleccione tipo de fichero </option>
                        <option value="pdf"> PDF </option>
                        <option value="doc"> DOC </option>
                        <option value="zip"> ZIP </option>
                        <option value="jpg"> JPG </option>

                    </select>
                </div>
                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    
	<script type='text/javascript' src="<?php echo base_url(); ?>web/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
   
	<script type='text/javascript' src="<?php echo base_url(); ?>web/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
	<script type='text/javascript' src="<?php echo base_url(); ?>web/js/metisMenu.min.js"></script>
    


</body>

</html>
