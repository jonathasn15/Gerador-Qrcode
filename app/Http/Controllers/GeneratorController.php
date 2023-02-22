<?php

namespace App\Http\Controllers;
use App\classes\QrReader;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;
use App\models\Generate;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GeneratorController extends Controller
{

    public function QrGeneratorForm() {

        return view('gerarLink');
    }

    public function encurter() {

        return view('link');
    }

    public function QrGenerator(Request $r) {

       
        $Generate = new Generate();
        //inserindo os dados no banco

        $now = Carbon::now('America/Bahia');
        $dia = $now->format('Y-m-d');
        $hora =  $now->format('H:i:s');
        $duration = $r->duration;
        $Dtime = date('H:i:s', strtotime($duration));

       $Generate->codCli = $r['codCli'];
       $Generate->nome = $r['nomeCli'];
       $Generate->chave = $r['token'];
       $Generate->duration = $r['duration'];
       $Generate->loja = $r['loja'];
       $Generate->valor = $r['valor'];
       $Generate->datetimestemp = $dia;
       $Generate->horatimestemp = $hora;
       $Generate->user_id = Auth::user()->id;
      
       $Generate->save();

       //$timeCreate = Carbon::create($Generate->created_at);

        // armazendo dados no array
        $data = [
            'id' => $Generate->id,
            'nomeCli' => $r->nomeCli,
            'codCli' => $r->codCli,
            'valor' => $r->valor,
            'token' => $r->token,
            'loja' => $r->loja,
            'duration' => $Dtime,
            'datetimestemp' => $Generate->datetimestemp,
            'horatimestemp' => $Generate->horatimestemp

       ];
       //dd($r->all());
      return redirect()->route('QrGeneratorShow',$data);
        
    }

    public function QrGeneratorShow(Request $r) {


        $horas = Carbon::createFromDate($r->duration)->format('H');
        $minutos = Carbon::createFromDate($r->duration)->format('i');
       
       
        $startTime = Carbon::createFromDate($r->horatimestemp);
        $endTime = Carbon::parse($startTime)->addHour($horas)->addMinutes($minutos)->addSeconds(0);
        
        $currentTime = Carbon::now()->addHour(-3);

       if ($currentTime->gt($endTime)) {
           
        return view('timeout');
       }
        
        $diff = $endTime->diff($currentTime);

        $hours = $diff->h;
        $minutes = $diff->i;
        $seconds = $diff->s;

        $data = [
            'id' => $r->id,
            'nomeCli' => $r->nomeCli,
            'codCli' => $r->codCli,
            'valor' => $r->valor,
            'token' => $r->token,
            'loja' => $r->loja,
            'duration' => $r->duration,
            'horas' => $hours,
            'minutos' => $minutes,
            'segundos' => $seconds,
       ];

       return view('qrCode', $data);
    }

    public function QrGeneratorRead(Request $r){

        $id = $r->id;

        $generate = Generate::find($id);

        if(!$generate){
            return redirect(route('home'));
        }

        $horas = Carbon::createFromDate($generate->duration)->format('H');
        $minutos = Carbon::createFromDate($generate->duration)->format('i');
       
       
        $startTime = Carbon::createFromDate($generate->horatimestemp);
        $endTime = Carbon::parse($startTime)->addHour($horas)->addMinutes($minutos)->addSeconds(0);
        
        $currentTime = Carbon::now()->addHour(-3);

       if ($currentTime->gt($endTime)) {
           
        return view('timeout');
       }
        
        $diff = $endTime->diff($currentTime);

        $hours = $diff->h;
        $minutes = $diff->i;
        $seconds = $diff->s;

        $user = User::find($generate->user_id);

        if($user){
            $name = $user->name;
        }

        $data = [
            'id' => $generate->id,
            'nomeCli' => $generate->CodCli,
            'codCli' => $generate->nome,
            'valor' => $generate->valor,
            'token' => $generate->chave,
            'loja' => $generate->loja,
            'duration' => $generate->duration,
            'hora' => $generate->horatimestemp,
            'User' => $name,
            'create' => $generate->datetimestemp
       ];
        

        return view('read',$data);


    }
    
    
}
