<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'category_id' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
            'gender' => ['required'],
            'email' => ['required', 'email'],
            'tell_1' => ['required', 'max:5'],
            'tell_2' => ['required', 'max:5'],
            'tell_3' => ['required', 'max:5'],
            'address' => ['required'],
            'detail' => ['required', 'max:120']
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '姓を入力してください',
            'first_name.required' => '名を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tell_1.required' => '電話番号を入力してください',
            'tell_2.required' => '電話番号を入力してください',
            'tell_3.required' => '電話番号を入力してください',
            'tell_1.max' => '電話番号は5桁までの数字で入力してください',
            'tell_2.max' => '電話番号は5桁までの数字で入力してください',
            'tell_3.max' => '電話番号は5桁までの数字で入力してください',
            'address.required' => '住所を入力してください',
            'category_id.required' => 'お問い合わせの種類を入力してください',
            'detail.required' => 'お問い合わせの内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
