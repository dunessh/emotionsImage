<?php

namespace App\Http\Controllers;


set_time_limit(0);

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Illuminate\Support\Facades\Http;
use App\Models\Image;
use Session;

class PagesController extends Controller
{
    
    public function analyze(){
        $title = 'Sentiment Analysis';
        $imagearray = Session::get('key');
        $userID = Session::get('userID');
        // $status = false;
        // $userImage = Image::where('name',$user_id)->first();
        // foreach($imagearray as $image)
        // {
        //     if($image)
        // }
        
        $resp = Http::get('http://127.0.0.1:5000/webhook?username='.$userID);
        $person = json_decode($resp,true);
        
        if($person['positive']>$person['negative']){
            $mood = 'positive';
        }
        elseif($person['positive']<$person['negative']){
            $mood = 'negative';
        }
        else{
            $mood = 'neutral';
        }

        
        
        
        // $newImage = new Image;
        // $newImage->name = $person['dict'];
        // foreach ($person['dict'] as $key => $node){
        //      dd($key);
        // }
           

		// $newuser->screen_name = $screen_name;

		// $newuser->save();
       

        return view('twitter.analyze',['mood'=> $mood,'sentiment'=> $person['sentiment'],'negative'=> $person['negative'],'positive'=> $person['positive']]);
    }


}