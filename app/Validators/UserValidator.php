<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;
use App\Services\UserService;

/**
 * Class UserValidator.
 *
 * @package namespace App\Validators;
 */
class UserValidator extends LaravelValidator
{

    protected $messages = [
        'email.unique' => 'Este e-mail já está cadastrado.',
        'cpf.unique' => 'Este CPF já está cadastrado.',
    ];

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'email' => 'unique:usuarios,email',
            'cpf' => 'unique:usuarios,cpf',
        ],
        ValidatorInterface::RULE_UPDATE => [
            'email' => 'unique:usuarios,email',
        ],
    ];

}
