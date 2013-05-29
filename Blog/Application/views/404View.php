  <style>
    body, html {
      background-color: #E6E6E6;
      font-size: 10pt;
      text-align: center;
    }
        
    #main-frame-error {
      margin: 0 auto;
      max-width: 540px;
      min-width: 200px;
    }

    #box {
      background-color: #fbfbfb;
      color: black;
      box-shadow: 0px 2px 2px #AAA;
      width: 600px;
      margin: 0 auto;
      padding: 20px;
    }

    h1 {
      color: #666;
      margin: 10px 0px 25px 0px;
      font-weight: normal;
      font-size: 1.5em;
      margin-top: 30px;
    }

  </style>
  <div id="box">
    <div>
      <h1>
       <span>Houston we have a 404! <br>Ooops, we could not find the requested url <strong><?php echo Smooth\Libraries\Url::current(); ?></strong>.</span>
       <small></small>
      </h1>
      <hr>
    </div>
    <div>
          <small>The view is located in <?php echo APPPATH . 'views/404View.php'; ?></small>
    </div>
 </div>