<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user_id == auth()->user()->id) { //Usuario autenticado
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $event = $this->route()->parameter('post'); //Si lo que le mando es por el método POST

        $rules = [
            'title' => 'required|max:255',
            'body' => 'required',
            'file' => 'image|mimes:jpeg,png,jpg|max:2048',
            'event_date' => 'required|date'
        ];
        
        return $rules;
    }
}
