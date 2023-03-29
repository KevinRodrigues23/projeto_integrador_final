<?php

include('conexao.php');
include('config.php');


class Artigo
{

    private $mysql;

    public function __construct(mysqli $mysql)
    {
        $this->mysql = $mysql;
    }

    public function adicionar(string $nome,string $titulo, string $conteudo): void
    {
        $insereArtigo = $this->mysql->prepare('INSERT INTO blog (nome, titulo, conteudo) VALUES(?,?,?);');
        $insereArtigo->bind_param('sss', $nome, $titulo, $conteudo);
        $insereArtigo->execute();
    }

    public function remover(string $id): void
    {
        $removerArtigo = $this->mysql->prepare('DELETE FROM blog WHERE id = ?');
        $removerArtigo->bind_param('s', $id);
        $removerArtigo->execute();
    }

    public function exibirTodos(): array
    {

        $resultado = $this->mysql->query('SELECT id, nome, titulo, conteudo FROM blog');
        $blog = $resultado->fetch_all(MYSQLI_ASSOC);

        return $blog;
    }

    public function encontrarPorId(string $id): array
    {
        $selecionaArtigo = $this->mysql->prepare("SELECT id, nome, titulo, conteudo FROM blog WHERE id = ?");
        $selecionaArtigo->bind_param('s', $id);
        $selecionaArtigo->execute();
        $artigo = $selecionaArtigo->get_result()->fetch_assoc();
        return $artigo;
    }

    public function editar(string $id,string $nome, string $titulo, string $conteudo): void
    {
        $editaArtigo = $this->mysql->prepare('UPDATE blog SET titulo = ?, conteudo = ? WHERE id = ?');
        $editaArtigo->bind_param('sss',$nome, $titulo, $conteudo, $id);
        $editaArtigo->execute();
    }
}



/*  */




  