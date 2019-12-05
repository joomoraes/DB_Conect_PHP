<?php 
//  Chamada de página
include_once("_incluir/topo.php"); ?>
        
        <main>  
            
        </main>

<?php include_once("_incluir/rodape.php"); ?>  

<?php require_once("../../conexao/conexao.php"); ?>
<?php
    // adicionar variaveis de sessao
    session_start();

    if ( isset( $_POST["usuario"] )  ) {
        $usuario    = $_POST["usuario"];
        $senha      = $_POST["senha"];    
        
        $login = "SELECT * ";
        $login .= "FROM clientes ";
        $login .= "WHERE usuario = '{$usuario}' and senha = '{$senha}' ";
    
        $acesso = mysqli_query($conecta, $login);
        if ( !$acesso ) {
            die("Falha na consulta ao banco");
        }
        
        $informacao = mysqli_fetch_assoc($acesso);
        
        if ( empty($informacao) ) {
            $mensagem = "Login sem sucesso.";
        } else {
            $_SESSION["user_portal"] = $informacao["clienteID"];
            header("location:listagem.php");
        }
    }
?>
<?php
    // iniciar a sessão
    session_start();
?>
<?php
    // teste de segurança
    session_start();
    if ( !isset($_SESSION["user_portal"]) ) {
        header("location:login.php");
    }
    // fim do teste de seguranca
?>
<?php
    // Exclue a variavel de sessao mencionada.
    unset($_SESSION["usuario"]);

    // Destrói todas as variáveis de sessão da app.
    session_destroy(); 
?>
<?php
    // Fechar conexao
    mysqli_close($conecta);
?>