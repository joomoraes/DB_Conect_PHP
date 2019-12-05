<?php
    function enviarMensagem($dados) {
        // Dados do formulario
        $nome_usuario       = $dados['nome'];
        $email_usuario      = $dados['email'];
        $mensagem_usuario   = $dados['mensagem'];
        
        // Criar variaveis de envio
        $destino            = "suporte@imediabrasil.com.br";
        $remetente          = "imediabrasil@imediabrasil.com.br";
        $assunto            = "Mensagem do site";
        
        // Montar o corpo da mensagem
        $mensagem           = "O usuario " . $nome_usuario . " enviou uma mensagem." . "</BR>";
        $mensagem           .= "email do usuario: " . $email_usuario . "</BR>";
        $mensagem           .= "mensagem:" . "</BR>";
        $mensagem           .= $mensagem_usuario;
        
        return mail($destino, $assunto, $mensagem, $remetente);
    }

?>

<?php require_once("../../conexao/conexao.php"); ?>

<?php
    if ( isset($_POST['enviar']) ) {
        if ( enviarMensagem($_POST) ) {
            $mensagem = "Mensagem enviada com sucesso.";
        } else {
            $mensagem = "Erro no envio.";
        }
    }
?>

<form action="contato.php" method="post">
    <input type="text" name="nome" placeholder="Digite seu nome">
    <input type="email" name="email" placeholder="Digite seu email">
    <label>Mensagem</label>
    <textarea name="mensagem"></textarea>
    <input type="submit" name="enviar" value="Enviar Mensagem">

    <?php
        if( isset($mensagem) ) {
            echo "<p>" . $mensagem . "</p>";
        }
    ?>                     
</form>