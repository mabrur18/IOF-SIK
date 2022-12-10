<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Member_IofAddRequest extends FormRequest
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
            
				"nama" => "required|string",
				"nik" => "required|string",
				"email" => "required|email",
				"alamat" => "required",
				"tempat_lahir" => "required|string",
				"tanggal_lahir" => "required|date",
				"handphone" => "required|string",
				"no_kta" => "nullable|string",
				"tanggal_kta" => "nullable|date",
				"tanggal_kta_exp" => "nullable|date",
				"club_nama" => "required",
				"club_type" => "required",
				"member_status" => "required",
				"photo" => "required",
            
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
