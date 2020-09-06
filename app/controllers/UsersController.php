<?php

class UsersController extends \BaseController {

    public function getRegister() {
        return View::make("users.register");
    }

    public function getLogin() {
        return View::make("users.login");
    }

    public function login() {
        $validator = Validator::make(Input::all(), User::$rules);

        return $validator;
    }
}