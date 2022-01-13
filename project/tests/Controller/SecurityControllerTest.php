<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class SecurityControllerTest extends WebTestCase
{
    public function testInscription(): void
    {
        // This calls KernelTestCase::bootKernel(), and creates a
        // "client" that is acting as the browser
        $client = static::createClient();

        $crawler = $client->request('GET', '/inscription');

        $this->assertSelectorTextContains('h2', 'Inscription');

        $crawler = $client->submitForm('Inscription', [
            'registration_form[username]' => 'Fabien',
            'registration_form[email]' => 'emraifl@gmail.com',
            'registration_form[password][first]' => 'password',
            'registration_form[password][second]' => 'password',
        ]);

        $crawler = $client->followRedirect();

        $this->assertSelectorTextContains('div', 'Inscription réussi');
        $this->assertResponseIsSuccessful();
        
    }
}