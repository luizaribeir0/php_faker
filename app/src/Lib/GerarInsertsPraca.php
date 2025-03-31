<?php

namespace App\Lib;

class GerarInsertsPraca
{
    public function gerarLinha(int $index): string
    {
        $id = 1 + $index;
        $numero = rand(1, 50);
        $cidadeId = rand(1, 20);

        return "($id, $numero, $cidadeId)";
    }

    public function getCampos(): string
    {
        return 'id, numero, cidade_id';
    }
}
