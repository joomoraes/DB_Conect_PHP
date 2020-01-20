<?php require_once("_conexao/conect_index.php");

$urlserver = 'http://localhost/projeto/projeto_3/';

$gets = explode('/',$_SERVER['REQUEST_URI']);

array_shift($gets);
array_shift($gets);
array_shift($gets);
//array_shift($gets);


switch ($gets[0]) {
		/* Default */
	default:
		$load 			=	'capa';
		$title 			=	'Página Inicial';
		$menuBG 		=	'Inicio';
    break;
	case 'Alunos':
		$load  			= 'curso';
		$tipo  			= '1';
		$title 			= 'Alunos';
    break;
        
    case 'Servidores':
		$load  			= 'servidor';
		$tipo  			= '1';
		$title 			= 'Servidores';
        switch ($gets[1]) {
            case 'Envia':
                $load  			= 'servidor_envia';
                $tipo  			= '1';
                $title 			= 'Servidores Enviando';
            break;      
        }
    break;
	
}
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="...">
    <link rel="stylesheet" href="../bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        if (isset($load) && is_file($load . '.php')) {
            require_once $load . '.php';
        } else {
            require_once 'capa.php';
        }
    ?>
</body>