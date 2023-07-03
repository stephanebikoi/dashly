<?php 

namespace App\Models;
use App\Core\Db;

class Model{

    // Table de la base de donnees
    protected $table;

    // instance de Db
    private $db;

    
    public function findAll(){
        $query = $this->requete('SELECT * FROM ' . $this->table);
        return $query->fetchAll();
    }

    public  function findBy(array $criteres) {
        $champs = [];
        $valeurs = [];

        //eclater le tableau

        foreach ($criteres as $champ => $valeur) {
           //select * from annonces where actif = ?
           //bindvalue(1,valueur)
           $champs[] = "$champ = ?";
           $valeurs[] = $valeur;
        }

        // on transfore letable "chaps" en chaine de caractere

        $liste_champs = implode(' AND ', $champs);

        // on execute la requete
        return $this->requete('SELECT * FROM '.$this->table.' WHERE '. $liste_champs,$valeurs)->fetchAll();
    }

    public function getLastId () {
         
        return $this->requete("SELECT * FROM $this->table ORDER BY id DESC LIMIT 1")->fetch();
    }

    public function find(int $id) {
        return $this->requete("SELECT * FROM $this->table WHERE id = $id")->fetch();
    }

    public function create() {
        $champs = [];
        $inter = [];
        $valeurs = [];

        //eclater le tableau

        foreach ($this as $champ => $valeur) {
           //insert into  annonces (titre,description,actif) values (?,?,?)
  
           if($valeur !== null && $champ != 'db' && $champ != 'table'){
                $champs[] = $champ;
                $inter[] = "?";
                $valeurs[] = $valeur;
           }
           
        }

        // on transfore letable "chaps" en chaine de caractere

        $liste_champs = implode(', ', $champs);
        $liste_inter = implode(', ', $inter);

        // on execute la requete
        return $this->requete('INSERT INTO '. $this->table.' ('. $liste_champs.') VALUES ('.$liste_inter.')',$valeurs);
    }

    

    public function update() {
        $champs = [];
        $valeurs = [];

        //eclater le tableau

        foreach ($this as $champ => $valeur) {
           //update annonces set  titre =? ,description =?,actif=? where id =?
           //bindvalue(1,valueur)
           if($valeur !== null && $champ != 'db' && $champ != 'table'){
                $champs[] = "$champ = ?";
                $valeurs[] = $valeur;
           }
           
        }
        $valeurs[] = $this->id;
        // on transfore letable "chaps" en chaine de caractere

        $liste_champs = implode(', ', $champs);

        // on execute la requete
        return $this->requete('UPDATE '. $this->table.' SET '. $liste_champs.' WHERE id = ?',$valeurs);
    }

    public function delete(int $id) {
        return $this->requete("DELETE FROM {$this->table} WHERE id = ?", [$id]);
    }

    public function requete (string $sql, array $attributs = null) {
        // on recupere l'instance de DB
        $this->db = Db::getInstance();

        // on verifie si on a des attributs

        if ($attributs !== null) {
            // requete prepare
            $query = $this->db->prepare($sql);
            $query->execute($attributs);
            return $query;

        } else {
            // requete sinple
            return $this->db->query($sql);
        }

    }

    public function hydrate ($donnees) {
        foreach ($donnees as $key => $value) {
            // on recupere le nom du setter correspondant a la cle (key)
            //titre ->setTitre

            $setter = 'set'.ucfirst($key);

            //on verifie si le setter existe
            if (method_exists($this, $setter)) {
                //on appele le setter
                $this->$setter($value);
            }
        }

        return $this;
    }

    public static function validate (array $form, array $champs)  {

        //o n parcourt les champs
        foreach ($champs as $champ) {
           //si le champ est abscent ou vide
           if (!isset($form[$champ]) || empty($form[$champ])) {
            return false;
           }
        }
        return true;
    }

    public static function passgen($nbChar) {
        $chaine ="mnoTUzS5678kVvwxy9WXYZRNCDEFrslq41GtuaHIJKpOPQA23LcdefghiBMbj0";
        srand((double)microtime()*1000000);
        $pass = '';
        for($i=0; $i<$nbChar; $i++){
            $pass .= $chaine[rand()%strlen($chaine)];
            }
        return $pass;
    }

