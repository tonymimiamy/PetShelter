<?php
namespace App\Libary;
use App\Pet;
use App\PublicPet;
class PetLibary {

    public static function get_publicpet($url)
    {
        $size = [0 => '小型',
                 1 => '中型',
                 2 => '大型'];
        $age = [0 => '幼年',
                1 => '中年',
                2 => '老年'];
        $ligation = [0 => '未結紮',
                     1 => '結紮'];
        $publics = json_decode(file_get_contents($url), true);
        $now = date('Y-m-d h:i:s');
        
        $i = 0;
        foreach($publics as $public) {
            // dd(mb_substr($public['animal_colour'], 0, 2). $public['animal_kind']);
            if($public['album_file']!= "" && $i < 200) {
                $pet = new Pet;
                $pet->animal_breed = "米克斯";
                $pet->animal_type = $public['animal_kind'];
                $pet->animal_name = mb_substr($public['animal_colour'], 0, 2). $public['animal_kind'];
                $pet->animal_sex = ($public['animal_sex'] == 'F')? '母': '公';
                $pet->animal_size = $size[rand(0,2)];
                $pet->animal_colour = $public['animal_colour'];
                $pet->animal_age = $age[rand(0,2)];
                $pet->animal_img = $public['album_file'];
                $pet->animal_ligation = $ligation[rand(0,1)];
                $pet->animal_place = mb_substr($public['shelter_address'], 0, 2);
                $pet->animal_description = $public['animal_caption'];
                // $pet->created_at = $now;
                // $pet->updated_at = $now;
                $pet->save();
                $publicPet = new PublicPet;
                $publicPet->pet_id =  $i + 1;
                $publicPet->animal_opendate = $public['animal_opendate'];
                // $publicPet->created_at = $now;
                // $publicPet->updated_at = $now;
                $publicPet->save();
                $i++;
            }  
        }
        dd('finish');
    }
}

        