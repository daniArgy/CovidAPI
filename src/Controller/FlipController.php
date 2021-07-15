<?php


namespace App\Controller;


use App\Entity\FlipType;
use App\Service\FlipSentence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class FlipController extends AbstractController
{
    public function index(FlipSentence $flipSentence): Response
    {
        $data = [
            'Test 1' => $flipSentence('hola', FlipType::createTypeWord()) === 'aloh',
            'Test 2' => $flipSentence('hola', FlipType::createTypeSentence()) === 'hola',
            'Test 3' => $flipSentence('cambio de letras', FlipType::createTypeWord()) === 'oibmac ed sartel',
            'Test 4' => $flipSentence('hola mundo de la programacion', FlipType::createTypeSentence()) === 'programacion la de mundo hola',
        ];

        return new Response($this->printHTML($data));
    }

    private function printHTML(array $data): string
    {
        $html = '<h1>Entrevista técnica</h1>'
            .'<ol>';
        foreach ($data as $key => $test) {
            $resultTest = $test ? 'TRUE' : 'FALSE';
            $html .= '<li>'. $key .': '.$resultTest .'</li>';
        }
        return $html . '</ol>';
    }
}