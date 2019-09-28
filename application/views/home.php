
    <div id="home-page"></div>

    <!-- Hero-Area -->
    <section class="hero-area" style="background-image: url('<?php echo base_url() ?>assets/front/images/footer-shape.png'); background-position: left top;">
        <div class="container">
            <div class="row equal-height">
                <div class="col-xs-12 col-sm-12 col-md-5">
                    <h2 class="head-title wow fadeInRight" data-wow-delay="0.3s">Freelancers e empreendedores usam o sobremim para aumentar sua audiência e alcançar mais clientes.</h2>
                    <div class="space-40"></div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-7">
                    <div class="hidden visible-xs visible-sm space-60"></div>
                    <figure class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                        <img src="<?php echo base_url() ?>assets/front/images/header-shape-2.png" alt="illustration">
                    </figure>
                </div>
            </div>
        </div>
    </section><!-- /Hero-Area -->

    <section class="section-padding">
        <div class="container">
            <div class="row equal-height">
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <h2 class="head-title wow fadeInRight" data-wow-delay="0.3s">4 layouts diferentes para você escolher</h2>
                    <div class="space-40"></div>
                </div>
                <div class="row">
                    <?php for ($i=1; $i < 5; $i++) { ?>
                        <div class="col-xs-6 col-sm-6 col-md-3">
                            <div class="hidden visible-xs visible-sm space-60"></div>
                            <figure class="wow fadeInUp bs" data-wow-duration="1s" data-wow-delay="0.3s">
                                <img src="<?php echo base_url() ?>assets/admin/layouts/style<?php echo $i; ?>.png" alt="Layout">
                            </figure>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Dev process Section -->
    <section class="section-padding" id="service-page">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="page-title">
                        <h3 class="title"> Crie uma página que apresente quem é você e o que você faz em um único link.</h3>
                        <a href="<?php echo base_url('create-profile') ?>" class="btn btn-default">Crie sua página grátis <i class="fa fa-angle-right"></i></a>
                        <div class="space-60"></div>
                    </div>
                </div>
            </div>
            
            <?php $i=1; foreach ($services as $service): ?>
                <div class="row equal-height <?php echo($i % 2 == 0) ? 'revers' : '' ?>">
                    <div class="col-xs-12 col-sm-5 text-center">
                        <figure class="text-left wow fadeInLeft" data-wow-delay="0.3s">
                            <img src="<?php echo base_url($service->image) ?>" alt="">
                        </figure>
                        <div class="space-10 hidden visible-xs"></div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-sm-offset-1">
                        <div class="single-service-two wow fadeInRight" data-wow-delay="0.3s">
                            <h3 class="title"><?php echo html_escape($service->name); ?></h3>
                            <p><?php echo $service->details; ?></p>
                        </div>
                    </div>
                </div>
                <div class="space-50"></div>
            <?php $i++; endforeach; ?>

        </div>
    </section><!-- /Section -->


    