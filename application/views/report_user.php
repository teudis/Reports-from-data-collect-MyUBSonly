<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php  echo $title; ?></title>

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
                    <h2 class="page-header">Reporte de <?php echo $usuario; ?></h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-8">

                    <div class="panel-body">
                        <h4>Acciones del Usuario</h4>
                        <div class="row">

                                <a href="" class="btn btn-danger btn-lg" role="button" data-toggle="modal" data-target="#modal_copiados" ><span class="glyphicon glyphicon-copy"></span> <br/>Copiados <?php echo $copia; ?></a>

                                <a href="" class="btn btn-warning btn-lg" role="button" data-toggle="modal" data-target="#modal_eliminados" ><span class="glyphicon glyphicon-remove"></span> <br/> Eliminados<?php echo $remove; ?></a>
                                <a href="" class="btn btn-primary btn-lg" role="button" role="button" data-toggle="modal" data-target="#modal_modificados" ><span class="glyphicon glyphicon-check"></span> <br/>Modificados <?php echo $modificado; ?></a>


                        </div>

                </div>

                    <h4>Principales extensiones copiadas</h4>
                    <table class="table table-striped" >
                        <thead>
                        <tr class="info">

                            <th>#</th>
                            <th>Usuario</th>
                            <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $cont = 1;
                        foreach ($listado_extension->result() as $row) {

                            echo '<tr>';

                            echo '<td>' . $cont . '</td>';
                            //echo '<td>' . $row->user . '</td>';
                            echo '<td>' ;
                            echo $row->extension;
                            echo  '</td>';
                            echo '<td>' ;
                            echo $row->cantidad;
                            echo  '</td>';
                            $cont++;


                        }
                        ?>


                        </tbody>
                    </table>

                    <br>
                    <h4>Computadoras donde se han realizado las copias</h4>
                    <table class="table table-striped" >
                        <thead>
                        <tr class="info">

                            <th>#</th>
                            <th>Usuario</th>
                            <th>Cantidad</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $cont = 1;
                        foreach ($pcs->result() as $row) {

                            echo '<tr>';

                            echo '<td>' . $cont . '</td>';
                            //echo '<td>' . $row->user . '</td>';
                            echo '<td>' ;
                            echo $row->pc;
                            echo  '</td>';
                            echo '<td>' ;
                            echo $row->cantidad;
                            echo  '</td>';
                            $cont++;


                        }
                        ?>


                        </tbody>
                    </table>
                            
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
    

   

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>
<!---  Modal Copiados -->
<div class="modal fade" id="modal_copiados" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="myModalLabel">Ficheros Copiados</h2>
            </div>
            <div class="modal-body">

                <h3>&Uacute;ltimos 20 ficheros copiados</h3>
                <table class="table table-striped" >
                    <thead>
                    <tr class="info">

                        <th>#</th>
                        <th>Usuario</th>
                        <th>PC</th>
                        <th>Fecha</th>
                        <th>Fichero</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cont = 1;
                    foreach ($listado_copiados->result() as $row) {

                        echo '<tr>';

                        echo '<td>' . $cont . '</td>';
                        //echo '<td>' . $row->user . '</td>';
                        echo '<td>' ;
                        echo $row->user;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->pc;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->time;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->filename;
                        echo  '</td>';
                        $cont++;


                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<!------ Modal Eliminados ----->
<div class="modal fade" id="modal_eliminados" tabindex="-1" role="dialog" aria-labelledby="myModaleliminados">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="myModalLabel">Ficheros Eliminados</h2>
            </div>
            <div class="modal-body">

                <h3>&Uacute;ltimos 20 ficheros eliminados</h3>
                <table class="table table-striped" >
                    <thead>
                    <tr class="info">

                        <th>#</th>
                        <th>Usuario</th>
                        <th>PC</th>
                        <th>Fecha</th>
                        <th>Fichero</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cont = 1;
                    foreach ($listado_eliminados->result() as $row) {

                        echo '<tr>';

                        echo '<td>' . $cont . '</td>';
                        //echo '<td>' . $row->user . '</td>';
                        echo '<td>' ;
                        echo $row->user;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->pc;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->time;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->filename;
                        echo  '</td>';
                        $cont++;


                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
<!------ Modal modificados ----->

<div class="modal fade" id="modal_modificados" tabindex="-1" role="dialog" aria-labelledby="myModaleliminados">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h2 class="modal-title" id="myModalLabel">Ficheros Mofificados</h2>
            </div>
            <div class="modal-body">

                <h3>&Uacute;ltimos 20 ficheros modificados</h3>
                <table class="table table-striped" >
                    <thead>
                    <tr class="info">

                        <th>#</th>
                        <th>Usuario</th>
                        <th>PC</th>
                        <th>Fecha</th>
                        <th>Fichero</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cont = 1;
                    foreach ($listado_modificados->result() as $row) {

                        echo '<tr>';

                        echo '<td>' . $cont . '</td>';
                        //echo '<td>' . $row->user . '</td>';
                        echo '<td>' ;
                        echo $row->user;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->pc;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->time;
                        echo  '</td>';
                        echo '<td>' ;
                        echo $row->filename;
                        echo  '</td>';
                        $cont++;


                    }
                    ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</html>
