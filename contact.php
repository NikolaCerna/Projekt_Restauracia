<?php include "parts/header.php" ?>
		<main>
			<div class="row tm-welcome-section">
				<h2 class="col-12 text-center tm-section-title">Contact page</h2>
				<p class="col-12 text-center">We would love to hear from you! Whether you have a question about our menu, want to make a reservation, or need assistance with anything else, feel free to reach out to us. Our team is here to help!</p>
			</div>

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
                    <div class="col-md-6">
                        <div class="tm-address-box">
                            <h4 class="tm-info-title tm-text-success">Our Address</h4>
                            <address>
                                Av. Lúcio Costa, 172 - Barra da Tijuca, Rio de Janeiro - RJ, 22795-006, Brazil
                            </address>
                            <a href="tel:+123-456-7890" class="tm-contact-link">
                                <i class="fas fa-phone tm-contact-icon"></i>+123-456-7890
                            </a>
                            <a href="mailto:contact@simplehouse.com" class="tm-contact-link">
                                <i class="fas fa-envelope tm-contact-icon"></i>contact@simplehouse.com
                            </a>
                            <div class="tm-contact-social">
                                <a href="https://facebook.com/simplehouse" class="tm-social-link"><i class="fab fa-facebook tm-social-icon"></i></a>
                                <a href="https://twitter.com/simplehouse" class="tm-social-link"><i class="fab fa-twitter tm-social-icon"></i></a>
                                <a href="https://instagram.com/simplehouse" class="tm-social-link"><i class="fab fa-instagram tm-social-icon"></i></a>
                            </div>
                        </div>
                    </div>

                </div>
			</div>
            
<!-- How to change your own map point
	1. Go to Google Maps
	2. Click on your location point
	3. Click "Share" and choose "Embed map" tab
	4. Copy only URL and paste it within the src="" field below
-->
			<div class="tm-container-inner-2 tm-map-section">
				<div class="row">
					<div class="col-12">
						<div class="tm-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11196.961132529668!2d-43.38581128725845!3d-23.011063013218724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9bdb695cd967b7%3A0x171cdd035a6a9d84!2sAv.%20L%C3%BAcio%20Costa%20-%20Barra%20da%20Tijuca%2C%20Rio%20de%20Janeiro%20-%20RJ%2C%20Brazil!5e0!3m2!1sen!2sth!4v1568649412152!5m2!1sen!2sth" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
						</div>
					</div>
				</div>
			</div>
			<div class="tm-container-inner-2 tm-info-section">
				<div class="row">
					<!-- FAQ -->
					<div class="col-12 tm-faq">
                        <h2 class="text-center tm-section-title">FAQs</h2>
                        <p class="text-center">Here you can find answers to the most frequently asked questions from our customers.</p>
                        <div class="tm-accordion">
                            <button class="accordion">1. Do you offer gluten-free meals?</button>
                            <div class="panel">
                                <p>Yes, we offer gluten-free options for pizzas, salads, and some noodle dishes. Please ask our staff for more information.</p>
                            </div>

                            <button class="accordion">2. Can I book a table in advance?</button>
                            <div class="panel">
                                <p>Absolutely. You can make a reservation by phone or email. We recommend booking in advance, especially on weekends.</p>
                            </div>

                            <button class="accordion">3. Do you offer food delivery?</button>
                            <div class="panel">
                                <p>Yes, you can order food for delivery through our website or via partner apps like Foodora or Wolt.</p>
                            </div>

                            <button class="accordion">4. What are your opening hours?</button>
                            <div class="panel">
                                <p>We are open daily from 10:00 AM to 10:00 PM. Last orders are accepted until 9:30 PM.</p>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</main>

		<?php include "parts/footer.php" ?>
	</div>
</body>
</html>