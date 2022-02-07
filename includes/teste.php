<!DOCTYPE html>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Icone do site -->

  <link rel="icon" href="includes/img/icone2.png">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/jquery-ui.css">

  <link rel="stylesheet" href="css/bootstrap-select-picker.min.css">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="css/sweetalert2.min.css">
  <link rel="stylesheet" href="css/bootstrap-select-picker.min.css">
  <link rel='stylesheet' type='text/css' href='FullCalendar/main.min.css' />
  <link rel='stylesheet' type='text/css' href='FullCalendar/style.css' />

  <!-- <link rel="stylesheet" href="css/css-debug.css"> -->

  <script src="js/sweetalert2.min.js"></script>



  <title>Abdull Proteses</title>

  <script>
    function mascara(t, mask) {
      var i = t.value.length;
      var saida = mask.substring(1, 0);
      var texto = mask.substring(i);
      if (texto.substring(0, 1) != saida) {
        t.value += texto.substring(0, 1);

      }
    }
  </script>
  <script type='text/javascript'>
    function click(id) {
      var btn = document.getElementById(id);
      btn.click();
      $("#exampleModalLabel").html('Cadastro Consulta Teste')
      $('.selectpicker').selectpicker();
    }

    function click2(id) {
      var btn = document.getElementById(id);
      btn.click();

    }
  </script>
</head>

<body style="border:10px;border-color:red;background-repeat: no-repeat; background-size: cover">
  <div class="modal" id="imagem">
    <div class="modal_content">
      <img src="./includes/img/leao.jpg" alt="" id="modal_img">
    </div>
    <span id="bt_close">&times;</span>
  </div>
    <img src="./includes/img/cachorro.jpg" alt="" class="small_img">
    <img src="./includes/img/gato.jpg" alt="" class="small_img">
    <img src="./includes/img/hamster.jpg" alt="" class="small_img">
    <img src="./includes/img/leao.jpg" alt="" class="small_img">
  <script>
    let imagens = document.querySelectorAll('.small_img');
    let modal = document.querySelector('.modal');
    let modalImg = document.querySelector('#modal_img')
    let btClose = document.querySelector('#bt_close')
    let srcVal = "";

    for (let i = 0; i < imagens.length; i++){
      imagens[i].addEventListener('click',function(){
        srcVal= imagens[i].getAttribute('src');
        modalImg.setAttribute('src', srcVal);
        modal.classList.toggle('modal_active')
      })
    }
    btClose.addEventListener('click',function(){
      modal.classList.toggle('modal_active')
    });


  </script>
  <style>
    .small_img{
      height: 40vh;
      width: 40vw;
      cursor: pointer;
    }
    #modal_img{
      width: 40vw;
    }
    .modal_active{
      visibility: visible !important;
    }
    .modal{
      width: 100vw;
      height: 100vh;
      background-color: rgba(0, 0, 0, .7);
      visibility: hidden;
      position: relative;
    }
    .modal_content{
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    #bt_close{
      cursor: pointer;
      color: white;
      background-color: black;
      position: absolute;
      top: 10px;
      padding: 5px 10px;
      font-size: 25px;
      border: solid 1px white;
    }
  </style>
  <button id="open_modal">Abrir</button>
</body>

</html>