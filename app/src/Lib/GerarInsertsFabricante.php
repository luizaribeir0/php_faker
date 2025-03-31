<?php

namespace App\Lib;

class GerarInsertsFabricante
{
    public function gerar(int $qtd): array
    {
        $valores = [];
        $marcas = [
            'Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Fiat', 'Hyundai', 'Nissan',
            'Scania', 'Volvo', 'Mercedes-Benz', 'MAN', 'Iveco', 'DAF', 'BYD', 'BMW',
        ];

        $i = 0;
        foreach ($marcas as $marca) {
            $id = 1 + $i;
            $descricao = $marca;

            $valores[] = "('$id', '$descricao')";
        }

        return $valores;
    }

    public function getCampos(): string
    {
        return 'id, descricao';
    }
}
