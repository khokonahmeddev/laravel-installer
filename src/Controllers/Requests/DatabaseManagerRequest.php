<?php

namespace Khokon\Installer\Controllers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatabaseManagerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'database_connection' => 'required',
            'database_hostname' => 'required',
        ];

    }
}
