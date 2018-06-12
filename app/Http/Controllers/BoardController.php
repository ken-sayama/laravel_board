<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Board;
class BoardController extends Controller
{
    
    /**
     * @param $request
     * @responce $responce
     */
    public function index(){
        $boards = Board::all();
        return view('boards.index', ['boards'=> $boards]);
    }
    
    public function create(){
        return view('boards.create');
    }
    
    public function store(Request $request){
        $board = new Board();
        $board->title = $request->input('title');
        $board->content = $request->input('content');
        $board->save();
    
        return redirect('/boards');
    }
}
