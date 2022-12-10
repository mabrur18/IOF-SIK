<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Member_IofEditRequest extends FormRequest
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
            
				"nama" => "filled|string",
				"nik" => "filled|string",
				"email" => "filled|email",
				"alamat" => "filled",
				"tempat_lahir" => "filled|string",
				"tanggal_lahir" => "filled|date",
				"handphone" => "filled|string",
				"no_kta" => "nullable|string",
				"tanggal_kta" => "nullable|date",
				"tanggal_kta_exp" => "nullable|date",
				"club_nama" => "filled",
				"club_type" => "filled",
				"member_status" => "filled",
				"photo" => "filled",
            
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
