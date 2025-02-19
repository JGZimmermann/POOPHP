<?php
//Crie um programa que implemente uma classe Funcionário que contenha os atributos id, nome e cargo e o método calculaSalario, em seguida crie uma classe Gerente que contenha os atributos cargo e quantidadeDeColaboradores. Além disso, o gerente recebe um salário diferente, então utilizando polimorfismo implemente um método calculaSalario para o gerente também.
class Funcionario{
    private int $id;
    private String $nome;
    private String $cargo;
    public function __construct($id,$nome,$cargo)
    {
        $this->setId($id);
        $this->setNome($nome);
        $this->setCargo($cargo);
    }

    private function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getCargo()
    {
        return $this->cargo;
    }

    private function setNome($nome)
    {
        $this->nome = $nome;
    }

    private function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    public function calculaSalario()
    {
        return 1000 * 2;
    }
}

class Gerente extends Funcionario{
    private String $cargo;
    private int $quantidadeDeColaboradores;

    public function __construct($id, $nome, $cargo, $quantidadeDeColaboradores)
    {
        $this->setCargo($cargo);
        $cargo = $this->getCargo();
        parent::__construct($id, $nome, $cargo);
        $this->setQuantidadeDeColaboradores($quantidadeDeColaboradores);
    }

    private function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    private function setQuantidadeDeColaboradores($quantidadeDeColaboradores)
    {
        $this->quantidadeDeColaboradores = $quantidadeDeColaboradores;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function getQuantidadeDeColaboradores()
    {
        return $this->quantidadeDeColaboradores;
    }

    public function calculaSalario()
    {
        return 1000 * 5;
    }
}

$funcionario = new Funcionario(1,"Douglas","Caixa");
$gerente = new Gerente(2,"Carlos","Gerente",10);

//Crie uma classe chamada Objeto que contém os atributos largura e altura de um objeto bidimensional genérico. Depois crie as seguintes classes que estendem de Objeto:
//Classe Triângulo, com o atributo “tipo”;
//Classe Retangulo, com um método que verifique se ele é quadrado.
//Adicione um método que calcula a área na classe Objeto, entretanto o cálculo da área difere para cada tipo de objeto, então re-implemente o método que calcula a área nas subclasses para calcular conforme a sua figura geométrica.

class Objeto{
    private int $largura;
    private int $altura;

    public function __construct($largura,$altura)
    {
        $this->setLargura($largura);
        $this->setAltura($altura);
    }
    private function setLargura($largura)
    {
        $this->largura = $largura;
    }

    private function setAltura($altura)
    {
        $this->altura = $altura;
    }

    public function getLargura()
    {
        return $this->largura;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function calculaArea()
    {
        return $this->getLargura() + $this->getAltura();
    }
}

class Triangulo extends Objeto{
    private String $tipo;

    public function __construct($largura, $altura,$tipo)
    {
        parent::__construct($largura, $altura);
        $this->setTipo($tipo);
    }

    private function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function calculaArea()
    {
        return ($this->getAltura() * $this->getLargura()) / 2;
    }
}

class Retangulo extends Objeto {
    public function __construct($largura, $altura)
    {
        parent::__construct($largura, $altura);
    }

    public function isQuadrado()
    {
        $altura = $this->getAltura();
        $largura = $this->getLargura();

        if($altura == $largura){
            return true;
        } else{
            return false;
        }
    }

    public function calculaArea()
    {
        return $this->getLargura() * $this->getAltura();
    }
}