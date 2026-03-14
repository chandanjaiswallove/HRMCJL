<!-- Header section ui_Header  -->
<?php
$this->load->view('fronted/layouts/ui_Header');
?>




<main class="drake-main">




    <div id="smooth-wrapper">
        <div id="smooth-content">






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
                                <div class="col-md-6 scroll-animation" data-animation="fade_from_left">
                                    <div class="pricing-table">
                                        <div class="pricing-table-header">
                                            <div class="top d-flex justify-content-between align-items-start">
                                                <h4>basic</h4>
                                                <p class="text-right">
                                                    Have design ready to build?<br />
                                                    or small budget
                                                </p>
                                            </div>
                                            <h1>$49 <span>/ hours</span></h1>
                                        </div>
                                        <ul class="feature-lists">
                                            <li>Need your wireframe</li>
                                            <li>Design with Figma, Framer</li>
                                            <li>
                                                Implement with Webflow, React, WordPress, Laravel/PHP
                                            </li>
                                            <li>Remote/Online</li>
                                            <li>Work in business days, no weekend.</li>
                                            <li>Support 6 months</li>
                                        </ul>
                                        <a href="#" class="theme-btn">pick this package</a>
                                    </div>
                                </div>
                                <div class="col-md-6 scroll-animation" data-animation="fade_from_right">
                                    <div class="pricing-table">
                                        <div class="pricing-table-header">
                                            <div class="top d-flex justify-content-between align-items-start">
                                                <h4>premium</h4>
                                                <p class="text-right">
                                                    Not have any design?<br />
                                                    Leave its for me
                                                </p>
                                            </div>
                                            <h1>$99 <span>/ hours</span></h1>
                                        </div>
                                        <ul class="feature-lists">
                                            <li>Don't need wireframe or anything</li>
                                            <li>Design with Figma, Framer from scratch</li>
                                            <li>
                                                Implement with Webflow, React, WordPress, Laravel/PHP
                                            </li>
                                            <li>Remote/Online</li>
                                            <li>Work with both weekend</li>
                                            <li>Support 12 months</li>
                                            <li>Your project alway be priority</li>
                                            <li>Customer care gifts</li>
                                        </ul>
                                        <a href="#" class="theme-btn">pick this package</a>
                                    </div>
                                </div>
                            </div>
                            <p class="info scroll-animation" data-animation="fade_from_bottom">
                                Don't find any package match with your plan!<br />
                                Want to setup a new tailor-made package for only you?.
                                <a href="#">Contact Us</a>
                            </p>
                        </div>
                    </div>
                </div>
            </section>


        </div>
    </div>
<!-- 

        // Update testimonial
    public function update_Testimonials()
    {
        $id = $_GET['id'];
        $profileName = $_POST['profile_name'];
        $companyName = $_POST['company_name'];
        $clientProjectName = $_POST['client_project_name'];

        // $config['upload_path'] = '';
        // $config['allowed_types'] = 'jpg|jpeg|png|webp';
        // $config['max_size'] = 5120; // 5MB
        // $config['encrypt_name'] = TRUE;

        // $this->load->library('upload');
        
        // $this->upload->initialize($config);

        if(isset($_POST['updateTestimonial']))
        {
            $this->db->query("UPDATE testimonial_directory SET company_name = '$companyName'  WHERE id = '$id'");
            redirect(base_url('testimonials'));
        }
        
        
    }

    public function deleteLogo()
    {
        $id = $_GET['id'];
        $imageStatus = $_POST['profile_photo'];
        $this->db->query("UPDATE testimonial_directory SET profile_photo = '$imageStatus'  WHERE id = '$id'");
        redirect(base_url('testimonials'));

    } -->





</main>


<!-- Header section ui_Footer  -->
<?php
$this->load->view('fronted/layouts/ui_Footer');
?>