<?php

namespace App\Actions\Fortify;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Commissions;
use App\Models\MarketingLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
    protected $newUserBonus = 100; // every new user has 100 rs bonus defined whose registere with referral code
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        // check validation of name, email, password, refferal code and terms
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'referral_code' => ['nullable', 'size:8', 'exists:users,referral_code'],
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        
        // get user which came with given refferal code
        if (!empty($input['referral_code']))
            $existRefCodeUser = User::where('referral_code', $input['referral_code'])->first();
        
        // make array of user data to add in user table with balance and mlm level
        $dataArr = [
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'referral_code' => substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz'),0,8),
            'mlm_level' => (!empty($existRefCodeUser)) ? $existRefCodeUser->id:0, 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'balance' => $this->newUserBonus,
        ];

        // create user
        $user = User::create($dataArr);
        // if ($user) {
        //     $userIdsArr = array();
        //     // get marketing levels for 
        //     $levels = MarketingLevel::all();
        //     $totalUsers = (!empty($levels)) ? count($levels):0;
        //     // get referral user id and it's data
        //     $usersLevelData = User::where('mlm_level', $existRefCodeUser->id)->get();
        //     // try to do nested loop for collect user ids as array & passed it to commission insert loop
        //     $i = 1;
        //     while( $i <= $totalUsers ) {
        //             $userIdsArr[] = $usersLevelData[0]->id;
        //         $i++;
        //     }
        //     // check users level data and all levels and according percentage level wise commission of user
        //     if (!empty($usersLevel) && !empty($levels)) {
        //         foreach ($levels as $index => $level) {
        //             $amount = (($this->newUserBonus * $level->percentage) / 100);
        //             $commissionUserArr = ['user_id' => $userIdsArr[$index], 'marketing_level_id' => $level->id, 'amount' => $amount];
        //             Commissions::create($commissionUserArr);
        //         }
        //     }
        // }
        return $user;
    }
}
