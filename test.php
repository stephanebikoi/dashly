                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Afficher la liste des connectés sur votre site                                                               
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=52
    Auteur           : R@f                                                                                                
    Date édition     : 01 Sept 2004                                                                                       
    Date mise à jour : 18 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - fonctionnement du code vérifié                                                                                    
    - modification de la description                                                                                      
*/
/*---------------------------------------------------------------*/?>
    CREATE TABLE `connectes` (
        `ip` varchar(20) NOT NULL default '',
        `derniere` int(9) unsigned NOT NULL default '0',
        `pseudo` varchar(32) NOT NULL default '',
        PRIMARY key (`ip`)
    ) TYPE=MyISAM;
    
<?php
        
    // ip du client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    }
                                                               
    // time actuel
    $time = time();

    // on recherche l’utilisateur
    $sql_query = "SELECT * FROM connectes where ip='$ip'";
    $result = $conn->query($sql_query);
                                                               
    // si l'utilisateur n'est pas deja dans la table
    if($result->num_rows == 0)
    {
    $sql_query = "INSERT INTO connectes VALUES ('$ip', '$time')";
    $result = $conn->query($sql_query);
                                                                   

    }
    // mise-à-jour
    else
    {
    $sql_query = "UPDATE connectes SET derniere='$time' WHERE ip='$ip'";
                                                                   
    $result = $conn->query($sql_query);
                                                                   
    }
                                                               
    // temps d'incativité
    $time -= $temps * 60;
                                                               
    // on supprime ceux qui n'ont pas été connectés depuis assez longtemps
    $sql_query = "DELETE LOW_PRIORITY FROM connectes WHERE derniere <= $time";
    $result = $conn->query($sql_query);
                                                               
    /*******************
    Affichage des connectés
    *******************/

    $sql_query = "SELECT count(*) FROM connectes";
    $result = $conn->query($sql_query);

                                                                                   
    if($result)
    {
    $visiteurs = mysqli_fetch_array($result);
    echo '<li><br />Connect&eacute;s: ' . $visiteurs[0].'</li>';
                                  
    }
?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Lancer des taches différentes selon les heures                                                               
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=524
    Auteur           : isaki                                                                                              
    Date édition     : 31 Juil 2009                                                                                       
    Date mise à jour : 19 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

    // met l'heure courante dans une variable
    $time_h = date("H");

    if ($time_h >= '00' AND $time_h <= '08') echo 'Bonne nuit';
    if ($time_h >= '09' AND $time_h <= '12') echo 'Bonne journée';
    if ($time_h >= '13' AND $time_h <= '18') echo 'Bonne après midi';
    if ($time_h >= '19' AND $time_h <= '23') echo 'Bonne soirée';

?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Redirection pour un site multilingue                                                                          
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=144
    Date édition     : 25 Oct 2005                                                                                        
    Date mise à jour : 13 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

    // récupère la variable langage si elle existe
    if (preg_match("#$HTTP_ACCEPT_LANGUAGE","fr"))

    // redirige vers la page
    header("location:http://www.votresite.com/fr");

    // Ainsi de suite pour les autres langues
    elseif (preg_match("#$HTTP_ACCEPT_LANGUAGE#","ca"))
    header("location:http://www.votresite.com/ca");

    // Sinon la varible n'existe pas et on redirige
    else
    header("location:http://www.votresite.com/");
?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Sondage complet MySQLi + PHP                                                                                  
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=207
    Auteur           : kof_eve                                                                                            
    Date édition     : 23 Jan 2007                                                                                        
    Date mise à jour : 18 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/?>

//================= Table ====================
-- 
-- Structure de la table `vote`
-- 

CREATE TABLE `vote` (
  `id` smallint(10) unsigned NOT NULL auto_increment,
  `titre` tinytext NOT NULL,
  `reponse` smallint(1) NOT NULL default '0',
  `ip` varchar(15) NOT NULL default '',
  `unix` varchar(25) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
      

//================== Page vote.php  ===================

<html>
<head>
<title>Sondage</title>
</head>

<body>
<?php
    $db_server = 'localhost'; // Adresse du serveur MySQL
    $db_name = '';            // Nom de la base de données
    $db_user_login = 'root';  // Nom de l'utilisateur
    $db_user_pass = '';       // Mot de passe de l'utilisateur

    // Ouvre une connexion au serveur MySQL
    $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);

// ip du client
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
    $ip = $_SERVER['REMOTE_ADDR'];
    }

$unix = time(); // temps actuel.
$temps = time()-3600; // le temps y'as maintenant une heure.

// on demande a notre table de nous donné tous les ip qui ressemble a l'ip de
// notre visiteur actuel, et qui ne sont pas
// daté de plus d'une heure.
 
$q = $conn->query("SELECT ip FROM vote WHERE ip='$ip' AND unix > '$temps'");

