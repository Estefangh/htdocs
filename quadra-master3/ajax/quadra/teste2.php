<?php header ('Content-type: text/html; charset=UTF-8');
?>
<?php
if (!isset($seguranca)) {
    exit;
}
include_once 'app/sts/header.php';
?>

<body>
    <?php
    include_once 'app/sts/menu.php';
    ?>
    <main role="main">
        <?php
        $result_carousels = "SELECT car.*,
                cor.cor
                FROM sts_carousels car
                INNER JOIN sts_cors cor ON cor.id=car.sts_cor_id
                WHERE car.sts_situacoe_id=1
                ORDER BY ordem ASC";
        $resultado_carousels = mysqli_query($conn, $result_carousels);
        if (($resultado_carousels) AND ( $resultado_carousels->num_rows != 0)) {
            ?>
            
            
            <?php
        $result_prod_home = "SELECT * FROM sts_prods_homes LIMIT 1";
        $resultado_prod_home = mysqli_query($conn, $result_prod_home);
        $row_prod_home = mysqli_fetch_assoc($resultado_prod_home);
        ?>
        <div class="jumbotron produto">
            <div class="container">
                <div class="row featurette">
                    <div class="col-md prod-img">
                        <center><img class="featurette-image img-fluid mx-auto" src="assets/imagens/promocao.png" width="500" height="500" alt=""></center>
                    </div>
                    
                </div>
            </div>
        </div>	
            <?php
        }
        $result_servico = "SELECT * FROM sts_servicos LIMIT 1";
        $resultado_servico = mysqli_query($conn, $result_servico);
        $row_servico = mysqli_fetch_assoc($resultado_servico);
        ?>
        
        
        
  
    
    <div class="container">
        
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                //var_dump($_SESSION['dados']);
                ?>
                <?php
$uploaddir = 'assets/imagens/cupom/'; //directório onde será gravado a imagem

if (move_uploaded_file($_FILES['cupom']['tmp_name'], $uploaddir . $_FILES['cupom']['cupom'])) {
    $uploadfile = $uploaddir . $_FILES['cupom']['cupom'];
    //grava na base de dados, no campo imagem, somente o nome da imagem que ficou gravado na variável $uploadfile que criamos acima.
} else {
    //não foi possível concluir o upload da imagem.
}
?>
                <div class="dados">
               <div class="box">
                <form method="POST" action="<?php echo pg . '/proc_cad_contato'; ?>">
                    
                        <div class="form-group">
                            <label>SEU NOME</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php if (isset($_SESSION['dados']['nome'])) {
                    echo $_SESSION['dados']['nome'];
                } ?>" required>
                        </div>
                        <div class="form-group">
                            <label>SEU TELEFONE</label>
                            <input type="tel" name="email" class="form-control" placeholder="Seu telefone" required>
                        </div>
                    </div>
                    <div class='input-wrapper'>
            <label for='input-file'><i class="fas fa-camera"></i> ENVIAR FOTO DO CUPOM*</label>
            <input id='input-file' name="cupom" type='file' value=''>
    <span id='file-name'></span>
    </div>
                    <input type="submit" name="SendCadCont" class="btn btn-success" value="CONFIRMAR">
                </form>
            </div>
             </div>
    </div>

    </main>
    <?php
    unset($_SESSION['dados']);
    include_once 'app/sts/rodape.php';
    include_once 'app/sts/rodape_lib.php';
    ?>


    <script>
        window.sr = ScrollReveal({reset: true});
        sr.reveal('.card-servicos', {
            duration: 1000,
            origin: 'bottom',
            distance: '20px'
        });
        sr.reveal('.dep-left', {
            duration: 1000,
            origin: 'left',
            distance: '20px'
        });
        sr.reveal('.dep-center', {
            duration: 1000,
            origin: 'bottom',
            distance: '20px'
        });
        sr.reveal('.dep-right', {
            duration: 1000,
            origin: 'right',
            distance: '20px'
        });
        sr.reveal('.prod-text', {
            duration: 1000,
            origin: 'left',
            distance: '20px'
        });
        sr.reveal('.prod-img', {
            duration: 1000,
            origin: 'right',
            distance: '20px'
        });
        sr.reveal('.email-text', {
            duration: 1000,
            origin: 'left',
            distance: '20px'
        });
        sr.reveal('.email-form', {
            duration: 1000,
            origin: 'right',
            distance: '20px'
        });
        sr.reveal('.perg-resp-text', {
            duration: 1000,
            origin: 'left',
            distance: '20px'
        });
        sr.reveal('.perg-resp-cont', {
            duration: 1000,
            origin: 'right',
            distance: '20px'
        });
    </script>
</body>

