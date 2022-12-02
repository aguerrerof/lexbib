<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'meta_title' => 'required|string|unique:tags,meta_title,'.$this->route('id'),
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
