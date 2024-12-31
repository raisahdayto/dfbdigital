<?php
include("connect/config.php");
include("header.php");
include("navbar.php");
include("successmodal.php")
?>

<body>
    <div class="main-content">
        <!-- Home -->
        <section id="home" class="home-section">
            <div class="hero-section">
                <table class="hero-table">
                    <tr>
                        <td class="hero-title-column">
                            <div class="hero-title">
                                <span id="line1Hero" class="typing"></span><br>
                                <span id="line2Hero" class="typing" style="visibility: hidden;"></span><br>
                                <span id="line3Hero" class="typing" style="visibility: hidden;"></span>
                            </div>
                        </td>
                        <td class="hero-content-column">
                            <div class="hero-paragraph-container">
                                <p class="hero-paragraph">
                                    <span>
                                        <b>Stop Wasting Money on Digital Strategies That Don't Work</b>
                                    </span>
                                </p>
                                <p class="hero-paragraph">
                                    <span>
                                        <span>&nbsp;</span>
                                    </span>
                                </p>
                                <p class="hero-subtitle">
                                    <span>
                                        Get expert guidance, drive revenue, and reach new customers online... and watch
                                        your
                                        business GROW... just click below:
                                    </span>
                                </p>
                                <a type="button" class="hero-button" data-bs-toggle="modal"
                                    data-bs-target="#auditModal">
                                    FREE DIGITAL AUDIT
                                </a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </section>

        <!-- Audit Modal -->
        <div class="modal fade" id="auditModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-primary">Get a FREE Digital Audit</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="detailsForm">
                            <input type="hidden" name="formType" value="audit">

                            <div class="mb-3">
                                <label for="firstName" class="form-text">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Ex. Juan" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-text">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Ex. Dela Cruz" required>
                            </div>
                            <div class="mb-3">
                                <label for="companyName" class="form-text">Company Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="companyName" name="companyName" placeholder="Ex. ABC Company" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailAddress" class="form-text">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Ex. juandelacruz@gmail.com" required>
                                <small id="emailError" class="text-danger" style="display: none;">Invalid email address.</small>
                            </div>
                            <div class="mb-3">
                                <label for="mobileNumber" class="form-text">Mobile Number (optional)</label>
                                <input type="tel" class="form-control" id="mobileNumber" name="mobileNumber" placeholder="Ex. +639258559265">
                                <small id="mobileError" class="text-danger" style="display: none;">Invalid mobile number. Must start with +63.</small>
                            </div>
                            <div id="formError" class="text-danger mt-3" style="display: none;">Fill out all required fields.</div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-button" id="submitAudit">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Modal -->
        <div class="modal fade" id="contactModal">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-primary">Get in Touch with DFB Digital</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="contactForm">
                            <input type="hidden" name="formType" value="contact">

                            <div class="mb-3">
                                <label for="fullName" class="form-text">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Ex. Juan Dela Cruz" required>
                            </div>
                            <div class="mb-3">
                                <label for="c-emailAddress" class="form-text">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="c-emailAddress" name="c-emailAddress" placeholder="Ex. juandelacruz@gmail.com" required>
                                <small id="contactEmailError" class="text-danger" style="display: none;">Invalid email address.</small>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-text">Message <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Type your message here." required></textarea>
                            </div>
                            <div id="contactFormError" class="text-danger mt-3" style="display: none;">Fill out all required fields.</div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="submit-button" id="submitContact">Submit</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- About Us -->
        <section id="aboutus" class="container">
            <div class="container">
                <div class="section-title">
                    <span>About DFB Digital</span>
                </div>
                <div>
                    <p class="paragraphs">
                        At <b>DFB Digital,</b> we're not just about websites and social media—we're about your
                        business. We take
                        the time to understand your <i>unique challenges, goals, </i> and <i>target audience</i>. Then,
                        we
                        craft customized
                        digital strategies that deliver measurable results. Whether you're a small startup or a large
                        enterprise, we'll partner with you to unlock your digital potential and achieve lasting growth.
                        Led by our Chief Innovation Officer (and self-proclaimed <b>"Daddy FunBuckets"</b>), we're a
                        team of
                        digital dynamos who believe in making the online world a more engaging and exciting place. We'll
                        help you connect with your audience, tell your story, and achieve your business goals—all while
                        keeping it fun and funky.
                    </p>
                </div>
                <div class="about-section">
                    <table class="aboutus-table">
                        <tr>
                            <td class="aboutus-title-column">
                                <div class="aboutus-image-container">
                                    <img src="img/tlc.png" alt="Descriptive Alt Text">
                                </div>
                            </td>
                            <td class="aboutus-content-column">
                                <p class="aboutus-title">
                                    <span><b>TLC Solutions PH</b></span>
                                </p>
                                <p class="aboutus-paragraph">
                                    <span>
                                        DFB Digital collaborated with TLC Solutions PH to enhance their advertising strategies and strengthen their overall digital engagement with consumers.
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <table class="aboutus-table" style="direction: rtl;">
                        <tr>
                            <td class="aboutus-title-column" style="direction: ltr;">
                                <div class="aboutus-image-container">
                                    <img src="img/aldeon.png" alt="Descriptive Alt Text">
                                </div>
                            </td>
                            <td class="aboutus-content-column" style="direction: ltr;">
                                <p class="aboutus-title">
                                    <span><b>Aldeon Luxury Suites</b></span>
                                </p>
                                <p class="aboutus-paragraph">
                                    <span>
                                        Our Team designed a website for Aldeon Luxury Suites to showcase its elegant rooms and provide clients with easy access to information and bookings.
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <table class="aboutus-table">
                        <tr>
                            <td class="aboutus-title-column">
                                <div class="aboutus-image-container">
                                    <img src="img/kb.png" alt="Descriptive Alt Text">
                                </div>
                            </td>
                            <td class="aboutus-content-column">
                                <p class="aboutus-title">
                                    <span><b>Kinder Bueno</b></span>
                                </p>
                                <p class="aboutus-paragraph">
                                    <span>
                                        DFB Digital crafted engaging social media marketing materials for Kinder Bueno, capturing the brand's delightful essence and connecting with its audience through visually appealing and creative content.
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </table>

                    <table class="aboutus-table" style="direction: rtl;">
                        <tr>
                            <td class="aboutus-title-column" style="direction: ltr;">
                                <div class="aboutus-image-container">
                                    <img src="img/casa.png" alt="Descriptive Alt Text">
                                </div>
                            </td>
                            <td class="aboutus-content-column" style="direction: ltr;">
                                <p class="aboutus-title">
                                    <span><b>Casa Verde Town Homes</b></span>
                                </p>
                                <p class="aboutus-paragraph">
                                    <span>
                                        We developed a website for Casa Verder Townhomes to highlight community events and streamline essential operations, including Move-In/Move-Out processing, Repairs and Renovation requests, and Clubhouse rental bookings, ensuring convenience for homeowners and residents.
                                    </span>
                                </p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <!-- Services -->
        <section id="services" class="services-section">
            <div class="blue-section-title">
                <span>Services</span>
            </div>
            <div class="container">
                <p class="blue-paragraphs">
                    We bring your online vision to life with beautifully crafted websites, compelling
                    content, and customized business solutions. Let us help you navigate the digital landscape with
                    services
                    designed to elevate your brand and engage your audience.
                </p>
            </div>
            <div class="container">
                <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
                    <!-- Indicators -->
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="img/s1.png" alt="Los Angeles" class="d-block w-100 carousel-image">
                            <div class="carousel-caption">
                                <h3><b>DFB InstaSite (One-page Websites)</b></h3>
                                <p>
                                    <b>IDEAL FOR:</b> New Businesses, Startups, and Local Service Providers |
                                    Professionals ex. Doctors, Lawyers, Dentists, Engineers |
                                    Artists and Creatives |
                                    Freelancers and Solopreneurs |
                                    Small Events |
                                    And other
                                </p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="img/s2.png" alt="Chicago" class="d-block w-100 carousel-image">
                            <div class="carousel-caption">
                                <h3><b>DFB LaunchPad (Multi-page Websites)</b></h3>
                                <p>
                                    <b>IDEAL FOR:</b> Small to Medium Business Enterprises |
                                    Retail Businesses (E-Commerce) |
                                    Medium-Sized Events |
                                    Content-Driven Brands |
                                    Media and News Organizations
                                </p>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <img src="img/s3.png" alt="New York" class="d-block w-100 carousel-image">
                            <div class="carousel-caption">
                                <h3><b>DFB Event Lab (Event Websites)</b></h3>
                                <p>
                                    <b>IDEAL FOR:</b> Concerts |
                                    Product Launches |
                                    Retail |
                                    Event Organizers |
                                    Weddings, Debuts |
                                    Performance Venues |
                                    Educational Institutions |
                                    Sports Teams & Leagues |
                                    Individual Creators (with Large Events)
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </section>
        <?php include("footer.php"); ?>
    </div>
    <script src="js/navigation.js"></script>
    <script src="js/submit.js"></script>
    <script src="js/typinganimation.js"></script>
    <script src="js/imageanimation.js"></script>
</body>

</html>