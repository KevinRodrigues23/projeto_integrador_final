<?php
class vaga    // class produto
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }


    public function adicionar(string $Cargo ,string $Salario, string $Carga_horaria,string $Requisitos,string $Categoria,): void
    {
        $insereVaga = $this->mysql->prepare('INSERT INTO vagas (Cargo, Salario , Carga_horaria, Requisitos, Categoria) VALUES (?,?,?,?,?,);');
        $insereVaga->bind_param('sssss' , $Cargo ,$Salario, $Carga_horaria, $Requisitos, $Categoria);
        $insereVaga->execute();
    }






    public function exibirTodos(): array 
    {

        $resultado = $this->mysql->query("SELECT id_vaga ,Cargo ,Salario ,Carga_horaria,Requisitos,Categoria FROM vagas");
        $vagas = $resultado->fetch_all(MYSQLI_ASSOC);
        
        return $vagas;
    }

    
    public function encontrarPorId($id_vaga): array
    {
        $selecionarVaga = $this->mysql->prepare("SELECT id_vaga,Cargo,Salario,Carga_horaria,Requisitos,Categoria FROM vagas WHERE id_vaga = ?");
        $selecionarVaga->bind_param('s', $id_vaga);  
        $selecionarVaga->execute();
        $vaga = $selecionarVaga->get_result()->fetch_assoc();

        return $vaga;
    }


}

?>