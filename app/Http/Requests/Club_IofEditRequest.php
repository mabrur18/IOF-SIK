<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Club_IofEditRequest extends FormRequest
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
		
		$rec_id = request()->route('rec_id');

        return [
            
				"no_reg_club" => "nullable|string",
				"club_nama" => "filled|string|unique:club_iof,club_nama,$rec_id,id",
				"club_category" => "filled",
				"alamat_club" => "filled",
				"logo_club" => "filled",
				"join_date" => "filled|date",
				"club_status" => "filled",
            
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