if($q->num_rows > 0){
// Si oui, ca veut dire que notre visiteur a déjà voté, on lui affiche alors
// un
// message de remerciements, et les résultats.
  
  echo 
'<p style="font-size:20px;text-align:center;color:#660000"><strong>Merci' .
' d\'avoir voté !</strong></p>';
  $sql = "SELECT reponse FROM vote WHERE titre='lieu_de_championat'"; 
//on récupere le résultat des anciens votes.
  $result = $conn->query($sql);
  
  while($resultat = mysqli_fetch_array($result)) {
    $cadre[] = $resultat['reponse'];  
//on récupere le résultat de notre requête, et on le stocke dans un tableau.
  }
  
  
//on stocke le total du vote dans une variable "$totalvote" via la méthode
// "count" qui parcourt tout notre tableau. 
  $totalvote= count($cadre); 
  
  
// on stocke le nombre de chaque choix dans un tableau avec la méthode
// "array_count_values" .. qui retourne par exemple.
  
//$array = array(1, "tyty", 1, "slt", "tyty");   array_count_values($array);   
// retourne array(1=>2, "tyty"=>2, "slt"=>1)
  $totalreponse = array_count_values($cadre);

  
//Maintenant on calcule le pourcentage de nos votes selon la régle universel
// pour ca ^^  "p = chifre x 100 / total".
  
// pour ca on utilise "bcdiv" qui divise et renvoie le résultat sous forme de
// chaîne de caractères.(en plus qu'on peut la fixé comme içi à 2 chiffres
// après
// la virgule). sinon on aura parfois des pourcentage genre 65.2323232323% et
// c'est pas beau >_<
  
    $reponse1 = bcdiv($totalreponse[1]*100, $totalvote, 2); 
    $reponse2 = bcdiv($totalreponse[2]*100, $totalvote, 2);
    $reponse3 = bcdiv($totalreponse[3]*100, $totalvote, 2);
    $reponse4 = bcdiv($totalreponse[4]*100, $totalvote, 2);

  
// pour l'affichage on utilise une petite fonction ^^ .. Prenez le temps de la
// comprendre, c'est facile.
    
  function VerifText($text,$valeur,$reponse,$totaldesreponse){  
      if ($text < '1'){ 
// on teste si le total des votes est moins qu'un, alors, on n'affiche pas
// d'image, et on met "0" comme valeur du vote
        $text1 = '<strong> - '.$valeur.' : </strong>'.$reponse.
'%      <strong>0</strong> vote.<br />';
      }
      if ($text == '1'){ 
// on teste si le total des votes est égal a 1, alors, on affiche l'image de la
// barre avec comme valeur de Width, "la variable du pourcentage", et on met la
// "valeur du vote".
        $text1 = '<strong> - '.$valeur.' : </strong>'.$reponse.
'%   <img src="barre.gif" alt="chargement impossible" height="5" width="'.
$reponse.'" />   <strong>'.$totaldesreponse.'</strong> vote.<br />';
      }
      if ($text > '1'){  
// on teste si le total des votes est plus grand que 1, alors, on affiche
// l'image de la barre avec comme valeur de Width, "la variable du pourcentage",
// et on met la "valeur du vote" avec une "s" a la fin cette fois. c tt
        $text1 = '<strong> - '.$valeur.' : </strong>'.$reponse.
'%   <img src="barre.gif" alt="chargement impossible" height="5" width="'.
$reponse.'" />   <strong>'.$totaldesreponse.'</strong> votes.<br />';
      } 
    return $text1;
  }
  
  // la on affiche notre fonction avec ces nouveaux paramètres.
  
//VerifText($_variable_du_total_du_vote , 'Valeur a affiché dans notre page' ,
// $_variable_de_notre_pourcentage , $_variable_du_total_du_vote);
  //ce qui donne quelque chose comme ça.

  echo VerifText($totalreponse[1],'valeur 1',$reponse1,$totalreponse[1]).
VerifText($totalreponse[2],'valeur 2',$reponse2,$totalreponse[2]). VerifText(
$totalreponse[3],'valeur 3',$reponse3,$totalreponse[3]).VerifText($totalreponse[
4],'valeur 4',$reponse4,$totalreponse[4]);
  echo '<strong> Total votes : </strong>'.$totalvote.'<br /><br /><br />';
  
// on répète notre fonction n fois nos choix avec une "." Pour la
// concaténation 
// , et une autre echo pour le total des votes.


}else{ 
// Si non, ça veut dire que notre visiteur n'as pas encore voté, on lui
// affiche
// le formulaire avec les choix.
  echo 'Quelle Valeur souhaité vous ? <br /><br />';
  echo 
'<form method="POST" action="vote.php?vote=ok"><div><input class="zonetext"' .
' type="radio" value="1" name="choix" /> - Valeur 1<br /><input class="zonetex' 
.
't" type="radio" value="2" name="choix" /> - Valeur 2<br /><input class="zonet' 
.
'ext" type="radio" value="3" name="choix" /> - Valeur 3<br /><input class="zon' 
.
'etext" type="radio" value="4" name="choix" /> - Valeur 4<br /><input class="z' 
.
'onetext" type="submit" value=" Ok ! " /></div></form>';      
      
}  


