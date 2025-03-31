<?php

namespace App\Lib;

class GerarInsertsTipoVeiculo
{
    public function gerar(int $qtd): array
    {
        $valores = [];
        $tipos = ['Carro', 'Caminhão', 'Moto'];

        $i = 0;
        foreach ($tipos as $tipo) {
            $id = 1 + $i;
            $descricao = $tipo;

            $valores[] = "('$id', '$descricao')";
        }

        return $valores;
    }

    public function getCampos(): string
    {
        return 'id, descricao';
    }
}

