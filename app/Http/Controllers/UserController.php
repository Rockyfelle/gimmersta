<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\User;

class UserController extends Controller
{
	function getUsers()
	{
		$client = new Client();
		$res = $client->get('http://jsonplaceholder.typicode.com/users');
		$users = json_decode($res->getBody(), 2);
		$models = collect();
		foreach ($users as $user) {
			$newUser = new User();
			$newUser->id = $user['id'];
			$newUser->name = $user['name'];
			$newUser->username = $user['username'];
			$newUser->email = $user['email'];
			$newUser->street = $user['address']['street'];
			$newUser->streetFull = $user['address']['street'] . ' ' . $user['address']['suite'] . ' ' . $user['address']['city'] . ' ' . $user['address']['zipcode'];
			$models->add($newUser);
		}
		return $models;
	}
	function index()
	{
		$models = $this->getUsers();

		return view('welcome')->with('users', $models);
	}

	function user($id)
	{
		$models = $this->getUsers();

		$user = $models->first(function ($item) use ($id) {
			return $item->id == $id;
		});

		return view('user')->with('user', $user);
	}
}
