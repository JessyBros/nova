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
            'registration_form[username]' => 'Jessy',
            'registration_form[email]' => 'j.bros@hotmail.fr',
            'registration_form[password][first]' => 'password',
            'registration_form[password][second]' => 'password',
        ]);

        $crawler = $client->followRedirect();

        $this->assertSelectorTextContains('div', 'Inscription réussi');
        $this->assertResponseIsSuccessful();
        
    }

    public function testConnexion(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h2', 'Connexion');

        $crawler = $client->submitForm('Connexion', [
            '_username' => 'j.bros@hotmail.fr',
            '_password' => 'password',
        ]);

        $crawler = $client->followRedirect();

        $this->assertSelectorTextContains('a.logout', 'Se déconnecter');
        $this->assertResponseIsSuccessful();
        
    }
}