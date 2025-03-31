<?php

namespace App\Lib;

class GerarInsertsTipoVeiculo
{
    private array $tipos = ['Carro', 'Caminhão', 'Moto'];
    private array $valores = [
        'Carro' => 9,
        'Caminhão' => 13,
        'Moto' => 5,
    ];

    public function gerarLinha(int $index): string
    {
        $id = 1 + $index;
        $descricao = $this->tipos[$index % count($this->tipos)];
        $valor = number_format($this->valores[$descricao], 2, '.', '');

        return "($id, '$descricao', $valor)";
    }

    public function getCampos(): string
    {
        return 'id, descricao, valor';
    }
}

