<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico"/>

    <title>App Toeic - Quản trị viên</title>

    <?php
    echo $this->Html->css('/backend/plugins/fontawesome-free/css/all.min');
    echo $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    echo $this->Html->css('/backend/plugins/bootstrap/css/bootstrap.min');
    echo $this->Html->css('/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min');
    echo $this->Html->css('/backend/plugins/icheck-bootstrap/icheck-bootstrap.min');
    echo $this->Html->css('/backend/plugins/jqvmap/jqvmap.min');
    echo $this->Html->css('/backend/dist/css/adminlte.min');
    echo $this->Html->css('/backend/plugins/overlayScrollbars/css/OverlayScrollbars.min');
    echo $this->Html->css('/backend/plugins/daterangepicker/daterangepicker');
    echo $this->Html->css('/backend/plugins/summernote/summernote-bs4');
    echo $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
    echo $this->Html->css('/backend/dropzone/dist/min/dropzone.min');
    echo $this->Html->css('/frontend/libs/select2-4.0.13/dist/css/select2.min.css');
    echo $this->Html->css('/frontend/libs/select2-bootstrap4-theme/dist/select2-bootstrap4.css');
    echo $this->Html->css('/backend/css/style');
    echo $this->fetch('meta');
    echo $this->fetch('css');
    ?>
</head>
<body class="nav-md">
<div class="wrapper">
    <?php echo $this->element('Backend/sidebar'); ?>
    <?php echo $this->element('Backend/top_bar'); ?>
    <?php echo $this->element('Backend/content'); ?>
</div>
<script type="text/javascript">
    var baseUrl = "<?php echo $this->Url->build('/', true); ?>";
    var csrfToken = '<?php echo $this->request->getParam('_csrfToken') ?>';
</script>
<?php
echo $this->Html->script('/backend/plugins/jquery/jquery.min');
echo $this->Html->script('/backend/plugins/jquery-ui/jquery-ui.min');
echo $this->Html->script('/backend/plugins/bootstrap/js/bootstrap.bundle.min');
echo $this->Html->script('/backend/plugins/chart.js/Chart.min');
echo $this->Html->script('/backend/plugins/sparklines/sparkline');
echo $this->Html->script('/backend/plugins/jqvmap/jquery.vmap.min');
echo $this->Html->script('/backend/plugins/jqvmap/maps/jquery.vmap.usa');
echo $this->Html->script('/backend/plugins/jquery-knob/jquery.knob.min');
echo $this->Html->script('/backend/plugins/moment/moment.min');
echo $this->Html->script('/backend/plugins/daterangepicker/daterangepicker');
echo $this->Html->script('/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min');
echo $this->Html->script('/backend/plugins/summernote/summernote-bs4.min');
echo $this->Html->script('/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min');
echo $this->Html->script('/frontend/libs/select2-4.0.13/dist/js/select2.full.min.js');
echo $this->Html->script('/backend/dist/js/adminlte');
echo $this->Html->script('/backend/dist/js/pages/dashboard');
echo $this->Html->script('/backend/dropzone/dist/min/dropzone.min');
?>
<script type="text/javascript">
    Dropzone.autoDiscover = false;
</script>
<?php
echo $this->Html->script('/backend/js/backend');
echo $this->Html->script('/backend/js/common');
echo $this->fetch('script');
?>
<?= $this->fetch('scriptBottom') ?>
</body>
</html>
