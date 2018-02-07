/*Ce code est utilisé sur une site de photographe avec un effet parallaxe et donc des imges de fond. 
La variable $slides est le nombre d' images de fond à utiliser. 
Problème: les médias queries ne fonctionnent pas et seule l' image plein pot est affichée quel que soit le support. 
Ce ne sont donc que des taches de couleur sur les tablettes.
*/	


for ( $i = 1; $i <= $slides; $i++ )
		{
			/* calcul sur les slides */
			$fond = get_theme_mod('photo_' . $i . '_background_setting',  "default");// je récupère l' url de l' image de background

			$fond_id = attachment_url_to_postid($fond) ;

			$upload_dir = wp_upload_dir()["url"];

			$attachment_metas = wp_get_attachment_metadata($fond_id);// pour retrouver les tailles d' images créées par wp

			/*fond écran taille tablette 1000px */



			$fond_name = $attachment_metas["size"]["1000px"]["file"];

			$fond_1000px = $upload_dir ."/" . $fond_name;// on recrée l' url pour une image de fond de 1000px




			/*fond écran taille petite tablette 700px */

			$fond_name = $attachment_metas["size"]["700px"]["file"];

			$fond_700px = $upload_dir ."/" . $fond_name;



			/*fond écran taille gsm 400px */


			$fond_name = $attachment_metas["size"]["400px"]["file"];

			$fond_400px = $upload_dir ."/" . $fond_name;



			/*fond écran taille gsm 250px */

			$fond_name = $attachment_metas["size"]["250px"]["file"];

			$fond_250px = $upload_dir ."/" . $fond_name;




			 ?>
			<style type="text/css">

			/*css des slides */

				@media screen and (max-width: 300px) {
					#slide-<?php echo $i ?>  {background-image: url("<?php echo $fond_250px ?>"); background-attachment: fixed;  background-size: cover;background-position: center; height: <?php echo $height  ?>; }
				}

				@media screen and (min-width: 301) and (max-width: 400px) {
					#slide-<?php echo $i ?>  {background-image: url("<?php echo $fond_400px ?>"); background-attachment: fixed;  background-size: cover;background-position: center; height: <?php echo $height  ?>; }
				}

				@media screen and (min-width: 401px) and (max-width: 700px) {
					#slide-<?php echo $i ?>  {background-image: url("<?php echo $fond_700px ?>"); background-attachment: fixed;  background-size: cover;background-position: center; height: <?php echo $height  ?>; }
				}

				@media screen and (min-width: 701px) and (max-width: 1000px) {
					#slide-<?php echo $i ?>  {background-image: url("<?php echo $fond_1000px ?>"); background-attachment: fixed;  background-size: cover;background-position: center; height: <?php echo $height  ?>; }
				}


		        #slide-<?php echo $i ?>  {background-image: url("<?php echo $fond ?>"); background-attachment: fixed;  background-size: cover; background-position: center; height: <?php echo $height  ?>; background-position: center center; }



}
