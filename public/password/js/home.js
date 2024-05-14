$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

window.onload = function () {
    let date = new Date();

    // Formata a data no formato yyyy-mm-dd
    let dateString = date.toISOString().substring(0, 10);

    el = document.getElementById("data_confirma");
    anos = document.getElementById("year")

    if(el){
        el.value = dateString;
        verifica_confirmacao();
        busca_colaboradores();
    }else{
        CarregandoDatas();
        contaCredito();
    }

   
};

function confirmaPresenca() {
    data_confirma = document.getElementById("data_confirma").value;

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/confirma",
        data: {
            data_confirma: data_confirma,
        },
        beforeSend: function () {
            Swal.fire({
                title: "Confirmando presença...",
                icon: "info",
                allowOutsideClick: false,
                showConfirmButton: false,
            });
        },
    }).done(function (data) {
        Swal.close();
        busca_colaboradores();
        verificaSaldo();
        verifica_confirmacao();
        Swal.fire({
            icon: "success",
            title: "Presença confirmada!",
            showConfirmButton: false,
            timer: 1500,
        });
    });
}

function cancela_presenca() {
    data_confirma = document.getElementById("data_confirma").value;

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/cancela_inscricao",
        data: {
            data_confirma: data_confirma,
        },
        beforeSend: function () {
            Swal.fire({
                title: "Cancelando presença...",
                icon: "info",
                allowOutsideClick: false,
                showConfirmButton: false,
            });
        },
    }).done(function (data) {
        busca_colaboradores();
        verificaSaldo();
        verifica_confirmacao();
        Swal.close();

        Swal.fire({
            icon: "success",
            title: "Presença cancelada!",
            showConfirmButton: false,
            timer: 1500,
        });
    });
}

function busca_colaboradores() {

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/busca_colaboradores",
        data: {},
    }).done(function (data) {
        atualiza_lista_de_confirmados(data);
    });
}

function atualiza_lista_de_confirmados(data) {
    lista_confirmados = document.getElementById("lista_confirmados").innerHTML =
    "";
    
    if (data.length == 0) {
        lista_confirmados = document.getElementById("lista_confirmados");
        colab = `<button type="button" class="list-group-item list-group-item-action">Ainda não há confirmados</button>`;
        lista_confirmados.innerHTML += colab;
    } else {
        data.forEach((colab) => {
            lista_confirmados = document.getElementById("lista_confirmados");

            colab = `<button type="button" class="list-group-item list-group-item-action">${colab.colaborador}</button>`;

            lista_confirmados.innerHTML += colab;
        });
    }
}

function verifica_confirmacao() {
    conteudo = `<a id="carregamento"> <div class="spinner-border" role="status"<span class="visually-hidden"></span></div></a>`;

    div_confirma.innerHTML = conteudo;

    dia = document.getElementById("data_confirma").value;

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/verifica_inscricao",
        data: {
            dia: dia,
        },
    }).done(function (data) {
        div_confirma = document.getElementById("div_confirma");

        if (data == 2) {
            conteudo = `<a onclick="confirmaPresenca()">Confirmar</a>`;

            div_confirma.innerHTML = conteudo;
        } else if (data == 1) {
            conteudo = `<btn class="btn btn-danger rounded-pill" onclick="cancela_presenca()">Cancelar presença</btn>`;

            div_confirma.innerHTML = conteudo;
        } else {
            Swal.fire({
                icon: "error",
                title: "Erro , contate o administrador da pagina!",
                showConfirmButton: false,
                timer: 1500,
            });
        }
    });
}

function contaCredito() {

    document.getElementById("body_table").innerHTML = `<tr> <td></td><td>Carregando...</td></tr>`
    
    mes = document.getElementById('month').value;
    year = document.getElementById('year').value;

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/contaCredito",
        data:{
            mes: mes,
            year: year
        }
    }).done(function (data) {

        document.getElementById("body_table").innerHTML = ""

        if(data.length > 0){
            data.forEach(usuario => {
                document.getElementById("body_table").innerHTML += `<tr>
                <td>${usuario.name}</td>
                <td>${usuario.Registros}</td>
                <td><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="detalhes_credito(${usuario.id})" >Gerenciar</button></td>
            </tr>`;
                
            });
        }else{
            document.getElementById("body_table").innerHTML = `<tr> <td></td><td>Nenhum registro encontrado</td></tr>`
        }
     
      
    });
}

function detalhes_credito(id){


    document.getElementById("body_table_detalhes").innerHTML = `<tr> <td></td><td>Carregando...</td></tr>`

    mes = document.getElementById('month').value;
    year = document.getElementById('year').value;

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/detalhes_credito",
        data: {
            id: id,
            mes: mes,
            year: year
        }
    }).done(function (data) {

        document.getElementById("body_table_detalhes").innerHTML = ""

        if(data.length > 0 ){
            data.forEach(usuario => {

                if(usuario.situacao == 'PEND'){
                    situacao = `<i class="bi bi-x-circle-fill"></i>`
                    acao = `<button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"  onclick="registra_pagamento(${usuario.id})">Registrar pagamento</button>`
                }else 
                if(usuario.situacao == 'OK'){
                    situacao = `<i class="bi bi-check-circle-fill"></i>`
                    acao =  `<i class="bi bi-check-circle-fill"></i>`
                }else{
                    situacao = ` <i class="bi bi-x-circle-fill"></i>`
                    acao =  `<i class="bi bi-x-circle-fill"></i>`
                }
    
                document.getElementById("body_table_detalhes").innerHTML += `<tr>
                <td>${usuario.dia}</td>
                <td>${situacao}</td>
                <td>${acao}</td>
            </tr>`;
                
            });
        }else{
            document.getElementById("body_table_detalhes").innerHTML = `<tr> <td></td><td>Nenhum registro encontrado</td></tr>`
        }

     
        
        
      
    });

}

