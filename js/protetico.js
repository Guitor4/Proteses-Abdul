function getServicoTerceiro(valor) {
  var valorAjax = valor;
  $("#servico_terceiro").html("<option value = 0>Waiting...</option");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "TerceiroServico.php?id_terceiro=" + valorAjax+"&term=1",
    success: function (dados) {
      if (dados != null) {
        var options = '<option value = " " hidden>Choose the service</option>';
        for (var i = 0; i < dados.length; i++) {
          options +=
            '<option value="' +
            dados[i].id +
            '">' +
            dados[i].nomeServico +
            "</option>";
        }
        if (valorAjax != 0) {
          $("#servico_terceiro").html(options).show();
        }
      }
    },
    error: function(){
      var options = '<option value = " " hidden>No Services Registered</option>';
      $("#servico_terceiro").html(options).show();
    },
  });
}
function getServicoTerceiro2(valor) {
  var valorAjax = valor;
  $("#servico_terceiro").html("<option value = 0>Waiting...</option");
  $(".selectpicker").selectpicker("refresh")
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "TerceiroServico.php?id_terceiro=" + valorAjax+"&term=2",
    success: function (dados) {
      if (dados != null) {
        var options = '<option selected value = "0">Choose the service</option>';
        for (var i = 0; i < dados.length; i++) {
          options +=
            '<option value="' +
            dados[i].id +
            '">' +
            dados[i].nomeServico +
            "</option>";
        }
        if (valorAjax != 0) {
          $("#servico_terceiro").html(options).show();
          $(".selectpicker").selectpicker("refresh");
        }
      }
    },
    error: function(){
      $("#servico_terceiro").html('<option selected value = "1">Choose the service</option>').show();
      $(".selectpicker").selectpicker("refresh")
    },
  });
}

function getHorarios(valor) {
  var valorAjax = valor;
  $("#horarios").html("<option value = 0>Waiting...</option");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "horarios.php?data=" + valorAjax,
    async: true,
    success: function (dados) {
      var options = "";
      if (dados != null) {
        for (var i = 0; i < dados.length; i++) {
          options += "<option>" + dados[i].horario + "</option>";
        }
        options += "<option value='' hidden >All times for this day already filled</option>";
        $("#horarios").html(options);
        $(".selectpicker").selectpicker("refresh");
      }
    },
  });
}

$(function () {
  let = identificacao = document.querySelector("#identificacao").value;
  $("#busca").autocomplete({
    source: "autocomplete2.php?teste=" + identificacao,
  });
});

function dataAtualFormatada() {
  var data = new Date(),
    dia = data.getDate().toString(),
    diaF = dia.length == 1 ? "0" + dia : dia,
    mes = (data.getMonth() + 1).toString(), //+1 pois no getMonth Janeiro começa com zero.
    mesF = mes.length == 1 ? "0" + mes : mes,
    anoF = data.getFullYear();
  return anoF + "-" + mesF + "-" + diaF;
}

