<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "classes/Obsah.php";
                $obsah = new Obsah();
                $nadpis = $obsah->getValue('contact_nadpis');
                $text = $obsah->getValue('contact_text');
                echo'<div class="row tm-welcome-section">';
                echo'<h2 class="col-12 text-center tm-section-title">' . $nadpis . '</h2>';
                echo'<p class="col-12 text-center">' . $text . '</p>';
                echo'</div>';
            ?>
			<div class="tm-container-inner-2 tm-contact-section">
				<div class="row">
					<div class="col-md-6">
						<form action="" method="POST" class="tm-contact-form">
					        <div class="form-group">
					          <input type="text" name="name" class="form-control" placeholder="Name" required="" />
					        </div>
					        
					        <div class="form-group">
					          <input type="email" name="email" class="form-control" placeholder="Email" required="" />
					        </div>
				
					        <div class="form-group">
					          <textarea rows="5" name="message" class="form-control" placeholder="Message" required=""></textarea>
					        </div>
					
					        <div class="form-group tm-d-flex">
					          <button type="submit" class="tm-btn tm-btn-success tm-btn-right">
					            Send
					          </button>
					        </div>
						</form>
					</div>
                    <?php
                    $adresa = $obsah->getValue('adresa');
                    $telefonne_cislo = $obsah->getValue('telefonne_cislo');
                    $email = $obsah->getValue('email');
                    $facebook = $obsah->getValue('facebook');
                    $twitter = $obsah->getValue('twitter');
                    $instagram = $obsah->getValue('instagram');
                    $youtube = $obsah->getValue('youtube');

                    echo'<div class="col-md-6">';
                    echo'<div class="tm-address-box">';
                    echo'<h4 class="tm-info-title tm-text-success">Our Address</h4>';
                    echo'<address>' . $adresa . '</address>';
                    echo'<a href="tel:' . $telefonne_cislo . '" class="tm-contact-link">';
                    echo'<i class="fas fa-phone tm-contact-icon"></i>' . $telefonne_cislo . '';
                    echo'</a>';
                    echo'<a href="mailto:' . $email . '" class="tm-contact-link">';
                    echo'<i class="fas fa-envelope tm-contact-icon"></i>' . $email . '';
                    echo'</a>';
                    echo'<div class="tm-contact-social">';
                    if (!empty($facebook)) {
                        echo '<a href="' . $facebook . '" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>';
                    }
                    if (!empty($twitter)) {
                        echo '<a href="' . $twitter . '" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>';
                    }
                    if (!empty($instagram)) {
                        echo '<a href="' . $instagram . '" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>';
                    }
                    if (!empty($youtube)) {
                        echo '<a href="' . $youtube . '" class="tm-social-link"><i class="fab fa-youtube tm-social-icon"></i></a>';
                    }

                    echo'</div>';
                    echo'</div>';
                    echo'</div>';
                    ?>

                </div>
			</div>

            <?php
                $mapa = $obsah->getValue('mapa');

                echo '<div class="tm-container-inner-2 tm-map-section">';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="tm-map">';
                echo '<iframe src="' . $mapa .'" frameborder="0" style="border:0;" allowfullscreen=""></iframe>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                generateQna();
            ?>
		</main>
		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>