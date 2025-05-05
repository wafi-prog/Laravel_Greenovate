<?php

namespace App\Helpers;

use App\Models\User;
use Carbon\Carbon;

class FormatHelper
{
    public static function formatResultAuth($user)
    {
        return [
            'id_user' => $user->id,
            'name' => $user->name,
            'role' => $user->role,
            'telpon' => $user->telpon, 
            'email' => $user->email,
            'tanggal_daftar' => Carbon::parse($user->created_at)->translatedFormat('d F Y'),
            'updated_at' => $user->updated_at,
        ];
    }

    public static function resultUser($id_user)
    {
        $user = User::where('id', $id_user)
            ->get()
            ->map(function ($user) {
                return self::formatResultAuth($user);
            });

        return $user;
    }
}
