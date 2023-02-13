<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class AuthRequest extends FormRequest
{
    private $user;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     * @throws \Exception
     */
    public function authorize()
    {
        $this->setUser();

        return true;
    }

    /**
     * @return void
     * @throws \Exception
     */
    private function setUser()
    {
        if (!$user = User::query()->where('email', $this->email)->first()){
            throw new \Exception('invalid email or password');
        }

        if (!Hash::check($this->password, $user->password)){
            throw new \Exception('invalid email or password');
        }

        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser():User
    {
        return $this->user;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
        ];
    }
}
