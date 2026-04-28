<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Value Gain & Associates</title>
    <meta name="description" content="Get in touch with Value Gain & Associates for premium luxury real estate and legal associations in Faridabad.">
    <link rel="stylesheet" href="../css/style.css?v=4.9">
    <link rel="stylesheet" href="../css/contact.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>

    <!-- Page Header -->
    <header class="page-header">
        <div class="bg-image-animated" style="background-image: url('../assets/images/project2.png');"></div>
        <div class="overlay"></div>
        <h1 class="reveal-up">Contact Us</h1>
    </header>

    <!-- Agency Style Contact Section -->
    <section class="agency-contact">
        <div class="watermark-text">VALUE</div>
        <div class="dot-pattern"></div>
        <div class="container">
            <div class="agency-frame-wrapper">
                <div class="corner-square top-left"></div>
                <div class="corner-square top-right"></div>
                <div class="corner-square bottom-left"></div>
                <div class="corner-square bottom-right"></div>
                
                <div class="agency-grid">
                    <div class="contact-info-agency fade-in-left">
                        <span class="sub-heading">Get in touch</span>
                        <h2 class="main-heading">Let's start your <span>luxury journey</span> today.</h2>
                        
                        <div class="contact-methods">
                            <div class="method-item">
                                <label>Email Us</label>
                                <p>info@valuegainassociates.com</p>
                            </div>
                            <div class="method-item">
                                <label>Call Us</label>
                                <p>+91 93152 32386</p>
                            </div>
                            <div class="method-item">
                                <label>Office Address</label>
                                <p>Shop No. R-144, Omaxe World Street,<br>Sector - 79, Faridabad</p>
                            </div>
                        </div>

                        <div class="social-minimal">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <div class="contact-form-minimal fade-in-right">
                        <form id="contactForm" class="minimal-form">
                            <div class="form-row">
                                <div class="form-group">
                                    <input type="text" placeholder="Your Name" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="tel" placeholder="Phone Number" required>
                            </div>
                            <div class="form-group">
                                <select required>
                                    <option value="" disabled selected>Interested In</option>
                                    <option value="buying">Buying Luxury Villa</option>
                                    <option value="selling">Selling Premium Property</option>
                                    <option value="legal">Legal Association</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea rows="5" placeholder="Tell us about your requirements..." required></textarea>
                            </div>
                            <button type="submit" class="agency-btn">
                                Send Message <i class="fas fa-arrow-right"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-premium-section reveal-up" style="padding-top: 0;">
        <div class="container">
            <div class="map-design-wrapper">
                <div class="quote-dot-pattern"></div>
                <div class="corner-square top-left"></div>
                <div class="corner-square top-right"></div>
                <div class="corner-square bottom-left"></div>
                <div class="corner-square bottom-right"></div>
                
                <div class="map-frame-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3511.4582823678385!2d77.348123!3d28.345678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cd9f36a8d8e5f%3A0x6b1d1d8e5f6b1d1d!2sOmaxe%20World%20Street!5e0!3m2!1sen!2sin!4v1714210000000!5m2!1sen!2sin" 
                        width="100%" 
                        height="450" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <?php include '../includes/footer.php'; ?>

    <script src="../script.js?v=1.2"></script>
</body>
</html>
