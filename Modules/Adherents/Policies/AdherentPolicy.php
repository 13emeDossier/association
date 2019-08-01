<?php

namespace Modules\Adherents\Policies;

use Modules\Adherents\Models\Adherent;
use App\User;

use Illuminate\Auth\Access\HandlesAuthorization;

class AdherentPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can create Adherent.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return true;//$user->id > 0;
    }
    /**
     * Determine if the given Adherent can be viewed by the user.
     *
     * @param  \App\User  $user
     * @param  \Modules\Adherents\Models\Adherent  $adherent
     * @return bool
     */
    public function view(?User $user,Adherent $adherent)
    {
        return  true;//$user->id > 0 && !$adherent->trashed();
    }
    /**
     * Determine if the given Adherent can be deleted by the user.
     *
     * @param  \App\User  $user
     * @param  \Modules\Adherents\Models\Adherent  $adherent
     * @return bool
     */
    public function delete(?User $user,Adherent $adherent)
    {
        return true;//$user->id > 0 && !$adherent->trashed();
    }
    /**
     * Determine if the given Adherent can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \Modules\Adherents\Models\Adherent  $adherent
     * @return bool
     */
    public function update(?User $user,Adherent $adherent)
    {   
        return true;//$user->id > 0 && !$adherent->trashed();
    }
}
