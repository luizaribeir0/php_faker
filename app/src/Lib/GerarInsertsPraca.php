<?php

namespace App\Lib;

class GerarInsertsPraca
{
    public function gerar(int $qtd): array
    {
        $valores = [];

        for ($i = 0; $i < $qtd; $i++) {
            $id = 1 + $i;
            $numero = rand(1, 50);
            $cidadeId = rand(1, 20);

            $valores[] = "('$id', '$numero', '$cidadeId')";
        }

        return $valores;
    }

    public function getCampos(): string
    {
        return 'id, numero, cidade_id';
    }
}