function preencherListaHome(x = 1, lista = "") {
  if (x === 1) {
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "preencherListaHome.php?data=" + dataAtualFormatada() + "&id=" + x,
      success: function (dados) {
        for (var x = 0; x < dados.length; x++) {
          i = dados[x].id;
          t = dados[x].title;
          r = dados[x].relatorio;
          s = dados[x].statusConsulta;
          h = dados[x].horaConsulta;

          lista +=
            '<a href="Consulta.php?id=' +
            i +
            '" class="list-group-item list-group-item-action " aria-current="true">' +
            '<div class="d-flex w-100 justify-content-between"><h5 class="mb-1">' +
            t +
            "</h5><small>" +
            h +
            '</small></div><p class="mb-1">Status: ' +
            s +
            "</p><small>" +
            r +
            ".</small></a>";
          $("#to_do_list").html(lista);
        }
      },
      error: function () {
        if (lista === undefined) {
          var lista =
            '<a href="#" class="list-group-item list-group-item-action " aria-current="true"><div class="d-flex w-100 justify-content-between">' +
            '<h5 class="mb-1">No appointments for today</h5><small>Today</small></div><p class="mb-1">' +
            "If you haven't already done so, feed the system</p></a>";
          $("#to_do_list").html(lista);
        }
      },
    });
  }

  if (x === 2 || x === 3) {
    /* $("#to_do_list").html('Teste'); */
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "preencherListaHome.php?data=" + dataAtualFormatada() + "&id=" + x,
      success: function (dados) {
        for (var x = 0; x < dados.length; x++) {
          if (dados[x].idLembrete !== undefined) {
            i = dados[x].idLembrete;
            t = dados[x].titulo;
            r = dados[x].descricao;
            s = "Reminder";
            h = "Today";

            lista +=
              '<a href="listaLembrete.php?pagina=1&id=' +
              i +
              "&search=" +
              t +
              '" class="list-group-item list-group-item-action " aria-current="true">' +
              '<div class="d-flex w-100 justify-content-between"><h5 class="mb-1">' +
              t +
              "</h5><small>" +
              h +
              '</small></div><p class="mb-1">Status: ' +
              s +
              '</p><small style = "word-wrap: break-word;">' +
              r +
              ".</small></a>";
            $("#to_do_list").html(lista);
          }
        }
      },
      error: function () {
        var lista =
          '<a href="#" class="list-group-item list-group-item-action " aria-current="true"><div class="d-flex w-100 justify-content-between">' +
          '<h5 class="mb-1">No reminders for today</h5><small>Today</small></div><p class="mb-1">' +
          "If you haven't already done so, feed the system</p></a>";
        $("#to_do_list").html(lista);
      },
    });
  }
  if (x === 3) {
    $.ajax({
      type: "POST",
      dataType: "json",
      url: "preencherListaHome.php?data=" + dataAtualFormatada() + "&id=" + x,
      success: function (dados) {
        for (var x = 0; x < dados.length; x++) {
          if (dados[x].id !== undefined) {
            i = dados[x].id;
            t = dados[x].title;
            r = dados[x].relatorio;
            s = dados[x].statusConsulta;
            h = dados[x].horaConsulta;

            lista +=
              '<a href="Consulta.php?id=' +
              i +
              '" class="list-group-item list-group-item-action " aria-current="true">' +
              '<div class="d-flex w-100 justify-content-between"><h5 class="mb-1">' +
              t +
              "</h5><small>" +
              h +
              '</small></div><p class="mb-1">Status: ' +
              s +
              "</p><small>" +
              r +
              ".</small></a>";
            $("#to_do_list").html(lista);
          }
        }
      },
      error: function () {
        var lista =
          '<a href="#" class="list-group-item list-group-item-action " aria-current="true"><div class="d-flex w-100 justify-content-between">' +
          '<h5 class="mb-1">No tasks for today</h5><small>Today</small></div><p class="mb-1">' +
          "If you haven't already done so, feed the system</p></a>";
        $("#to_do_list").html(lista);
      },
    });
  }
}

