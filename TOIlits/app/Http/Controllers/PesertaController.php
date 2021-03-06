<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Peserta;
use App\Kalender;
use App\Pengumuman;
use App\Forda;
use Image;
use File;
class PesertaController extends Controller
{
    function HalamanEvent(Request $request){ 
        $event = Kalender::get();
        return view('admin/peserta/upcoming',[
            'event'=>$event
        ]);
    }

    function HalamanNotif(Request $request){
        $peserta = Peserta::where('id',$request->session()->get('id'))->first();
        $forda = Forda::where('id',$peserta->forda_id)->first();
        $notif = Pengumuman::where('forda_id',$peserta->forda_id)->orderBy('created_at','desc')->get();
        return view('/admin/peserta/notifikasiforda',[
            'notif'=>$notif,
            'forda'=>$forda
        ]);

    }

    function HalamanBukti(Request $request){
        $peserta = Peserta::where('id',$request->session()->get('id'))->first();
        $forda = Forda::where('id',$peserta->forda_id)->first();
        $sudahupload=false;
        if($peserta->bukti_bayar!=null&&$peserta->kartu_pelajar!=null){
            $sudahupload=true;
        }
        return view('admin/peserta/buktipembayaran',[
            'peserta'=>$peserta,
            'forda'=>$forda->nama,
            'sudahupload'=>$sudahupload,
        ]);
    }

    function HalamanJumlah(){
        $jumlah = Peserta::count();
        return view('jumlahpeserta',[
            'jumlah'=>$jumlah
        ]);
    }

    function ProsesUploadBukti(Request $request){
        $peserta = Peserta::where('id',$request->session()->get('id'))->first();
        $forda = Forda::where('id',$peserta->forda_id)->first();
        if($request->file('input-pelajar')->getSize()>204800||$request->file('input-bukti')->getSize()>204800){
            return redirect('bukti_pembayaran')->with([
                'pesan'=>'Ukuran file melebihi batas',
                'tipe'=>'warning'
            ]);
        }
        if (!File::isDirectory(public_path().'/images/kartupelajar/'.$forda->nama)) {
            
            File::makeDirectory(public_path().'/images/kartupelajar/'.$forda->nama);
        }
        if (!File::isDirectory(public_path().'/images/bukti/'.$forda->nama)) {
            
            File::makeDirectory(public_path().'/images/bukti/'.$forda->nama);
        }
        $pelajar = $request->file('input-pelajar');
        $pelajarName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $pelajar->getClientOriginalExtension();
        Image::make($pelajar)->save(public_path().'/images/kartupelajar/'.$forda->nama . '/' . $pelajarName);

        $bukti = $request->file('input-bukti');
        $buktiName = Carbon::now()->timestamp . '_' . uniqid() . '.' . $bukti->getClientOriginalExtension();
        Image::make($bukti)->save(public_path().'/images/bukti/'.$forda->nama . '/' . $buktiName);

        Peserta::where('id','=',$request->session()->get('id'))->update(['bukti_bayar'=>$buktiName,'kartu_pelajar'=>$pelajarName]);
        return redirect('bukti_pembayaran')->with([
            'pesan'=>'Upload sukses,silahkan menunggu konfirmasi dari forda masing-masing',
            'tipe'=>'success'
        ]);
    }
}
