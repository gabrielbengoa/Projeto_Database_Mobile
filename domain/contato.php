<?php

class Contato{
    public $idcontato;
    public $email;
    public $telefone;
    
    public function __construct($db){
        $this->conexao = $db;
    }

/*
    Função para listar todos os usuários cadastrados no banco de dados
    */
    public function listar(){
        $query = "select * from contato";
        /*
        Será criada a variável stmt(Statement - Sentença)
        para guardar a preparação da consulta select que será executada
        posteriormente
        */
        $stmt = $this->conexao->prepare($query);

        //executar a consulta e retornar seus dados
        $stmt->execute();

        return $stmt;

    }

    public function cadastro(){
        $query = "insert into usuario set email=:e, telefone=:tl";

        $stmt = $this->conexao->prepare($query);


        /*Vamos vincular os dados que veem do app ou navegador com os campos de
        banco de dados
        */
        $stmt->bindParam(":e",$this->email);
        $stmt->bindParam(":tl",$this->telefone);

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }

    }

    public function alterarContato(){
        $query = "update contato set email=:e, telefone=:tl where idcontato=:ic";

        $stmt = $this->conexao->prepare($query);

        /*Vamos vincular os dados que veem do app ou navegador com os campos de
        banco de dados
        */
        $stmt->bindParam(":e",$this->email);
        $stmt->bindParam(":tl",$this->telefone);
        $stmt->bindParam(":ic",$this->idcontato);

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function apagarContato(){
        $query = "delete from contato where idcontato=:ic";

        $stmt = $this->conexao->prepare($query);

        /*Vamos vincular os dados que veem do app ou navegador com os campos de
        banco de dados
        */
        $stmt->bindParam(":ic",$this->idcontato);
      

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }

    }
}


?>