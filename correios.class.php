<?php

class correios
{

  public $empresa;
  public $senha;

  public $servico ;
  public $origem;
  public $destino;

  public $comprimento;
  public $altura;
  public $largura;
  public $diametro;
  public $formato;
  public $peso;

  public $mao;
  public $valor;

  public $aviso;

  public function __construct()
  {
    $this->empresa = 10400842;
    $this->senha = 'q2u43';

    $this->servico = '40010,81019,41068';
    $this->origem = 22713004;
    $this->destino = $_POST['cepDestino'];

    $this->comprimento = 18;
    $this->altura = 2;
    $this->largura = 11;
    $this->diametro = 5;
    $this->formato = 1;
    $this->peso = 1;

    $this->mao = 'N';
    $this->valor = 0;

    $this->aviso = 'N';

    $this->url ="http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx/CalcPrecoPrazo?"
    ."nCdEmpresa={$this->empresa}"
    ."&sDsSenha={$this->senha}"
    ."&nCdServico={$this->servico}"
    ."&sCepOrigem={$this->origem}"
    ."&sCepDestino={$this->destino}"
    ."&nVlPeso={$this->peso}"
    ."&nCdFormato={$this->formato}"
    ."&nVlComprimento={$this->comprimento}"
    ."&nVlAltura={$this->altura}"
    ."&nVlLargura={$this->largura}"
    ."&nVlDiametro={$this->diametro}"
    ."&sCdMaoPropria={$this->mao}"
    ."&nVlValorDeclarado={$this->valor}"
    ."&sCdAvisoRecebimento={$this->aviso}";

  }

  public function Exibe()
  {

    $calcula = simplexml_load_file($this->url);
    
    foreach ($calcula->Servicos as $value)
    {
      foreach ($value->cServico as $v)
      {
        echo "<tr>";
          echo "<td>";
          
          // Nomeação do serviço
          switch ($v->Codigo) {
            case '40010':
              echo 'SEDEX';
              break;

            case '81019':
              echo 'e-Sedex';
              break;

            case '41068':
              echo 'PAC';
              break;
          }
          
          echo "</td>";
          echo "<td>" .$v->PrazoEntrega . "</td>";
          echo "<td>";
          if ($v->EntregaDomiciliar == 'S')
          {
            echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
          }
          else
          {
            echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
          }
          echo "</td>";

          echo "<td>";
          if ($v->EntregaSabado == 'S')
          {
            echo "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>";
          }
          else
          {
            echo "<span class='glyphicon glyphicon-remove' aria-hidden='true'></span>";
          }
          echo "</td>";

          echo "</tr>";
          echo "<tr class='msg'>";
          if ($v->Erro >= 1) {
            echo "<td colspan='5'>" .$v->MsgErro . "</td>";
          }
        echo "</tr>";
      }
    }
  }

  public function RetornoCep(){
    echo $_POST['cepDestino'];
  }

}