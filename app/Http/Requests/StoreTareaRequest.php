<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTareaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['required', 'string', 'regex:/^[A-Za-z0-9 \x{00a0}-\x{00ff}!.,*?@-]*$/', 'max:100'],
            'estadoTarea' => ['required', 'string', 'max:20'],
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'categoria_id' => ['required', 'integer', 'exists:categorias,id'],
            'tipoTarea' => ['nullable', 'string','max:20'],
            'descripcion' => ['nullable', 'string', 'regex:/^[A-Za-z0-9 \x{00a0}-\x{00ff}!.,*?@-]*$/','max:500'],
            'fechaInicio' => ['nullable', 'date'],
            'fechaVencimiento' => ['nullable', 'date','after_or_equal:fechaInicio'],
            'duracion' => ['nullable', 'date'],
            'valor' => ['nullable', 'numeric'],
            'recurrente' => ['nullable', 'boolean'],
            'periodicidadRecurrencia' => ['nullable', 'string'],
            'subtarea_id' => ['nullable', 'integer'],
            'amigo_id' => ['nullable', 'integer'],
        ];
    }
}
