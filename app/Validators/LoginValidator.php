<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use App\Http\Controllers\Controller;
/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class LoginValidator extends Controller
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [],
        ValidatorInterface::RULE_UPDATE => [],
    ];

    public function username($request){
        $messages = [
            'exists' => 'Usuário não cadastrado.',
        ];
        $rules = [
            'username' => 'exists:users'
        ];

        $this->validate($request, $rules, $messages);
    }
}
