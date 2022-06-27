<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Commissions;
use App\Models\MarketingLevel;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $users, $commissions, $levels;
    /**
     * Make contructor for models objects business logics
     */
    public function __construct(User $user, Commissions $commissions, MarketingLevel $mLevel)
    {
        $this->users = $user;
        $this->commissions = $commissions;
        $this->levels = $mLevel;
    }

    /**
     * list all users in table
     * @return Array
     */
    public function index()
    {
        $users = $this->users->all();
        return view('users.index', compact('users'));
    }
}