// Enregistrement du vote dans la table si le vote est diffèrent de "0" , ce
// qui
// veux dire que le gars a validé le formulaire sans prendre un choix.
// Et si la variable "vote" récupéré par la méthode $_GET et égal a "ok",
// ce qui
// veut dire que c'est le formulaire qui as envoyé cette page, pas un simple
// lien.


if ($_GET['vote']=='ok' AND $_POST['choix']!=0){
  $enregistrer = 
"INSERT vote SET id='', titre='lieu_de_championat', reponse='".$_POST['choix'].
"', ip='$ip', unix='$unix'";
  $conn->query($enregistrer);
  header("Location: vote.php"); // la on ré-actualise notre page..
}

?>
                                  
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Affiche l'heure en temps réel sur son site                                                                   
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=136
    Date édition     : 31 Juil 2005                                                                                       
    Date mise à jour : 06 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/?>
    <!--  Code à placer dans la partie HEAD  -->

    <head>

    <?php
    // Récupère l'heure du serveur

       $localtime = localtime();

       $seconde =  $localtime[0];
       $minute =  $localtime[1];
       $heure =  $localtime[2];

    ?>

    <script>
          
          bcle=0;

          function clock()
          {
            if (bcle == 0)
            {
              heure = <?php echo $heure ?>;
              min = <?php echo $minute ?>;
              sec = <?php echo $seconde ?>;
            }
            else
            {
              sec ++;
              if (sec == 60)
              {
                sec=0;
                min++;
                if (min == 60)
                {
                  min=0;
                  heure++;
                };
              };
            };
            txt="";
            if(heure < 10)
            {
              txt += "0";
            }
            txt += heure+ ":";
            if(min < 10)
            {
              txt += "0"
            }
            txt += min + ":";
            if(sec < 10)
            {
              txt += "0"
            }
            txt += sec ;
            timer = setTimeout("clock()",1000);
            bcle ++;
            document.clock.date.value = txt ;
          }
    </script>


    <style type="text/css">
    form{
        display:inline;
    }
    .style {border-width: 0;background-color:#005A7B;color: #F2f2f2;}
    </style>

    </head>




    <!--  Charge la fonction dans le corps de la page  -->
    <body onLoad="clock()">

    <!--  Affiche l'heure  -->
    <form name="clock" onSubmit="0">
    <input type="text" name="date" size="5" readonly="true" class="style">
    </form>

                               
    <?php
/*---------------------------------------------------------------*/
/*
    Titre : Compte &agrave; rebours en JavaScript et PHP                                                                  
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=493
    Auteur           : KOogar                                                                                             
    Date édition     : 01 Fév 2009                                                                                        
    Date mise à jour : 19 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/
/*******************************************************************************
    * Url DEMO avec les memes parametres ci dessous
    ***************************************************************************/

/*       https://phpsources.net/codes/php/demo/compte-a-rebours             */

/*******************************************************************************
    * A parametrer
    ***************************************************************************/

$heures   = 15;  // les heures < 24
$minutes  = 2;   // les minutes  < 60
$secondes = 22;  // les secondes  < 60

$annee = date("Y");  // par defaut cette année
$mois  = date("m");  // par defaut ce mois
$jour  = date("d");  // par defaut aujourd'hui

// quand le compteur arrive à 0
// -> redirection
$redirection = 'https://phpsources.net/code_s.php?id=493';

/*******************************************************************************
    * calcul des secondes
    ***************************************************************************/

$secondes = mktime(date("H") + $heures,
                            date("i") + $minutes,
                            date("s") + $secondes,
                            $mois,
                            $jour,
                            $annee
                            ) - time();
?>

<html>
<head>
<title>Demo compte a rebour</title>
<script type="text/javascript">
var temps = <?php echo $secondes;?>;
var timer =setInterval('CompteaRebour()',1000);
function CompteaRebour(){

  temps-- ;
  j = parseInt(temps) ;
  h = parseInt(temps/3600) ;
  m = parseInt((temps%3600)/60) ;
  s = parseInt((temps%3600)%60) ;
  document.getElementById('minutes').innerHTML= (h<10 ? "0"+h : h) + '  h :  ' +
                                                (m<10 ? "0"+m : m) + ' mn : ' +
                                                (s<10 ? "0"+s : s) + ' s ';
if ((s == 0 && m ==0 && h ==0)) {
   clearInterval(timer);
   url = "<?php echo $redirection;?>"
   Redirection(url)
}
}
function Redirection(url) {
setTimeout("window.location=url", 500)
}
</script>
</head>

<body onload="timer">
<?php
// la condition est que le nombre de seconde soit etre superieur a 24 heures
if ($secondes <= 3600*24) {
?>
<span style="font-size: 36px;">Il vous reste comme temps</span>
<div id="minutes" style="font-size: 36px;"></div></span>
<?php
 }
?>
<body>
<html>


                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : [PHP/SQL] Script de pagination (un modèle)                                                                    
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=522
    Auteur           : poujolrost-mathias                                                                                 
    Date édition     : 23 Juil 2009                                                                                       
*/
/*---------------------------------------------------------------*/

/* Script PHP por afficher des élements, en les paginant */

/* DEBUT recuperation du nombre par page */
if (isset($_GET['nombre'])) 
{ 
    $nombreDeElementsParPage = (int) $_GET['nombre'];
    if ($nombreDeElementsParPage < 5)
            { $nombreDeElementsParPage = 5; } // par défaut
} 
else 
{   $nombreDeElementsParPage = 5;    } // par défaut
/* FIN recuperation du nombre par page */

/* DEBUT recuperation du numéro de page courante */
if (isset($_GET['page']))
    { $page = (int) $_GET['page']; } 
else // La variable n'existe pas, c'est la première fois qu'on charge la page
    { $page = 1;} // On se met sur la page 1 (par défaut)
/* FIN recuperation du numéro de page courante */

/* On calcule le numéro du premier élément qu'on prend pour le LIMIT de MySQL */
$premierElementAAfficher = ($page - 1) * $nombreDeElementsParPage;

/* requête pour le nombre total de la sélection */
$reqNbrTotal = "SELECT COUNT(*) AS nbr FROM latable WHERE $where"; 
$resNbrTotal = mysql_query($reqNbrTotal); 
$nbr = mysql_fetch_assoc($resNbrTotal); 
$nombreLignes = $nbr['nbr']; // total pour la requete = pas que sur cette page

/* req. propre à cette page */
$requete = "SELECT * 
        FROM latable 
        WHERE $where 
        ORDER BY ordre ASC 
        LIMIT $premierElementAAfficher, $nombreDeElementsParPage"; 
$resultat = mysql_query($requete); 
$nombreDeElementsSurCettePage = mysql_num_rows($resultat); 
 
/* nombre de page, par arrondi à l'inférieur */
$nombreDePages  = ceil($nombreLignes / $nombreDeElementsParPage); 

/* DEBUT rédaction paragraphe de pagination */
$pagination = "Page : ";
    
if ($page != 1) // si on n'est pas sur la n°1 (= pas de précédente)
{
    $pagination .= ' <a href="?nombre='.$nombreDeElementsParPage.'&amp;page=' . 
($page - 1) . '#resultats" title="page '.($page - 1).
'"><abbr title="page pr&eacute;c&eacute;dente">Pr&eacute;c.</abbr></a> ';
}
if ($page != $nombreDePages) 
// si on n'est pas sur la dernière (= pas de suivante)
{
    $pagination .= ' <a href="?nombre='.$nombreDeElementsParPage.'&amp;page=' . 
($page + 1) . '#resultats" title="page '.($page + 1).
'"><abbr title="page suivante">Suiv.</abbr></a> ';
}
for ($i = 1 ; $i <= $nombreDePages ; $i++) 
{
    if ($i == $page) // si on est sur la page actuelle
    {
        $pagination .= '<strong title="page actuelle">&nbsp;'. $i .'/'.
$nombreDePages.'&nbsp;</strong>';
    }
    else
    {
        $pagination .= ' <a href="?nombre='.$nombreDeElementsParPage.
'&amp;page=' . $i . '#resultats" title="page '.$i.' sur '.$nombreDePages.
'">&nbsp;'. $i .'&nbsp;</a> ';
    } 
}
$difference = ($nombreLignes%$nombreDePages) +1;
$pagination .= "(affichage des résultats "; 
$pagination .=  $premierElementAAfficher+1; 
$pagination .=  " &agrave; ";  
if( ($premierElementAAfficher+$nombreDeElementsSurCettePage) != ($page*
$nombreDeElementsParPage) )
{ 
    $pagination .= $premierElementAAfficher+$nombreDeElementsSurCettePage; 
}
else
    {   $pagination .= $premierElementAAfficher+$nombreDeElementsParPage;   }

$pagination .= " sur un total de $nombreLignes pour cette s&eacute;lection)."; 
/* FIN rédaction paragraphe de pagination */ 

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> 
<title>Touts les éléments</title>
</head>

<body>

<form action="#resultats" method="get" id="form">
    <p>ici vos critères de sélection, tri...</p>
    <label for="l_nombre">Nombre par page</label> <input type="text"
 name="nombre" id="l_nombre" value="<?php echo @rappel($nombreDeElementsParPage)
; ?>" size="2" maxlength="2" /> 
    <input type="submit" value="Afficher les elementss" /></p>
</form>

<?php

if (!$resultat) 
{
    echo 
"<p>&Eacute;chec lors de la lecture de la table. <strong><a" .
" href=\"lapage.php\">Retour &agrave; cette page (avec les param&egrave;tres" .
" par d&eacute;faut)</a></strong>.</p>";
} 
elseif ($nombreDeElementsSurCettePage == 0)
{
    echo 
"<p>Il n'y a aucun élément correspondant à cette sélection <em>ou</em> des" .
" param&egrave;tres de l'URL sont incorrects. <strong><a href=\"lapage.php\">R" .
"etour &agrave; cette page (avec les param&egrave;tres par d&eacute;faut)</a><" .
"/strong>.";
}
else 
{
    echo "<p id=\"resultats\">$pagination</p>" ;
    
        /* DEBUT de la boucle */
        while ($ligne = mysql_fetch_object($resultat))
    {
        
        echo "<h3>$ligne->ref</h3>\n";
        echo 
"<p><img class=\"vignette\" src=\"../img/$ligne->vignette\"" .
" alt=\"$ligne->alt\" /></p>";
    } 
        /* FIN de la boucle */
    mysql_free_result($resultat);
        
    echo 
"<p style=\"clear: both; margin-top: 1em;\">$pagination <a" .
" href=\"#form\">Retour au formulaire</a>.</p>" ;

}// FIN du else
?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Remplace des smileys écrit par des images                                                                    
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=342
    Date édition     : 20 Fév 2008                                                                                        
    Date mise à jour : 07 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

$txt = 'J\'aime le PHP :)';

$txt = str_replace( ":)", '<img src="smile.gif" alt=":)">', $txt );
$txt = str_replace( ":(", '<img src="sad.gif" alt=":(">', $txt );
$txt = str_replace( ":P", '<img src="tongue.gif" alt=":P">', $txt );
$txt = str_replace( ":D", '<img src="biggrin.gif" alt=":D">', $txt );
$txt = str_replace( ":ninja:", '<img src="ninja.gif" alt=":ninja:">', $txt );
$txt = str_replace( ":@", '<img src="angry.gif" alt=":@">', $txt );
$txt = str_replace( ":ohmy:", '<img src="ohmy.gif" alt=":ohmy:">', $txt );
$txt = str_replace( ";)", '<img src="wink.gif" alt=";)">', $txt );
$txt = str_replace( ":blink:", '<img src="blink.gif" alt=":blink:">', $txt );
$txt = str_replace( "8)", '<img src="cool.gif" alt="8)">', $txt );
$txt = str_replace( ":dry:", '<img src="dry.gif" alt=":dry:">', $txt );
$txt = str_replace( ":huh:", '<img src="huh.gif" alt=":huh:">', $txt );
$txt = str_replace( ":rolleyes:", '<img src="rolleyes.gif" alt=":rolleyes:">', 
$txt );
$txt = str_replace( ":haha:", '<img src="laugh.gif" alt=":haha:">', $txt );

       echo $txt;

       // Print : J'aime le PHP <img src="smile.gif" alt=":)">
?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Class: Attachment Mailer                                                                                      
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=429
    Auteur           : freemh                                                                                             
    Date édition     : 19 Juil 2008                                                                                       
*/
/*---------------------------------------------------------------*/?>
<?php
class mailer{
var $email_to;
var $email_subject;
var $headers;
var $mime_boundary;
var $email_message;

//sets up variables and mail email
function mailer($email_to,$email_subject,$email_message,$headers){
$this->email_to=$email_to;
$this->email_subject=$email_subject;
$this->headers = $headers;
$semi_rand = md5(time());
$this->mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$this->headers .= "nMIME-Version: 1.0n" .
"Content-Type: multipart/mixed;n" .
" boundary="{$this->mime_boundary}"";
$this->email_message .= "This is a multi-part message in MIME format.nn" .
"--{$this->mime_boundary}n" .
"Content-Type:text/html; charset="iso-8859-1"n" .
"Content-Transfer-Encoding: 7bitnn" .
$email_message . "nn";
}

//adds attachment
function attach($fileatt_type,$fileatt_name,$fileatt_content){
$data = chunk_split(base64_encode($fileatt_content));
$this->email_message .= "--{$this->mime_boundary}n" .
"Content-Type: {$fileatt_type};n" .
" name="{$fileatt_name}"n" .
"Content-Transfer-Encoding: base64nn" .
$data . "nn" .
"--{$this->mime_boundary}n";
unset($data);
unset($file);
unset($fileatt);
unset($fileatt_type);
unset($fileatt_name);
}

//send email
function send(){
return mail($this->email_to, $this->email_subject, $this->email_message, $this->
headers);
}



//extra functions to make life easier

//send email with imap
function imap_send(){
return imap_mail($this->email_to, $this->email_subject, $this->email_message, 
$this->headers);
}

//read file and add as attachment
function file($file){
$o=fopen($file,"rb");
$content=fread($o,filesize($file));
fclose($o);
$name=basename($file);
$type="application/octet-stream";
$this->attach($type,$name,$content);
}

//read directory and add files as attachments
function dir($dir){
$o=opendir($dir);
while(($file=readdir($o)) !==false){
if($file != "." && $file != ".."){
if(is_dir($dir."/".$file)){
$this->dir($dir."/".$file);
}else{
$this->file($dir."/".$file);
}}}}

}
?> 

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Créer un fichier zippé                                                                                      
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=598
    Auteur           : artemis                                                                                            
    Date édition     : 22 Juil 2010                                                                                       
    Date mise à jour : 17 Oct 2019                                                                                       
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
    - amélioration du code                                                                                               
*/
/*---------------------------------------------------------------*/

class zipfile
{
    /**
     * Array to store compressed data
     *
     * @var  array    $datasec
     */
    var $datasec      = array();

    /**
     * Central directory
     *
     * @var  array    $ctrl_dir
     */
    var $ctrl_dir     = array();

    /**
     * End of central directory record
     *
     * @var  string   $eof_ctrl_dir
     */
    var $eof_ctrl_dir = "\x50\x4b\x05\x06\x00\x00\x00\x00";

    /**
     * Last offset position
     *
     * @var  integer  $old_offset
     */
    var $old_offset   = 0;


    /**
     * Converts an Unix timestamp to a four byte DOS date and time format (date
     * in high two bytes, time in low two bytes allowing magnitude comparison).
     *
     * @param  integer  the current Unix timestamp
     *
     * @return integer  the current date in a four byte DOS format
     *
     * @access private
     */
    function unix2DosTime($unixtime = 0) {
        $timearray = ($unixtime == 0) ? getdate() : getdate($unixtime);

        if ($timearray['year'] < 1980) {
            $timearray['year']    = 1980;
            $timearray['mon']     = 1;
            $timearray['mday']    = 1;
            $timearray['hours']   = 0;
            $timearray['minutes'] = 0;
            $timearray['seconds'] = 0;
        } // end if

        return (($timearray['year'] - 1980) << 25) | ($timearray['mon'] << 21) |
 ($timearray['mday'] << 16) |
                ($timearray['hours'] << 11) | ($timearray['minutes'] << 5) | (
$timearray['seconds'] >> 1);
    } // end of the 'unix2DosTime()' method


    /**
     * Adds "file" to archive
     *
     * @param  string   file contents
     * @param  string   name of the file in the archive (may contains the path)
     * @param  integer  the current timestamp
     *
     * @access public
     */
    function addFile($data, $name, $time = 0)
    {
        $name     = str_replace('\\', '/', $name);

        $dtime    = dechex($this->unix2DosTime($time));
        $hexdtime = '\x' . $dtime[6] . $dtime[7]
                  . '\x' . $dtime[4] . $dtime[5]
                  . '\x' . $dtime[2] . $dtime[3]
                  . '\x' . $dtime[0] . $dtime[1];
        eval('$hexdtime = "' . $hexdtime . '";');

        $fr   = "\x50\x4b\x03\x04";
        $fr   .= "\x14\x00";            // ver needed to extract
        $fr   .= "\x00\x00";            // gen purpose bit flag
        $fr   .= "\x08\x00";            // compression method
        $fr   .= $hexdtime;             // last mod time and date

        // "local file header" segment
        $unc_len = strlen($data);
        $crc     = crc32($data);
        $zdata   = gzcompress($data);
        $zdata   = substr(substr($zdata, 0, strlen($zdata) - 4), 2); 
// fix crc bug
        $c_len   = strlen($zdata);
        $fr      .= pack('V', $crc);             // crc32
        $fr      .= pack('V', $c_len);           // compressed filesize
        $fr      .= pack('V', $unc_len);         // uncompressed filesize
        $fr      .= pack('v', strlen($name));    // length of filename
        $fr      .= pack('v', 0);                // extra field length
        $fr      .= $name;

        // "file data" segment
        $fr .= $zdata;

        // "data descriptor" segment (optional but necessary if archive is not
        // served as file)
        $fr .= pack('V', $crc);                 // crc32
        $fr .= pack('V', $c_len);               // compressed filesize
        $fr .= pack('V', $unc_len);             // uncompressed filesize

        // add this entry to array
        $this -> datasec[] = $fr;
        $new_offset        = strlen(implode('', $this->datasec));

        // now add to central directory record
        $cdrec = "\x50\x4b\x01\x02";
        $cdrec .= "\x00\x00";                // version made by
        $cdrec .= "\x14\x00";                // version needed to extract
        $cdrec .= "\x00\x00";                // gen purpose bit flag
        $cdrec .= "\x08\x00";                // compression method
        $cdrec .= $hexdtime;                 // last mod time & date
        $cdrec .= pack('V', $crc);           // crc32
        $cdrec .= pack('V', $c_len);         // compressed filesize
        $cdrec .= pack('V', $unc_len);       // uncompressed filesize
        $cdrec .= pack('v', strlen($name) ); // length of filename
        $cdrec .= pack('v', 0 );             // extra field length
        $cdrec .= pack('v', 0 );             // file comment length
        $cdrec .= pack('v', 0 );             // disk number start
        $cdrec .= pack('v', 0 );             // internal file attributes
        $cdrec .= pack('V', 32 );            
// external file attributes - 'archive' bit set

        $cdrec .= pack('V', $this -> old_offset ); 
// relative offset of local header
        $this -> old_offset = $new_offset;

        $cdrec .= $name;

        // optional extra field, file comment goes here
        // save to central directory
        $this -> ctrl_dir[] = $cdrec;
    } // end of the 'addFile()' method


    /**
     * Dumps out file
     *
     * @return  string  the zipped file
     *
     * @access public
     */
    function file()
    {
        $data    = implode('', $this -> datasec);
        $ctrldir = implode('', $this -> ctrl_dir);

        return
            $data .
            $ctrldir .
            $this -> eof_ctrl_dir .
            pack('v', sizeof($this -> ctrl_dir)) .  
// total # of entries "on this disk"
            pack('v', sizeof($this -> ctrl_dir)) .  
// total # of entries overall
            pack('V', strlen($ctrldir)) .           // size of central dir
            pack('V', strlen($data)) .              
// offset to start of central dir
            "\x00\x00";                             // .zip file comment length
            } // end of the 'file()' method

        } // end of the 'zipfile' class

?>

<?php

     $nom_file = 'fichier_a_zipper.php'; // chemin du fichier a zipper
     $nom_zip = 'fichier_zipper.zip'; // Nom du fichier zippé

     $zip = new zipfile() ; //on créer un fichier zip
     $fp = fopen($nom_file,'r') ; //on ouvre le fichier en lecture seule
     $contenu = fread($fp, filesize($nom_file)) ; //on enregistre le contenu
     fclose($fp) ; //on ferme FTP
     $zip->addFile($contenu, $nom_file) ; //on ajoute le fichier
     $open = fopen($nom_zip, 'wb');
     fwrite($open, $zip->file());
     fclose($open);
?>



</body> 
</html>


?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Convertisseur octet, Ko, Mo, Go, To, Po                                                                       
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=997
    Date édition     : 15 Fév 2019                                                                                        
    Date mise à jour : 27 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

      function convert_bytes($val , $type_val , $type_wanted){
     $tab_val = array("o", "ko", "Mo", "Go", "To", "Po", "Eo"); 
      if (!(in_array($type_val, $tab_val) && in_array($type_wanted, $tab_val))) 
      return 0; 
      $tab = array_flip($tab_val); 
      $diff = $tab[$type_val] - $tab[$type_wanted]; 
      if ($diff > 0) 
      return ($val * pow(1024, $diff)); 
      if ($diff < 0) 
      return ($val / pow(1024, -$diff)); 
      return ($val); 
    }
?>

<?php
    // Converti 10 Go en Mo
    echo convert_bytes(10,'Go','Mo');
    // Affiche
    // 10240 Mo
?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Vérifie la validité et l'existence d'une date                                                               
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=16
    Date édition     : 30 Aout 2004                                                                                       
    Date mise à jour : 28 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/
   
    if(!checkdate(2,31,2020))
           echo "Date non valide !";
    // Affiche : Date non valide !

    if(!checkdate(02,31,2020))
           echo "Date non valide !";
    // Affiche : Date non valide !

    if(!checkdate(02,28,2020))
           echo "Date non valide !";
    // Affiche rien, la date est valide

    // Vérification avec masque
    function valideDate($date, $format = 'Y-m-d H:i:s')
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }
?>
                              
