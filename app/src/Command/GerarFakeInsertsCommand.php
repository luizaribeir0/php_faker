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
        $arquivo = strtolower($tabela) . '_' . $qtd . '_fake_inserts.sql';

        $file = fopen($arquivo, 'w');
        fwrite($file, "INSERT INTO " . strtolower($tabela) . " (" . $gerarInserts->getCampos() . ") VALUES\n");

        for ($i = 0; $i < $qtd; $i++) {
            $valor = $gerarInserts->gerarLinha($i);
            fwrite($file, $valor . (($i < $qtd - 1) ? ",\n" : ";\n"));
        }

        fclose($file);
        $io->success("Arquivo '$arquivo' gerado com sucesso!");
    }
}