function Dados_Cadastrais() {
  document.getElementById("apresenta_Consultas").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = "";
  document.getElementById("apresenta_Fotos").innerHTML = "";

  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_DadosCadastrais").html("<p>Waiting...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "prontuarioAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      if (dados !== null) {
        var p, n, s, t, e, urli, id;
        for (var i = 0; i < dados.length; i++) {
          p = dados[i].prontuario;
          n = dados[i].nomePaciente;
          s = dados[i].sexo;
          t = dados[i].telefone;
          e = dados[i].email;
          urli = dados[i].img;
          id = dados[i].idImagem;
        }
        var nome = urli.substring(10);
        if (urli !== "./Imagens/usuario.png") {
          var at = "hidden";
          var del = "";
        } else {
          at = "";
          del = "hidden";
        }
        var labels =
          '<h3>Registration Data</h3><div class="row">\n\
                                <div class="col-8 mt-2">\n\
                                    <label>Medical Record: </label><input readonly type="text" class="form-control"  value="' +
          p +
          '">\n\
                                    <label>Patient: </label><input readonly type="text" class="form-control"  value="' +
          n +
          '">\n\
                                    <label>Gender: </label><input readonly type="text" class="form-control"  value="' +
          s +
          '">\n\
                                    <label>Phone: </label><input readonly type="text" class="form-control"  value="' +
          t +
          '">\n\
                                    <label>E-mail: </label><input readonly type="text" class="form-control"  value="' +
          e +
          '">\n\
                                </div>\n\
                                <div class="col-2 mt-5" >\n\
                                <img src="' +
          urli +
          '" alt="" width="150" height="100">\n\
                                 <form method="post" action="prontuario.php?paciente=' +
          p +
          '" enctype="multipart/form-data">\n\
                                        <input hidden type="text" name="titulo" value="perfil_' +
          p +
          '">\n\
                                        <input hidden type="text" name="idImg" value="' +
          id +
          '">\n\
                                        <input hidden type="text" name="nome" value="' +
          nome +
          '">\n\
                                        <input ' +
          at +
          ' type="file" name="imagem" class="btn btn-dark"><br>\n\
\n                                     <input ' +
          del +
          ' type="submit" class="btn btn-warning" name="delFotoPerfil" value="Delete">\n\
                                        <input ' +
          at +
          ' type="submit" class="btn btn-success p-1" name="edFotoPerfil" value="Update"><br>\n\
                                 </form>\n\
                                </div>\n\
                              </div>';

        $("#apresenta_DadosCadastrais").html(labels).show();

        /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
      }
    },
  });
}

function Consultas() {
/*   document.getElementById("apresenta_DadosCadastrais").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = "";
  document.getElementById("apresenta_Fotos").innerHTML = ""; */
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_Consultas").html("<p>Waiting...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "consultasAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      console.log(dados);
      if (dados !== null && dados !== "No results") {
        var tabela =
          "<thead><tr><th>Consultation ID</th>\n\
                                    <th>Date</th>\n\
                                    <th>Hour</th>\n\
                                    <th>Status</th>\n\
                                    <th>Clinic</th>\n\
                                    <th>Dentist</th>\n\
                                    <th>Action</th>\n\
                                    </tr>\n\
                              </thead>";
        for (var i = 0; i < dados.length; i++) {
          tabela +=
            '<tbody><tr>\n\
                                <td class "table-success"> ' +
            dados[i].id +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].data +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].hora +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].status +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].clinica +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].dentista +
            '</td>\n\
                                <td class "table-success"><a class="btn btn-outline-primary" data-toggle="collapse"  onclick="Tratamentos(' +
            dados[i].id +
            ')" role="button" aria-expanded="false" aria-controls="apresenta_Tratamentos" > Open </a></td>\n\
                                </tr></tbody>';
          //$('#apresentaProntuario').append('<tbody><tr><td class "table-success">' + dados[i].prontuario + '</td></tr></tbody>');
        }
        $("#apresenta_Consultas").html(tabela).show();
        document.getElementById("mostraTitulo").innerHTML = "<h3>Consultations</h3>";

        /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
      } else {
        $("#apresenta_Consultas")
          .html('<p class="text-danger">Not found any registered consultation for this patient</p>')
          .show();
        document.getElementById("mostraTitulo").innerHTML = "";
      }
    },
  });
}

