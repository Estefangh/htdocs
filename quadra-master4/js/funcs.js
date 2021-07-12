function verificaLogin(){
    const user = $('#user').val();
    const senha = $('#senha').val();
if(user != '' && senha != ''){
    $.post("ajax/verificaLogin.php", {
        user, senha
        },
          function(retorno){
         resp = $.parseJSON(retorno);
         if(resp[0].seExiste == 0){
            alert('Usuário não cadastrado');
         }
         if(resp[0].seExiste == 1){
                // tipo do usuario
                if(resp[0].tipoUser == 0){
                    //vai para tela de agendamento
                    location.href="agendamento.php";
                    // console.log('tela agendamento');
                }
                if(resp[0].tipoUser == 1){
                    //vai para tela de painel Ginasio
                    location.href="quadra.php";
                    // console.log('tela painel Ginasio');
                }
         }
        
          }
       )
}else{
    alert('Verifique os campos e tente novamente');
}


}




// clicks painels
  
 function conteudoCadastro(){
    $.post("ajax/painel/conteudoCadastro.php", {
        
        },
          function(retorno){
        $("#flush-collapseOne").html(retorno);
          }
       )
 }

 function deletarConta(){
    Swal.fire({
        title: 'Deseja deletar sua conta?',
        text: "Não terá mais acesso a essa conta.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim, deletar!',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.isConfirmed) {
            $.post("ajax/painel/deletarConta.php", {
        
            },
              function(deletou){
                if(deletou == 0){
                  alert('Ocorreu um problema, tente novamente');
                }
                if(deletou == 1){
                  location.href="index.php";
                }

                 
              }
           )
        }
      })
 }

 function logout(){
  $.post("ajax/painel/logout.php", {
        
  },
    function(retorno){
  location.href='index.php';
    }
 )
 }

//  functions painel
 
function editarCadastro(tipoUsuario){



if(tipoUsuario == 'usuario'){
    const nome = $('#nomeUser').val();
    const email = $('#email').val();
    const telefone = $('#telefone').val();
    const dnasc = $('#dnasc').val();
    const cpf = $('#cpf').val();
    const endereco = $('#endereco').val();
    const senha = $('#senhaUser').val();

if(nome != ''  && email != '' && 
    telefone != '' && dnasc != '' &&
    cpf != '' && endereco != ''){
    $.post("ajax/painel/editarUsuario.php", {
        nome, email, telefone, dnasc, cpf, endereco, senha
    },
      function(retorno){
        alert('Dados atualizados');
        conteudoCadastro();
      }
   )

}

    }
    if(tipoUsuario == 'ginasio'){
        const nome = $('#nomeGinasio').val();
        const email = $('#emailGinasio').val();
        const telefone = $('#telefoneGinasio').val();
        const cpf = $('#cpfGinasio').val();
        const endereco = $('#enderecoGinasio').val();
        const senha = $('#senhaGinasio').val();
    
    if(nome != '' && email != '' && 
        cpf != '' && endereco != '' ){
        $.post("ajax/painel/editarEstabelecimento.php", {
            nome, email, telefone, cpf, endereco, senha
        },
          function(retorno){
            alert('Dados atualizados');
            conteudoCadastro();
          }
       )
    
    }
    
        }


}



//functions Quadra

function conteudoCadQuadra(){
  $.post("ajax/quadra/conteudoCadQuadra.php", {
        
  },
    function(retorno){
  $("#conteudoQuadra").html(retorno);
    }
 )
}


function cadastrarQuadra(){
  
  var horaIni = $('#horarioInicial').val();
  var horaFin = $('#horarioFinal').val();
  var tipoQuadra = $('#tipoQuadra').val();

  if(horaIni != '' && horaFin != '' ){


  var file = $('#formFile')[0].files[0];
  var fd = new FormData();
  fd.append('file', file);
  fd.append('horaIni', horaIni);
  fd.append('horaFin', horaFin);
  fd.append('tipoQuadra', tipoQuadra);
  $.ajax({
      url: 'ajax/quadra/cadastraQuadra.php',
      type: 'POST',
      processData: false,
      contentType: false,
      data: fd,
      success: function (data) {
          location.href='quadra.php';
      }
  });


  }else{
    alert('Preencha todos os campos');
  }

}


function deletarQuadra(quadra){

  Swal.fire({
    title: 'Deseja deletar essa quadra?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, deletar!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("ajax/quadra/deletarQuadra.php", {
        quadra
            
      },
        function(){
      location.href="quadra.php";

        }
     )
    }
  })
}


function editarQuadra(quadra){
  $.post("ajax/quadra/conteudoEditarQuadra.php", {
      quadra
  },
    function(retorno){
  $("#conteudoQuadra").html(retorno);
    }
 )
}


function updateQuadra(quadra){
  
  var horaIni = $('#horarioInicial').val();
  var horaFin = $('#horarioFinal').val();
  var tipoQuadra = $('#tipoQuadra').val();

  if(horaIni != '' && horaFin != '' ){


  var file = $('#formFile')[0].files[0];
  var fd = new FormData();
  fd.append('file', file);
  fd.append('idQuadra', quadra);
  fd.append('horaIni', horaIni);
  fd.append('horaFin', horaFin);
  fd.append('tipoQuadra', tipoQuadra);
  $.ajax({
      url: 'ajax/quadra/updateQuadra.php',
      type: 'POST',
      processData: false,
      contentType: false,
      data: fd,
      success: function (data) {
          // console.log(data);
          location.href="quadra.php";
      }
  });


  }else{
    alert('Preencha todos os campos');
  }

}


// AGENDAMENTO 

function conteudoModalAgendamento(quadra){
  $.post("ajax/agendamento/conteudoModalAgendamento.php", {
    quadra
},
  function(retorno){
$("#bodyModal").html(retorno);
  }
)  
}



function confirmaAgendamento(quadra){
  const horario = $('#sltAgendamento').val();

$.post("ajax/agendamento/confirmaAgendamento.php", {
    horario,quadra
  },
  function(retorno){
    if(retorno == 0){
      alert('Desculpe, esse horário não está mais diponível.')
    }
    if(retorno == 1){
      alert('O horário foi agendado com sucesso!');
      location.href="agendamento.php";
    }

    if(retorno == 2){
      alert('Ocorreu um erro. Por favor, tente novamente.')
    }
  }
)  
  
}


function cancelarAgendamento(agendamento){

  Swal.fire({
    title: 'Deseja cancelar esse agendamento?',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sim, cancelar!',
    cancelButtonText: 'Voltar'
  }).then((result) => {
    if (result.isConfirmed) {
      $.post("ajax/painel/cancelarAgendamento.php", {
        agendamento
            
      },
        function(){
      location.reload();

        }
     )
    }
  })
}
