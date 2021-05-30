<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $title ?></title>

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
                <form method="post" action="<?php echo site_url("admin/reporte");  ?> ">
                <div class="col-lg-12">
                    <h4 class="page-header">Reporte por fecha</h4>
                    <div class="col-lg-4">
                    <label>Fecha inicio</label>

                    <input id="fecha_inicio" class="form-control" name="fecha_inicio" >
                        </div>
                    <div class="col-lg-4">
                    <label>Fecha fin</label>
                    <input id="fecha_fin" class="form-control" name="fecha_fin" >
                        </div>
                    <div class="col-lg-4">
                        <br>
                        <input type="submit" class="btn btn-default">
                        </div>
                </div>
                </form>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">

                
                            
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

    <!-- Date Piquer JavaScript -->
    <script type='text/javascript' src="<?php echo base_url(); ?>web/js/bootstrap-datepicker.js"></script>
    <script type='text/javascript' src="<?php echo base_url(); ?>web/js/locales/bootstrap-datepicker.es.js"></script>

    <script>


        $('#fecha_inicio').datepicker({
            format: 'yyyy-mm-dd',
            language: 'es',

        })

        $('#fecha_fin').datepicker({
            format: 'yyyy-mm-dd',
            language: 'es'
        })




    </script>
    

   



</body>

</html>