function Tratamentos(id) {
  //document.getElementById("apresenta_Tratamentos").innerHTML ="";
 /*  document.getElementById("apresenta_DadosCadastrais").innerHTML = ""; */

  var click = id;

  if (click !== iclick) {
    iclick = click;

    var valorAjax = document.getElementById("aux").value;

    $("#apresenta_Tratamentos").html("<p>Waiting...</p>");
    $.ajax({
      type: "POST",
      dataType: "json",
      url:
        "tratamentosAbrirProntuario.php?prontuario=" +
        valorAjax +
        "&consulta=" +
        click,
      success: function (dados) {
        if (dados !== null && dados !== "No Results") {
          var tabela =
            "<thead><tr><th>Procedimento</th>\n\
                                    <th>Ação</th>\n\
                                    </tr>\n\
                              </thead>";
          for (var i = 0; i < dados.length; i++) {
            tabela +=
              '<tbody><tr>\n\
                                <td class "table-success">' +
              dados[i].nomeT +
              '</td>\n\
                                <td class "table-success"><a class="btn btn-outline-primary" target="_blank" href="tratamentoPDF.php?idProcedimento=' +
              dados[i].idProcedimento +
              "&consulta=" +
              dados[i].idC +
              "&nomeProcedimento=" +
              dados[i].nomeT +
              "&prontuario=" +
              dados[i].prontuario +
              '" ><img src="./includes/img/pdf.2.png" width="35" height="40"></a></td>\n\
                                </tr></tbody>';
                                console.log(dados[i].nomeT);
          }
          $("#apresenta_Tratamentos").html(tabela).show();
          $("#mostraTitulo").html("TRATAMENTOS").show();
        } else {
          $("#apresenta_Tratamentos")
            .html('<p class="text-danger">No proceedings registered yet for this consultation<p>')
            .show();
          document.getElementById("mostraTitulo").innerHTML = "";
        }
      },
    });
  } else {
    document.getElementById("apresenta_Tratamentos").innerHTML = "";
    document.getElementById("mostraTitulo").innerHTML = "";
    iclick = 0;
    //document.getElementById("click").value=id;
  }
}

function FotoAntes() {
/*   document.getElementById("apresenta_Consultas").innerHTML = "";
  document.getElementById("apresenta_DadosCadastrais").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = ""; */
  var valorAjax = document.getElementById("aux").value;
 
  $("#apresenta_Fotos").html("<p>Waiting...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "fotoAbrirProntuario.php?prontuario=" + valorAjax + "&antesDepois=1",
    success: function (dados) {
      if (dados !== null) {
        var p = valorAjax;
        var agora = new Date();
        var ano = agora.getFullYear();
        var h = agora.getHours();
        var m = agora.getMinutes();
        var s = agora.getMilliseconds();

        var tabela =
          '<div><h3>Pre-treatment photos</h3><form method="post" action="prontuario.php?paciente=' +
          p +
          '" enctype="multipart/form-data">\n\
                                  <input required class="btn btn-dark" type="file" name="foto"><br><br>\n\
                                  <input hidden type="text" name="titulo" value="antes_' +
          p +
          "_" +
          ano +
          "" +
          h +
          "" +
          m +
          "" +
          s +
          '">\n\
                                  <input class="btn btn-success" type="submit" name="cadFoto" value="Add image">\n\
                                 </form><hr></div>';

        for (var i = 0; i < dados.length; i++) {
          if (dados[i].img == "semFoto") {
            var semFoto = "hidden";
            var semFotoB = "";
            var semFotoT = "";
          } else {
            semFoto = "";
            semFotoB = "btn btn-warning";
            semFotoT = 'width="200" height="200"';
          }
          var nome = dados[i].img.substring(8);
          tabela +=
            '<div class="row">\n\
                        <div class="col-5" >\n\
                            <img class = small_img ' +
            semFoto +
            ' src="' +
            dados[i].img +
            '" alt="" ' +
            semFotoT +
            '>\n\
                     </div>\n\
                     <div class="col-4">\n\
                            <form method="post" action="prontuario.php?paciente=' +
            p +
            '" enctype="multipart/form-data">\n\
                                  <input  hidden type="text" name="idImg" value="' +
            dados[i].idFoto +
            '">\n\
                                  <input hidden type="text" name="nome" value="' +
            nome +
            '">\n\
                                  <input' +
            semFoto +
            ' class="' +
            semFotoB +
            '" type="submit" name="delFoto" value="Delete image">\n\
                            </form>\n\
                        </div>\n\
                    </div><hr>';
        }
        $("#apresenta_Fotos").html(tabela).show();
        console.log('Isso rodou antes da função')
      }
      modalImg();
    },
  });
}

