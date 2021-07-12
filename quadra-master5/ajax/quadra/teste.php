<?php

if (!isset($seguranca)) {
    exit;
}
$SendCadCont = filter_input(INPUT_POST, 'SendCadCont', FILTER_SANITIZE_STRING);
if ($SendCadCont) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    //Validar nenhum campo vazio
    $erro = false;
    include_once 'lib/lib_vazio.php';
    include_once 'lib/lib_email.php';
    
    $dados_validos = vazio($dados);
    if (!$dados_validos) {
        $erro = true;
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Obrigatório anexar o cupom de compra</div>";
    }    
    

    //Houve erro em algum campo será redirecionado para o formulário, não há erro no formulário tenta cadastrar no banco
    if ($erro) {
        $_SESSION['dados'] = $dados;
        $url_destino = pg . "/home";
        header("Location: $url_destino");
    } else {


        $uploaddir = 'assets/imagens/cupom/'; //directório onde será gravado a imagem

        if(isset($_FILES['cupom']['name'])) {
            move_uploaded_file($_FILES['cupom']['tmp_name'], $uploaddir . $_FILES['cupom']['cupom']);
            // $uploadfile = $uploaddir . $_FILES['cupom']['cupom'];
            //grava na base de dados, no campo imagem, somente o nome da imagem que ficou gravado na variável $uploadfile que criamos acima.
        } else {
            //não foi possível concluir o upload da imagem.
        }




        $result_cont = "INSERT INTO sts_contatos
        (nome, email, cupom, created) VALUES
        ('" . $dados_validos['nome'] . "', '" . $dados_validos['email'] . "', '" . $dados_validos['cupom'] . "', NOW())";

        mysqli_query($conn, $result_cont);
        if (mysqli_insert_id($conn)) {
            $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Sua participação foi confirmada com sucesso!</div>";
            $url_destino = pg . "/home";
            header("Location: $url_destino");
        } else {
            $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro</div>";
            $url_destino = pg . "/home";
            header("Location: $url_destino");
        }
    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro</div>";
    $url_destino = pg . "/";
    header("Location: $url_destino");
}
