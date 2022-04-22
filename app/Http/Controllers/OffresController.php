<?php

namespace App\Http\Controllers;

use App\Models\Offre;
use Illuminate\Http\Request;

class OffresController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if ($search != "") {
            $offres = Offre::where('title','LIKE',"%$search%")->orwhere('type','LIKE',"%$search%")->orwhere('description','LIKE',"%$search%")->get();
        }else{

            $offres = Offre::all();
        }
        return view('offres', [
            'offres'=>$offres
        ]);
    }
    public function add_offre(Request $request){

        $this->validate($request,[
            'title'=>'required',
            'price'=>'required',
            'type'=>'required',
            'image'=>'mimes:jpg,png,jpeg|max:6000'
        ]);
        $newImgName = time() . '-pic.' . $request->pic->extension();
        $request->pic->move(public_path('images'),$newImgName);

            $request->user()->offres()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'photo'=>$newImgName,
            'type'=>$request->type,
            'price'=>$request->price
        ]);
        return back();
    }
    public function delete_offre(Offre $offre)
    {
        $offre->delete();
        return back();

    }
    public function find_offre(Offre $offre){
        $get_offre=Offre::find($offre->id);
        return view('updateoffre',['get_offre'=>$get_offre]);
    }

    public function update_offre(Request $request,Offre $offre){
        $updated_offre = Offre::find($offre->id);
        $this->validate($request,[
                'title'=>'required',
                'price'=>'required',
                'type'=>'required',
                'pic'=>'mimes:jpg,png,jpeg|max:6000'
            ]);
            $newImgName = time() . '-pic.' .$request->pic->extension();
            $request->pic->move(public_path('images'),$newImgName);
            
            $updated_offre->title = $request->title;
            $updated_offre->description=$request->description;
            $updated_offre->photo=$newImgName;
            $updated_offre->type=$request->type;
            $updated_offre->price=$request->price;
            
            $updated_offre->update();
            
        return redirect(route('offres'));
    }
    public function afficheByType($type)
        {
            $offres = Offre::where('type','=',$type)->get();
            return view('offres', [
                'offres'=>$offres
            ]);
        }
}
