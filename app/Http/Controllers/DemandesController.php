<?php

namespace App\Http\Controllers;

use App\Models\Demande;
use Illuminate\Http\Request;

class DemandesController extends Controller
{
    public function __construct(){
        $this->middleware(['auth']);
    }
    public function index(Request $request){
        $search = $request['search'] ?? "";
        if ($search != "") {
            $demandes = Demande::where('title','LIKE',"%$search%")->orwhere('description','LIKE',"%$search%")->get();
        }else{
            $demandes = Demande::all();
        }
        return view('demandes', [
            'demandes'=>$demandes
        ]);
    } 
    public function add_demande(Request $request){
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'pic'=>'required'
        ]);
        $newImgName = time() . '-pic.' . $request->pic->extension();
        $request->pic->move(public_path('images'),$newImgName);
            $request->user()->demandes()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'photo'=>$newImgName
        ]);
        return back();
    }
    public function delete_demande(Demande $demande)
    {

        $demande->delete();
        return back();

    }
    public function find_demande(Demande $demande){
        $get_demande=Demande::find($demande->id);
        return view('updatedemande',['get_demande'=>$get_demande]);
    }
    public function update_demande(Request $request, Demande $demande){

        $updated_demande=Demande::find($demande->id);
        $this->validate($request,[
            'title'=>'required',
            'description'=>'required',
            'pic'=>'required'
        ]);
        $newImgName = time() . '-pic.' .$request->pic->extension();
        $request->pic->move(public_path('images'),$newImgName);
        
        $updated_demande->title = $request->title;
        $updated_demande->description=$request->description;
        $updated_demande->photo=$newImgName;

        $updated_demande -> update();
        return redirect(route('demandes'));
    }
}
