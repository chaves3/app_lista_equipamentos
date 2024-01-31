<?php

require("../../app_lista_equipamentos/conexao.php");
require("../../app_lista_equipamentos/equipamento.model.php");
require("../../app_lista_equipamentos/euipamento.servece.php");


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if($acao == 'inserir')
{
    $equipamento = new Equipamento();

    $equipamento->__set("equipamento", $_POST['equipament']);

    $equipamento->__set("cod_calibracao", $_POST['calibration-code']);

    $equipamento->__set("departamento", $_POST['department']);

    $equipamento->__set("data_retirada", $_POST['date-of-withdrawal']);

    $equipamento->__set("data_devolucao", $_POST['return-date']);

    $equipamento->__set("responsavel_liberacao", $_POST['responsible-for-release']);

    $equipamento->__set("email_responsavel", $_POST['email-reponsible']);

    $equipamento->__set("responsavel_devolucao", $_POST['responsible-return']);

    $equipamento->__set("email_destinado", $_POST['email-responsibel-return']);

    $equipamento->__set("status_equipamento", $_POST['status']);

    $conexao = new Conexao();

    $equipamentoServece = new EquipamentoService($conexao, $equipamento);
    $equipamentoServece->inserir();
    
    include("enviar_email.php");

    header('location: todos_equipamentos.php?inclusao=1');
}

else if($acao == 'recuperar')
{
 
    $equipamento = new Equipamento();

    $conexao = new Conexao();

    $equipamentoServece = new EquipamentoService($conexao, $equipamento);
    $equipamentos = $equipamentoServece->recuperar();
}



else if($acao == 'emuso')
{
 
    $equipamento = new Equipamento();

    $conexao = new Conexao();

    $equipamentoServece = new EquipamentoService($conexao, $equipamento);
    $equipamentos = $equipamentoServece->emUso();
}



else if($acao == 'atualizar')
{
    $equipamento = new Equipamento();
    $equipamento->__set('id', $_POST['id']);
    $equipamento->__set('equipamento', $_POST['equipamento']);
    
    $conexao = new Conexao();
 
    $equipamentoServece  = new EquipamentoService($conexao, $equipamento);
    if($equipamentoServece ->atualizar()){
        if( isset($_GET['pag']) && $_GET['pag'] == 'equipamento_in_use'){
            header('location: equipamento_in_use.php');
     }else{
     header('location: todos_equipamentos.php');
    }
 }
}

else if($acao == 'remover')
    {
      $equipamento = new Equipamento();
      $equipamento->__set('id', $_GET['id']);

      $conexao = new Conexao();

      $equipamentoServece  = new EquipamentoService($conexao, $equipamento);
      
      $equipamentoServece->remover();

      if( isset($_GET['pag']) && $_GET['pag'] == 'equipamento_in_use'){
        header('location: equipamento_in_use.php');
    }else{
    header('location: todos_equipamentos.php');
   }

    }

else if($acao == 'marcarDevolvido')
{
    $equipamento = new Equipamento();
    $equipamento->__set('id', $_GET['id']);

    $conexao = new Conexao();

    $equipamentoServece  = new EquipamentoService($conexao, $equipamento);
      
    $equipamentoServece->devolvido();

    if( isset($_GET['pag']) && $_GET['pag'] == 'equipamento_in_use'){
        header('location: equipamento_in_use.php');
    }else{
    header('location: todos_equipamentos.php');
   }

}