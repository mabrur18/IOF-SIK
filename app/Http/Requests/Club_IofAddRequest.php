<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Club_IofAddRequest extends FormRequest
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
            
				"no_reg_club" => "nullable|string",
				"club_nama" => "required|string|unique:club_iof,club_nama",
				"club_category" => "required",
				"alamat_club" => "required",
				"logo_club" => "required",
				"join_date" => "required|date",
				"club_status" => "required",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
