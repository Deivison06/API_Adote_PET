<?php

namespace App\Http\Controllers;

use App\Http\Requests\PetRequest;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PetController extends Controller
{
    /**
     * Retorna a lista de pets cadastrados.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        return Pet::all();
    }

    /**
     * Armazena um novo pet.
     *
     * @param PetRequest $request
     * @return Pet
     */
    public function store(PetRequest $request)
    {
        $pet = $request->all();

        return Pet::create($pet);;
    }
}
