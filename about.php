<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "functions.php";
                generateAboutText();
                generateWorkers();
                generateAboutBackground();
                generateAbout();
                generateHistory();
            ?>
        </main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>