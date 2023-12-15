<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;

class BbsController extends Controller
{
    public function index()
    {
        $context = ['bbs' => Bb::latest()->get()];
        return view('index', $context);
    }

    public function detail(Bb $bb) {
        $s = $bb->title . "\r\n\r\n";
        $s .= $bb->content . "\r\n";
        $s .= $bb->price . " руб. \r\n";
        return response($s)->header('Content-Type', 'text/plain');
    }
}
