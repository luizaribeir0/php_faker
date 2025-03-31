<?php

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;

class GerarFakeInsertsCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io)
    {
        $tabela = str_replace(' ', '', ucwords(strtolower($io->ask('Em qual tabela deseja adicionar dados?'))));
        $qtd = (int)$io->ask('Quantos registros deseja gerar?');

        $classe = 'App\Lib\GerarInserts' . $tabela;
        if (!class_exists($classe)) {
            return;
        }

        $gerarInserts = new $classe();

        $nomeTabelaCorreto = strtolower($tabela) != 'tipoveiculo' ? strtolower($tabela) : 'tipo_veiculo';
        $arquivo = $nomeTabelaCorreto . '_' . $qtd . '_fake_inserts.txt';

        $file = fopen($arquivo, 'w');
        fwrite($file, "INSERT INTO " . $nomeTabelaCorreto . " (" . $gerarInserts->getCampos() . ") VALUES\n");

        if ($nomeTabelaCorreto == 'fabricante') {
            $qtd = 16;
        }

        if ($nomeTabelaCorreto == 'tipo_veiculo') {
            $qtd = 3;
        }

        if ($nomeTabelaCorreto == 'modelo') {
            $qtd = 48;
        }

        for ($i = 0; $i < $qtd; $i++) {
            $valor = $gerarInserts->gerarLinha($i);
            fwrite($file, $valor . (($i < $qtd - 1) ? ",\n" : ";\n"));
        }

        fclose($file);
        $io->success("Arquivo '$arquivo' gerado com sucesso!");
    }
}
