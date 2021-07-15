<?php


namespace App\Controller;


use App\Entity\FlipWord;
use App\Entity\FlipLetter;
use App\Service\FlipSentence;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

final class FlipController extends AbstractController
{
    public function index(FlipSentence $flipSentence): Response
    {
        $data = [
            'Test 1' => $flipSentence(new FlipLetter('hola')) === 'aloh',
            'Test 2' => $flipSentence(new FlipWord('hola')) === 'hola',
            'Test 3' => $flipSentence(new FlipLetter('cambio de letras')) === 'oibmac ed sartel',
            'Test 4' => $flipSentence(new FlipWord('hola mundo de la programacion')) === 'programacion la de mundo hola',
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