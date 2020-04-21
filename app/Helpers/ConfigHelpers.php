<?php
/**
 * Created by PhpStorm.
 * User: Milton
 * Date: 10/12/2018
 * Time: 11:24 PM
 */

namespace App\Helpers;

use App\Models\ProgramType;
use App\Models\Setting;
use App\User;

use Illuminate\Support\Facades\Auth;
class ConfigHelpers
{
    public static function getUserProfile()
    {
        //$users = User::whereNotIn('id', [Auth::id()])->get();
        $user = User::find(Auth::id());
        return $user;
    }
    public static function getSettingInfo()
    {
        $info = Setting::first();
        return $info;
    }
    public static function program()
    {
        $programs = ProgramType::where('is_active',1)->get();
        $result="";
        foreach ($programs as $program)
        {
            $result .= '<li class="nav-item"><a class="nav-link" href="'.route('program.index', $program->slug ).'">'.$program->name.'</a></li>';
        }
        return $result;
    }
}
