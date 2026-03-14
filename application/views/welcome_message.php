<!-- Header section ui_Header  -->
<?php
$this->load->view('fronted/layouts/ui_Header');
?>




<main class="drake-main">




	<div id="smooth-wrapper">
		<div id="smooth-content">

			<!-- ====== INTROUDUCE HOME ======= -->
			<section class="hero-section page-section scroll-to-page" id="home">
				<div class="custom-container">

					<div class="hero-content content-width">
						<?php if (isset($intro) && $intro): ?>

							<div class="section-header">
								<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
									<i class="las la-home"></i> Introduce
								</h4>
								<h1 class="scroll-animation" data-animation="fade_from_bottom">
									Say Hi from <span><?= $intro->introduce_highlight ?></span>
									<?= $intro->introduce_title ?>
								</h1>
							</div>
							<p class="scroll-animation" data-animation="fade_from_bottom">
								<?= $intro->introduce_paragraph ?>
							</p>
						<?php endif; ?>

						<a href="<?= base_url($intro->project_download) ?>"
							class="go-to-project-btn scroll-to scroll-animation" data-animation="rotate_up" download>

							<img src="modules/assets/images/round-text.png" alt="Rounded text" />
							<i class="las la-arrow-down"></i>

						</a>


						<div class="facts d-flex">
							<div class="left scroll-animation" data-animation="fade_from_left">
								<h1><?= $intro->experience ?? '0+' ?></h1>
								<p>My Total Yrs. of <br />Experience</p>
							</div>
							<div class="right scroll-animation" data-animation="fade_from_right">
								<h1><?= $intro->project_completed ?? '0+' ?></h1>
								<p>projects completed on <br />15 countries</p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- ====== INTROUDUCE HOME ======= -->


			<!-- ====== ABOUT ======= -->
			<section class="about-area page-section scroll-to-page" id="about">
				<div class="custom-container">
					<div class="about-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="lar la-user"></i> About
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								<?= $about->about_title ?? '' ?><br />
								an even <span><?= $about->title_highlights ?? '' ?></span>
							</h1>
						</div>
						<p class="scroll-animation" data-animation="fade_from_bottom">
							<?= $about->about_paragraph ?? '' ?>

						</p>
					</div>
				</div>
			</section>
			<!-- ====== ABOUT ======= -->


			<!-- ====== RESUME SECTION ======= -->
			<section class="resume-area page-section scroll-to-page" id="resume">
				<div class="custom-container">
					<div class="resume-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="las la-briefcase"></i> Resume
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								Education & <span>Experience</span>
							</h1>
						</div>

						<div class="resume-timeline">

							<?php if (!empty($education)): ?>

								<?php foreach ($education as $block): ?>

									<!-- DATE ONLY ONCE -->
									<div class="item scroll-animation" data-animation="fade_from_right">

										<span class="date">
											<?= $block->date ?>
										</span>

										<?php if (!empty($block->items)): ?>

											<?php foreach ($block->items as $item): ?>

												<h2><?= $item->title ?></h2>
												<p><?= $item->description ?></p>

											<?php endforeach; ?>

										<?php endif; ?>

									</div>

								<?php endforeach; ?>

							<?php endif; ?>

						</div>


					</div>
				</div>
			</section>

			<!-- ====== RESUME SECTION ======= -->



			<!-- ====== SERVICES ======= -->
			<section class="services-area page-section scroll-to-page" id="services">
				<div class="custom-container">
					<div class="services-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="las la-stream"></i> Services
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								My <span>Specializations</span>
							</h1>
						</div>

						<div class="services-items">
							<?php if (!empty($service)) { ?>
								<?php foreach ($service as $srv) { ?>

									<div class="service-item scroll-animation" data-animation="fade_from_bottom">
										<i class=""><img src="<?= base_url($srv->service_icon); ?>" alt="<?= $srv->heading; ?>"
												width="30"></i>


										<h2><?= $srv->heading ?? '' ?></h2>

										<p>
											<?= $srv->description ?? '' ?>
										</p>

										<span class="projects">
											<?= $srv->projects_count ?? 0 ?>
										</span>

									</div>

								<?php } ?>
							<?php } ?>
						</div>

					</div>
				</div>
			</section>

			<!-- ====== SERVICES ======= -->



			<!-- ====== SKILL ======= -->
			<section class="skills-area page-section scroll-to-page" id="skills">
				<div class="custom-container">
					<div class="skills-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="las la-shapes"></i> my skills
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								My <span>Advantages</span>
							</h1>
						</div>

						<div class="row skills text-center">

							<?php if (!empty($skill)) { ?>
								<?php foreach ($skill as $sk) { ?>

									<div class="col-md-3 scroll-animation" data-animation="fade_from_bottom">

										<div class="skill">

											<div class="skill-inner">

												<img src="<?= base_url($sk->skill_logo) ?>" alt="<?= $sk->skill_name ?>" />

												<h1 class="percent"><?= $sk->skill_percentage ?>%</h1>

											</div>

											<p class="name"><?= $sk->skill_name ?></p>

										</div>

									</div>

								<?php } ?>
							<?php } ?>

						</div>

					</div>
				</div>
			</section>
			<!-- ====== SKILL ======= -->



			<!-- mmmm  PORTFOLIO mmmmmmm -->
			<section class="portfolio-area page-section scroll-to-page" id="portfolio">
				<div class="custom-container">
					<div class="portfolio-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="las la-grip-vertical"></i> portfolio
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								Featured <span>Projects</span>
							</h1>
						</div>

						<div class="row portfolio-items">
							<div class="col-md-12 scroll-animation" data-animation="fade_from_bottom">

								<?php if (!empty($portfolios)) { ?>
									<?php foreach ($portfolios as $pf) { ?>

										<div class="portfolio-item portfolio-full">

											<div class="portfolio-item-inner">

												<a href="<?= base_url($pf->full_image) ?>" data-lightbox="portfolio">
													<img src="<?= base_url($pf->full_image) ?>"
														alt="<?= $pf->project_title ?>" />
												</a>

												<ul class="portfolio-categories">

													<?php if (!empty($pf->tags)) { ?>
														<?php foreach ($pf->tags as $tag) { ?>

															<li>
																<a href="#"><?= $tag->project_tags ?></a>
															</li>

														<?php } ?>
													<?php } ?>

												</ul>

											</div>

											<h2>
												<a href="<?= $pf->project_link ?>" target="_blank" rel="noopener noreferrer">
													<?= $pf->project_title ?>
												</a>
											</h2>

										</div>

									<?php } ?>
								<?php } ?>

							</div>

						</div>
					</div>
				</div>
			</section>
			<!-- wwwww PORTFOLIO wwwwww -->


			<!-- ====== TESTIMONIAL ======= -->
			<section class="testimonial-area page-section scroll-to-page" id="testimonial">
				<div class="custom-container">
					<div class="testimonial-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="lar la-comment"></i> testimonial
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								Trusted by <span>Hundered Clients</span>
							</h1>
						</div>

						<div class="testimonial-slider-wrap scroll-animation" data-animation="fade_from_bottom">
							<div class="owl-carousel testimonial-slider owl-theme">

								<?php if (!empty($testimonials)) { ?>
									<?php foreach ($testimonials as $t) { ?>

										<div class="testimonial-item">
											<div class="testimonial-item-inner">

												<div class="author d-flex align-items-center">

													<img src="<?= base_url($t->profile_photo) ?>"
														alt="<?= $t->profile_name ?>" />

													<div class="right">
														<h3><?= $t->profile_name ?></h3>

														<p class="designation">
															CEO of <span><?= $t->company_name ?></span>
														</p>
													</div>

												</div>

												<p>
													“<?= $t->client_review ?>”
												</p>

												<a href="#" class="project-btn">
													<?= $t->client_project_name ?>
												</a>

											</div>
										</div>

									<?php } ?>
								<?php } ?>


							</div>

							<div class="testimonial-footer-nav">
								<div class="testimonial-nav d-flex align-items-center">
									<button class="prev">
										<i class="las la-angle-left"></i>
									</button>
									<div id="testimonial-slide-count"></div>
									<button class="next">
										<i class="las la-angle-right"></i>
									</button>
								</div>
							</div>
						</div>



						<div class="clients-logos">
							<h4 class="scroll-animation" data-animation="fade_from_bottom">
								work with brands worldwide
							</h4>

							<div class="row align-items-center">
								<?php if (!empty($company_logos)) { ?>
									<?php foreach ($company_logos as $logo) { ?>

										<div class="col-md-3 scroll-animation" data-animation="fade_from_left">
											<img src="<?= base_url($logo->company_logo) ?>" alt="Client" />
										</div>

									<?php } ?>
								<?php } ?>
							</div>

						</div>
					</div>
				</div>
			</section>

			<!-- ====== TESTIMONIAL ======= -->


			<!-- ====== PRICING CARD pending_edit_mode_not_showing_card_items ======= -->
			<section class="pricing-area page-section scroll-to-page" id="pricing">
				<div class="custom-container">
					<div class="pricing-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="las la-dollar-sign"></i> pricing
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								My <span>Pricing</span>
							</h1>
						</div>

						<div class="pricing-table-items">
							<div class="row">

								<?php if (!empty($pricing_cards)) { ?>
									<?php foreach ($pricing_cards as $card) { ?>

										<div class="col-md-6 scroll-animation" data-animation="fade_from_left">

											<div class="pricing-table">

												<div class="pricing-table-header">

													<div class="top d-flex justify-content-between align-items-start">

														<h4><?= $card->plan_name ?></h4>

														<p class="text-right">
															<?= nl2br($card->small_description) ?>
														</p>

													</div>

													<h1>
														₹<?= $card->pricing ?>
														<span>/ <?= $card->duration ?></span>
													</h1>

												</div>

												<ul class="feature-lists">

													<?php if (!empty($card->items)) { ?>
														<?php foreach ($card->items as $item) { ?>

															<li><?= $item->item_text ?></li>

														<?php } ?>
													<?php } ?>

												</ul>

												<a href="<?= $card->sample_url ?>" target="_blank" class="theme-btn">
													pick this package
												</a>

											</div>

										</div>

									<?php } ?>
								<?php } ?>

							</div>
							<p class="info scroll-animation" data-animation="fade_from_bottom">
								Don't find any package match with your plan!<br />
								Want to setup a new tailor-made package for only you?.
								<a href="#contact">Contact Us</a>
							</p>
						</div>
					</div>
				</div>
			</section>

			<!-- WWWWW PRICING CARD ==WWWWW -->


			<!-- MMMMM CONTACT VISITOR DATA MMMMM -->
			<section class="contact-area page-section scroll-content" id="contact">
				<div class="custom-container">
					<div class="contact-content content-width">
						<div class="section-header">
							<h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
								<i class="las la-dollar-sign"></i> contact
							</h4>
							<h1 class="scroll-animation" data-animation="fade_from_bottom">
								Let's Work <span>Together!</span>
							</h1>
						</div>
						<h3 class="scroll-animation" data-animation="fade_from_bottom">
							<?= $card->email; ?>
						</h3>
						<p id="required-msg">* Marked fields are required to fill.</p>

						<form class=" scroll-animation" data-animation="fade_from_bottom" method="POST"
							action="<?php echo base_url('insert_contact'); ?>">

							<div class="row contact-form">
								<div class="col-md-6">
									<div class="input-group">
										<label for="full-name">full Name <sup>*</sup></label>
										<input type="text" name="full_name" id="full-name" placeholder="Your Full Name"
											required />
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<label for="email">Email <sup>*</sup></label>
										<input type="email" name="email" id="email" placeholder="Your email adress"
											required />
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<label for="phone-number">phone <span>(optional)</span></label>
										<input type="text" name="phone_number" id="phone-number"
											placeholder="Your number phone" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="input-group">
										<label for="subject">subject <sup>*</sup></label>
										<input type="text" name="subject" id="subject" placeholder="Your subject "
											required />
									</div>
								</div>

								<div class="col-md-12">
									<div class="input-group">
										<label for="message">message</label>
										<textarea name="message" id="message" placeholder="Wrire your message here ..."
											required></textarea>
									</div>
								</div>

								<div class="col-md-12">
									<div class="input-group submit-btn-wrap">
										<button class="theme-btn" name="submit" type="submit">
											send message
										</button>
									</div>
								</div>
							</div>
						</form>

					</div>
				</div>
			</section>

			<!-- WWWWW CONTACT VISITIOR DATA WWWWW -->


		</div>
	</div>




</main>


<!-- Header section ui_Footer  -->
<?php
$this->load->view('fronted/layouts/ui_Footer');
?>