<!-- File: contact.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
<body>
    <?php include_once('layouts/header.php'); ?>

    <!-- Contact Hero Section -->
    <section class="contact-hero-section">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="contact-hero-title">Get in <span style="color: var(--primary-yellow)">Touch</span></h1>
                    <p class="contact-hero-subtitle">We're here to help! Reach out to us with any questions about QUEST learning platform or to schedule a demo.</p>
                    <div class="contact-stats mt-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-clock"></i>
                                    <div>
                                        <h4>24/7</h4>
                                        <p>Support</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-users"></i>
                                    <div>
                                        <h4>5K+</h4>
                                        <p>Students</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-star"></i>
                                    <div>
                                        <h4>98%</h4>
                                        <p>Satisfaction</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="contact-hero-animation">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d2a.json" 
                            background="transparent" 
                            speed="1" 
                            style="width: 100%; max-width: 400px; height: auto;" 
                            loop 
                            autoplay>
                        </lottie-player>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form & Info Section -->
    <section class="contact-main-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Contact Us</h2>
                    <p class="section-subtitle">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
                </div>
            </div>
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-8 mb-5" data-aos="fade-right">
                    <div class="contact-form-card">
                        <h3 class="mb-4">Send us a Message</h3>
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                                        <div class="invalid-feedback">Please enter your first name.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                                        <div class="invalid-feedback">Please enter your last name.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">Please enter a valid email address.</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-group">
                                    <label for="subject" class="form-label">Subject *</label>
                                    <select class="form-select" id="subject" name="subject" required>
                                        <option value="">Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="technical">Technical Support</option>
                                        <option value="billing">Billing Question</option>
                                        <option value="partnership">Partnership Opportunity</option>
                                        <option value="demo">Schedule a Demo</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a subject.</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-group">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                                    <div class="invalid-feedback">Please enter your message.</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Subscribe to our newsletter for updates and educational tips
                                    </label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-warning btn-lg w-100">
                                <span class="submit-text">Send Message</span>
                                <div class="spinner-border spinner-border-sm d-none" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                    <div class="contact-info-card">
                        <h3 class="mb-4">Get in Touch</h3>
                        
                        <!-- Contact Methods -->
                        <div class="contact-method mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Visit Our Office</h5>
                                <p>123 Education Street<br>Learn City, LC 12345</p>
                            </div>
                        </div>

                        <div class="contact-method mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Call Us</h5>
                                <p>+1 (555) 123-4567<br>Mon-Fri 9am-6pm EST</p>
                            </div>
                        </div>

                        <div class="contact-method mb-4">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-details">
                                <h5>Email Us</h5>
                                <p>info@questlearning.com<br>support@questlearning.com</p>
                            </div>
                        </div>

                        <!-- Support Animation -->
                        <div class="support-animation text-center mb-4">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 150px; height: 150px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>

                        <!-- Social Links -->
                        <div class="social-links-contact">
                            <h5 class="mb-3">Follow Us</h5>
                            <div class="d-flex gap-3">
                                <a href="#" class="social-link">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="social-link">
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="contact-faq-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Frequently Asked Questions</h2>
                    <p class="section-subtitle">Quick answers to common questions</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqAccordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="0">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    How do I get started with QUEST?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Getting started is easy! Simply sign up for a free trial, choose your subscription plan, and you'll have immediate access to all our learning materials. You can start with the practice mode to get familiar with the platform.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    What age groups is QUEST suitable for?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    QUEST is designed for students in grades 1-4, with content specifically tailored to each grade level. Our adaptive learning technology ensures that the difficulty level matches your child's current abilities.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Can I track my child's progress?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! Our platform includes comprehensive progress tracking with detailed analytics. You can monitor improvement over time, view performance reports, and get personalized recommendations for areas that need more practice.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                    What payment methods do you accept?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We accept all major credit cards (Visa, MasterCard, American Express), PayPal, and bank transfers for annual subscriptions. All payments are processed securely through encrypted channels.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                    Is there a free trial available?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Absolutely! We offer a 14-day free trial that gives you full access to all features. No credit card required to start. You can upgrade to a paid plan at any time during or after the trial period.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="contact-cta-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <h2 class="mb-3">Ready to Start Your Learning Journey?</h2>
                    <p class="mb-4">Join thousands of parents who are already using QUEST to enhance their children's education and critical thinking skills.</p>
                </div>
                <div class="col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <a href="signup.php" class="btn btn-warning btn-lg me-3">Start Free Trial</a>
                    <a href="pricing.php" class="btn btn-outline-light btn-lg">View Plans</a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/contact.js"></script>
</body>
</html>