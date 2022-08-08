<?php include "sessionStart.php"?>

<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="INTUITIVE">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>Página 1</title>
    <link rel="stylesheet" href="Content/css/createroom.css" media="screen">
<link rel="stylesheet" href="Content/css/createroom2.css" media="screen">
    <script class="u-script" type="text/javascript" src="Content/js/jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="Content/js/createroom.js" defer=""></script>
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">

    <?php include "topmenu.php" ?>
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html"}		
	</script>
    <meta property="og:title" content="Página 1">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body">
    <section class="u-align-center u-clearfix u-image u-section-1" src="" id="carousel_dc1f" data-image-width="1280" data-image-height="853">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-clearfix u-layout-wrap u-layout-wrap-1">
          <div class="u-gutter-0 u-layout">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-size-1 u-layout-cell-1">
                <div class="u-container-layout u-container-layout-1"></div>
              </div>
              <div class="u-align-center u-container-style u-grey-10 u-layout-cell u-radius-50 u-shape-round u-size-59 u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <h1 class="u-custom-font u-font-georgia u-text u-text-default u-text-1">Cadastro de quartos</h1>
                  <div class="u-form u-form-1">
                    <form action="#" method="POST" class="u-clearfix u-form-spacing-50 u-form-vertical u-inner-form" style="padding: 0px;" source="custom" name="form">
                      <div class="u-form-group u-form-name u-form-group-1">
                        <label for="name-30a4" class="u-form-control-hidden u-label" wfd-invisible="true"></label>
                        <input type="text" placeholder="Nome do quarto" id="name-30a4" name="roomname" class="u-border-2 u-border-white u-input u-input-rectangle u-radius-50 u-white u-input-1" required="">
                      </div>
                      <div class="u-form-email u-form-group u-form-group-2">
                        <label for="email-cd2c" class="u-form-control-hidden u-label" wfd-invisible="true"></label>
                        <input type="text" id="email-cd2c" name="description" class="u-border-2 u-border-white u-input u-input-rectangle u-radius-50 u-white u-input-2" placeholder="Descrição">
                      </div>
                      <div class="u-form-group u-form-name u-form-group-3">
                        <label for="name-b82f" class="u-form-control-hidden u-label">Preço</label>
                        <input type="number" placeholder="Preço" id="name-b82f" name="price" class="u-border-2 u-border-white u-input u-input-rectangle u-radius-50 u-white u-input-3" required="">
                      </div>
                      <div class="u-form-group u-form-name u-form-group-4">
                        <label for="name-1c2f" class="u-form-control-hidden u-label">Numero do quarto</label>
                        <input type="number" placeholder="Numero do quarto" id="name-1c2f" name="number" class="u-border-2 u-border-white u-input u-input-rectangle u-radius-50 u-white u-input-4" required="required">
                      </div>
                      <div class="u-align-center u-form-group u-form-submit u-form-group-5">
                        <a href="#" class="u-border-2 u-border-black u-btn u-btn-submit u-button-style u-hover-black u-palette-1-light-2 u-text-active-black u-text-black u-text-hover-white u-btn-1">Cadastrar</a>
                        <input type="submit" value="submit" class="u-form-control-hidden" wfd-invisible="true">
                      </div>
                      <div class="u-form-send-message u-form-send-success" wfd-invisible="true">Quarto cadastrado com sucesso.</div>
                      <div class="u-form-send-error u-form-send-message" wfd-invisible="true"> Não foi possivel cadastrar o quarto, por favor tente novamente mais tarde. </div>
                      <input type="hidden" value="" name="recaptchaResponse" wfd-invisible="true">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include "footer.php" ?>

  </body>
</html>