function FotoDepois() {
/*   document.getElementById("apresenta_Consultas").innerHTML = "";
  document.getElementById("apresenta_DadosCadastrais").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = ""; */
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_Fotos").html("<p>Waiting...</p>");

  $.ajax({
    type: "POST",
    dataType: "json",
    url: "fotoAbrirProntuario.php?prontuario=" + valorAjax + "&antesDepois=2",
    success: function (dados) {
      if (dados !== null) {
        var p = valorAjax;
        var agora = new Date();
        var ano = agora.getFullYear();
        var h = agora.getHours();
        var m = agora.getMinutes();
        var s = agora.getMilliseconds();

        var tabela =
          '<div><h3>Post-treatment photos</h3><form method="post" action="" enctype="multipart/form-data">\n\
                                  <input required class="btn btn-dark" type="file" name="foto"><br><br>\n\
                                  <input hidden type="text" name="titulo" value="depois_' +
          p +
          "_" +
          ano +
          "" +
          h +
          "" +
          m +
          "" +
          s +
          '">\n\
                                  <input class="btn btn-success" type="submit" name="cadFoto" value="Add image">\n\
                                 </form><hr></div>';

        for (var i = 0; i < dados.length; i++) {
                    if (dados[i].img=="semFoto"){
                        var semFoto="hidden";
                        var semFotoB="";
                        var semFotoT='';
                    }else{
                        semFoto="";
                        semFotoB="btn btn-warning";
                        semFotoT='width="200" height="200"';
                    }
            var nome = dados[i].img.substring(8);
          tabela +='<div class="row">\n\
                        <div class="col-5" >\n\
                            <img class = small_img ' +
            semFoto +
            ' src="' +
            dados[i].img +
            '" alt="" ' +
            semFotoT +
            '>\n\
                     </div>\n\
                     <div class="col-4">\n\
                            <form method="post" action="prontuario.php?paciente=' +
            p +
            '" enctype="multipart/form-data">\n\
                                  <input  hidden type="text" name="idImg" value="' +
            dados[i].idFoto +
            '">\n\
                                  <input hidden type="text" name="nome" value="' +
            nome +
            '">\n\
                                  <input' +
            semFoto +
            ' class="' +
            semFotoB +
            '" type="submit" name="delFoto" value="Delete image">\n\
                            </form>\n\
                        </div>\n\
                    </div><hr>';
        }
        $("#apresenta_Fotos").html(tabela).show();
        console.log('Isso rodou antes da função')
        modalImg();
      }
      
    },
  });
}

//Validação de consulta
function validaConsulta() {
  var paciente = document.formConsulta.paciente;
  var horarios = document.formConsulta.horarios;
  var clinica = document.formConsulta.clinica;
  var dentista = document.formConsulta.dentista;
  console.log(paciente);
  if (paciente.value == " ") {
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the patient!!").show();
    document.formConsulta.paciente.focus();
    return;
  }

  if (horarios.value == " ") {
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the consultation time!!").show();
    document.formConsulta.horarios.focus();
    return;
  }
  if (dentista.value == " ") {
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the dentist!!").show();
    document.formConsulta.dentista.focus();
    return;
  }
  if (clinica.value == " ") {
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the clinic!!").show();
    document.formConsulta.clinica.focus();
    return;
  }

  document.formConsulta.submit();
}

