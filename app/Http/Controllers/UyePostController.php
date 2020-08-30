<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Araclar;
use App\User;
use App\Uyeler;
use App\AracUye;

class UyePostController extends Controller
{
     /**
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:uye']);
    }




    /*
        @author: Hakan SALTAN
        @since: 03.07.2020
        @desc: Eğer veri tipi yeni ise EKLEME, sil ise SİLME, guncelle ise GÜNCELLEME, yetki ise YETKİLENDİRME işlemleri uygulanmaktadır.
        @param $request->tip: adı
        @param $request->email: email
        @param $request->password: şifre
        @param $request->role: role adı
        @param $request->permissions: permission adları dizi olarak gelir
    */
    public function aracPost(Request $request)
    {
        try{
            DB::beginTransaction();
                if($request->tip=='yeni'){
                    $qrCode = "https://chart.googleapis.com/chart?cht=qr&chs=512x512&chl=https://otogaraj.kodgaraj.com/qrcode/" . strtoupper($request->sase);
                    $arac = new Araclar;
                    $arac->plaka=strtoupper($request->plaka);
                    $arac->km=$request->km;
                    $arac->sase=strtoupper($request->sase);
                    $arac->marka_id=$request->marka;
                    $arac->model_id=$request->model;
                    $arac->qrCode=$qrCode;
                    $arac->save();
                    if($arac){
                        $aracUye = new AracUye;
                        $aracUye->arac_id = $arac->id;
                        $aracUye->uye_id = $this->uyeID(Auth::user()->id);
                        $aracUye->sahip_ad_soyad = $request->sahipAdi;
                        $aracUye->sahip_tel = $request->sahipTel;
                        $aracUye->save();
                    }else{
                        DB::rollBack();
                        return response(["error"=>true]);
                    }
                }elseif($request->tip=='sil'){
                    $arac = Araclar::where('id',$request->id)->delete();
                }elseif($request->tip=='guncelle'){
                    $qrCode = "https://chart.googleapis.com/chart?cht=qr&chs=512x512&chl=https://otogaraj.kodgaraj.com/qrcode/" . strtoupper($request->sase);
                    $arac = Araclar::where('sase',$request->sase)->first();
                    $arac->plaka=strtoupper($request->plaka);
                    $arac->km=$request->km;
                    $arac->sase=strtoupper($request->sase);
                    $arac->marka_id=$request->marka;
                    $arac->model_id=$request->model;
                    $arac->qrCode=$qrCode;
                    $arac->update();
                    $aracUye = AracUye::where('arac_id',$arac->id)->where('uye_id',$this->uyeID(Auth::user()->id))->first();
                    $aracUye->sahip_ad_soyad = $request->sahipAdi;
                    $aracUye->sahip_tel = $request->sahipTel;
                    $aracUye->save();
                }

                if($arac){
                    DB::commit();
                }else{
                    DB::rollBack();
                }
            return response(["error"=>false]);
        }catch(Exception $e){
            return response(["error"=>true]);
        }
    }
    /*
       @author: Batuhan Haymana
       @since: 30.08.2020
       @desc: Uye Profil Sayfalarından Gelen Verilerin Guncellenmesi (Kullanıcı ve Ticari Bilgiler)
       @param $request->kullaniciAdi: adı
       @param $request->kullaniciMail: email
       @param $request->kullaniciSifre: şifre
       @param $request->ticariUnvan : Ünvan
       @param $request->ticariAdres: Adres
       @param $request->ticariVergiNo : Vergi No
       @param $request->ticariSektor : Sektör
       @param $request->ticariSlogan : Slogan

   */
    public function hesapguncelle(Request $request)
    {
        if ($request->kullaniciSifreOnay == 'true')
        {
            $hesapGuncelle = User::where('id','=',Auth::user()->id)->update(array(
                'name'=>$request->kullaniciAdi,
                'email'=>$request->kullaniciMail,
                'password'=>bcrypt($request->kullaniciSifre)
            ));
        }
        else{
            $hesapGuncelle = User::where('id','=',Auth::user()->id)->update(array(
                'name'=>$request->kullaniciAdi,
                'email'=>$request->kullaniciMail
            ));
        }
        if ($hesapGuncelle)
        {
            return 'true';
        }
    }
    public function ticariGuncelle(Request $request)
    {
        $ticariGuncelle = uyeler::where('id','=',$request->idTicari)->update(array(
            'isyeri_adi'=>$request->ticariUnvan,
            'isyeri_adres'=>$request->ticariAdres,
            'vergi_no'=>$request->ticariVergiNo,
            'sektor'=>$request->ticariSektor,
            'hakkinda'=>$request->ticariSlogan
        ));
        if ($ticariGuncelle)
        {
            return 'true';
        }
    }

}
