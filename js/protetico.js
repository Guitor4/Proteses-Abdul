function getServicoTerceiro(valor) {
    var valorAjax = valor;
    $('#servico_terceiro').html('<option value = 0>Aguardando...</option');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'TerceiroServico.php?id_terceiro=' + valorAjax,
        success: function(dados) {
            if (dados != null) {
                var options = "<option value='' hidden>Escolher Servico</option>";
                for (var i = 0; i < dados.length; i++) {
                    options += '<option value="' + dados[i].id + '">' + dados[i].nomeServico + '</option>';
                }
                if (valorAjax != 0) {
                    $('#servico_terceiro').html(options).show();
                }
            }
        }
    })
}
function habilitar() {
    if (document.getElementById('denteOuro').checked) {
        document.getElementById('qtdOuro').removeAttribute("disabled");
    } else {
        document.getElementById('qtdOuro').value = "";
        document.getElementById('qtdOuro').setAttribute("disabled", "disabled");
    }
}
/*$(function(){
    let = identificacao = document.querySelector("#identificacao").value;
    console.log(identificacao);
    $("#busca").autocomplete({
        source:"autoComplete.php?teste=" + identificacao 
    });
});*/



//apresenta dados cadastrais ao carregar a página.
//$(window).on("load", 
function loadDados(){
     
   var valorAjax = document.getElementById('aux').value;
    
    $('#apresenta_DadosCadastrais').html('<p>Aguardando...</p>');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'prontuarioAbrirProntuario.php?prontuario=' + valorAjax,
        success: function(dados) {
            if (dados !== null) {
                var p,n,s,t,e;
                for (var i = 0; i < dados.length; i++) {
                    p=dados[i].prontuario;
                    n=dados[i].nomePaciente;
                    s=dados[i].sexo;
                    t=dados[i].telefone;
                    e=dados[i].email;
                }
                var labels = '<div class="row">\n\
                                <div class="col-8 mt-2">\n\
                                    <label>Prontuário: </label><input readonly type="text" class="form-control"  value="'+p+'">\n\
                                    <label>Paciente: </label><input readonly type="text" class="form-control"  value="'+n+'">\n\
                                    <label>Sexo: </label><input readonly type="text" class="form-control"  value="'+s+'">\n\
                                    <label>Telefone: </label><input readonly type="text" class="form-control"  value="'+t+'">\n\
                                    <label>E-mail: </label><input readonly type="text" class="form-control"  value="'+e+'">\n\
                                </div>\n\
                                <div class="col-2 offset-1 mt-5" >\n\
                                    <img src="./includes/img/usuario.png" alt="" width="150" height="100">\n\
\n\                                 <form method="post" action="prontuario.php" enctype="multipart/form-data">\n\
                                        <label>Nome: </label><br>\n\
                                        <input type="text" name="nome"><br>\n\
                                        <input type="file" name="fotoPerfil"><br>\n\
                                        <input type="submit" name="cadFotoPerfil" value="Cadastrar">\n\
\n\                                 </form>\n\
                                </div>\n\
                              </div>';
                
                
                $('#apresenta_DadosCadastrais').html(labels).show();
                
             
            }
               
            
        }
    })
}

function Dados_Cadastrais() {
    document.getElementById("apresenta_Consultas").innerHTML ="";
    document.getElementById("apresenta_Tratamentos").innerHTML ="";
    document.getElementById("mostraTitulo").innerHTML ="";
    var valorAjax = document.getElementById('aux').value;
    
    $('#apresenta_DadosCadastrais').html('<p>Aguardando...</p>');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'prontuarioAbrirProntuario.php?prontuario=' + valorAjax,
        success: function(dados) {
            if (dados !== null) {
                var p,n,s,t,e;
                for (var i = 0; i < dados.length; i++) {
                    p=dados[i].prontuario;
                    n=dados[i].nomePaciente;
                    s=dados[i].sexo;
                    t=dados[i].telefone;
                    e=dados[i].email;
                }
                var labels = '<div class="row">\n\
                                <div class="col-8 mt-2">\n\
                                    <label>Prontuário: </label><input readonly type="text" class="form-control"  value="'+p+'">\n\
                                    <label>Paciente: </label><input readonly type="text" class="form-control"  value="'+n+'">\n\
                                    <label>Sexo: </label><input readonly type="text" class="form-control"  value="'+s+'">\n\
                                    <label>Telefone: </label><input readonly type="text" class="form-control"  value="'+t+'">\n\
                                    <label>E-mail: </label><input readonly type="text" class="form-control"  value="'+e+'">\n\
                                </div>\n\
                                <div class="col-2 offset-1 mt-5">\n\
                                   <img src="./includes/img/usuario.png" alt="" width="150" height="100">\n\
                                   <form method="post" action="prontuario.php" enctype="multipart/form-data">\n\
                                        <input type="file" name="fotoPerfil"><br>\n\
                                        <input type="submit" name="cadFotoPerfil" value="Cadastrar">\n\
\n\                                 </form>\n\
                                </div>\n\
                              </div>';
                
                
                $('#apresenta_DadosCadastrais').html(labels).show();
                
                /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
            }
               
            
        }
    })
    
}



