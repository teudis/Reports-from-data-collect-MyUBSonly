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
                    <h1 class="page-header">Usuarios m&aacute;s copias</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
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
                    foreach ($resultados->result() as $row) {

                        echo '<tr>';
                        echo '<td>' . $cont . '</td>';
                        echo '<td>' . $row->user . '</td>';
                        echo '<td>' . $row->cantidad . '</td>';

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

</html>
