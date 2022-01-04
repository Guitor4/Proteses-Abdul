<?php
/**
 * Mensagem caso o cadastro seja  efetuado com sucesso
 */
if (isset($_GET, $_GET['status'], $_GET['id']) && is_string($_GET['status']) && is_numeric($_GET['id']) && $_GET['status'] == 'success1') {
      echo "<script>
            Swal.fire({
              title: '".NAME ." n° " .$_GET['id']. " Succesfully registered!!',
              text: \"If there are any changes to be made, use the edit/correct/update buttons\",
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                redirecionamento()
            }
            })
            function redirecionamento(){
              window.location.href = \"".LINK."\"
            }
            </script>";
    }
    if (isset($_GET, $_GET['status'], $_GET['id']) && is_string($_GET['status']) && is_numeric($_GET['id']) && $_GET['status'] == 'success2') {
      echo "<script>
            Swal.fire({
              title: '".NAME ." n° " .$_GET['id']. " Successfully edited!!',
              text: \"If there are any changes to be made, use the edit/correct/update buttons\",
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                redirecionamento()
            }
            })
            function redirecionamento(){
              window.location.href = \"".LINK."\"
            }
            </script>";
    }
/**
 * Mensagem caso o cadastro não seja  efetuado com sucesso
 */
    if (isset($_GET['status']) && is_string($_GET['status']) && $_GET['status'] == 'error1') {

      print("<script>
              Swal.fire({
                title: 'There was an error registering the  ".NAME."!!',
                text: \"Something happened, try again!!\",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  redirecionamento()
                  
                }
              })
              function redirecionamento(){
                window.location.href = \"".LINK."\"
              }
              </script>");
    }
    if (isset($_GET['status']) && is_string($_GET['status']) && $_GET['status'] == 'error2') {

      print("<script>
              Swal.fire({
                title: 'There was an error editing the ".NAME."!!',
                text: \"Something happened, try again!!\",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              }).then((result) => {
                if (result.isConfirmed) {
                  redirecionamento()
                  
                }
              })
              function redirecionamento(){
                window.location.href = \"".LINK."\"
              }
              </script>");
    }

    /**
 * Mensagem caso algum campo não esteja preenchido como o necessário para efetuar a ação requerida.
 */

    if (isset($erro) && $erro == 1) {

      print("<script>
              Swal.fire({
                title: 'There was an error finishing the ".NAME."!!',
                text: \"Algo ocorreu, tente novamente!!\",
                icon: 'error',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Ok'
              })
              </script>");
    }

    //Mensagem caso as configurações tenham sido salvas com sucesso

    if (isset($_GET, $_GET['status']) && is_string($_GET['status']) && $_GET['status'] == 'success3') {
      echo "<script>
            Swal.fire({
              title: '".NAME ." Successfuly edited!!',
              text: \"Feel free to make as many changes as you like!!\",
              icon: 'success',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                redirecionamento()
            }
            })
            </script>";
    }
    if (isset($_GET, $_GET['status']) && is_string($_GET['status']) && $_GET['status'] == 'error3') {
      echo "<script>
            Swal.fire({
              title: 'Restricted Area !!',
              text: \"You do not have permission to access this area of ​​the system, contact the administrator\",
              icon: 'error',
              confirmButtonColor: '#3085d6',
              confirmButtonText: 'Ok'
            }).then((result) => {
              if (result.isConfirmed) {
                window.location.href = \"index.php\"
            }
            })
            </script>";
    }
?>