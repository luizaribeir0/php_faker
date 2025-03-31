<?php

namespace App\Lib;

class GerarInsertsFabricante
{
    private array $marcas = [
        'Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Fiat', 'Hyundai', 'Nissan',
        'Scania', 'Volvo', 'Mercedes-Benz', 'MAN', 'Iveco', 'DAF', 'BYD', 'BMW',
    ];

    public function gerarLinha(int $index): string
    {
        $id = 1 + $index;
        $descricao = $this->marcas[$index % count($this->marcas)];

        return "('$id', '$descricao')";
    }

    public function getCampos(): string
    {
        return 'id, descricao';
    }
}
