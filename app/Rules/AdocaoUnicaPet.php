<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Adocao;

class AdocaoUnicaPet implements Rule
{
    /**
     * criar uma nova instância de regra
     *
     * @return void
     */

    private int $petId;

    public function __construct(int $petId)
    {
        $this->petId = $petId;
    }

    /**
     * Determinar se a regra de validação é aprovada
     *
     * @param strin $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        $jaAdotouEssePet = Adocao::where('email', $value)
                                ->where('pet_id', $this->petId)
                                ->first();

        return !$jaAdotouEssePet;
    }
    /**
     * Retorna uma mensagem validação
     *
     * @return void
     */
    public function message()
    {
        return 'Você já adotou esse pet.';
    }
}
