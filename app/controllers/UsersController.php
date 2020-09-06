<?php

class UsersController extends \BaseController {

    public function __construct() {
        $this->beforeFilter("csrf", array("on" => "post"));
        $this->beforeFilter('auth', array('only'=>array('getDashboard')));
    }
    public function getRegister() {
        return View::make("users.register");
    }

    public function getLogin() {
        return View::make("users.login");
    }

    public function getDashboard() {
        return View::make("users.dashboard");
    }
    public function postCreate() {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        } else {
            $user = new User;
            $user->name = Input::get("name");
            $user->email = Input::get("email");
            $user->password = Hash::make(Input::get("password"));
            $user->save();

            return Redirect::to("users/login")
                ->with("message", "Thanks for registering in Simplework");
        }
    }

    public function postSignin() {
        $credentials = array(
            "email" => Input::get("email"),
            "password" => Input::get("password")
        );
        
        if (Auth::attempt($credentials)) {
            return Redirect::intended("users/dashboard")
                ->with("message", "Welcome to Simplework");
        } else {
            return Redirect::back()
                ->withInput()
                ->withErrors(array("message" => "Incorrect Email/Password"));
        }
    }

    public function getLogout() {
        Auth::logout();
        return Redirect::to("users/login")->with("message", "You have logged out");
    }
}