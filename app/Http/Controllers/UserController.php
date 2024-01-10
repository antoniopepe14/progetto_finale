<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use PharIo\Manifest\Email;
use App\Mail\BecameRevisor;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class UserController extends Controller
{
    public function home(){
        $products = Auth::User()->products->where('is_accepted', true)->sortByDesc('created_at');
        return view('auth.dashboard', compact('products'));
    }

    public function form(){
        return view('auth.contact');
    }
    public function sendemail(ContactRequest $request){
        
        $data = [
        'name'=>$request->name,
        'email'=>$request->email,
        'description'=>$request->description,
        ];
        Mail::to('admin@gmail.com')->send(new BecameRevisor($data, Auth::user()));
       
        return redirect()->route('home')->with('message', 'Grazie per la tua richiesta di diventare revisore.');        

    }

    public function makeRevisor(User $user){
        if(Auth::user()->email == 'admin@admin'){
            Artisan::call('presto:makeUserRevisor',['email'=>$user->email]);
            return redirect()->route('home')->with('message', 'l\'utente è diventato revisore');
        } else {
            return redirect()->route('home')->with('error', 'l\'utente non è autorizzato');
        }
    }
}