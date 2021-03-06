<?php

namespace App\Containers\User\Tasks;

use App\Services\ApiAuthentication\Portals\ApiAuthenticationService;
use App\Kernel\Task\Abstracts\Task;

/**
 * Class CreateUserTask.
 *
 * @author Mahmoud Zalt <mahmoud@zalt.me>
 */
class ApiLoginTask extends Task
{

    /**
     * @var \App\Services\ApiAuthentication\Portals\ApiAuthenticationService
     */
    private $authenticationService;

    /**
     * ApiLoginTask constructor.
     *
     * @param \App\Services\ApiAuthentication\Portals\ApiAuthenticationService $authenticationService
     */
    public function __construct(ApiAuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }

    /**
     * @param $email
     * @param $password
     *
     * @return mixed
     */
    public function run($email, $password)
    {
        $token = $this->authenticationService->login($email, $password);

        $user = $this->authenticationService->getAuthenticatedUser($token);

        return $user;
    }
}