function registra_pagamento(id){


    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
         data: {
            id: id
        },
        method: "get",
        url: "/registraPag",
    }).done(function (data) {
        detalhes_credito()
    });                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       

}

function CarregandoDatas(){
    
    if(anos){
           
    var currentYear = (new Date).getFullYear();
    for (var i = 2020; i <= currentYear; i++) {
   var option = document.createElement("option");
   option.value = i;
   option.text = i;
   document.getElementById("year").appendChild(option);
   }

   var data = new Date();

   document.getElementById("year").value = data.getFullYear();
   document.getElementById("month").value = (data.getMonth() + 1);

   console.log( document.getElementById("month").value)
    }   
 
}

function TabelaUsuarios(){

    document.getElementById("tabela_usuarios_detalhes").innerHTML = `<tr> <td></td><td>Carregando...</td></tr>`

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/usuarios",
    }).done(function (data) {

        console.log(data)

        document.getElementById("tabela_usuarios_detalhes").innerHTML = ""

        if(data.length > 0 ){
            data.forEach(usuario => {
                console.log(usuario.ADM)
                if(usuario.ADM == 'S'){

                    adm = `<input id="${usuario.id}" onchange="PermissaoAdm(${usuario.id})"  class="form-check-input checked" type="checkbox" checked></input>`
                }else {
                    adm = `<input id="${usuario.id}" onchange="PermissaoAdm(${usuario.id})" class="form-check-input" type="checkbox" ></input>`
                }
    
                document.getElementById("tabela_usuarios_detalhes").innerHTML += `<tr>
                <td>${usuario.id}</td>
                <td>${usuario.name}</td>
                <td>${usuario.email}</td>
                <td>${adm}</td>
            </tr>`;
                
            });
        }else{
            document.getElementById("tabela_usuarios_detalhes").innerHTML = `<tr> <td></td><td>Nenhum registro encontrado</td></tr>`
        }
    });

}

function PermissaoAdm(id){

    console.log('oiii')

    const checkbox = document.getElementById(id);

    if(checkbox.checked) {
       tipo = 1
    } else {
       tipo = 2
    }


    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/PermissaoAdm",
        data:{
             tipo: tipo,
             id: id 
        }
    }).done(function (data) {

    }); 

}

function AdicionaCreditosColab(){
   id =  document.getElementById('id_usuario_credito').value 
   numeroCreditos = document.getElementById('numero_creditos').value 

   $.ajax({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    method: "get",
    url: "/AdicionaCreditosColab",
    data: {
        id: id,
        numeroCreditos: numeroCreditos
    },
}).done(function (data) {

    if(data == 1){
          Swal.fire({
            icon: "success",
            title: "Adicionado com sucesso",
            showConfirmButton: false,
            timer: 1500,
        });
    }else{
        Swal.fire({
            icon: "error",
            title: "usuario não encontrado",
            showConfirmButton: false,
            timer: 1500,
        });
    }

      
    
});

}

function verificaSaldo(){
    
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/verificaSaldo",
        data:{
             
        }
    }).done(function (data) {
        document.getElementById('saldo').innerHTML =  `&nbsp;${data}&nbsp;` 
    }); 

}


function HistoricoRegistros(){
    console.log('oi')
     
    document.getElementById("body_table_detalhes_historico").innerHTML = `<tr> <td>Carregando...</td></tr>`

    const input = document.querySelector('#data_pesq');
    const dataSelecionada = input.value;

    const mesSelecionado = dataSelecionada.split('-')[1];
    const anoSelecionado = dataSelecionada.split('-')[0];


    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        method: "get",
        url: "/HistoricoReg",
        data: {
            mes: mesSelecionado,
            year: anoSelecionado
        }
    }).done(function (data) {

        document.getElementById("body_table_detalhes_historico").innerHTML = ""

        if(data.length > 0 ){
            data.forEach(usuario => {
    
                document.getElementById("body_table_detalhes_historico").innerHTML += `<tr>
                <td>${usuario.dia}</td>
            </tr>`;
                
            });
        }else{
            document.getElementById("body_table_detalhes_historico").innerHTML = `<tr><td>Nenhum registro encontrado</td></tr>`
        }

    });

}

$(document).ready(function() {
    // Adiciona o listener para o evento 'shown.bs.modal' da modal 'HistoricoRegistros'
    $('#HistoricoRegistros').on('shown.bs.modal', function() {
      // Chama a função 'HistoricoRegistros' quando a modal for exibida
      HistoricoRegistros();
    });
  
    // Adiciona o listener para o evento 'change' do elemento 'data_pesq'
    $('#data_pesq').on('change', function() {
      // Chama a função 'HistoricoRegistros' quando houver mudanças no elemento 'data_pesq'
      HistoricoRegistros();
    });
  });