<?php

require 'vendor/autoload.php';

use Ronycode\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$client = new Client([
    'base_uri' => 'https://www.alura.com.br',
    'verify' => false,
]);

$crawler = new Crawler();
$buscador = new Buscador($client, $crawler);
$cursos = $buscador->busca('/cursos-online-programacao/php');
$client = new Client(['verify' => false]);
foreach ($cursos as $curso) {
    echo exibeMensagem($curso);
}
