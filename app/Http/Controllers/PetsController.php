<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pet;
use App\PublicPet;
use App\NormalPet;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class PetsController extends Controller
{
    public $area = ['N' => ['台北市', '基隆市', '新北市', '桃園縣', '桃園市','新竹市', '新竹縣'] ,
                    'C' => ['台中市', '苗栗縣', '彰化縣', '南投縣', '雲林縣', '嘉義市', '嘉義縣'],
                    'S' => ['高雄市', '台南市', '屏東縣'],
                    'E' => ['花蓮縣', '宜蘭縣', '台東縣']];
                    
    public function index(Request $request)
    {
        $pets = Pet::with(['normalpet'])
                   ->orderBy('created_at', 'desc') 
                   ->whereHas('normalpet', function($query) {
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
        $pets = $pets->paginate(8);
        $params = collect(request()->all());
        return view('normalpets.index',['pets'=> $pets, 'params' => $params]);
    }
    public function admin()
    {
        $normalpets = Pet::with(['normalpet'])
                         ->whereHas('normalpet',function($query){
                             $query->where('user_id', Auth::user()->id);
                         })
                         ->get();
        $lostpets = Pet::with(['lostpet'])
                       -> whereHas('lostpet', function($query){
                           $query->where('user_id', Auth::user()->id);
                       })
                       ->get();
        return view('normalpets.admin' ,['normalpets'=>$normalpets, 'lostpets'=>$lostpets]);
    }
    public function useradmin()
    {
        $normalpets = Pet::with(['normalpet'])
                         ->whereHas('normalpet')
                         ->get();
        $lostpets = Pet::with(['lostpet'])
                       -> whereHas('lostpet')
                       ->get();
        return view('normalpets.useradmin' ,['normalpets'=>$normalpets, 'lostpets'=>$lostpets]);
    }
    public function create()
    {
        return view('normalpets.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('animal_img')->store('public');  
        $path = str_replace('public/', '/storage/', $path);

        $pet = New Pet;
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

        $normalpet = new NormalPet;
        $normalpet->pet_id = $pet->id;
        $normalpet->reason = $request['reason'];
        $normalpet->approval_status = $request['approval_status'];
        $normalpet->user_id = Auth::id();
        $normalpet->save();

        return redirect('/normalpets');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(NormalPet $normalpet)
    {
        $pet = Pet::with(['comments' => function($query) use($normalpet){
                        $query->where('pet_id', $normalpet->pet_id);
                    }])
                  ->where('id', $normalpet->pet_id)
                  ->first();

        return view('normalpets.show',['normalpet'=>$normalpet, 'pet'=> $pet,]);
    }

    public function edit(NormalPet $normalpet, Pet $pet, User $user)
    {
         $pet = Pet::where('id', $normalpet->pet_id)
                   ->first();
        //   dd($pet);          
        return view('normalpets.edit', ['normalpet' => $normalpet, 'pet'=> $pet, 'user'=>$user]);
    }
    public function update(Request $request, NormalPet $normalpet, Pet $pet, User $user)
    {
        
        if($request->file('animal_img')){
        $path = $request->file('animal_img')->store('public');  
        $path = str_replace('public/', '/storage/', $path);
        }
        $pet = Pet::where('id', $normalpet->pet_id)
                  ->get()
                  ->first();

        $pet->fill($request->all());
        if(isset($path)){
            $pet->animal_img = $path;
        }
        $pet->save();

        return redirect('/normalpets');
    }
    
    public function saveComment(Request $request) {
        $comment = new Comment;
        $comment->pet_id = $request['pet_id'];
        $comment->name = $request['name'];
        $comment->comment = $request['comment'];
        $comment->user_id = Auth::id();
        $comment->save();

        $pet = Pet::where('id', $request['pet_id'])
                  ->first();

        return redirect('/normalpets/show/'. $pet->normalpet->normal_pet_id);
    }
    public function destroy(Comment $comment)
    {
        $comment->delete();
    }

    public function normalstatus()
    {
        // logger(request('normalPetID'));
        logger('1231231231');
        $normalPet = NormalPet::where('normal_pet_id', request('normalPetID'))
                              ->get()
                              ->first();
        logger($normalPet->toArray());
        $normalPet->status = 1;
        $normalPet->save();
        if($normalPet) {
            return response()->json(['success' => true,
                                     'error' => false]);
        }else{
            return response()->json(['success' => false,
                                     'error' => true]);
        }
    }

    public function normalapproval()
    {
        logger(request('normalPetID'));
        // logger('11111111111');
        $normalPet = NormalPet::where('normal_pet_id', request('normalPetID'))
                              ->get()
                              ->first();
        logger($normalPet->normal_pet_id);                              
        $normalPet->approval_status = 1;   
        $normalPet->save();
        
         if($normalPet) {
            return response()->json(['success' => true,
                                     'error' => false]);
        }else{
            return response()->json(['success' => false,
                                     'error' => true]);
        } 
                                   
    }
}