<?php
    //Conexao externa ao banco de dados
    <?php require_once("../../conexao/conexao.php"); ?>

    <?php 
        // Exemplo consulta - 1 
        $consulta_categorias = "SELECT nomeproduto";
        $consulta_categorias .= " FROM produtos" ;

        $categorias = mysqli_query($conecta, $consulta_categorias);

        if ( !$categorias ) {
            die("Falha na consulta ao banco.");
        }
    ?>
        
    <?php
        //Listagem da consulta
        while ( $registro = mysqli_fetch_assoc($categorias)  ) {     
    ?>
            <li><?php echo $registro["nomeproduto"] ?></li>
    <?php
        }
    ?>
    <?php 
       //Liberar dados da memoria
        mysqli_free_result($categorias);
    ?>
    
    <?php
        //Exemplo de consulta - 2
        <?php
        // Determinar localidade BR
        setlocale(LC_ALL, 'pt_BR');

        // Consulta ao banco de dados
        $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
        $produtos .= "FROM produtos ";
        $resultado = mysqli_query($conecta, $produtos);
        if(!$resultado) {
            die("Falha na consulta ao banco");   
        }
        ?>
        
        <?php
            // Listagem consulta - 2
                while($linha = mysqli_fetch_assoc($resultado)) {
            ?>
                <ul>
                    <li class="imagem"><img src="<?php echo $linha["imagempequena"] ?>"></li>
                    <li><h3><?php echo $linha["nomeproduto"] ?></h3></li>
                    <li>Tempo de Entrega : <?php echo $linha["tempoentrega"] ?></li>
                    <li>Pre&ccedil;o unit&aacute;rio : <?php echo money_format('%.2n',$linha["precounitario"]) ?></li>
                </ul>
             <?php
                }
            ?>          
        ?>
        
        <?php
            //Exemplo consulta - 3
           <?php
                // Determinar localidade BR
                setlocale(LC_ALL, 'pt_BR');

                // Consulta ao banco de dados
                $produtos = "SELECT produtoID, nomeproduto, tempoentrega, precounitario, imagempequena ";
                $produtos .= "FROM produtos ";
                if (isset($_GET["produto"])) {
                    $nome_produto   = urlencode($_GET["produto"]);
                    $produtos       .= "WHERE nomeproduto LIKE '%{$nome_produto}%' "; 
                }
                $resultado = mysqli_query($conecta, $produtos);
                if(!$resultado) {
                    die("Falha na consulta ao banco");   
                }
          ?>
        ?>
        <?php
                //Listagem consulta - 3
                while($linha = mysqli_fetch_assoc($resultado)) {
            ?>
                <ul>
                    <li class="imagem">
                        <a href="detalhe.php?codigo=<?php echo $linha['produtoID'] ?>">
                            <img src="<?php echo $linha["imagempequena"] ?>">
                        </a>
                    </li>
                    <li><h3><?php echo $linha["nomeproduto"] ?></h3></li>
                    <li>Tempo de Entrega : <?php echo $linha["tempoentrega"] ?></li>
                    <li>Pre&ccedil;o unit&aacute;rio : <?php echo money_format('%.2n',$linha["precounitario"]) ?></li>
                </ul>
             <?php
                }
            ?>           
?>