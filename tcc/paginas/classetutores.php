<?php
class Tutor
{
    private $idTutor;
    private $nomeTutor;
    private $email;
    private $telefone;
    private $endereco;
    private $cidade;
    private $estado;
    private $cep;

    // Métodos setters
    public function setIdTutor($valor) {
        $this->idTutor = $valor;
    }

    public function setNomeTutor($valor) {
        $this->nomeTutor = $valor;
    }

    public function setEmail($valor) {
        $this->email = $valor;
    }

    public function setTelefone($valor) {
        $this->telefone = $valor;
    }

    public function setEndereco($valor) {
        $this->endereco = $valor;
    }

    public function setCidade($valor) {
        $this->cidade = $valor;
    }

    public function setEstado($valor) {
        $this->estado = $valor;
    }

    public function setCep($valor) {
        $this->cep = $valor;
    }

    // Métodos getters
    public function getIdTutor() {
        return $this->idTutor;
    }

    public function getNomeTutor() {
        return $this->nomeTutor;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getTelefone() {
        return $this->telefone;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getCidade() {
        return $this->cidade;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getCep() {
        return $this->cep;
    }

    // Listar todos os tutores
    public function listar() {
        require("conexaobd.php");

        $consulta = "SELECT * FROM tutores ORDER BY nomeTutor";
        $resultado = $conexao->prepare($consulta);
        $resultado->execute();

        return $resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    // Consultar um tutor específico
    public function consultar($idTutor) {
        require("conexaobd.php");

        $comando = "SELECT * FROM tutores WHERE idTutor = :idTutor";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(':idTutor', $idTutor);
        $resultado->execute();

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }

    // Inserir um novo tutor
    public function inserir() {
        require("conexaobd.php");

        $comando = "INSERT INTO tutores (nomeTutor, email, telefone, endereco, cidade, estado, cep) VALUES (:nomeTutor, :email, :telefone, :endereco, :cidade, :estado, :cep)";
        $resultado = $conexao->prepare($comando);

        $resultado->bindParam(':nomeTutor', $this->nomeTutor);
        $resultado->bindParam(':email', $this->email);
        $resultado->bindParam(':telefone', $this->telefone);
        $resultado->bindParam(':endereco', $this->endereco);
        $resultado->bindParam(':cidade', $this->cidade);
        $resultado->bindParam(':estado', $this->estado);
        $resultado->bindParam(':cep', $this->cep);

        return $resultado->execute();
    }

    // Alterar um tutor existente
    public function alterar() {
        require("conexaobd.php");

        $comando = "UPDATE tutores SET nomeTutor = :nomeTutor, email = :email, telefone = :telefone, endereco = :endereco, cidade = :cidade, estado = :estado, cep = :cep WHERE idTutor = :idTutor";
        $resultado = $conexao->prepare($comando);

        $resultado->bindParam(':idTutor', $this->idTutor);
        $resultado->bindParam(':nomeTutor', $this->nomeTutor);
        $resultado->bindParam(':email', $this->email);
        $resultado->bindParam(':telefone', $this->telefone);
        $resultado->bindParam(':endereco', $this->endereco);
        $resultado->bindParam(':cidade', $this->cidade);
        $resultado->bindParam(':estado', $this->estado);
        $resultado->bindParam(':cep', $this->cep);

        return $resultado->execute();
    }

    // Excluir um tutor
    public function excluir($idTutor) {
        require("conexaobd.php");

        $comando = "DELETE FROM tutores WHERE idTutor = :idTutor";
        $resultado = $conexao->prepare($comando);
        $resultado->bindParam(':idTutor', $idTutor);

        return $resultado->execute();
    }
}

