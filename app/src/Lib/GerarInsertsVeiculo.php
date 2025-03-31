<?php

namespace App\Lib;

class GerarInsertsVeiculo
{
    public function gerarLinha(int $index): string
    {
        $id = $index + 1;
        $placa = $this->gerarPlaca();
        $modeloId = rand(1, 48);
        $tipoVeiculoId = rand(1, 3);

        return "($id, '$placa', $modeloId, $tipoVeiculoId)";
    }

    private function gerarPlaca(): string
    {
        $letras = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));
        $numeros = rand(0, 9) . strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 1)) . rand(10, 99);

        return "{$letras}{$numeros}";
    }

    public function getCampos(): string
    {
        return 'id, placa, modelo_id, tipo_veiculo_id';
    }
}
