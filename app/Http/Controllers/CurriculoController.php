<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curriculo;
use Illuminate\Support\Facades\Mail;
use App\Mail\CurriculoEnviado;

class CurriculoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => 'required|string',
            'cargo' => 'required|string',
            'escolaridade' => 'required|string',
            'arquivo' => 'required|mimes:doc,docx,pdf|max:1000',
        ]);

        $arquivoPath = $request->file('arquivo')->store('curriculos');

        $curriculo = new Curriculo();
        $curriculo->nome = $request->nome;
        $curriculo->email = $request->email;
        $curriculo->telefone = $request->telefone;
        $curriculo->cargo = $request->cargo;
        $curriculo->escolaridade = $request->escolaridade;
        $curriculo->observacoes = $request->observacoes;
        $curriculo->arquivo = $arquivoPath;
        $curriculo->ip = $request->ip();
        $curriculo->data_hora_envio = now();
        $curriculo->save();

        Mail::to('destinatario@example.com')->send(new CurriculoEnviado($curriculo));

        return redirect()->route('curricolo.enviado')->with('success', 'Currículo enviado com sucesso!');
    }

    public function create()
    {
        return view('curricolos.create');
    }
}
