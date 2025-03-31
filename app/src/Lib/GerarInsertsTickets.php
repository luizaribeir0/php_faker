<?php

namespace App\Lib;

class GerarInsertsTickets
{
    public function gerar(int $qtd): array
    {
        $valores = [];

        for ($i = 0; $i < $qtd; $i++) {
            $id = 1 + $i;
            $valor = number_format(rand(5, 13), 2, '.', '');
            $dataHora = date('Y-m-d H:i:s', strtotime("-" . rand(0, 365) . " days"));
            $veiculoId = rand(1, 25);
            $pracaId = rand(1, 12);

            $valores[] = "('$id', '$valor', '$dataHora', '$veiculoId', '$pracaId')";
        }

        return $valores;
    }

    public function getCampos(): string
    {
        return 'id, valor, data_hora, veiculo_id, praca_id';
    }
}
