<html>
<link rel="stylesheet" href="style.css" type="text/css" media="screen">
<p align="center">
		<img border="0" src="images/intemporelle%20logo%20tr.png" width="848" height="185"></p>
</html>

<?php
 
if(isset($_POST['email'])) {
 
 
    $email_to = "institut@intempor-elle.com";
 
    $email_subject = "Demande d'information Site Web";
 
     
 
     
 
    function died($error) {
 
       
        echo "Erreur(s) lors de l'envoi du formulaire de contact. ";
 
        echo "Les erreurs sont les suivantes:<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Merci de revenir et de corriger celles-ci SVP !<br /><br />";
        
        echo '<a href="contact2.htm">Cliquer ici pour revenir SVP</a>';
 
        die();
 
    }
 
     
  
    if(!isset($_POST['prenom']) ||
 
        !isset($_POST['nom']) ||
 
        !isset($_POST['email']) ||
 
        !isset($_POST['telephone']) ||
 
        !isset($_POST['commentaire'])) {
 
        died('Une erreur est survenue dans formulaire.');       
 
    }
 
     
 
    $prenom = $_POST['prenom']; // required
 
    $nom = $_POST['nom']; // required
 
    $email = $_POST['email']; // required
 
    $telephone = $_POST['telephone']; // not required
 
    $commentaire = $_POST['commentaire']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email)) {
 
    $error_message .= 'Mail manquant ou non conforme.<br />';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$prenom)) {
 
    $error_message .= 'Prenom manquant.<br />';
 
  }
 
  if(!preg_match($string_exp,$nom)) {
 
    $error_message .= 'Nom manquant .<br />';
 
  }
 
  if(strlen($commentaire) < 2) {
 
    $error_message .= 'Commentaire manquant.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Détail du formulaire.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Prénom: ".clean_string($prenom)."\n";
 
    $email_message .= "Nom: ".clean_string($nom)."\n";
 
    $email_message .= "Email: ".clean_string($email)."\n";
 
    $email_message .= "Telephone: ".clean_string($telephone)."\n";
 
    $email_message .= "Commentaire: ".clean_string($commentaire)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email."\r\n".
 
'Reply-To: '.$email."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 
?>
 
 
  
Message envoy&eacute; . Nous vous r&eacute;pondrons le plus rapidement possible.
<html>
<SCRIPT LANGUAGE="JavaScript">
function redirect() {
	window.location="http://www.intempor-elle.com/contact2.htm"
}
setTimeout("redirect()",5000); // delai en millisecondes
</SCRIPT>
<CENTER><BIG>Retour au site dans 5 secondes</BIG><BR><BR><BR><BR>
</HTML>
 
 
 
<?php
 
}
 
?>

						