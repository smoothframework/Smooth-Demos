    
    <link rel="stylesheet" href="<?php echo WEBPATH; ?>Public/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo WEBPATH; ?>Public/css/bootstrap-responsive.css">

    <div id="wrap">
      <div class="container-narrow">
        <div class="page-header">
          <h1><span class="text-error"><?php echo $errorCode; ?></span> error</h1>
        </div>
        <p class="lead"><span class="text-error"><?php echo $errorMessage; ?></span> in <span class="text-error"><?php echo $errorFile; ?></span> on line <span class="text-error"><?php echo $errorLine; ?></span></p>
        <p>This is the default error view in Smooth; Located in <?php echo APPPATH . 'views/ErrorView.php'; ?></p>
        <p>Just change the content of the page as you wish.</p>
      </div>
    </div>