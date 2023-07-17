<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userPreferences extends Controller
{
  
    public function themeSelection()
    {

        /* usamos o currentRouteNamecurrentRouteName para pegar o name da rota 
            dps preenchemos a variavel $theme com o valor devido 
        */
        if (Route::currentRouteName() == 'devTheme') {
            $theme = 'devTheme';
        } elseif (Route::currentRouteName() == 'lithTheme'){ 
            $theme = 'lithTheme';
        } elseif (Route::currentRouteName() == 'darkTheme'){ 
            $theme = 'darkTheme';
        } else {
            $theme = 'standardTheme';
        }

        /*
            Chamo pelo usuario logado e dps uso o Session::put para adicionar um campo
            chamado theme e preencher com o valor da variavel, apos isso retorno para a view 
        */
        $user = Auth::user();

      
        Session::put('theme', $theme);
    
        return view('pages/userConfig/preferences', ['theme' => $theme]);
    }



}
