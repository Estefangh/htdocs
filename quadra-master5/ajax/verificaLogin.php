<?php
session_start();
include_once "../includes/conexao.php";

$user = $_POST['user'];
$senha = md5($_POST['senha']);


$existeUsuario = 0;

$tipoUser ='';

//usuario
 $verificaUsuarioEmail = $con->prepare("SELECT id_usuario FROM usuarios WHERE email = '$user' AND senha = '$senha' ");
 $verificaUsuarioEmail->execute();
  $existeUsuarioEmail = $verificaUsuarioEmail->rowCount();
   if($existeUsuarioEmail > 0){
       $existeUsuario = 1;

       foreach($verificaUsuarioEmail as $usuarioEmail){
        $_SESSION['usuarioID'] = $usuarioLogin['id_usuario'];
        $_SESSION['tipouser'] = 'usuario';
        $tipoUser = 0;
       }
   }

   $verificaUsuarioLogin = $con->prepare("SELECT id_usuario FROM usuarios WHERE login = '$user' AND senha = '$senha' ");
   $verificaUsuarioLogin->execute();
    $existeUsuarioLogin = $verificaUsuarioLogin->rowCount();
     if($existeUsuarioLogin > 0){
         $existeUsuario = 1;
         foreach($verificaUsuarioLogin as $usuarioLogin){
             $_SESSION['usuarioID'] = $usuarioLogin['id_usuario'];
             $_SESSION['tipouser'] = 'usuario';
            $tipoUser = 0;
        }

     }

     // estabelecimento


 $verificaEstabEmail = $con->prepare("SELECT id_estabelecimento FROM estabelecimentos WHERE email = '$user' AND senha = '$senha' ");
 $verificaEstabEmail->execute();
  $existeEstabEmail = $verificaEstabEmail->rowCount();
   if($existeEstabEmail > 0){
       $existeUsuario = 1;

       foreach($verificaEstabEmail as $usuarioEmail){
        $_SESSION['usuarioID'] = $usuarioEmail['id_estabelecimento'];
        $_SESSION['tipouser'] = 'ginasio';
       $tipoUser = 1;
       }
   }

   $verificaUsuarioLogin = $con->prepare("SELECT id_estabelecimento FROM estabelecimentos WHERE login = '$user' AND senha = '$senha' ");
   $verificaUsuarioLogin->execute();
    $existeUsuarioLogin = $verificaUsuarioLogin->rowCount();
     if($existeUsuarioLogin > 0){
         $existeUsuario = 1;
         foreach($verificaUsuarioLogin as $usuarioLogin){
             $_SESSION['usuarioID'] = $usuarioLogin['id_estabelecimento'];
             $_SESSION['tipouser'] = 'ginasio';
            $tipoUser = 1;
        }

     }


// echo $existeUsuario;

$dados[] = [
    'seExiste' => $existeUsuario,
    'tipoUser' => $tipoUser
    
    ];
    
        echo json_encode($dados);



?>