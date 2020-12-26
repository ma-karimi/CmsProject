<?php


namespace App\Repository;


use App\Models\User;
use App\Repository\UserRepositroyInterface;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRepository implements UserRepositroyInterface
{
    /**
     * @var Model
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        $permission = request()->filter;
        switch ($permission) {
            case 'all':
            case null:
            default:
                $users = $this->user->paginate(5);
                return $users;
            case 'active':
                $users = $this->user->where('status', 1)->paginate(5);
                return $users;
            case 'deactive':
                $users = $this->user->where('status', 0)->paginate(5);
                return $users;
            case $permission:
                $users = $this->user->permission($permission)->paginate(5);
                return $users;
        }
    }

    public function find($id)
    {
        return $this->user->findOrFail($id);
    }

    public function update($user ,array $array)
    {
        $user->update($array);
    }
}
