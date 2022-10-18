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

    $nome = $_POST['nome'];
    $data = $_POST['data'];

   echo "Ola $nome seu signo é: " ;
 
    // Transformando arquivo XML em Objeto
    $xml = simplexml_load_file('signos.xml');
    
    // Percorre todos os registros de vendas
    foreach($xml->signo as $registro):

        $aniversarioDia =  intval(date('d', strtotime($data)));
        $aniversarioMes =  intval(date('m', strtotime($data)));

        $mesInicio = intval($registro->mesInicio);
        $diaInicio = intval($registro->diaInicio);

        $mesFim = intval($registro->mesFim);
        $diaFim = intval($registro->diaFim);


        // se o mes esta entre os meses do signo 
        // OU se o mes é igual ao mes de inicio e o dia é maior 
        // OU o mes é igual ao mes fim e o dia é menor que o dia fim
        
         if (
          ($aniversarioMes > $mesInicio && $aniversarioMes < $mesFim)
         || ($aniversarioMes == $mesInicio && $aniversarioDia >= $diaInicio)
         || ($aniversarioMes ==  $mesFim  && $aniversarioDia <= $diaFim)
         ) {
            echo '<b>';
            echo  $registro->signoNome. '</b><br>';
            echo $registro->descricao . '<br>';
            echo '<hr>';
         }
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