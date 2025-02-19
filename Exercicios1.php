<?php
//Criar a classe Pessoa com as seguintes características, depois crie no mínimo dois objetos para testar o código:
//atributos: nome da pessoa, idade, dia de nascimento, mês de nascimento e ano de nascimento;
//métodos:
//calculaIdade(), que recebe a data atual em dias, mês e anos e calcula e armazena no atributo idade a idade atual da pessoa;
//informaIdade(), que retorna o valor da idade;
//informaNome(), que retorna o nome da pessoa;
//ajustaDataDeNascimento(), que recebe dia, mês e ano de nascimento como parâmetros e preenche os atributos correspondentes do objeto.
    class Pessoa extends Universidade {
    private String $name;
    private int $age;
    private int $dateOfBirthday;
    private int $monthOfBirthday;
    private int $yearOfBirthday;
    public function __construct($name,$age,$dateOfBirthday,$monthOfBirthday,$yearOfBirthday,$universityName)
    {
        parent::__construct($universityName);
        $this->name = $name;
        $this->age = $age;
        $this->dateOfBirthday = $dateOfBirthday;
        $this->monthOfBirthday = $monthOfBirthday;
        $this->yearOfBirthday = $yearOfBirthday;
    }

    public function calculaIdade()
    {
        $actualDate = (int)date("d");
        $actualMonth = (int)date("m");
        $actualYear = (int)date("Y");
        $this->age = ($actualYear - $this->yearOfBirthday) - 1;
        if($actualMonth > $this->monthOfBirthday){
            $this->age++;
        } elseif ($actualMonth = $this->monthOfBirthday){
            if($actualDate >= $this->dateOfBirthday){
               $this->age++;
            }
        }
        return $this->age;
    }

    public function informaIdade()
    {
        return $this->age;
    }

    public function informaNome()
    {
        return $this->name;
    }

    public function getUniversityNameAndName()
    {
        return "Nome: " . $this->name . ", universidade em que trabalha: " . parent::getNome();
    }

    public function ajustaDataDeNascimento($date,$month,$year)
    {
        return "{$date}/{$month}/{$year}";
    }
}

$university1 = new Universidade("Unicentro");
$university2 = new Universidade("UTFPR");

$person1 = new Pessoa("Carlos",28,18,02,1997,$university1->getNome());
$person2 = new Pessoa("Marcos",33,31,01,1992,$university2->getNome());
//echo $person1->ajustaDataDeNascimento(12,02,1997)."\n";
//echo $person1->calculaIdade()."\n";
//echo $person1->informaIdade()."\n";
//echo $person1->informaNome()."\n";
//echo $person1->getUniversityNameAndName()."\n";
//echo $person2->getUniversityNameAndName()."\n";

//Fazer um programa com as seguintes características:
//Uma classe chamada Universidade que terá como atributo um nome e terá um método para informar o seu nome.
//Relacionar a classe Pessoa com a classe Universidade. Cada pessoa poderá ser associada a uma Universidade.
//A classe Pessoa, por sua vez, terá um método que dirá seu nome e em que universidade trabalha.
//Criar dois ou mais objetos Universidade e dois ou mais objetos Pessoa (uma para cada universidade).

class Universidade
{
    private String $nome;

    public function __construct($nome)
    {
        $this->nome = $nome;
    }

    public function getNome()
    {
        return $this->nome;
    }
}

class Supermarket{
    private array $item;
    public function __construct()
    {
        $this->item = [];
    }
    public function addItem($item)
    {
        $this->item[] = $item;
    }

    public function getItem()
    {
        return $this->item;
    }

    public function clientProduct($array)
    {
        $payment = 0;
        $product = readline("Qual produto deseja comprar? ");
        $quantity = readline("Qual a quantidade que deseja comprar? ");

        foreach ($array as $item){
            if($item->product == $product){
                $item->quantity -= $quantity;
                $payment = $item->price * $quantity;
            }
        }

        return $payment;
    }

    public function payment($payment)
    {
        echo "O pagamento ficou no total $payment, deseja fazer a forma de pagamento como?\n1 - Dinheiro\n2 - Cartão\n3 - Cheque\n";
        $choice = readline("Digite o numero: ");
        switch ($choice) {
            case 1:
                $money = readline("Digite a quantia em dinheiro deseja entregar: ");
                if ($money > $payment) {
                    $change = $money - $payment;
                    echo "Você entregou $money, o pagamento ficou $payment. O seu troco será $change";
                }
                break;
            case 2:
                echo "Você escolheu cartão, muito obrigado pelo pagamento!";
                break;
            case 3:
                $check = readline("Digite a quantia em cheque deseja entregar: ");
                if ($check > $payment) {
                    $change = $check - $payment;
                    echo "Você entregou $check, o pagamento ficou $payment. O seu troco será $change";
                }
                break;
        }
    }
}

