<?php

$data['empresa'] = 10400842;
$data['senha'] = 'q2u43';

$data['servico'] = '40010,81019,41068';
$data['origem'] = 22713004;
$data['destino'] = 25015505;

$data['comprimento'] = 18;
$data['altura'] = 2;
$data['largura'] = 11;
$data['diametro'] = 5;
$data['formato'] = 1;
$data['peso'] = 1;

$data['mao'] = 'N';
$data['valor'] = 0;

$data['aviso'] = 'N';

function dd($json){

  echo "<pre>";
  var_dump($json);
  echo "</pre>";

}

$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrecoPrazo?nCdEmpresa=".$data['empresa']."&sDsSenha=".$data['senha']."&nCdServico=".$data['servico']."&sCepOrigem=".$data['origem']."&sCepDestino=".$data['destino']."&nVlPeso=".$data['peso']."&nCdFormato=".$data['formato']."&nVlComprimento=".$data['comprimento']."&nVlAltura=".$data['altura']."&nVlLargura=".$data['largura']."&nVlDiametro=".$data['diametro']."&sCdMaoPropria=".$data['mao']."&nVlValorDeclarado=".$data['valor']."&sCdAvisoRecebimento=".$data['aviso'];

//$url = 'teste2.xml';

$calcula = simplexml_load_file($url);

//echo $url;

foreach ($calcula->Servicos as $value) {

  foreach ($value->cServico as $v) {
    echo "Código: " .$v->Codigo . "<br/>";
    echo "Valor: " .$v->Valor . "<br/>";
    echo "Prazo de entrega: " .$v->PrazoEntrega . " dias <br/>";
    echo "Valor em mãos: " .$v->ValorMaoPropria . "<br/>";
    echo "Aviso de recebimento: " .$v->ValorAvisoRecebimento . "<br/>";
    echo "Valor declarado: " .$v->ValorValorDeclarado . "<br/>";
    echo "Tem entrega domiciliar: " .$v->EntregaDomiciliar . "<br/>";
    echo "Entrega no sabado: " .$v->EntregaSabado . "<br/>";

    if ($v->Erro >= 1) {
      echo "Observação: " .$v->MsgErro . "<br/>";
    }

    echo "<hr />";

  }

}

?>