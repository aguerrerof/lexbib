<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreTagRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'meta_title' => 'required|string|unique:tags',
            'slug' => 'nullable|string',
            'context' => 'required|string',
        ];
    }

    public function getTitle()
    {
        return $this->validated()['title'];
    }

    public function getMetaTitle()
    {
        return $this->validated()['meta_title'];
    }

    public function getSlug()
    {
        return $this->validated()['slug'];
    }

    public function getContext()
    {
        return $this->validated()['context'];
    }
}
