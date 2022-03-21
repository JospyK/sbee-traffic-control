<?php

use App\Models\Direction;
use Illuminate\Database\Seeder;

class DirectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $d = [
            [ 'id' => 1, 'code' => 'CCMP', 'libelle' => "CELLULE CONTROLE MARCHE PUBLIC" ],
[ 'id' => 2, 'code' => 'CF', 'libelle' => "CELLULE FORMATION" ],
[ 'id' => 3, 'code' => 'CG', 'libelle' => "CONTRÔLE GENERAL" ],
[ 'id' => 5, 'code' => 'CRP', 'libelle' => "CELLULE REDUCTION DES PERTES" ],
[ 'id' => 6, 'code' => 'DAGS', 'libelle' => "DIRECT.APPROV.GESTION STOCKS" ],
[ 'id' => 7, 'code' => 'DAI', 'libelle' => "DIRECTION AUDIT INTERNE" ],
[ 'id' => 8, 'code' => 'DCB', 'libelle' => "DIRECTION COMPTA ET BUDGET" ],
[ 'id' => 9, 'code' => 'DCC', 'libelle' => "DIRECT.COMMERC.CLIENTELE" ],
[ 'id' => 10, 'code' => 'DCF', 'libelle' => "DIR COMPTABILITE ET FINANCES" ],
[ 'id' => 11, 'code' => 'DD', 'libelle' => "DIRECTION DISTRIBUTION" ],
[ 'id' => 12, 'code' => 'DE', 'libelle' => "DIRECT. DES EXPLOITATIONS" ],
[ 'id' => 13, 'code' => 'DED', 'libelle' => "DIRECTION ETUDES ET DEVELOPT" ],
[ 'id' => 14, 'code' => 'DEP', 'libelle' => "DIRECTION DES ETUDES ET PLANIF" ],
[ 'id' => 15, 'code' => 'DESS', 'libelle' => "DEPART ENVIRON SOCIAL SECURITE" ],
[ 'id' => 16, 'code' => 'DG', 'libelle' => "DIRECTION GENERALE" ],
[ 'id' => 17, 'code' => 'DGA', 'libelle' => "DIRECTION GENERALE ADJOINTE" ],
[ 'id' => 18, 'code' => 'DGECGP', 'libelle' => "DIRECT GOUVERN ENTR CONT GEST" ],
[ 'id' => 19, 'code' => 'DG2', 'libelle' => "DIRECTION GENERALE SPECIALE" ],
[ 'id' => 20, 'code' => 'DI', 'libelle' => "DIRECTION DE L'INFORMATIQUE" ],
[ 'id' => 21, 'code' => 'DIG', 'libelle' => "DIRECTION INSPECTION GENERALE" ],
[ 'id' => 22, 'code' => 'DJPR', 'libelle' => "DIR. JURIDIQ ET PREV. DES RISQ" ],
[ 'id' => 23, 'code' => 'DPGS', 'libelle' => "DIR PATRIMOINE GEST DES STOCKS" ],
[ 'id' => 24, 'code' => 'DPME', 'libelle' => "DIRECT.PROD.MOUVMT D'ENERGIE" ],
[ 'id' => 25, 'code' => 'DPMEER', 'libelle' => "DIRECT PRODUC MOUV ENE RENOUV" ],
[ 'id' => 26, 'code' => 'DPPRAJ', 'libelle' => "DIR.PATRIM.PREV.RISQ AFF.JURID" ],
[ 'id' => 27, 'code' => 'DRA', 'libelle' => "DIRECT.REGIONALE ATLANTIQUE" ],
[ 'id' => 28, 'code' => 'DRATAD', 'libelle' => "DIRECT.REGIONALE ATACORA-DONGA" ],
[ 'id' => 29, 'code' => 'DRBA', 'libelle' => "DIRECT.REGIONALE BORG-ALIBORI" ],
[ 'id' => 30, 'code' => 'DRH', 'libelle' => "DIRECTION DES RESS.HUMAINES" ],
[ 'id' => 31, 'code' => 'DRL1', 'libelle' => "DIRECTION RÉGIONALE LITTORAL1" ],
[ 'id' => 32, 'code' => 'DRL2', 'libelle' => "DIRECTION REGIONALE LITTORAL2" ],
[ 'id' => 33, 'code' => 'DRMC', 'libelle' => "DIRECT.REGIONALE MONO-COUFFO" ],
[ 'id' => 34, 'code' => 'DROP', 'libelle' => "DIRECT.REGIONALE OUEME-PLATEAU" ],
[ 'id' => 35, 'code' => 'DRZC', 'libelle' => "DIRECT.REGIONALE ZOU-COLLINES" ],
[ 'id' => 36, 'code' => 'DSI', 'libelle' => "DIRECTION SYSTEM D'INFORMATION" ],
[ 'id' => 37, 'code' => 'DVGCP', 'libelle' => "DIR VULG GEST COMPT PREPAYES" ],
[ 'id' => 38, 'code' => 'E/DCRH', 'libelle' => "EXP. DTEURS COM.ET RESS. HUM." ],
[ 'id' => 39, 'code' => 'PRMP', 'libelle' => "PERS.RESPONS DES MARCH.PUBLICS" ],
[ 'id' => 40, 'code' => 'SG', 'libelle' => "SECRETARIAT GENERAL" ],

        ];

        Direction::insert($d);
    }
}
