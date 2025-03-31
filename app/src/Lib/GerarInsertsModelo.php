<?php

namespace App\Lib;

class GerarInsertsModelo
{
    private array $marcas = [
        'Toyota', 'Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Fiat', 'Hyundai', 'Nissan',
        'Scania', 'Volvo', 'Mercedes-Benz', 'MAN', 'Iveco', 'DAF', 'BYD', 'BMW',
    ];

    private array $modelos = [
        'Toyota' => ['Corolla', 'Hilux', 'Yaris'],
        'Honda' => ['Civic', 'HR-V', 'CB 500X'],
        'Ford' => ['Fiesta', 'Ranger', 'Ka'],
        'Chevrolet' => ['Onix', 'Tracker', 'S10'],
        'Volkswagen' => ['Golf', 'Tiguan', 'Polo'],
        'Fiat' => ['Uno', 'Toro', 'Argo'],
        'Hyundai' => ['HB20', 'Creta', 'Santa Fe'],
        'Nissan' => ['Sentra', 'Versa', 'Kicks'],
        'BMW' => ['X5', '320i', 'R1250GS'],
        'BYD' => ['Song', 'Tang', 'Dolphin'],
        'Scania' => ['R500', 'P320', 'G410'],
        'Volvo' => ['FH16', 'FMX', 'VNL'],
        'Mercedes-Benz' => ['Actros', 'Arocs', 'Atego'],
        'MAN' => ['TGX', 'TGS', 'TGM'],
        'Iveco' => ['Daily', 'Stralis', 'Tector'],
        'DAF' => ['XF', 'CF', 'LF'],
    ];

    private array $usados = [];

    public function gerarLinha(int $index): string
    {
        $id = 1 + $index;
        $fabricanteId = ($index % count($this->marcas)) + 1;
        $marca = $this->marcas[$fabricanteId - 1];

        $modelosDisponiveis = array_diff($this->modelos[$marca], $this->usados[$marca] ?? []);
        $descricao = $modelosDisponiveis[array_rand($modelosDisponiveis)];

        $this->usados[$marca][] = $descricao;

        return "($id, '$descricao', $fabricanteId)";
    }

    public function getCampos(): string
    {
        return 'id, descricao, fabricante_id';
    }
}
