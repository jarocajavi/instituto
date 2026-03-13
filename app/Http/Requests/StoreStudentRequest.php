<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
class StoreStudentRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado a hacer esta petición.
     * IMPORTANTE: debe ser true para que funcione, false lo bloquea todo
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación que se aplican antes de llegar al controlador.
     * Si alguna falla, Laravel redirige atrás con los errores automáticamente.
     */
    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email',
            'phone'      => 'required|string|max:20',
            'course'     => 'required|string|max:100',
            'birth_date' => 'required|date',
        ];
    }
}