function Consultas() {
    document.getElementById("apresenta_DadosCadastrais").innerHTML ="";
    document.getElementById("apresenta_Tratamentos").innerHTML ="";
    document.getElementById("mostraTitulo").innerHTML ="";
    var valorAjax = document.getElementById('aux').value;
    
    $('#apresenta_Consultas').html('<p>Aguardando...</p>');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'consultasAbrirProntuario.php?prontuario=' + valorAjax,
        success: function(dados) {
            if (dados !== null && dados !== 'Sem resultados') {
                
                var tabela = '<thead><tr><th>Consulta</th>\n\
                                    <th>Data</th>\n\
                                    <th>Hora</th>\n\
                                    <th>Status</th>\n\
                                    <th>Clínica</th>\n\
                                    <th>Dentista</th>\n\
                                    <th>Ação</th>\n\
                                    </tr>\n\
                              </thead>';
                for (var i = 0; i < dados.length; i++) {
                    tabela+= '<tbody><tr>\n\
                                <td class "table-success"> ' + dados[i].id + '</td>\n\
                                <td class "table-success">' + dados[i].data + '</td>\n\
                                <td class "table-success">' + dados[i].hora + '</td>\n\
                                <td class "table-success">' + dados[i].status + '</td>\n\
                                <td class "table-success">' + dados[i].clinica + '</td>\n\
                                <td class "table-success">' + dados[i].dentista + '</td>\n\
                                <td class "table-success"><a class="btn btn-outline-primary" data-toggle="collapse"  onclick="Tratamentos(' +dados[i].id+ ')" role="button" aria-expanded="false" aria-controls="apresenta_Tratamentos" > Abrir </a></td>\n\
                                </tr></tbody>';
                    //$('#apresentaProntuario').append('<tbody><tr><td class "table-success">' + dados[i].prontuario + '</td></tr></tbody>');
                    
                }
                $('#apresenta_Consultas').html(tabela).show();
                document.getElementById("mostraTitulo").innerHTML ="";
                
                /*if (valorAjax !== 0) {
                    $('#apresentaProntuario').html(tabela).show();
                }*/
            }else{
                $('#apresenta_Consultas').html('<p class="text-danger">Nenhuma consulta cadastrada</p>').show();
                document.getElementById("mostraTitulo").innerHTML ="";
            }
        }
    })
}



function Tratamentos(id) {
   //document.getElementById("apresenta_Tratamentos").innerHTML ="";
    document.getElementById("apresenta_DadosCadastrais").innerHTML ="";
    
    var click=id;
    
    if (click!==iclick){
     iclick=click;
        
    var valorAjax = document.getElementById('aux').value;
    
    $('#apresenta_Tratamentos').html('<p>Aguardando...</p>');
    $.ajax({
        type: 'POST',
        dataType: "json",
        url: 'tratamentosAbrirProntuario.php?prontuario=' + valorAjax+ '&consulta=' +click,
        success: function(dados) {
            if (dados !== null && dados !== 'Sem resultados') {
                
                var tabela = '<thead><tr><th>Procedimento</th>\n\
                                    <th>Ação</th>\n\
                                    </tr>\n\
                              </thead>';
                for (var i = 0; i < dados.length; i++) {
                    tabela+= '<tbody><tr>\n\
                                <td class "table-success">'+ dados[i].nomeT + '</td>\n\
                                <td class "table-success"><a class="btn btn-outline-primary" href="tratamentoPDF.php?idProcedimento='+ dados[i].idProcedimento +'&consulta='+ dados[i].idC +'&prontuario='+ dados[i].prontuario+'" ><img src="./includes/img/pdf.2.png" width="35" height="40"></a></td>\n\
                                </tr></tbody>';
                    
                }
                $('#apresenta_Tratamentos').html(tabela).show();
                $('#mostraTitulo').html("TRATAMENTOS").show();
                
            }else{
                $('#apresenta_Tratamentos').html('<p class="text-danger">Nenhum tratamento cadastrado<p>').show();
                document.getElementById("mostraTitulo").innerHTML ="";
            }
        }
    })
}else{
    document.getElementById("apresenta_Tratamentos").innerHTML ="";
    document.getElementById("mostraTitulo").innerHTML ="";
    iclick=0;
    //document.getElementById("click").value=id;
    
}
}

