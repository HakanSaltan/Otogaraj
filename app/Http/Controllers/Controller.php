<?php

namespace App\Http\Controllers;

use App\Permissions;
use App\Roles;
use App\Uyeler;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function plakaSifrele($plaka) {
        return str_replace(" ", "_", preg_replace('!\s+!', ' ', trim($plaka)));
    }

    public function plakaCoz($plaka) {
    return str_replace("_", " ", $plaka);
	}

    public function rastgele(){
		return uniqid();
    }

    public function resimKayit($Resim)
    {
        $uretilen = $this->rastgele();

        $uploads_dir = 'uploads';
        $tmp_name = $Resim["firma_logo"]["tmp_name"];
        $name = $Resim["firma_logo"]["name"];
        $sonuc = move_uploaded_file($tmp_name, "$uploads_dir/$uretilen");

        if($sonuc == true)
        {
            $islemlerSonucu = [
                "sonuc" => true,
                "eskiDosyaIsmi" => $name,
                "yol" => $uploads_dir . "/" . $uretilen
            ];
        }
        else
        {
            $islemlerSonucu = [
                "sonuc" => false,
            ];
        }
        return $islemlerSonucu;

    }
    public function roleName($id){
        $role = Roles::where('id','=',$id)->first();
        return $role->name;
    }
    public function permissionName($id){
        $role = Permissions::where('id','=',$id)->first();
        return $role->name;
    }
    public function uyeID($id){
        $uye = User::select('*')
        ->join('user_uye','user_uye.user_id','users.id')
        ->join('uyeler','uyeler.id','user_uye.uye_id')
        // ->leftjoin('uye_ayar','uye_ayar.uye_id','uyeler.id')
        ->where('users.id',$id)
        ->first();
        return $uye->uye_id;

    }

}
