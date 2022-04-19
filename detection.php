<?php
	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>
      Nuevo Objeto
    </title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Jason Mayes" />

    <!-- Import the webpage's stylesheet -->
    <link rel="stylesheet" href="estilo/style.css" />
  </head>
  <body>
    <h1>Añadir y reconocer objeto</h1>
    
    <h4>
      Por favor espera a que el modelo de clasificación cargue.
    </h4>
    <div class="container-fluid">
    <section id="demos" class="invisible">
      <!-- <h2>Demo: Classifying Images</h2>
      <p>
        <em>Click on an image below</em> to try and recognize what is in the
        image using the power of Machine Learning! Notice how in this demo we
        not only know if the object is in the image, but also its position in
        the image. Very useful.
      </p> -->

      <!-- <div class="classifyOnClick">
        <img
          src="https://cdn.glitch.com/74418d0b-3465-49a2-8c71-a721b7734473%2Fdoggo.jpg?v=1592266725716"
          crossorigin="anonymous"
          title="Click to get classification!"
        />
      </div>
      <div class="classifyOnClick">
        <img
          src="https://cdn.glitch.com/74418d0b-3465-49a2-8c71-a721b7734473%2Fcoupledog.jpg?v=1591311552891"
          crossorigin="anonymous"
          title="Click to get classification!"
        />
      </div> -->
      <div class="classifyOnClick">
        <?php
        if(isset($_GET['error'])){
          if($_GET['error']==1){
            print("<p class='error'>No se logró guardar la nueva tarjeta. Verifique la información</p>");
          }
        }
        ?>
            <form action="crud/create.php" id="form-Obj" enctype="multipart/form-data" method="POST">
                <img id="output" class="img-fluid"/>
                <label class="btn btn-primary btn-lg" for="file" style="cursor: pointer;">Cargar Imagen</label>
                <input type="file"  accept="image/*" name="imagen" id="file"  onchange="loadFile(event)" style="display: none;">
			          <input type="text" id="inObj" name="nombre" style="display: none;" required >
			          <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Descripcion</span>
                    <input type="text" name="descripcion" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <h3>Objeto detectado:</h3>
                <h4 id="obj" > </h4>
                <button id="imgClas" type="button" class="btn btn-primary btn-lg">Clasificar</button> 
                <input type="submit" value="Guardar" class="btn btn-primary btn-lg"><br>
                <div class="container">
                
                </div>
            </form>
      </div>


      <!-- <h2>Demo: Webcam continuous classification</h2> -->
      <!-- <p>
        Hold some objects up close to your webcam to get a real-time
        classification! You must be on
        <a href="https://glitch.com/~tensorflow-js-object-detection"
          >the https version of the website</a
        >
        for this to work. When ready click "enable webcam" below and accept
        access to the webcam when the browser asks (check the top left of your
        window)
      </p> -->

      <div id="liveView" class="videoView" style="display: none">
        <button id="webcamButton">Enable Webcam</button>
        <video id="webcam" autoplay></video>
      </div>

    </section>
    </div>
    <footer class="note" >
      <!-- <p>
        <em>Please note:</em> This demo loads our desired machine learning model
        via
        <a
          href="https://github.com/tensorflow/tfjs-models/tree/master/coco-ssd"
          title="View TensorFlow.js COCO-SSD on our GitHub"
          >an easy to use JavaScript class</a
        >
        made by the TensorFlow.js team to do the hard work for you. No machine
        learning knowledge is needed to use this. View the link to learn more
        about fine tuning this machine learning model. See our other tutorials
        if you want to load a model directly yourself, or recognize a custom
        object using your own data.
      </p>
      <p>
        <a href="https://glitch.com/~tensorflow-js-object-detection"
          >See the README.md or the project page for more information</a
        >.
      </p> -->
    </footer>

    <!-- Import TensorFlow.js library -->
    <script
      src="https://cdn.jsdelivr.net/npm/@tensorflow/tfjs@3.11.0/dist/tf.min.js"
      type="text/javascript"
    ></script>

    <!-- Load the coco-ssd model to use to recognize things in images -->
    <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/coco-ssd"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@tensorflow-models/mobilenet@1.0.0"> </script> -->

    <!-- Import the page's JavaScript to do some stuff -->
    <script src="js/script.js"></script>
  </body>
</html>
