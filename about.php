<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "classes/Obsah.php";
                $obsah = new Obsah();

                $nadpis = $obsah->getValue('about_nadpis');
                $text = $obsah->getValue('about_text');

                echo'<div class="row tm-welcome-section">';
                echo'<h2 class="col-12 text-center tm-section-title">' . $nadpis . '</h2>';
                echo'<p class="col-13 text-center">' . $text . '</p>';
                echo'</div>';

                generateWorkers();

                $url = $obsah->getValue('about_background');

                echo '<div class="tm-container-inner tm-featured-image">';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="placeholder-2">';
                echo '<div class="parallax-window-2" data-parallax="scroll" data-image-src="' . $url . '"></div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';

                generateAbout();

                $nadpis = $obsah->getValue('history_nadpis');
                $text = $obsah->getValue('history_text');
                $url = $obsah->getValue('history_url');

                echo '<div class="tm-container-inner tm-history">';
                echo '<div class="row">';
                echo '<div class="col-12">';
                echo '<div class="tm-history-inner">';
                echo '<img src="' . $url . '" alt="Image" class="img-fluid tm-history-img" />';
                echo '<div class="tm-history-text"> ';
                echo '<h4 class="tm-history-title">' . $nadpis . '</h4>';
                echo '<p class="tm-mb-p">' . $text . '</p>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            ?>
        </main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>