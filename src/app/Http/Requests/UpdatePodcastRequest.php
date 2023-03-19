<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePodcastRequest extends FormRequest
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
            'description' => 'required|string',
            'link' => 'nullable|url',
            'link_podcast' => 'url',
            'tags'=>'required|array'
        ];
    }

    public function getTitle()
    {
        return $this->validated()['title'];
    }

    public function getDescription()
    {
        return $this->validated()['description'];
    }

    public function getLinkVideo()
    {
        return $this->validated()['link'];
    }

    public function getLinkPodcast()
    {
        return $this->validated()['link_podcast'];
    }

    public function getTags()
    {
        return $this->validated()['tags'];
    }
}
