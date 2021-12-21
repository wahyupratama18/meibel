<?php

namespace App\Http\Requests;

use App\Models\Temporar;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateExerciseFileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exercise_file' => ['sometimes', $this->exercise_file ? Rule::exists(Temporar::class, 'folder') : ''],
            'discussion_file' => ['sometimes', $this->discussion_file ? Rule::exists(Temporar::class, 'folder') : ''],
        ];
    }
}
