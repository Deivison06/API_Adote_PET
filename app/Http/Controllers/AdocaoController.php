<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdocaoCollection;
use App\Models\Adocao;
use App\Rules\AdocaoUnicaPet;
use Illuminate\Http\Request;

class AdocaoController extends Controller
{
    public function index()
    {

        $adocoes = Adocao::with('pet')->get();

        return new AdocaoCollection($adocoes);
    }

    /**
     * cria um novo registro de adoção
     *
     * @param Request $request
     * @return Adoção
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'email', new AdocaoUnicaPet($request->input('pet_id', 0))],
            'valor' => ['required', 'numeric', 'between:10,100'],
            'pet_id' => ['required', 'integer', 'exists:pets,id']
        ]);

        return Adocao::create($validatedData);
    }
}
