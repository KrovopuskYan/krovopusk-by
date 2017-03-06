<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>Protected page</title>
  <meta content="Protected page" property="og:title">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <link href="https://daks2k3a4ib2z.cloudfront.net/5564301e0112f01b4ff30a0d/css/yurkevich.14350795e.css" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.4.7/webfont.js"></script>
  <script type="text/javascript">
  WebFont.load({
    google: {
      families: ["Roboto:100,300,regular,500,700,900:cyrillic,latin","Amatica SC:regular,700","Cinzel:regular,700,900","Poiret One:regular:latin,latin-ext,cyrillic","Questrial:regular","Didact Gothic:regular:latin,latin-ext","Josefin Slab:100,100italic,300,300italic,regular,italic,600,600italic,700,700italic","Playfair Display:regular,italic,700,700italic,900,900italic"]
    }
  });
  </script>
  <script src="js/modernizr.js" type="text/javascript"></script>
  <link href="images/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <link href="images/webclip.png" rel="apple-touch-icon">
 <link rel="stylesheet" type="text/css" href="css/style.css">
<?php if(file_exists('head_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'))
    { include_once 'head_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'; } ?>
<?php if(file_exists('head_code.php')){ include_once 'head_code.php'; } ?></head>

<body>
  <div class="utility-page-wrap">
    <div class="utility-page-content w-form w-password-page">
      <form action="/.wf_auth" class="utility-page-form w-password-page" method="post">
        <img src="images/password-page-lock.832ca8e2c9.svg">
        <h2>Protected page</h2>
        <div class="w-hidden w-password-page">
          <input type="hidden" name="path" value="<%WF_FORM_VALUE_PATH%>" />
          <input type="hidden" name="page" value="<%WF_FORM_VALUE_PAGE%>" />
        </div>
        <input autofocus="autofocus" class="w-input w-password-page" maxlength="256" name="pass" placeholder="Enter your password" type="password">
        <input class="w-button w-password-page" data-wait="Please wait..." type="submit" value="Submit">
      </form>
      <div class="w-form-fail w-password-page">
        <div>Incorrect password. Please try again.</div>
      </div>
      <div class="w-password-page" style="display: none">
        <script type="application/javascript">
  (function _handlePasswordPageOnload() {
  	  if (/[?&]e=1(&|$)/.test(document.location.search)) {
  	    document.querySelector('.w-password-page.w-form-fail').style.display = 'block';
  	  }
  	})()
        </script>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js" type="text/javascript"></script>
  <script src="https://daks2k3a4ib2z.cloudfront.net/5564301e0112f01b4ff30a0d/js/yurkevich.f3a092311.js" type="text/javascript"></script>
  <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->

<script type="text/javascript" src="./mail.js"></script>
<script type="text/javascript">$(document).ready(function(){$('[href*="brandjs"]').attr('style', 'display:none !important');});</script>
<?php if(file_exists('footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'))
    { include_once 'footer_code_'.pathinfo($_SERVER['REQUEST_URI'], PATHINFO_FILENAME).'.php'; } ?>
<?php if(file_exists('footer_code.php')){ include_once 'footer_code.php'; } ?></body>

</html>