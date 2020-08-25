<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\LostPet;
use App\User;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class LostPetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $area = ['N' => ['台北市', '基隆市', '新北市', '桃園縣', '新竹市', '新竹縣'] ,
                    'C' => ['台中市', '苗栗縣', '彰化縣', '南投縣', '雲林縣', '嘉義市', '嘉義縣'],
                    'S' => ['高雄市', '台南市', '屏東縣'],
                    'E' => ['花蓮縣', '宜蘭縣', '台東縣']];
    public function index(Request $request)
    {       
        $pets = Pet::with(['lostpet'])
                   ->orderBy('created_at', 'desc')  
                   ->whereHas('lostpet', function($query){
                        $query->where('approval_status', 1);
                   });                    
        if(isset($request['animal_type']) && $request['animal_type']) {
            $pets = $pets->where('animal_type', $request['animal_type']);
        }          
        if(isset($request['area']) && $request['area']) {
            $pets = $pets->whereIn('animal_place', $this->area[$request['area']]);
        }
        if(isset($request['animal_sex']) && $request['animal_sex']) {
            $pets = $pets->where('animal_sex', $request['animal_sex']);
        }
        if(isset($request['lost_time'])&& $request['lost_time']) {
            $pets = $pets->whereHas('lostpet', function($query) 
            use($request){ 
                $query->where('lost_time', $request['lost_time']);
            });                                                             
        }else{
            $pets = $pets->whereHas('lostpet');
        }
        $pets = $pets->paginate(8);
        $params = collect(request()->all());
        return view('lostpets.index',['pets'=> $pets, 'params' => $params]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lostpets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // dd($request);
        $path = $request->file('animal_img')->store('public');  
        $path = str_replace('public/', '/storage/', $path);
        $pet = New pet;
        $pet->animal_name = $request['animal_name'];
        $pet->animal_breed = $request['animal_breed'];
        $pet->animal_type = $request['animal_type'];
        $pet->animal_sex = $request['animal_sex'];
        $pet->animal_size = $request['animal_size'];
        $pet->animal_colour = $request['animal_colour'];
        $pet->animal_age = $request['animal_age'];
        $pet->animal_ligation = $request['animal_ligation'];
        $pet->animal_place = $request['animal_place'];
        $pet->animal_description = $request['animal_description'];
        $pet->animal_img = $path;
        $pet->save();

        $lostpet = new LostPet;
        $lostpet->pet_id = $pet->id;
        $lostpet->lost_time = $request['lost_time'];
        $lostpet->lost_place = $request['lost_place'];
        $lostpet->user_id = Auth::id();
        $lostpet->save();

        return redirect('/lostpets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(LostPet $lostpet)
    {
        $pet = Pet::with(['comments' => function($query) use($lostpet) {
                        $query->where('pet_id', $lostpet->pet_id);
                  }])
                  ->where('id', $lostpet->pet_id)
                  ->first();
        return view('lostpets.show',['lostpet'=>$lostpet, 'pet'=> $pet]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LostPet $lostpet, Pet $pet, User $user)
    {
        $pet = Pet::where('id' , $lostpet->pet_id)
                  ->first();
        return view('lostpets.edit', ['lostpet'=>$lostpet, 'pet'=> $pet, 'user'=>$user]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LostPet $lostpet, Pet $pet, User $user)
    {
        if($request->file('animal_img')) {
            $path = $request->file('animal_img')->store('public');
            $path = str_replace('public/', '/storage/', $path);
        }
        $pet = Pet::where('id', $lostpet->pet_id)
                  ->get()
                  ->first();
        $pet->fill($request->all());
        if(isset($path)){
            $pet->animal_img = $path;
        }
        $pet->save();
        
        return redirect('/lostpets');
    }

    public function saveComment(Request $request)
    {
        $comment = new Comment;
        $comment->pet_id = $request['pet_id'];
        $comment->name = $request['name'];
        $comment->comment = $request['comment'];
        $comment->user_id = Auth::id();
        $comment->save();

        $pet = Pet::where('id', $request['pet_id'])
                  ->first();
        return redirect('/lostpets/show/'. $pet->lostpet->lost_pet_id);
    }

    public function destroy(Comment $comment)
    {
        // logger($comment);
        // $delete = Comment::where('id', $comment->id)
        //                  ->get()
        //                  ->first();
        // $delete->delete();
        $comment->delete();        
    }

    public function loststatus()
    {
        $lostPet = LostPet::where('lost_pet_id', request('lostPetID'))
                          ->get()
                          ->first();
        $lostPet->status = 1;
        $lostPet->save();
        if($lostPet) {
            return response()->json(['success' => true,
                                     'error' => false]);
        }else{
            return response()->json(['success' => false,
                                     'error' => true]);
        }                               
    }

    public function lostapproval()
    {
        $lostPet = LostPet::where('lost_pet_id', request('lostPetID'))
                          ->get()
                          ->first();
        $lostPet->approval_status = 1;
        $lostPet->save();
        if($lostPet) {
            return response()->json(['success' => true,
                                     'error' => false]);
        }else{
            return response()->json(['success' => false,
                                     'error' => true]);
        }                            
    }
}
