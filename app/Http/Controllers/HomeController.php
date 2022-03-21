<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class HomeController extends Controller
{
    public function index(Request $request){
        $search=$request['search'] ??"";
        if($search!=""){
$contact=Contact::where('name','LIKE', "$search%")->orWhere('email','LIKE', "%$search%")-> get();
        }
        else{
            $contact=Contact::paginate(2);
        }
        
        return view('frontend.index', compact('contact','search'));
    }

    public function create(){
        return view('frontend.create');
    }

    public function store(Request $request){
        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s'),

        );
if ($request->hasFile('image')) {
 $imageName = rand(999,9999999).time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
$data['image']=$imageName;
}

Contact::insert($data);
return redirect('/');



    }


    public function edit($id){
        $cont=Contact::where('id','=', $id)->get();
        return view('frontend.edit', compact('cont'));
    }

    public function update(Request $request){
        $data=array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            

        );
if ($request->hasFile('image')) {
 $imageName = rand(999,9999999).time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
$data['image']=$imageName;
}

Contact::where('id','=', $request->id)->update($data);
return redirect('/'); 
    }

}
