function getServicoTerceiro(valor) {
  var valorAjax = valor;
  $("#servico_terceiro").html("<option value = 0>Aguardando...</option");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "TerceiroServico.php?id_terceiro=" + valorAjax,
    success: function (dados) {
      if (dados != null) {
        var options = "<option value='' hidden>Escolher Servico</option>";
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
  });
}

function getHorarios(valor) {
  var valorAjax = valor;
  $("#horarios").html("<option value = 0>Aguardando...</option");
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
        options += "<option value='' hidden >Sem horários disponíveis</option>";
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
            '<h5 class="mb-1">Sem Consultas para hoje por enquanto</h5><small>Today</small></div><p class="mb-1">' +
            "Caso ainda não tenha feito, alimente o banco </p><small>Em caso de erro gritar é contra indicado.</small></a>";
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
            s = "Classe:Lembrete";
            h = "Hoje";

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
          '<h5 class="mb-1">Sem Lembretes para hoje por enquanto</h5><small>Today</small></div><p class="mb-1">' +
          "Caso ainda não tenha feito, alimente o banco </p><small>Em caso de erro gritar é contra indicado.</small></a>";
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
          '<h5 class="mb-1">Sem Tarefas para hoje por enquanto</h5><small>Today</small></div><p class="mb-1">' +
          "Caso ainda não tenha feito, alimente o banco </p><small>Em caso de erro gritar é contra indicado.</small></a>";
        $("#to_do_list").html(lista);
      },
    });
  }
}

//apresenta dados cadastrais ao carregar a página.
//$(window).on("load",
function loadDados() {
  var valorAjax = document.getElementById("aux").value;
  //var urlImagem = document.getElementById('iUrl').value;
  //var verificaFoto = document.getElementById('fotoCadastrada').value;
  //console.log(verificaFoto);

  $("#apresenta_DadosCadastrais").html("<p>Aguardando...</p>");
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
          '<div class="row">\n\
                                <div class="col-8 mt-2">\n\
                                    <label>Prontuário: </label><input readonly type="text" class="form-control"  value="' +
          p +
          '">\n\
                                    <label>Paciente: </label><input readonly type="text" class="form-control"  value="' +
          n +
          '">\n\
                                    <label>Sexo: </label><input readonly type="text" class="form-control"  value="' +
          s +
          '">\n\
                                    <label>Telefone: </label><input readonly type="text" class="form-control"  value="' +
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
          ' type="file" name="imagem"><br>\n\
\n                                     <input ' +
          del +
          ' type="submit" name="delFotoPerfil" value="Deletar">\n\
                                        <input ' +
          at +
          ' type="submit" name="edFotoPerfil" value="Atualizar"><br>\n\
                                 </form>\n\
                                </div>\n\
                              </div>';

        $("#apresenta_DadosCadastrais").html(labels).show();
      }
    },
  });
}

function Dados_Cadastrais() {
  document.getElementById("apresenta_Consultas").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = "";
  document.getElementById("apresenta_Fotos").innerHTML = "";
  
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_DadosCadastrais").html("<p>Aguardando...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "prontuarioAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      if (dados !== null) {
        var p, n, s, t, e,urli, id;
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
          '<div class="row">\n\
                                <div class="col-8 mt-2">\n\
                                    <label>Prontuário: </label><input readonly type="text" class="form-control"  value="' +
          p +
          '">\n\
                                    <label>Paciente: </label><input readonly type="text" class="form-control"  value="' +
          n +
          '">\n\
                                    <label>Sexo: </label><input readonly type="text" class="form-control"  value="' +
          s +
          '">\n\
                                    <label>Telefone: </label><input readonly type="text" class="form-control"  value="' +
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
          ' type="file" name="imagem"><br>\n\
\n                                     <input ' +
          del +
          ' type="submit" name="delFotoPerfil" value="Deletar">\n\
                                        <input ' +
          at +
          ' type="submit" name="edFotoPerfil" value="Atualizar"><br>\n\
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
  document.getElementById("apresenta_DadosCadastrais").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = "";
  document.getElementById("apresenta_Fotos").innerHTML = "";
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_Consultas").html("<p>Aguardando...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "consultasAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      if (dados !== null && dados !== "Sem resultados") {
        var tabela =
          "<thead><tr><th>Consulta</th>\n\
                                    <th>Data</th>\n\
                                    <th>Hora</th>\n\
                                    <th>Status</th>\n\
                                    <th>Clínica</th>\n\
                                    <th>Dentista</th>\n\
                                    <th>Ação</th>\n\
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
            ')" role="button" aria-expanded="false" aria-controls="apresenta_Tratamentos" > Abrir </a></td>\n\
                                </tr></tbody>';
          //$('#apresentaProntuario').append('<tbody><tr><td class "table-success">' + dados[i].prontuario + '</td></tr></tbody>');
        }
        $("#apresenta_Consultas").html(tabela).show();
        document.getElementById("mostraTitulo").innerHTML = "";

        /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
      } else {
        $("#apresenta_Consultas")
          .html('<p class="text-danger">Nenhuma consulta cadastrada</p>')
          .show();
        document.getElementById("mostraTitulo").innerHTML = "";
      }
    },
  });
}

