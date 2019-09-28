<!--Contact Section-->
    <section class="contact-form-area section-padding" id="contact-page">
        <div class="container">

            <?php if ($settings->enable_registration == 0): ?>
                <div class="col-md-12 text-center">
                    <h2 class="text-danger" style="padding: 200px">O registro de novos usuários está fechado!</h2>
                </div>
            <?php else: ?>
                

            <div class="row">
                <div class="page-title">
                    <h2 class="title">Criar sua página</h2>
                    <div class="space-40"></div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-offset-2 col-md-8">
                    <?php if (!empty($this->session->flashdata('msg'))): ?>
                        <div class="alert alert-success alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong><i class="icon-check"></i> <?php echo $this->session->flashdata('msg'); ?> !</strong>
                        </div>
                    <?php endif ?>
                    
                    <?php if (!empty($this->session->flashdata('error'))): ?>
                        <div class="alert alert-danger alert-dismissible">
                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <strong><i class="icon-close"></i> <?php echo $this->session->flashdata('error'); ?> !</strong>
                        </div>
                    <?php endif ?>
                </div>

                <div class="col-md-offset-3 col-md-6">
                    <div class="contact-form">
                        <form id="register-form" method="post" action="<?php echo base_url('register_user'); ?>">
                            <div class="col-sm-12">

                                <div class="floating-label-form-group input-controls control-group">
                                    <input type="text" placeholder="Seu nome" name="name" required />
                                    <p class="help-block text-danger"></p>
                                </div>
                                
                                <div class="floating-label-form-group input-controls control-group">
                                    <input type="email" placeholder="Email" name="email" id="email" required />
                                    <p class="help-block text-danger"></p>
                                </div>

                                <div class="floating-label-form-group input-controls control-group">
                                    <input type="text" placeholder="Nome de Usuário" name="user_name" id="user-name" required />
                                    <div class="space-10"></div>
                                    
                                    <div class="bubble loader-bubble" style="display: none;">
                                      <div class="bounce1"></div>
                                      <div class="bounce2"></div>
                                      <div class="bounce3"></div>
                                    </div>

                                    <h5 class="text-danger" id="name_exist" style="display: none;"><i class="icon-close"></i> Este nome já foi selecionado. Tente outro, por favor.</h5>
                                    <h5 class="text-success" id="name_available" style="display: none;"><i class="icon-check"></i> Este nome está disponível</h5>
                                </div>

                                <div class="floating-label-form-group input-controls control-group">
                                    <input type="password" placeholder="Senha" name="password" id="password" required />
                                    <p class="help-block text-danger"></p>
                                </div>

                                <?php if (empty($package)): ?>
                                    <div class="space-10"></div>
                                    <div class="floating-label-form-group input-controls control-group">
                                        <label>Selecionar tipo de Assinatura</label>
                                        <div class="radio-inline">
                                            <input type="radio" id="test1" name="package" value="free">
                                            <label for="test1">Grátis</label>
                                        </div>
                                        <div class="radio-inline">
                                            <input type="radio" id="test2" name="package" value="pro">
                                            <label for="test2">Pro</label>
                                        </div>
                                    </div>
                                    <div class="space-20"></div>
                                <?php else: ?>
                                    <input type="hidden" name="package" value="<?php echo html_escape($package); ?>">
                                <?php endif ?>

                                
                            </div>
                            <!-- csrf token -->
                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                            
                            <div class="col-sm-12">
                                <?php if ($settings->enable_captcha == 1 && $settings->captcha_site_key != ''): ?>
                                    <div class="g-recaptcha pull-left" data-sitekey="<?php echo html_escape($settings->captcha_site_key); ?>"></div>
                                    <div class="space-30"></div>
                                <?php endif ?>
                            </div>

                            


                            <div class="col-sm-12">
                                <div class="checkbox">
                                  <label>
                                    <input type="checkbox" value="1">
                                    <span class="cr"><i class="cr-icon fa fa-check"></i></span>
                                    Eu li e aceito <a href="<?php echo base_url() ?>"> os termos e condições</a> 
                                  </label>
                                </div>

                                <div id="success"></div>
                                <button type="submit" id="create-btn">Criar </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            <?php endif ?>

        </div>
    </section><!--/Contact Section-->