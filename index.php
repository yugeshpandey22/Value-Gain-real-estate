<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Value Gain & Associates | Premium Real Estate</title>
    <meta name="description" content="Value Gain & Associates: Discover premium luxury real estate, villas, and modern apartments. Your trusted partner in Faridabad.">
    <link rel="stylesheet" href="css/style.css?v=4.9">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <main>
        <?php include 'pages/hero.php'; ?>
        
        <!-- About Section -->
        <section class="about" id="about">
            <div class="container">
                <div class="about-grid">
                    <div class="about-text fade-in-left">
                        <h4 class="subtitle">The Value Gain Legacy</h4>
                        <h2>A Heritage of Uncompromising Elegance</h2>
                        <p class="section-desc">For over two decades, Value Gain & Associates has been synonymous with architectural prestige. We don't simply build homes; we curate exclusive lifestyle experiences for the world's most discerning individuals. Our visionary approach bridges the gap between avant-garde design and timeless sophistication.</p>
                        <ul class="features">
                            <li><i class="fas fa-check-circle"></i> Coveted Global Addresses</li>
                            <li><i class="fas fa-check-circle"></i> Visionary Architectural Design</li>
                            <li><i class="fas fa-check-circle"></i> Bespoke White-Glove Service</li>
                        </ul>
                        <a href="pages/about.php" class="btn btn-outline">Discover Our Story</a>
                    </div>
                    <div class="about-stats fade-in-right">
                        <div class="stat-box glass">
                            <h3>150+</h3>
                            <p>Projects Completed</p>
                        </div>
                        <div class="stat-box glass">
                            <h3>5k+</h3>
                            <p>Happy Families</p>
                        </div>
                        <div class="stat-box glass">
                            <h3>20+</h3>
                            <p>Years Experience</p>
                        </div>
                        <div class="stat-box glass">
                            <h3>40+</h3>
                            <p>Awards Won</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Projects Section -->
        <section class="marquee-hero" id="projects">
            <div class="marquee-content fade-in-up">
                <div class="marquee-tagline">Our Portfolio</div>
                <h2 class="marquee-title">Featured Projects</h2>
                <p class="marquee-description">Explore our collection of meticulously crafted luxury living spaces.</p>
                <a href="pages/projects.php" class="marquee-btn">View All Projects</a>
            </div>

            <div class="marquee-container">
                <div class="marquee-track">
                    <!-- Group 1 -->
                    <div class="marquee-item" style="--rot: -2deg;"><img src="assets/images/project1.png" alt="Project 1"></div>
                    <div class="marquee-item" style="--rot: 5deg;"><img src="assets/images/project2.png" alt="Project 2"></div>
                    <div class="marquee-item" style="--rot: -2deg;"><img src="assets/images/project3.png" alt="Project 3"></div>
                    <div class="marquee-item" style="--rot: 5deg;"><img src="assets/images/hero.png" alt="Project 4"></div>
                    <!-- Group 2 -->
                    <div class="marquee-item" style="--rot: -2deg;"><img src="assets/images/project1.png" alt="Project 1"></div>
                    <div class="marquee-item" style="--rot: 5deg;"><img src="assets/images/project2.png" alt="Project 2"></div>
                    <div class="marquee-item" style="--rot: -2deg;"><img src="assets/images/project3.png" alt="Project 3"></div>
                    <div class="marquee-item" style="--rot: 5deg;"><img src="assets/images/hero.png" alt="Project 4"></div>
                </div>
            </div>
        </section>

        <!-- Companies Section -->
        <section class="companies-section" style="padding: 8rem 0; background-color: #121418; position: relative; overflow: hidden;">
            <div class="dot-pattern"></div>
            <div class="container">
                <div class="agency-frame-wrapper" style="text-align: center; padding: 5rem 2rem;">
                    <div class="corner-square top-left"></div>
                    <div class="corner-square top-right"></div>
                    <div class="corner-square bottom-left"></div>
                    <div class="corner-square bottom-right"></div>
                    
                    <h4 class="subtitle">Trusted By</h4>
                    <h2 style="font-size: clamp(2.5rem, 5vw, 4rem); margin-bottom: 3rem;">Companies</h2>
                    <div class="companies-flex" style="display: flex; flex-wrap: wrap; justify-content: center; gap: 4rem; opacity: 0.6; filter: grayscale(1);">
                         <div style="font-size: 1.8rem; font-weight: 800; letter-spacing: 2px;">OMAXE</div>
                         <div style="font-size: 1.8rem; font-weight: 800; letter-spacing: 2px;">DLF</div>
                         <div style="font-size: 1.8rem; font-weight: 800; letter-spacing: 2px;">GODREJ</div>
                         <div style="font-size: 1.8rem; font-weight: 800; letter-spacing: 2px;">EMAAR</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section class="contact-page" id="contact">
            <div class="bg-image-animated" style="background-image: url('assets/images/hero.png');"></div>
            <div class="overlay"></div>
            <div class="container">
                <div class="contact-card agency-frame-wrapper fade-in-up" style="border: 1px solid #ff4d4d; background: rgba(10, 10, 10, 0.7);">
                    <!-- Corner Squares -->
                    <div class="corner-square top-left"></div>
                    <div class="corner-square top-right"></div>
                    <div class="corner-square bottom-left"></div>
                    <div class="corner-square bottom-right"></div>

                    <div class="contact-card-info">
                        <h1 class="contact-card-title">Get in touch</h1>
                        <p class="contact-card-desc">If you have any questions regarding our Services or need help, please fill out the form here. We do our best to respond within 1 business day.</p>
                        
                        <div class="contact-info-grid">
                            <div class="contact-info-item">
                                <div class="icon-box"><i class="fas fa-user"></i></div>
                                <div class="info-text">
                                    <p class="label">Deepak Garg</p>
                                    <p class="value">+91 93152 32386</p>
                                </div>
                            </div>
                            <div class="contact-info-item">
                                <div class="icon-box"><i class="fas fa-user"></i></div>
                                <div class="info-text">
                                    <p class="label">Sunil Karhana</p>
                                    <p class="value">+91 98112 77779</p>
                                </div>
                            </div>
                            <div class="contact-info-item full-width">
                                <div class="icon-box"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="info-text">
                                    <p class="label">Address</p>
                                    <p class="value">Shop No. R-144, Omaxe World Street, Sector - 79, Faridabad</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="contact-card-form">
                        <form id="contactForm" class="modern-form">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" id="phone" required>
                            </div>
                            <div class="form-group">
                                <label>Interested In</label>
                                <select id="interest" required>
                                    <option value="buying">Buying</option>
                                    <option value="selling">Selling</option>
                                    <option value="renting">Renting</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea id="message" rows="2" required></textarea>
                            </div>
                            <button type="submit" class="btn-submit-light">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="script.js?v=1.2"></script>
</body>
</html>
