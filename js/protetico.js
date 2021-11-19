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

$("#reset").click(function () {
  console.log("teste");
  $("#formularioConsulta").reset();
});

function getHorarios(valor) {
  var valorAjax = valor;
  $("#horarios").html("<option value = 0>Aguardando...</option");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "horarios.php?data=" + valorAjax,
    success: function (dados) {
      var options = "";
      if (dados != null) {
        for (var i = 0; i < dados.length; i++) {
          options += "<option>" + dados[i].horario + "</option>";
        }
        options += "<option value='' hidden >Sem horários disponíveis</option>";
        $("#horarios").html(options).show();
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
var data = new Date();
function preencherListaHome() {
  $("#to_do_list").html('<p style="color:white">Aguardando...</p>');
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "preencherListaHome.php?data=" + data,
    success: function (dados) {},
    error: function () {
      alert("oi2");
      var lista = "<a href=\"#\" class=\"list-group-item list-group-item-action \" aria-current=\"true\"><div class=\"d-flex w-100 justify-content-between\"><h5 class=\"mb-1\">Sem Tarefas para hoje por enquanto</h5><small>Today</small></div><p class=\"mb-1\">Caso ainda não tenha feito, alimente o banco </p><small>Em caso de erro gritar é contra indicado.</small></a>"
      $("#to_do_list").html(lista);
    },
  });
}

//apresenta dados cadastrais ao carregar a página.
//$(window).on("load",
function loadDados() {
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_DadosCadastrais").html("<p>Aguardando...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "prontuarioAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      if (dados !== null) {
        var p, n, s, t, e;
        for (var i = 0; i < dados.length; i++) {
          p = dados[i].prontuario;
          n = dados[i].nomePaciente;
          s = dados[i].sexo;
          t = dados[i].telefone;
          e = dados[i].email;
        }
        var labels =
          '<div class="row">\n\
                                <div class="col-8">\n\
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
                                <div class="col-2">\n\
                                    <img src="./includes/img/usuario.png" alt="" width="150" height="100">\n\
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
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_DadosCadastrais").html("<p>Aguardando...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "prontuarioAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      if (dados !== null) {
        var p, n, s, t, e;
        for (var i = 0; i < dados.length; i++) {
          p = dados[i].prontuario;
          n = dados[i].nomePaciente;
          s = dados[i].sexo;
          t = dados[i].telefone;
          e = dados[i].email;
        }
        var labels =
          '<div class="row">\n\
                                <div class="col-8">\n\
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
                                <div class="col-2">\n\
                                    <img src="./includes/img/usuario.png" alt="" width="150" height="100">\n\
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
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_Consultas").html("<p>Aguardando...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "consultasAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      if (dados !== null) {
        var tabela =
          "<thead><tr><th>Consulta</th>\n\
                                    <th>Data</th>\n\
                                    <th>Hora</th>\n\
                                    <th>relatório</th>\n\
                                    <th>Status</th>\n\
                                    <th>Clínica</th>\n\
                                    <th>Dentista</th>\n\
                                    <th>Procedimento</th>\n\
                                    </tr>\n\
                              </thead>";
        for (var i = 0; i < dados.length; i++) {
          tabela +=
            '<tbody><tr>\n\
                                <td class "table-success" ><input class="btn btInput p- d-flex " value="' +
            dados[i].id +
            '"></td>\n\
                                <td class "table-success">' +
            dados[i].data +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].hora +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].relatorio +
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
                                <td class "table-success">' +
            dados[i].procedimento +
            "</td>\n\
                                </tr></tbody>";
          //$('#apresentaProntuario').append('<tbody><tr><td class "table-success">' + dados[i].prontuario + '</td></tr></tbody>');
        }
        $("#apresenta_Consultas").html(tabela).show();

        /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
      }
    },
  });
}

function Tratamentos() {
  document.getElementById("apresenta_DadosCadastrais").innerHTML = "";
  document.getElementById("apresenta_Consultas").innerHTML = "";
  var valorAjax = document.getElementById("aux").value;

  $("#apresenta_Tratamentos").html("<p>Aguardando...</p>");
  $.ajax({
    type: "POST",
    dataType: "json",
    url: "tratamentosAbrirProntuario.php?prontuario=" + valorAjax,
    success: function (dados) {
      if (dados !== null) {
        var tabela =
          "<thead><tr><th>Procedimento</th>\n\
                                    <th>Obs</th>\n\
                                    <th>Consulta</th>\n\
                                    <th>Data</th>\n\
                                    <th>Hora</th>\n\
                                    </tr>\n\
                              </thead>";
        for (var i = 0; i < dados.length; i++) {
          tabela +=
            '<tbody><tr>\n\
                                <td class "table-success">' +
            dados[i].nomeT +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].obsT +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].idC +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].dataC +
            '</td>\n\
                                <td class "table-success">' +
            dados[i].horaC +
            "</td>\n\
                                </tr></tbody>";
          //$('#apresentaProntuario').append('<tbody><tr><td class "table-success">' + dados[i].prontuario + '</td></tr></tbody>');
        }
        $("#apresenta_Tratamentos").html(tabela).show();

        /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
      }
    },
  });
}
