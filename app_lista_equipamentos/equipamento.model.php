<?php

class Equipamento{
    private $id;

    private $equipamento;

    private $cod_calibracao;

    private $departamento;

    private $data_retirada;

    private $data_devolucao;

    private $responsavel_liberacao;

    private $email_responsavel;

    private $responsavel_devolucao;

    private $email_destinado;

    private $status_equipamento;


    public function __get($atributo)
    {
        return $this->$atributo;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
}