function validaNome(nome) {
  var msgNome = '';
  var name = nome.value;
  var expNome = /^([^0-9]){3,50}$/g;
  var nomeVerificado = expNome.exec(name);
  console.log(nomeVerificado);
  if(!nomeVerificado){
    msgNome = 'Minimum size 3 caracters. No numbers allowed';
  }
  nome.setCustomValidity(msgNome);
  }
  function validaTelefone(telefone) {
    var msgNome = '';
    var tel = telefone.value;
    var expNome = /^([^a-z]){9,12}$/gi;
    var nomeVerificado = expNome.exec(tel);
    if(!nomeVerificado){
      msgNome = 'Minimum size 9 caracters. Max 11';
    }
    telefone.setCustomValidity(msgNome);
    }
  function validaEmail(email) {
    var msgNome = '';
    var email2 = email.value;
    var expNome = /^([\w_.]*)@([\w-.]*)\.?([a-z.]){3,6}$/gi;
    var nomeVerificado = expNome.exec(email2);
    if(!nomeVerificado){
      msgNome = 'Please enter a valid email. Example: paulo2@gmail.com';
    }
    email.setCustomValidity(msgNome);
    }
  
  function validaRastreio(){
    var terceiro = document.formRastreio.RFKTerceiro;
    var servico = document.formRastreio.RFKServico;
    var dtEntrega = document.formRastreio.dtEntrega;
    var dtRetorno = document.formRastreio.dtRetorno;
    if(dtEntrega.value == ""){
      setTimeout(function (self) {
        $("#alerta").hide();
      }, 3000);
      $("#alerta").html("Select the send date").show();
      document.formRastreio.RFKTerceiro.focus();
      return;
    }
    if(dtRetorno.value == ""){
      setTimeout(function (self) {
        $("#alerta").hide();
      }, 3000);
      $("#alerta").html("Select the return date!!").show();
      document.formRastreio.RFKTerceiro.focus();
      return;
    }
    if(terceiro.value == ""){
      setTimeout(function (self) {
        $("#alerta").hide();
      }, 3000);
      $("#alerta").html("Select the provider!!").show();
      document.formRastreio.RFKTerceiro.focus();
      return;
    }
    if(servico.value == " "){
      setTimeout(function (self) {
        $("#alerta").hide();
      }, 3000);
      $("#alerta").html("Select the service!!").show();
      document.formRastreio.RFKServico.focus();
      return;
    }
    document.formRastreio.submit();
  }

function validaProtese(){
  var tipo = document.formProtese.tipo;
  var extensao = document.formProtese.extensao;
  var posicao = document.formProtese.posicao;
  var marca = document.formProtese.marca;
  var qtdDentes = document.formProtese.qtdDentes;
  var paciente = document.formProtese.paciente;
  var ouroDente = document.formProtese.ouroDente;
  var qtdOuro = document.formProtese.qtdOuro;
  if(tipo.value == ""){
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the denture option!!").show();
    document.formProtese.tipo.focus();
    return;
  }
  if(extensao.value == ""){
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the extension").show();
    document.formProtese.tipo.focus();
    return;
  }
  if(posicao.value == ""){
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the position!!").show();
    document.formProtese.tipo.focus();
    return;
  }
  if(marca.value == ""){
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the tooth brand!!").show();
    document.formProtese.tipo.focus();
    return;
  }
  if(qtdDentes.value == ""){
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Insert how many teeth the denture have!!").show();
    document.formProtese.tipo.focus();
    return;
  }
  if(paciente.value == ""){
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("There's an error, contact the support!!").show();
    document.formProtese.tipo.focus();
    return;
  }
  if(ouroDente.checked){
    if(qtdOuro.value == ""){
      setTimeout(function (self) {
        $("#alerta").hide();
      }, 3000);
      $("#alerta").html("Insert how many golden tooths the denture will have!!").show();
      document.formProtese.tipo.focus();
      return;
    }
  }
  document.formProtese.submit();
}

function validaTerceirizado(){
  var terceiro = document.formTerceirizado.Terceiro;
  var servico = document.formTerceirizado.ServicoTerceiro;
  if(terceiro.value == ""){
    setTimeout(function (self) {
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the provider!!").show();
    document.formTerceirizado.Terceiro.focus();
    return;
  }
  teste = 0;
  if(servico.value == "0" && teste == 0){
    setTimeout(function (self) {
      teste = 1;
      $("#alerta").hide();
    }, 3000);
    $("#alerta").html("Select the service!!").show();
    document.formTerceirizado.ServicoTerceiro.focus();
    return;
  }
  document.formTerceirizado.submit();
}

function modalImg(){
  console.log('Isso rodou dentro da função')
  let teste = 0;
  let imagens = document.querySelectorAll('.small_img');
  let modal = document.querySelector('.model');
  let modalImg = document.querySelector('#model_img')
  let btClose = document.querySelector('#bt_close')
  let srcVal = "";

  for (let i = 0; i < imagens.length; i++){
    imagens[i].addEventListener('click',function(){
      teste = 1
      srcVal= imagens[i].getAttribute('src');
      modalImg.setAttribute('src', srcVal);
      modal.classList.toggle('model_active')
    })
  }
  btClose.addEventListener('click',function(){
      modal.classList.remove('model_active');   
  });
}
