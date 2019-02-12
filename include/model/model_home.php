<?php
/**
 * Modelo de dados Inicial.
 * @author Cauê dos Santos Silva <cauedossantossilva@hotmail.com>
 * @since 18/01/2019
 */
class ModelHome extends ModelPadrao{
    
    private $nome;
    private $idade;
    private $sexo;

    /**
     * @var ModelMarca
     */
    public $Marca;

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getMarca() {
        if(!isset($this->Marca)){
            $this->Marca = Factory::loadModel('Marca');
        }
        return $this->Marca;
    }

    public function setMarca(ModelMarca $Marca) {
        $this->Marca = $Marca;
    }

    public function doInsere() {
        echo $this->getNome() . '<br>';
        echo $this->getIdade() . '<br>';
        echo $this->getSexo() . '<br>';
    }
}