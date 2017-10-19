<?php
/**
 * UserRepository.php
 * Created by rn on 10/20/2017 1:19 AM.
 */

namespace App\Components\Onsigbaar\Repositories;

use App\Components\Onsigbaar\Models\User;
use App\Components\Onsigbaar\Repositories\DatabaseRepository;

class UserRepository extends DatabaseRepository
{
    public function getModel()
    {
        return new User();
    }

    public function create(array $data)
    {
        $user = $this->getModel();

        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

        $user->fill($data);
        $user->save();

        return $user;
    }

    public function update(User $user, array $data)
    {
        $user->fill($data);

        $user->save();

        return $user;
    }
}