<?php
    var_dump(valideDate('2012-02-28 12:12:12'));
    var_dump(valideDate('2012-02-28', 'Y-m-d'));
    var_dump(valideDate('28/02/2012', 'd/m/Y'));
    var_dump(valideDate('14:50', 'H:i'));
    var_dump(valideDate(14, 'H'));
    var_dump(valideDate('14', 'H'));
    var_dump(valideDate('Tue, 28 Feb 2012 12:12:12 +0200', 'D, d M Y H:i:s O'));

    // Affiche
    /*
    boolean true
    boolean true
    boolean true
    boolean true
    boolean true
    boolean true
    boolean true
    */
?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Lire le contenu d'un fichier avec fopen                                                                       
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=63
    Date édition     : 01 Sept 2004                                                                                       
    Date mise à jour : 23 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

    $filepath = ''; // Le fichier
    $contenu = fread( fopen( $filepath, "r" ) , filesize( $filepath ) );
    echo $contenu;

?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Obtenir l'extension d'un fichier                                                                              
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=117
    Date édition     : 11 Mars 2005                                                                                       
    Date mise à jour : 31 Oct 2019                                                                                       
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
    - maintenance du code                                                                                                 
*/
/*---------------------------------------------------------------*/

    $file = 'filename.txt';

    echo str_replace('.','',strstr($file, '.'));
    echo substr(strrchr($file,'.'),1);
    echo pathinfo($file, PATHINFO_EXTENSION);

    // Les 3 exemples affiche : txt