function Tratamentos(id) {
  //document.getElementById("apresenta_Tratamentos").innerHTML ="";
  document.getElementById("apresenta_DadosCadastrais").innerHTML = "";

  var click = id;

  if (click !== iclick) {
    iclick = click;

    var valorAjax = document.getElementById("aux").value;

    $("#apresenta_Tratamentos").html("<p>Aguardando...</p>");
    $.ajax({
      type: "POST",
      dataType: "json",
      url:
        "tratamentosAbrirProntuario.php?prontuario=" +
        valorAjax +
        "&consulta=" +
        click,
      success: function (dados) {
        if (dados !== null && dados !== "Sem resultados") {
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
              "&prontuario=" +
              dados[i].prontuario +
              '" ><img src="./includes/img/pdf.2.png" width="35" height="40"></a></td>\n\
                                </tr></tbody>';
          }
          $("#apresenta_Tratamentos").html(tabela).show();
          $("#mostraTitulo").html("TRATAMENTOS").show();
        } else {
          $("#apresenta_Tratamentos")
            .html('<p class="text-danger">Nenhum tratamento cadastrado<p>')
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
  document.getElementById("apresenta_Consultas").innerHTML = "";
  document.getElementById("apresenta_DadosCadastrais").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = "";
  var valorAjax = document.getElementById("aux").value;
  
  $("#apresenta_Fotos").html("<p>Aguardando...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "fotoAbrirProntuario.php?prontuario=" + valorAjax + "&antesDepois=1",
    success: function (dados) {
      if (dados !== null) {
          var p = valorAjax;
          var agora= new Date();
          var ano= agora.getFullYear();
          var h= agora.getHours();
          var m= agora.getMinutes();
          var s= agora.getMilliseconds();
          
      var tabela = '<div><form method="post" action="prontuario.php?paciente=' + p +'" enctype="multipart/form-data">\n\
                                  <input required class="btn btn-dark" type="file" name="foto"><br><br>\n\
                                  <input hidden type="text" name="titulo" value="antes_' + p +'_'+ano+''+h+''+m+''+s+'">\n\
                                  <input class="btn btn-success" type="submit" name="cadFoto" value="Enviar Foto">\n\
                                 </form><hr></div>';
          
        for (var i = 0; i < dados.length; i++) {
            if (dados[i].img=="semFoto"){
                        var semFoto="hidden";
                        var semFotoB="";
                        var semFotoT='';
                    }else{
                        semFoto="";
                        semFotoB="btn btn-warning";
                        semFotoT='width="100" height="100"';
                    }
            var nome = dados[i].img.substring(8);
          tabela +='<div class="row">\n\
                        <div class="col-5" >\n\
                            <img '+semFoto+' src="' +dados[i].img +'" alt="" '+semFotoT+'>\n\
                     </div>\n\
                     <div class="col-4">\n\
                            <form method="post" action="prontuario.php?paciente=' + p +'" enctype="multipart/form-data">\n\
                                  <input  hidden type="text" name="idImg" value="'+dados[i].idFoto+'">\n\
                                  <input hidden type="text" name="nome" value="'+nome+'">\n\
                                  <input'+semFoto+' class="'+semFotoB+'" type="submit" name="delFoto" value="Excluir Foto">\n\
                            </form>\n\
                        </div>\n\
                    </div><hr>';
      
      }
      $("#apresenta_Fotos").html(tabela).show();
    }
  }

});
}

function FotoDepois() {
  document.getElementById("apresenta_Consultas").innerHTML = "";
  document.getElementById("apresenta_DadosCadastrais").innerHTML = "";
  document.getElementById("apresenta_Tratamentos").innerHTML = "";
  document.getElementById("mostraTitulo").innerHTML = "";
  var valorAjax = document.getElementById("aux").value;
  
  $("#apresenta_Fotos").html("<p>Aguardando...</p>");
  
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "fotoAbrirProntuario.php?prontuario=" + valorAjax + "&antesDepois=2",
    success: function (dados) {
      if (dados !== null) {
          var p = valorAjax;
          var agora= new Date();
          var ano= agora.getFullYear();
          var h= agora.getHours();
          var m= agora.getMinutes();
          var s= agora.getMilliseconds();
          
      var tabela = '<div><form method="post" action="" enctype="multipart/form-data">\n\
                                  <input required class="btn btn-dark" type="file" name="foto"><br><br>\n\
                                  <input hidden type="text" name="titulo" value="depois_' + p +'_'+ano+''+h+''+m+''+s+'">\n\
                                  <input class="btn btn-success" type="submit" name="cadFoto" value="Enviar Foto">\n\
                                 </form><hr></div>';
          
        for (var i = 0; i < dados.length; i++) {
                    if (dados[i].img=="semFoto"){
                        var semFoto="hidden";
                        var semFotoB="";
                        var semFotoT='';
                    }else{
                        semFoto="";
                        semFotoB="btn btn-warning";
                        semFotoT='width="300" height="250"';
                    }
            var nome = dados[i].img.substring(8);
          tabela +='<div class="row">\n\
                        <div class="col-5" >\n\
                            <img '+semFoto+' src="' +dados[i].img +'" alt="" '+semFotoT+'>\n\
                     </div>\n\
                     <div class="col-4">\n\
                            <form method="post" action="prontuario.php?paciente=' + p +'" enctype="multipart/form-data">\n\
                                  <input  hidden type="text" name="idImg" value="'+dados[i].idFoto+'">\n\
                                  <input hidden type="text" name="nome" value="'+nome+'">\n\
                                  <input'+semFoto+' class="'+semFotoB+'" type="submit" name="delFoto" value="Excluir Foto">\n\
                            </form>\n\
                        </div>\n\
                    </div><hr>';
                        
      }
      $("#apresenta_Fotos").html(tabela).show();
    }
  }
});
}
