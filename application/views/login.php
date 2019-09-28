<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url() ?>assets/images/favicon.ico">
    <?php $settings = get_settings(); ?>
    <title><?php echo html_escape($settings->site_name); ?> - Entrar</title>
  
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap.min.css">
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/bootstrap-extend.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/css/master_style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/front/css/fontawesome.min.css">
    <link href="<?php echo base_url() ?>assets/admin/css/sweet-alert.css" rel="stylesheet" />
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <?php if (!empty($settings->logo)): ?>
      <img class="circles" src="<?php echo base_url($settings->logo) ?>"><br>
    <?php endif ?>
  </div>
  
  <!-- /.login-logo -->
  <div id="login-area" class="login-box-body">
    <p class="login-box-msg"> Faça login no Painel do Administrador </p>

    <form id="login-form" method="post" action="<?php echo base_url('auth/log'); ?>">

      <div class="form-group has-feedback">
        <input type="text" name="user_name" class="form-control" placeholder="Nome de Usuário">
        <span class="ion ion-email form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Senha">
        <span class="ion ion-locked form-control-feedback"></span>
        <a class="pull-right forgot_pass" href="#">Esqueceu a senha ?</a>
      </div>

      <div class="row">
        <!-- csrf token -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block margin-top-10">ENTRAR/button> 
        </div> 
      </div>
    </form>
    <!-- /.social-auth-links -->

    <div class="margin-top-30 text-center">
    </div>

  </div>
  <!-- /.login-box-body -->


  <!-- forgot area -->
  <div id="forgot-area" class="login-box-body" style="display: none;">
    <p class="login-box-msg">Recuperar sua Senha </p>

    <form id="lost-form" method="post" action="<?php echo base_url('auth/forgot_password'); ?>">

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Informe seu email">
        <span class="ion ion-email form-control-feedback"></span>
        <a class="pull-right back_login" href="#"><i class="fa fa-angle-left"></i> Voltar</a>
      </div>

      <div class="row">
        <!-- csrf token -->
        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
        <div class="col-12 text-center">
          <button type="submit" class="btn btn-info btn-block margin-top-10">ENVIAR</button> 
        </div> 
      </div>
    </form>
    <!-- /.social-auth-links -->

    <div class="margin-top-30 text-center">
    </div>

  </div>


</div>
<!-- /.login-box -->

  
  <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

  <!-- jQuery 3 -->
   <script src="<?php echo base_url() ?>assets/admin/js/jquery.min.js"></script> 
  <!-- popper -->
  <script src="<?php echo base_url() ?>assets/admin/js/popper.min.js"></script>
  <!-- Bootstrap 4.0-->
  <script src="<?php echo base_url() ?>assets/admin/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ?>assets/admin/js/admin.js"></script>
  <script src="<?php echo base_url()?>assets/admin/js/sweet-alert.min.js"></script>
  
  <script type="text/javascript">
    $(document).ready(function(){
      
      $(document).on('submit', "#login-form", function() {

        $.post($('#login-form').attr('action'), $('#login-form').serialize(), function(json){

            if (json.st == 1) {

                window.location = json.url;

            }else if (json.st == 0) {
                $('#login_pass').val('');
                swal({
                  title: "Erro..",
                  text: "Lamento, seu usuário ou senha não estão corretos!",
                  type: "error",
                  confirmButtonText: "Tente Novamente"
                });
            }else if (json.st == 2) {
                swal({
                  title: "Erro..",
                  text: "Sua conta não está ativa",
                  type: "error",
                  confirmButtonText: "Tente Novamente"
                });
            }else if (json.st == 3) {
                swal({
                  title: "Error..",
                  text: "Sua conta foi suspensa",
                  type: "warning",
                  confirmButtonText: "Tente Novamente"
                });
            }

        },'json');
        return false;
      });

      //recover password form
      $('#lost-form').submit(function(){
          $.post($('#lost-form').attr('action'), $('#lost-form').serialize(), function(json){
              
              if ( json.st == 1 ){

                  swal({
                        title: "Redefinição de senha com êxito!",
                        text: "Enviamos uma senha para o seu endereço de e-mail. Por favor, verifique seu inbox",
                        type: "success",
                        showConfirmButton: true
                      }, function(){
                          window.location = json.url;
                  });
              
              } else {
                swal({
                    title: "Desculpa !",
                    text: "Você não é um usuário válido",
                    type: "error",
                    confirmButtonText: "Tente Novamente"
                  });
              }
          },'json');
          return false;
      });


      $(document).on('click', ".forgot_pass", function() {
          $('#login-area').slideUp();
          $('#forgot-area').slideDown();
      });

      $(document).on('click', ".back_login", function() {
          $('#login-area').slideDown();
          $('#forgot-area').slideUp();
      });


    });
  </script>
</body>
</html>
