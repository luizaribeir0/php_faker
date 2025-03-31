<?php

namespace App\Lib;

class GerarInsertsTickets
{
    public function gerarLinha(int $index): string
    {
        $id = 1 + $index;
        $valor = number_format(rand(5, 13), 2, '.', '');
        $dataHora = date('Y-m-d H:i:s', strtotime("-" . rand(0, 365) . " days"));
        $veiculoId = rand(1, 65);
        $pracaId = rand(1, 12);

        return "($id, $valor, '$dataHora', $veiculoId, $pracaId)";
    }

    public function getCampos(): string
    {
        return 'id, valor, data_hora, veiculo_id, praca_id';
    }
}
