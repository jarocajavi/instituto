<?php
namespace App\Http\Requests;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
class UpdateStudentRequest extends FormRequest
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
     * Reglas de validación para actualizar un estudiante.
     * Usamos 'ignore' en email para que no falle al guardar el mismo email del propio estudiante
     */
    public function rules(): array
    {
        return [
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:students,email,' . $this->student->id,
            'phone'      => 'required|string|max:20',
            'course'     => 'required|string|max:100',
            'birth_date' => 'required|date',
        ];
    }
}
