<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class joueurController extends Controller
{
    public function ajouter(Request $r){

        // DB::insert("insert into joueur(nom, prenom, poste, maillot, sousContract, salaire)
        //     values('$r->nom','$r->prenom', '$r->poste', $r->maillot, '$r->sousContract', $r->salaire);");
        DB::table('joueur')->insert([
            'nom'         => $r->nom, //b7ala katgulih inserer lya fnom $r->nom 
            'prenom'      => $r->prenom,
            'poste'       => $r->poste,
            'maillot'     => $r->maillot,
            'sousContract'=> $r->sousContract,
            'salaire'     => $r->salaire
        ]);
        return $this->afficherJoueurs();
    }

    public function afficherJoueurs ($id = ""){
        // $selection = DB::select('select * from joueur;');
        $selection = DB::table('joueur')->get(); //hadi hya select
        // $selection = DB::table('joueur')->orderBy('salaire', 'desc')->get();
        // $selection = DB::table('joueur')
        //     ->orderBy('salaire', 'desc')
        //     ->where('maillot', '<>', 1)
        //     ->get();
        // $selection = DB::table('joueur')
        // ->orderBy('salaire', 'desc')
        // ->where('nom', '=', 'ait lahcen')
        // ->where('prenom', '=', 'mohamed')  //mumkin ddir 2 dyal where
        // ->get();
        // $selection = DB::table('joueur')
        // ->orderBy('salaire', 'desc')
        // ->where([['prenom', '=', 'mohamed'], ['maillot', '<>', '8']])  b7ala drna 2 dyal where
        // ->get();
        // $selection = DB::table('joueur')
        // ->orderBy('salaire', 'desc')
        // ->where([['prenom', '=', 'achraf']])
        // ->orWhere('prenom', '=', 'mohamed') //or hya orwhere
        // ->get();
        // $selection = DB::table('joueur')
        // ->orderBy('salaire', 'desc')
        // ->whereIn('prenom', ['achraf', 'khadija', 'mohamed']) //in hya whereIn
        // ->get();
        // $selection = DB::table('joueur')
        // ->orderBy('salaire', 'desc')
        // ->whereBetween('salaire', [10000, 14000]) //between hya whereBetween
        // ->get();
        // $selection = DB::table('joueur')
        // ->orderBy('salaire', 'desc')
        // ->where('nom', 'like', 'ai%') //like
        // ->get();
        // $selection = DB::table('joueur')
        // ->select('prenom', 'nom', 'salaire', 'maillot', 'id', 'poste', 'sousContract'); //t afficher lli bghiti
        // $nbrPoste = DB::table('joueur')
        // ->select('poste', DB::raw('count(*) as nbrPoste'))
        // ->groupBy('poste')
        // ->get();
        // $nbrPoste = DB::table('joueur')
        // ->select('poste', DB::raw('count(*) as nbrPoste'))
        // ->where('poste', '<>', 'attaque') //!=
        // ->groupBy('poste')
        // ->get();
        $nbrPoste = DB::table('joueur')
        ->select('poste', DB::raw('count(*) as nbrPoste'))
        ->where('poste', '<>', 'attaque')
        ->groupBy('poste')
        ->having('nbrPoste', '>=', 3)
        ->get();

        return view('afficherJoueurs')->with('selection', $selection)->with('id', $id)->with('nbrP', $nbrPoste);
    }

    public function selectionModifJoueur(Request $r){
        $selectionModif = DB::select("select * from joueur where id=$r->id");
        return view('modifierJoueur')->with('selectionModif', $selectionModif);
    }

    public function modifierJoueur(Request $r){
        
        // DB::update("update joueur set nom='$r->nom', prenom='$r->prenom', poste='$r->poste', maillot=$r->maillot, sousContract='$r->sousContract', salaire=$r->salaire where id=$r->id;");
        
        DB::table('joueur')->where('id', '=', $r->id)->update([
            'nom'         => $r->nom,
            'prenom'      => $r->prenom,
            'poste'       => $r->poste,
            'maillot'     => $r->maillot,
            'sousContract'=> $r->sousContract,
            'salaire'     => $r->salaire

        ]);
        $id = $r->id;
        return $this->afficherJoueurs($r->id);
    }

    public function supprimerJoueur(Request $r){
        // DB::delete("delete from joueur where id=$r->id;");
        DB::table('joueur')->where('id', '=', $r->id)->delete();
        return $this->afficherJoueurs();
    }
}
