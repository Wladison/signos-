<!DOCTYPE html>
<html>
<head>
 <title>
  Call php function onclick event html submit button.
 </title>
</head>
<body style="text-align:center;">
 <h1 style="color:black;">
 SIGNOS
 </h1>
 <h4>
  Encontre seu signo!
 </h4>
 <?php
if (isset($_POST['button1'])) {
 
    //Variaveis de POST, Alterar somente se necessário 
    //====================================================
    $nome ="";
    $age ="";
    
    $nome = $_POST['nome'];
    $age = $_POST['data'];



   echo "Ola $nome " . '<br>';
 
    // Transformando arquivo XML em Objeto
    $xml = simplexml_load_file('signos.xml');
    
    // Exibe as informações do XML
    echo 'Título: ' . $xml->titulo . '<br>';

    // Percorre todos os registros de vendas
    foreach($xml->signo as $registro):
        $aniversario =  date('d-m',strtotime($age));

         echo $registro->signoNome. '<br>';
         echo "inicio:  ";
         echo  $registro->diaInicio ; 
         echo  $registro->mesInicio . '<br>';
         echo  $aniversario . '<br>';
         echo "fim:  ";
         echo $registro->diaFim ;
         echo $registro->mesFim . '<br>';
         echo $registro->descricao . '<br>';
         echo '<hr>';


    endforeach;
}

 ?>

 <form method="post">

 <input type="text" name="nome" placeholder="digite seu Nome aqui">
 <input type="date" id="age"name="data" >
  <input type="submit" name="button1"
    value="button1"/>
 </form>
</boy>
</html>