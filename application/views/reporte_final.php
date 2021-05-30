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

                <div class="col-lg-12">
                    <h4 class="page-header">Reporte Final <?php echo $inicio."  ".$fin;  ?> </h4>

                    <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Gr&aacute;ficos</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Dispositivos</a></li>
                            <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Acciones</a></li>
                            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Computadoras</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="home">graficos</div>
                            <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="row">
                                    <h5>Dispositivos insertados</h5>
                                    <table class="table table-striped" >
                                        <thead>
                                        <tr class="info">
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                            <th>Dispositivo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cont = 1;
                                        foreach ($usb_insert->result() as $row) {

                                            echo '<tr>';
                                            echo '<td>' . $cont . '</td>';
                                            echo '<td>' . $row->user . '</td>';
                                            echo '<td>' . $row->time . '</td>';
                                            echo '<td>' . $row->action . '</td>';
                                            echo '<td>' . $row->device_name . '</td>';

                                            $cont++;

                                        }
                                        ?>


                                        </tbody>
                                    </table>


                                </div>


                            </div>
                            <div role="tabpanel" class="tab-pane" id="messages">


                                <div class="row">
                                    <h5>Acciones memorias</h5>
                                    <table class="table table-striped" >
                                        <thead>
                                        <tr class="info">
                                            <th>#</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>Accion</th>
                                            <th>Archivo</th>
                                            <th>Dispositivo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cont = 1;
                                        foreach ($usb_action->result() as $row) {

                                            echo '<tr>';
                                            echo '<td>' . $cont . '</td>';
                                            echo '<td>' . $row->user . '</td>';
                                            echo '<td>' . $row->time . '</td>';
                                            echo '<td>' . $row->action . '</td>';
                                            echo '<td>' . $row->filename . '</td>';
                                            echo '<td>' . $row->device_name . '</td>';

                                            $cont++;

                                        }
                                        ?>


                                        </tbody>
                                    </table>


                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane" id="settings">
                                <div class="row">
                                    <h5>Computadoras utlizadas</h5>
                                    <table class="table table-striped" >
                                        <thead>
                                        <tr class="info">
                                            <th>#</th>
                                            <th>Computadoras</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $cont = 1;
                                        foreach ($usb_pc->result() as $row) {

                                            echo '<tr>';
                                            echo '<td>' . $cont . '</td>';
                                            echo '<td>' . $row->pc . '</td>';
                                            $cont++;

                                        }
                                        ?>


                                        </tbody>
                                    </table>


                                </div>



                            </div>
                        </div>

                    </div>

                </div>

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
