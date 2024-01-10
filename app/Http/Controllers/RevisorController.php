<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function index(){
        $announcementToCheck = Product::where('is_accepted', null)->first();
        $announcementsChecked = Product::where('is_accepted', "!=", null)->orderByDesc('created_at')->paginate(8);

        return view('revisor.index', compact('announcementToCheck', 'announcementsChecked'));
    }

    public function acceptAnnouncement(Product $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Annuncio accettato con successo');
    }
    public function rejectAnnouncement(Product $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Annuncio rifiutato con successo');
    }
}
