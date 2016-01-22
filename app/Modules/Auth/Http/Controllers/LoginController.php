<?php namespace App\Modules\Auth\Http\Controllers;

use View, Sentry, Input, Session, Redirect, Exception, FrontController;

class LoginController extends FrontController {
    
    public function getIndex()
    {
        $this->pageView('auth::login');
    }

    public function postIndex()
    {
        $credentials = [
            'email'     => Input::get('email'),
            'password'  => Input::get('password')
        ];

        try {
            $user = Sentry::authenticate($credentials, false); // Login the user (if possible)

            Session::set('app.locale', user()->language->code); // Set session locale to account language

            if (Session::get('redirect')) {
                $redirect = Redirect::to(Session::get('redirect'));
                Session::forget('redirect');
                return $redirect;
            } else {
                return Redirect::to('/');   
            }
        } catch(Exception $e) {
            return Redirect::to('auth/login')->withErrors(['message' => $e->getMessage()]);
        }
    }
}