?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Téléchargement de fichiers zip avec compteur                                                                
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=164
    Website auteur   : https://qwanturank-qwanturank-qwanturank.fr/                                                       
    Date édition     : 27 Fév 2006                                                                                        
    Date mise à jour : 22 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - refactoring du code en PHP 7                                                                                        
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/?>
    CREATE TABLE telecharger (
      id mediumint(8) unsigned NOT NULL auto_increment,
      titre varchar(60) NOT NULL default '',
      url varchar(120) NOT NULL default '',
      categorie varchar(120) NOT NULL default '',
      compteur int(11) NOT NULL default '0',
      PRIMARY KEY  (id)
    ) TYPE=MyISAM;  


    ***************************************** 
    ***************************************** 
    id (ID de l'enregistrement)
    titre (le titre de l'enregistrement)
    url (url ou se trouve le zip)
    categorie (la catégorie de l'enregistrement, si nécessaire)
    compteur (Le champ qui va compter chaque téléchargement)

<?php 

    //**********************
    //**********************
    // Premiere partie
    //**********************
    //**********************

    // Connection au serveur mySQL

    $db_server = 'localhost'; // Adresse du serveur MySQL
    $db_name = '';            // Nom de la base de données
    $db_user_login = 'root';  // Nom de l'utilisateur
    $db_user_pass = '';       // Mot de passe de l'utilisateur

    // Ouvre une connexion au serveur MySQL
    $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);

    $q = $conn->query("SELECT id,titre,compteur FROM telecharger");

    while ($r = mysqli_fetch_array($q))
    {
    echo "<a href=\"inc_telecharger.php?id=".$r['id']."\" target=\"_blank\">";
    echo "".htmlentities($r['titre'])."</a><br />";
    echo "Télécharger ".$r['compteur']." fois";
    }


    //**********************
    //**********************
    // Seconde partie      
    //**********************
    // inc_telecharger.php 
    //**********************
    //**********************


    $db_server = 'localhost'; // Adresse du serveur MySQL
    $db_name = '';            // Nom de la base de données
    $db_user_login = 'root';  // Nom de l'utilisateur
    $db_user_pass = '';       // Mot de passe de l'utilisateur

    // Ouvre une connexion au serveur MySQL
    $conn = mysqli_connect($db_server,$db_user_login, $db_user_pass, $db_name);

    // Recupere l'ID
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    // Detection de l'ID
    if (isset($id) && is_numeric($id)) {
    // mise à jour de la table
    $conn->query("UPDATE telecharger SET compteur = compteur + 1 WHERE id = $id"
);
    // vas chercher l'url
    $q = $conn->query("SELECT url FROM telecharger WHERE id = $id");
    $r = mysqli_fetch_array($q);
    // redirection vers la page d'origine
    header("Location: ".$r["url"]);
    }
?>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Formulaire JS + Ajax + PHP + e-MAIL                                                                           
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=1075
    Auteur           : KOogar                                                                                             
    Date édition     : 28 Juin 2019                                                                                       
    Date mise à jour : 13 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

if (!empty($_POST) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower(
$_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    if (mail('koog@ar.com', 'New message', $_POST['message'])) {
        echo "Message envoyé avec succès.";
    } else {
        http_response_code(500);
    }
    exit();
}
?>
 
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,
 shrink-to-fit=no">
    <link rel="stylesheet"
 href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
 integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZ
w1T" crossorigin="anonymous">
    <title>Contact</title>
  </head>
  <body>
    <div class="container">
        <form id="contact-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" id="firstname" name="firstname"
 class="form-control" required>
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" id="lastname" name="lastname"
 class="form-control" required>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" class="form-control"
 required></textarea>
            </div>
           
            <button type="submit" id="submit" class="btn
 btn-primary">Submit</button>
        </form>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
 crossorigin="anonymous"></script>
    <script
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
 integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz
0W1" crossorigin="anonymous"></script>
    <script
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
 integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07
jRM" crossorigin="anonymous"></script>
     
    <script>
        $(function () {
            $('#submit').on('click', function (e) {
                e.preventDefault();
                let $form = $('#contact-form');
              
                if ($form.get(0).checkValidity()) {
                    $.post($form.attr('action'),
 $form.serializeArray()).done(function (data) {
                        $form.prepend(`<div class="alert
 alert-success">${data}</div>`);
                    }).fail(function(jqXHR, textStatus, errorThrown) {
                        $form.prepend(`<div class="alert alert-danger">Une
 erreur est survenue.</div>`)
                    });
                } else {
                    $form.get(0).reportValidity();
                }
            });
        });
    </script>
  </body>
</html>

                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Pour imprimer une page                                                                                        
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=67
    Date édition     : 01 Sept 2004                                                                                       
    Date mise à jour : 18 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/?>
Pour imprimer une page ; on peut faire un lien vers une nouvelle
page qui contient la version "imprimable de la page PHP et on
ajoute le script suivant dans la balise body :

<body onload="window.print()"> 



                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Traduire vos pages dans une autre langue                                                                      
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=817
    Auteur           : sheppy1                                                                                            
    Date édition     : 11 Jan 2019                                                                                        
    Date mise à jour : 19 Aout 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/?>
    <!DOCTYPE html> 
    <html lang="fr">
    <body> 
      
    <p>Bonjour!</p>
    <p>Bienvenue sur phpsources</p>
      
    <p>Translate this page in your preferred language:</p>
      
    <div id="google_translate_element"></div> 
      
    <script type="text/javascript"> 
    function googleTranslateElementInit() { 
      new google.translate.TranslateElement({pageLanguage: 'en'},
 'google_translate_element'); 
    } 
    </script> 
      
    <script type="text/javascript"
 src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementIni
t"></script> 
      
    <p>Vous pouvez traduire le contenu de cette page en sélectionnant une
 langue dans le menu déroulant.</p>
      
    </body> 
    </html>

/projects/delete_category/<?= $category->id ?>