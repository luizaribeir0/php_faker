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

        $sql = "INSERT INTO " . strtolower($tabela) . " (" . $gerarInserts->getCampos() . ") VALUES\n";
        $sql .= implode(",\n", $gerarInserts->gerar($qtd)) . ";\n";

        $arquivo = strtolower($tabela) . $qtd . 'fake_inserts_.sql';

        file_put_contents($arquivo, $sql);
        $io->success("Arquivo '$arquivo' gerado com sucesso!");
    }
}
