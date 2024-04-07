<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ////"name"=> "required"|"String"    ----- //// c'est préferable d'uiliser des cotes et non des Pipe car on pourrait ajouter plus tard des objets dans la vilidation
            "name" =>  ['required','string',"max:100"],
            "status" =>  ['required','integer']

        ];
    }
}
