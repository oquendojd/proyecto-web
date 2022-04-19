<?php
	require_once "./controlador.php";

	session_start();
	if(!isset($_SESSION['auth'])){
		header("Location: index.php?error=2");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/less@4" ></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet/less" type="text/css" href="estilo/objUser.less">
    
    <title>Document</title>
    
</head>
<body>
    <div class="container">
        <div class="text-center">
          <h1>Bienvenido <?php print($_SESSION['user']);?></h1>
          <a href="logout.php">Cerrar sesion</a>
          <form action="action.php" method="get"> 
              <input type="submit" class="btn btn-primary btn-lg" name="nuevo" value="Nuevo Objeto">
          </form>
        </div>
        <div class="container">
          <div class="card-columns">
            <?php
              $db = db::getDBConnection();
              $Respuesta = $db->getCards();
              while ($elemento = $Respuesta->fetch_assoc()) {
                
                print('<div class="card">');
                // print('<a href="#">');
                print('<img class="card-img-top" src="'.$elemento['imagen'].'" alt="Card image cap">');
                print('<div class="card-body">');
                print('<h5 class="card-title">Tipo: '.$elemento['nombre'].'</h5>');
                print('<p class="card-text">Descripción: '.$elemento['descripcion'].'</p>');
                // print('    <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>admin<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>');
                print("    </div>");
                // print('  </a>');
                print("</div>");
            }
            ?>
            <!-- <div class="card">
              <a href="#">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1472076638602-b1f8b1ac0b4a?ixlib=rb-0.3.5&s=63c9de7246b535be56c8eaff9b87dd89&auto=format&fit=crop&w=500&q=80" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur, doloremque!</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio iusto maxime nemo omnis praesentium similique.</p>
                <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>admin<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>
              </div>
              </a>
            </div>
            <div class="card">
              <a href="#">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1535086181678-5a5c4d23aa7d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=34c86263bec2c8f74ceb74e9f4c5a5fc&auto=format&fit=crop&w=500&q=80" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur.</h5>
                <p class="card-text">Amet commodi deleniti enim laboriosam odio placeat praesentium quis ratione rerum suscipit.</p>
                <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>admin<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>
              </div>
              </a>
            </div>
            <div class="card">
              <a href="#">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1535074153497-b08c5aa9c236?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=d2aaf944a59f16fe1fe72f5057b3a7dd&auto=format&fit=crop&w=500&q=80" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur.</h5>
                <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>admin<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>
              </div>
              </a>
            </div>
            <div class="card">
              <a href="#">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1535124406821-d2848dfbb25c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=98c434d75b44c9c23fc9df2a9a77d59f&auto=format&fit=crop&w=500&q=80" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Lorem ipsum dolor sit amet.</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At, consequatur culpa cumque deserunt dignissimos error explicabo fugiat harum ipsam magni minus mollitia nemo perferendis qui repellendus rerum saepe vel voluptate voluptatem voluptatum!
                  Aperiam, labore, molestiae!..</p>
                <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>admin<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>
              </div>
              </a>
            </div>
            <div class="card">
              <a href="#">
              <img class="card-img-top" src="https://images.unsplash.com/photo-1508015926936-4eddcc6d4866?ixlib=rb-0.3.5&s=10b3a8717ab609be8d7786cab50c4e0b&auto=format&fit=crop&w=500&q=80" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque commodi debitis eaque explicabo fuga maiores necessitatibus, neque omnis optio vel!</p>
                <p class="card-text"><small class="text-muted"><i class="fas fa-eye"></i>1000<i class="far fa-user"></i>admin<i class="fas fa-calendar-alt"></i>Jan 20, 2018</small></p>
              </div>
              </a>
            </div> -->
          </div>
        </div>
      </div>
</body>
</html>