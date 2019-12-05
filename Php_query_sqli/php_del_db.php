<?php require_once("../../conexao/conexao.php"); ?>
<?php
    if( isset($_POST["nometransportadora"]) ) {
        $tID = $_POST["transportadoraID"];
        
        $exclusao = "DELETE FROM transportadoras ";
        $exclusao .= "WHERE transportadoraID = {$tID}";
        $con_exclusao = mysqli_query($conecta,$exclusao);
        if(!$con_exclusao) {
            die("Registro não excluído");
        } else {
            header("location:listagem.php");   
        }
    }

    // Consulta a tabela de transportadoras
    $tr = "SELECT * FROM transportadoras ";
    if( isset($_GET["codigo"]) ) {
        $id = $_GET["codigo"];
        $tr .= "WHERE transportadoraID = {$id} ";
    }

    $con_transportadora = mysqli_query($conecta, $tr);
    if(!$con_transportadora) {
       die("Erro na consulta"); 
    }
    $info_transportadora = mysqli_fetch_assoc($con_transportadora);
?>
<form action="exclusao.php" method="post">
    <h2>Exclusão de Transportadoras</h2>

    <label for="nometransportadora">Nome da Transportadora</label>
    <input type="text" value="<?php echo utf8_encode($info_transportadora["nometransportadora"])  ?>" name="nometransportadora" id="nometransportadora">

    <label for="endereco">Endereço</label>
    <input type="text" value="<?php echo utf8_encode($info_transportadora["endereco"])  ?>" name="endereco" id="endereco">

    <label for="cidade">Cidade</label>
    <input type="text" value="<?php echo utf8_encode($info_transportadora["cidade"])  ?>" name="cidade" id="cidade">


    <input type="hidden" name="transportadoraID" value="<?php echo $info_transportadora["transportadoraID"] ?>">
    <input type="submit" value="Confirmar exclusão">                    
</form>