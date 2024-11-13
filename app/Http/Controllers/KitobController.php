<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kitob;
use Illuminate\Http\Request;

class KitobController extends Controller
{
    public function kitob()
    {
        $kitoblar=Kitob::orderBy('id','desc')->get();
        return view('Kitob.kitob',['kitoblar'=>$kitoblar]);
    }
    public function kitobcreate()
    {
        return view('Kitob.kitobcreate');
    }
    public function store(Request $request)
    {
        //dd(123);
        $data = $request->validate([
            'name' => 'required|max:25',
            'author' => 'required|max:50',
            'price' => 'required',
        ]);
        $kitob = Kitob::create($data);

        return redirect('/kitob')->with('success', "Ma'lumot muvaffaqiyatli qo'shildi");

    }
    public function edit(Kitob $kitob)
    {
        //dd(123);
        return view('Kitob.kitobupdate',['kitob'=>$kitob]);
    }
    public function update(Request $request,Kitob $kitob)
    {
        $request->validate([
            'name' => 'required|max:25',
            'author' => 'required|max:50',
            'price' => 'required',
        ]); 
        $kitob->name=$request->name;
        $kitob->author=$request->author;
        $kitob->price=$request->price;

        $kitob->save();
        return redirect('/kitob')->with('success', "Ma'lumot muvaffaqiyatli yangilandi");

    }
    public function delete(Kitob $kitob)
    {
        //dd($kitob);
        $kitob->delete();
        return redirect('/kitob')->with('success', "Ma'lumot muvaffaqiyatli o'chirildi");

    }
}