    public static function Date_ConvertSqlTab($date_sql) {
        $jour = substr($date_sql, 8, 2);
        $mois = substr($date_sql, 5, 2);
        $annee = substr($date_sql, 0, 4);
        $heure = substr($date_sql, 11, 2);
        $minute = substr($date_sql, 14, 2);
        $seconde = substr($date_sql, 17, 2);
        
        $key = array('annee', 'mois', 'jour', 'heure', 'minute', 'seconde');
        $value = array($annee, $mois, $jour, $heure, $minute, $seconde);
        
        $tab_retour = array_combine($key, $value);
        
        return $tab_retour;
    }

    public static function AuPluriel($chiffre) {
        if($chiffre>1) {
            return 's';
        };
    }

    public static function TimeElapsed($date_sql) {
        $tab_date = Model::Date_ConvertSqlTab($date_sql);
        $mkt_jourj = mktime($tab_date['heure'],
                    $tab_date['minute'],
                    $tab_date['seconde'],
                    $tab_date['mois'],
                    $tab_date['jour'],
                    $tab_date['annee']);

        $mkt_now = time();
        
        $diff = $mkt_jourj - $mkt_now;
        
        $unjour = 3600 * 24;
    
        if($diff>0 && abs($diff)<3600) {
            // DEPUIS EN MINUTES
            $calcul = abs($diff) / 60;
            return 'Depuis <strong>'.(60 - ceil($calcul)).' minute'.Model::AuPluriel($calcul).'</strong>.';

        } elseif($diff>0 && abs($diff)<=3600) {
            // DEPUIS EN HEURES
            $calcul = abs($diff) / 3600;
            return 'Depuis <strong>'.ceil($calcul).' heure'.Model::AuPluriel($calcul).'</strong>.';        

        } else {
            // DEPUIS EN JOUR
            $calcul = abs($diff) / $unjour;
            return 'Depuis <strong>'.ceil($calcul).' jour'.Model::AuPluriel($calcul).'</strong>.';

        };
    }

    public static function RemainingTime($date_sql) {
        $tab_date = Model::Date_ConvertSqlTab($date_sql);
        $mkt_jourj = mktime($tab_date['heure'],
                    $tab_date['minute'],
                    $tab_date['seconde'],
                    $tab_date['mois'],
                    $tab_date['jour'],
                    $tab_date['annee']);

        $mkt_now = time();
        
        $diff = $mkt_jourj - $mkt_now;
        
        $unjour = 3600 * 24;
    
        if($diff>=$unjour) {
            // EN JOUR
            $calcul = $diff / $unjour;
            return 'Il reste <strong>'.ceil($calcul).' jour'.Model::AuPluriel($calcul).'</strong>.';

        } elseif($diff<$unjour && $diff>=0 && $diff>=3600) {
            // EN HEURE
            $calcul = $diff / 3600;
            return 'Il reste <strong>'.ceil($calcul).' heure'.Model::AuPluriel($calcul).'</strong>.';

        } elseif($diff<$unjour && $diff>=0 && $diff<3600) {
            // EN MINUTES
            $calcul = $diff / 60;
            return 'Il reste <strong>'.ceil($calcul).' minute'.Model::AuPluriel($calcul).'</strong>.';

        } elseif($diff<0 && abs($diff)<3600) {
            // DEPUIS EN MINUTES
            $calcul = abs($diff) / 60;
            return 'Depuis <strong>'.ceil($calcul).' minute'.Model::AuPluriel($calcul).'</strong>.';

        } elseif($diff<0 && abs($diff)<=3600) {
            // DEPUIS EN HEURES
            $calcul = abs($diff) / 3600;
            return 'Depuis <strong>'.ceil($calcul).' heure'.Model::AuPluriel($calcul).'</strong>.';        

        } else {
            // DEPUIS EN JOUR
            $calcul = abs($diff) / $unjour;
            return 'Depuis <strong>'.ceil($calcul).' jour'.Model::AuPluriel($calcul).'</strong>.';

        };
    }

}