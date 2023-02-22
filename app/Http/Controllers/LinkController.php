<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\models\Link;


class LinkController extends Controller
{
    public function shorten(Request $request)
    {
        $validatedData = $request->validate([
            'original_link' => 'required|url',
        ]);

        // Gerar um link curto aleatório
        $shortLink = Str::random(6);
       // $shortLink = substr($validatedData['original_link'], 0, 20);
        // Salvar a informação no banco de dados
        $link = new Link();

            $link->originaL_link = $validatedData['original_link'];
            $link->short_link = $shortLink;
            $link->save();

        return response()->json(['LinkCmpleto' => 'www.localhost/encurter/'.$shortLink ], 201);
    }

    public function redirect($shortLink)
    
    {
        // Procure a URL original correspondente na tabela de links
        $link = Link::where('short_link', $shortLink)->firstOrFail();

        // Redirecione o usuário para a URL original
        return redirect($link->original_link);
    }
}
