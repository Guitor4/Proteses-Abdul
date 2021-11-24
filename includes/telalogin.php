<?php

?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">


  <title>Login</title>
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/css.css">
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <script src="js/sweetalert2.min.js"></script>

  <!-- Custom styles for this template -->
 
</head>



<body class="text-center" style="background-image: url(includes/img/Clínica-Odontológica.jpg);background-repeat: no-repeat; background-size: 100%; align-items:verticall">

  <main class="form-signin align-middle">
    <form method = "post">
      <img class="mb-4" src="includes/img/usuario.png" alt="" width="100" height="100">
      <h1 class="h3 mb-3 fw-normal">Login</h1>

      <div class="form-floating">
          <input name = "login" type="text" class="form-control" id="floatingInput" placeholder="name123" required>
        <label for="floatingInput"><span> <img src="includes/img/user.png" width="30" height="30" alt="user" /></span></label>
      </div>

      <div class="form-floating">
        <input type="password" name = "senha" class="form-control" id="floatingPassword" placeholder="Password" required>
        <label for="floatingPassword"><span> <img src="includes/img/senha.png" width="30" height="30" alt="senha" /></span></label>
      </div>

      <div class="checkbox mb-3">
        <label style="color: white">
          <input type="checkbox" value="lembre-me"> Lembre-me
        </label>
      </div>
        <input type="submit" name = "Entrar" class="w-100 btn btn-lg" style="background-color: #007979; opacity: 90%"  >
      <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
  </main>
  <?php
    if(isset($_GET) && isset($_GET['status']) == 'error'){
      print(
        "<script>
        Swal.fire({
          title: 'Usuário ou senha não reconhecido',
          text: \"Talvez o usuário ou a senha escrito esteja incorreto, tente novamente!!\",
          icon: 'error',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Ok'
        }).then((result) => {
          if (result.isConfirmed) {
            redirecionamento()
            
          }
        })
        function redirecionamento(){
          window.location.href = \"login.php\"
        }
        </script>"
      );
    }

  ?>

</body>

</html>