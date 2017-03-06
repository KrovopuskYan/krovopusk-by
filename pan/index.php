<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <title>Yurkevich</title>
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

<body class="body-s">
  <div class="cont-1">
    <div class="html-fon w-embed w-script">
      <div class="container" id="container">
        <script src="http://krovopusk.by/pan/build/three.js"></script>
        <!-- build/three.js-->
        <script src="http://krovopusk.by/pan/js/renderers/Projector.js"></script>
        <!--js/renderers/Projector.js -->
        <script src="http://krovopusk.by/pan/js/renderers/CanvasRenderer.js"></script>
        <!--js/renderers/CanvasRenderer.js -->
        <script>
  var camera, scene, renderer;
        var texture_placeholder,
            isUserInteracting = false,
            onMouseDownMouseX = 0, onMouseDownMouseY = 0,
            lon = 180, onMouseDownLon = 0,
            lat = 90, onMouseDownLat = 0,
            phi = 0, theta = 0,
            target = new THREE.Vector3();
        init();
        animate();
        function init() {
          var container, mesh;
          container = document.getElementById( 'container' );
          camera = new THREE.PerspectiveCamera( 110, window.innerWidth / window.innerHeight, 1, 1100 );
          scene = new THREE.Scene();
          texture_placeholder = document.createElement( 'canvas' );
          texture_placeholder.width = 128;
          texture_placeholder.height = 128;
          var context = texture_placeholder.getContext( '2d' );
          context.fillStyle = 'rgb( 200, 200, 200 )';
          context.fillRect( 0, 0, texture_placeholder.width, texture_placeholder.height );
          var materials = [
            loadTexture( 'http://krovopusk.by/pan/textures/cube/skybox/px.jpg' ), // right
            loadTexture( 'http://krovopusk.by/pan/textures/cube/skybox/nx.jpg' ), // left
            loadTexture( 'http://krovopusk.by/pan/textures/cube/skybox/py.jpg' ), // top
            loadTexture( 'http://krovopusk.by/pan/textures/cube/skybox/ny.jpg' ), // bottom
            loadTexture( 'http://krovopusk.by/pan/textures/cube/skybox/pz.jpg' ), // back
            loadTexture( 'http://krovopusk.by/pan/textures/cube/skybox/nz.jpg' ) // front
          ];
          mesh = new THREE.Mesh( new THREE.BoxGeometry( 300, 300, 300, 7, 7, 7 ), new THREE.MultiMaterial( materials ) );
          mesh.scale.x = - 1;
          scene.add( mesh );
          for ( var i = 0, l = mesh.geometry.vertices.length; i < l; i ++ ) {
            var vertex = mesh.geometry.vertices[ i ];
            vertex.normalize();
            vertex.multiplyScalar( 550 );
          }
          renderer = new THREE.CanvasRenderer();
          renderer.setPixelRatio( window.devicePixelRatio );
          renderer.setSize( window.innerWidth, window.innerHeight );
          container.appendChild( renderer.domElement );
          //document.addEventListener( 'mousedown', onDocumentMouseDown, false );
          //document.addEventListener( 'mousemove', onDocumentMouseMove, false );
          //document.addEventListener( 'mouseup', onDocumentMouseUp, false );
          //document.addEventListener( 'wheel', onDocumentMouseWheel, false );
          document.addEventListener( 'touchstart', onDocumentTouchStart, false );
          document.addEventListener( 'touchmove', onDocumentTouchMove, false );
          //
          window.addEventListener( 'resize', onWindowResize, false );
        }
        function onWindowResize() {
          camera.aspect = window.innerWidth / window.innerHeight;
          camera.updateProjectionMatrix();
          renderer.setSize( window.innerWidth, window.innerHeight );
        }
        function loadTexture( path ) {
          var texture = new THREE.Texture( texture_placeholder );
          var material = new THREE.MeshBasicMaterial( { map: texture, overdraw: 0.5 } );
          var image = new Image();
          image.onload = function () {
            texture.image = this;
            texture.needsUpdate = true;
          };
          image.src = path;
          return material;
        }
        function onDocumentMouseDown( event ) {
          event.preventDefault();
          isUserInteracting = true;
          onPointerDownPointerX = event.clientX;
          onPointerDownPointerY = event.clientY;
          onPointerDownLon = lon;
          onPointerDownLat = lat;
        }
        function onDocumentMouseMove( event ) {
          if ( isUserInteracting === true ) {
            lon = ( onPointerDownPointerX - event.clientX ) * 0.1 + onPointerDownLon;
            lat = ( event.clientY - onPointerDownPointerY ) * 0.1 + onPointerDownLat;
          }
        }
        function onDocumentMouseUp( event ) {
          isUserInteracting = false;
        }
        function onDocumentMouseWheel( event ) {
          camera.fov += event.deltaY * 0.05;
          camera.updateProjectionMatrix();
        }
        function onDocumentTouchStart( event ) {
          if ( event.touches.length == 1 ) {
            event.preventDefault();
            onPointerDownPointerX = event.touches[ 0 ].pageX;
            onPointerDownPointerY = event.touches[ 0 ].pageY;
            onPointerDownLon = lon;
            onPointerDownLat = lat;
          }
        }
        function onDocumentTouchMove( event ) {
          if ( event.touches.length == 1 ) {
            event.preventDefault();
            lon = ( onPointerDownPointerX - event.touches[0].pageX ) * 0.1 + onPointerDownLon;
            lat = ( event.touches[0].pageY - onPointerDownPointerY ) * 0.1 + onPointerDownLat;
          }
        }
        function animate() {
          requestAnimationFrame( animate );
          update();
        }
        function update() {
          if ( isUserInteracting === false ) {
            lon += 0.05;
          }
          lat = Math.max( - 85, Math.min( 85, lat ) );
          phi = THREE.Math.degToRad( 90 - lat );
          theta = THREE.Math.degToRad( lon );
          target.x = 500 * Math.sin( phi ) * Math.cos( theta );
          target.y = 500 * Math.cos( phi );
          target.z = 500 * Math.sin( phi ) * Math.sin( theta );
          camera.position.copy( target ).negate();
          camera.lookAt( target );
          renderer.render( scene, camera );
        }
        </script>
      </div>
    </div>
    <div class="container-logo">
      <div class="left-side-logo">
        <div class="transcript">alena</div>
        <img class="a-img" src="images/57daabced9b968fe029fdb63_logo-ay-one-A.svg">
      </div>
      <div class="right-side-logo">
        <img class="a-img img-2" src="images/57daabced9b968fe029fdb63_logo-ay-one-A.svg">
        <div class="transcript">юrkevich</div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="bg-video-1 w-background-video" data-autoplay="data-autoplay" data-loop="data-loop" data-poster-url="https://daks2k3a4ib2z.cloudfront.net/5564301e0112f01b4ff30a0d/57d95393732082646eedc6a9_explosion01-poster-00001.jpg" data-video-urls="https://daks2k3a4ib2z.cloudfront.net/5564301e0112f01b4ff30a0d/57d95393732082646eedc6a9_explosion01-transcode.webm,https://daks2k3a4ib2z.cloudfront.net/5564301e0112f01b4ff30a0d/57d95393732082646eedc6a9_explosion01-transcode.mp4" data-wf-ignore="data-wf-ignore">
      <div class="container-logo">
        <div class="left-side-logo">
          <div class="transcript">alena</div>
          <img class="a-img" src="images/57daabced9b968fe029fdb63_logo-ay-one-A.svg">
        </div>
        <div class="right-side-logo">
          <img class="a-img img-2" src="images/57daabced9b968fe029fdb63_logo-ay-one-A.svg">
          <div class="transcript">юrkevich</div>
        </div>
      </div>
    </div>
  </div>
  <div class="main-section">
    <div class="test-block">
      <div class="block-1">
        <img class="foto-img" data-ix="show-from-left" src="images/57d0553f904ea6421ee3ea91_face-550.jpg">
        <h2 class="head-1" data-ix="show-from-top">I AM fashion</h2>
        <h3 class="head-3" data-ix="show-from-top-2">Hi! I’m Alena Yurkevich.
          <br>I’m a fashion designer from Minsk.</h3>
      </div>
    </div>
  </div>
  <div class="weaw">
    <div class="white-block" data-ix="new-interaction">
      <h1 class="sdfsdg">Just do it!</h1>
    </div>
    <div class="blur-side">
    </div>
    <div class="white-line-of--said">
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