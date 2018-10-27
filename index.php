<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
  <meta charset="UTF-8">
  <title>Einstein Floripa</title>
  
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
  
  <meta name="viewport" content="viewport-fit=cover, width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta name="format-detection" content="telephone=no">
  <meta name="msapplication-tap-highlight" content="no">

  <link rel="icon" type="image/x-icon" href="assets/icon/favicon.ico">
  <link rel="manifest" href="manifest.json">
  <link href="estilo.css" rel="stylesheet" type="text/css">
  <meta name="theme-color" content="#4e8ef7">

  <!-- add to homescreen for ios -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <!-- script poupup ios pwa homescreen link-->
  <script>// Detecta se o dispositivo está no iOS
    const isIos = () => {
      const userAgent = window.navigator.userAgent.toLowerCase();
      return /iphone|ipad|ipod/.test( userAgent );
    }
    // Detects if device is in standalone mode
    const isInStandaloneMode = () => ('standalone' in window.navigator) && (window.navigator.standalone);
    // Verifica se deve exibir notificação popup de instalação:
    if (isIos() && !isInStandaloneMode()) {
      this.setState({ showInstallMessage: true });
    }</script>

  <!-- un-comment this code to enable service worker -->
  <script>
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.register('service-worker.js')
        .then(() => console.log('service worker installed'))
        .catch(err => console.error('Error', err));
    }
  </script>
  
  <script src="jquery-1.11.3.min.js"></script>
  
</head>
<body>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" type="text/css" href="estilo.css">
<div class="form">
<h1>Projeto Chamada Teste 8</h1>
  <div>Barcode result: <span id="dbr"></span></div>
  <div class="select">
    <label for="videoSource">Video source: </label><select id="videoSource"></select>
  </div>
  <button id="go">Read Barcode</button>
  </div>
  <div>
    <video muted autoplay id="video" playsinline="true"></video>
    <canvas id="pcCanvas" width="640" height="480" style="display: none; float: bottom;"></canvas>
    <canvas id="mobileCanvas" width="240" height="320" style="display: none; float: bottom;"></canvas>
  </div>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</body>

<script async src="zxing.js"></script>
<script src="video.js"></script>

</html>
