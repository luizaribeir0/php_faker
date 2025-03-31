<?php

namespace App\Lib;

class GerarInsertsTipoVeiculo
{
    private array $tipos = ['Carro', 'Caminhão', 'Moto'];

    public function gerarLinha(int $index): string
    {
        $id = 1 + $index;
        $descricao = $this->tipos[$index % count($this->tipos)];

        return "('$id', '$descricao')";
    }

    public function getCampos(): string
    {
        return 'id, descricao';
    }
}

