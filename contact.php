<?php include "parts/header.php" ?>
		<main>
            <?php
                include_once "functions.php";
                generateContactText();
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
                        include_once "functions.php";
                        generateInfo();
                    ?>
                </div>
			</div>

            <?php
                include_once "functions.php";
                generateMapa();
                generateQna();
            ?>
		</main>
		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>