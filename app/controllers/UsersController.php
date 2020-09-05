<?php

class UsersController extends \BaseController {

    public function login() {
        $validator = Validator::make(Input::all(), User::$rules);

        return $validator;
    }
}