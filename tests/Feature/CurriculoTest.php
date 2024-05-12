<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;

use Tests\TestCase;

class CurriculoTest extends TestCase
{
    public function test_curriculo_route_is_accessible()
    {
        $response = $this->get(route('curricolos.create'));

        $response->assertStatus(200);
    }

    public function test_curriculo_is_saved_to_database()
    {
        $data = [
            'nome' => 'João da Silva',
            'email' => 'joao@example.com',
            'telefone' => '(11) 99999-9999',
            'cargo' => 'Desenvolvedor Web',
            'escolaridade' => 'Graduação',
            'arquivo' => UploadedFile::fake()->create('curriculo.pdf'),
        ];

        $response = $this->post(route('curricolos.store'), $data);

        $response->assertSessionHasNoErrors();

        $response->assertRedirect(route('curricolo.enviado'));


        $this->assertDatabaseHas('curriculos', [
            'nome' => 'João da Silva',
            'email' => 'joao@example.com',
        ]);
    }

    public function test_email_is_sent_after_curriculum_submission()
    {
        Mail::fake();

        $data = [
            'nome' => 'João da Silva',
            'email' => 'joao@example.com',
            'telefone' => '(11) 99999-9999',
            'cargo' => 'Desenvolvedor Web',
            'escolaridade' => 'Graduação',
            'arquivo' => UploadedFile::fake()->create('curriculo.pdf'),
        ];

        // Realiza a submissão do currículo
        $this->post('/curriculos', $data);

        // Verifica se o e-mail esperado foi enviado
        Mail::assertSent(CurriculoEnviado::class, function ($mail) use ($data) {
            return $mail->curriculo->nome === $data['nome'] &&
                $mail->curriculo->email === $data['email'];
        });
    }


}