class Item{
    public String $product;
    public float $price;
    public int $quantity;
    public function __construct($product,$price,$quantity)
    {
        $this->product = $product;
        $this->price = $price;
        $this->quantity = $quantity;
    }
}

/*$supermarket = new Supermarket();
$item1 = new Item("Banana",3.0,5);
$item2 = new Item("Maçã", 5.0,10);
$item3 = new Item("Pera",10.0,3);
$supermarket->addItem($item1);
$supermarket->addItem($item2);
$supermarket->addItem($item3);
$supermarket->payment($supermarket->clientProduct($supermarket->getItem()));*/

//Imagine que você é dono(a) de uma biblioteca e deseja desenvolver um sistema de gerenciamento de estoque. Para isso, inicialmente, será necessário definir uma classe que representa as pessoas cadastradas e outra que representa os livros em estoque. Os atributos básicos de uma pessoa são: nome, endereço, email e telefone. Para os livros os atributos são: nome, autor, número de páginas, disponibilidade de aluguel (a princípio considere que a biblioteca possui apenas um exemplar de cada livro) e caso esteja alugado, uma referência à pessoa que alugou.
//Com base nessas informações, faça o seguinte:
//Construa um programa que contenha as classes Livro e Pessoa;
//Crie um método que permita alugar os livros em estoque;
//Crie um método que permita a devolução dos livros (Dica: utilize o método unset do php).
//OPCIONAL Aplique os conceitos de encapsulamento nos atributos, lembrando que quando um atributo se torna private, é necessário criar métodos para acessar e retornar seus valores.

class Book{
    private String $name;
    private String $author;
    private int $pages;
    private bool $availability;
    private String $renter;
    public function __construct($name, $author, $pages, $availability,$renter="")
    {
        $this->setName($name);
        $this->setAuthor($author);
        $this->setPages($pages);
        $this->setAvailability($availability);
        $this->setRenter($renter);
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    private function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    private function setPages($pages)
    {
        $this->pages = $pages;
    }

    public function getPages()
    {
        return $this->pages;
    }

    public function setAvailability($availability)
    {
        $this->availability = $availability;
    }

    public function getAvailability()
    {
        return $this->availability;
    }

    public function setRenter($renter)
    {
        $this->renter = $renter;
    }

    public function getRenter()
    {
        return $this->renter;
    }
}

class Person{
    private String $name;
    private String $address;
    private String $email;
    private String $cellphone;

    public function __construct($name, $address, $email, $cellphone)
    {
        $this->setName($name);
        $this->setAddress($address);
        $this->setEmail($email);
        $this->setCellphone($cellphone);
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    private function setAddress($address)
    {
        $this->address = $address;
    }

    public function getAddress()
    {
        return $this->address;
    }

    private function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    private function setCellphone($cellphone)
    {
        $this->cellphone = $cellphone;
    }

    public function getCellphone()
    {
        return $this->cellphone;
    }
}

class Library{
    private array $array;

    public function __construct()
    {
        $this->array = [];
    }

    public function addBook($book)
    {
        $this->array[] = $book;
    }

    public function getBooks()
    {
        return $this->array;
    }

    public function rentBook($name)
    {
        $book = readline("Digite o nome do livro que deseja alugar: ");
        foreach ($this->array as $item){
            if($item->getName() == $book){
                $item->setAvailability(false);
                $item->setRenter($name);
            }
        }
    }

    public function returnBook($book)
    {
        foreach ($this->array as $item){
            if($item->getName() == $book){
                $item->setAvailability(true);
                $item->setRenter("");
            }
        }
    }
}

$pessoa = new Person("Douglas","Rua 1","teste@teste.com","123");
$book = new Book("Livro","Autor",100,true);
$book2 = new Book("Livro2","Autor2",150,true);
$library = new Library();

//$library->addBook($book);
//$library->addBook($book2);
//$library->rentBook($pessoa->getName());
//print_r($library->getBooks());
//$library->returnBook("Livro");
//print_r($library->getBooks());