<?php

namespace App;

class Authorisation
{
    public function login($email, $password) {
        $user = $this
            ->where('email', $email)
            ->get()
            ->first();

        return password_verify($password, $user->password);
    }


    public function register($email, $password) {
        // some validation
        self::create([
            'email' => $email,
            'password' => password_hash($password, 'empty'),
        ]);
    }


    private $easyTokenReminderGenerator;

    public $email;

    public function restorePassword($email) {
        // validation
        $token = $this->createPasswordToken($email);
        self::update([
            'reset_token' => $token,
        ]);

        $this->email->send(
            $email, 'Password restore', 'views/auth/restorePassword', ['token' => $token]
        );
    }


    private function createPasswordToken($email)
    {
        return md5($email);
    }

    private function checkIfEMailIsWalid() {
        return '';
    }

}