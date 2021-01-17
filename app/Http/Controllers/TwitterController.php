<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use Session;
use Redirect;
use File;
use App\Models\User;

class TwitterController extends Controller
{
    public function login(){


    $sign_in_twitter = true;
	$force_login = false;

	// Make sure we make this request w/o tokens, overwrite the default values in case of login.
	\Twitter::reconfig(['token' => '', 'secret' => '']);
	$token = \Twitter::getRequestToken(route('twitter.callback'));

	if (isset($token['oauth_token_secret']))
	{
		$url = \Twitter::getAuthorizeURL($token, $sign_in_twitter, $force_login);

		Session::put('oauth_state', 'start');
		Session::put('oauth_request_token', $token['oauth_token']);
		Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

		return Redirect::to($url);
	}

    abort(404);
    
    }
    public function callback(){

    if (Session::has('oauth_request_token'))
	{
		$request_token = [
			'token'  => Session::get('oauth_request_token'),
			'secret' => Session::get('oauth_request_token_secret'),
		];

		\Twitter::reconfig($request_token);

		$oauth_verifier = false;

		if (request()->has('oauth_verifier'))
		{
			$oauth_verifier = request()->get('oauth_verifier');
			// getAccessToken() will reset the token for you
			$token = \Twitter::getAccessToken($oauth_verifier);
		}

		if (!isset($token['oauth_token_secret']))
		{
			return Redirect::route('twitter.error')->with('flash_error', 'We could not log you in on Twitter.');
		}
		
		$credentials = \Twitter::getCredentials();
		$user_id = $credentials->id_str; 
		$user_name = $credentials->name;
		$screen_name = $credentials->screen_name;
		$profile_image_normal = $credentials ->profile_image_url_https;
		$profile_image = str_replace('_normal','',$profile_image_normal);
		$followers_count = $credentials->followers_count;
		$statuses_count = $credentials ->statuses_count;
		$created_at = $credentials ->created_at;

		$user = User::where('twitterID',$user_id)->first();
		if($user == null){
		$newuser = new User;
		$newuser->twitterID = $user_id;
		$newuser->screen_name = $screen_name;

		$newuser->save();
		}
		
		Session::put('userID', $user_id);

		if (is_object($credentials) && !isset($credentials->error))
		{
			
			try
			{
				$index = 0;
				$max_id = 0;
				$totalTweets = 180;
				$imagearray = array();
				$data = \Twitter::getUserTimeline(['count' => 20, 'format' => 'array','include_entities' => 'true']);
				
				foreach($data as $key => $value){
					if(!empty($value['extended_entities']['media'])){
						foreach($value['extended_entities']['media'] as $v)
						{
							//dd($v['media_url_https']);
							$url = $v['media_url_https'];
							array_push($imagearray,$url);
							// file_put_contents("C:/Users/User/Desktop/twitterhehe/file.txt", $v['media_url_https']. "\n", FILE_APPEND);
							$contents = file_get_contents($url);
							$name = $screen_name.$index.'.jpg';
							// $contents->move(public_path('/images'), $name);
							// $file =request()->file($contents);
							// $file->store('toPath',['disk'=>'my_files']);
							// Storage::put($name, $contents);
							Storage::disk('public')->put($name, $contents);
							$index+=1;
							
						}
					}
				}
			
				Session::put('key', $imagearray);
				
				//dd($data);
			}
			catch (Exception $e)
			{
				// dd(Twitter::error());
				dd(Twitter::logs());
			}
			

			//return Redirect::to('/')->with('flash_notice', 'Congrats! You\'ve successfully signed in!');
			return view('twitter.index',compact('data','screen_name','profile_image','followers_count','statuses_count','created_at','user_name'));

		}

		abort(404);
    }
}
}