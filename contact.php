<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - QUEST Interactive Learning Platform</title>
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
            <!-- Floating elements will be added by JavaScript -->
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 contact-hero-content" data-aos="fade-right">
                    <h1 class="hero-title">Get in <span style="color: var(--primary-yellow)">Touch</span></h1>
                    <p class="hero-subtitle">Have questions about QUEST? We're here to help! Reach out to our team for support, pricing inquiries, or to learn how our platform can benefit your child's learning journey.</p>
                    <div class="contact-info mt-4">
                        <div class="contact-item" data-aos="fade-up" data-aos-delay="100">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h5>Email Us</h5>
                                <p>info@questlearning.com</p>
                            </div>
                        </div>
                        <div class="contact-item" data-aos="fade-up" data-aos-delay="200">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h5>Call Us</h5>
                                <p>+1 (555) 123-4567</p>
                            </div>
                        </div>
                        <div class="contact-item" data-aos="fade-up" data-aos-delay="300">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h5>Visit Us</h5>
                                <p>123 Education Street, Learn City, LC 12345</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="contact-hero-image">
                        <!-- Simple image instead of Lottie for now -->
                        <img src="https://images.unsplash.com/photo-1551836026-d5c88ac5c73d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" 
                             class="img-fluid rounded shadow-lg" 
                             alt="Contact Us" 
                             style="max-height: 400px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="contact-form-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Send Us a Message</h2>
                    <p class="section-subtitle">We'll get back to you within 24 hours</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-form-card">
                        <form id="contactForm" class="contact-form">
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="firstName" class="form-label">First Name *</label>
                                        <input type="text" class="form-control" id="firstName" name="firstName" required>
                                        <div class="invalid-feedback">Please enter your first name</div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="lastName" class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" id="lastName" name="lastName" required>
                                        <div class="invalid-feedback">Please enter your last name</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                        <div class="invalid-feedback">Please enter a valid email address</div>
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
                                    <select class="form-control" id="subject" name="subject" required>
                                        <option value="">Select a subject</option>
                                        <option value="general">General Inquiry</option>
                                        <option value="pricing">Pricing Information</option>
                                        <option value="technical">Technical Support</option>
                                        <option value="billing">Billing Question</option>
                                        <option value="feedback">Feedback</option>
                                        <option value="other">Other</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a subject</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-group">
                                    <label for="message" class="form-label">Message *</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Tell us how we can help you..."></textarea>
                                    <div class="invalid-feedback">Please enter your message</div>
                                </div>
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="newsletter" name="newsletter">
                                    <label class="form-check-label" for="newsletter">
                                        Send me updates about new features and educational resources
                                    </label>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning btn-lg">
                                    <span class="submit-text">Send Message</span>
                                    <div class="spinner-border spinner-border-sm d-none" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
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
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="0">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    What age groups is QUEST suitable for?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    QUEST is designed for elementary and middle school students, typically covering grades 1 through 4+. Our content is tailored to specific age groups with appropriate difficulty levels.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Can I try QUEST before subscribing?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Yes! We offer a free trial that gives you full access to all features for a limited time. You can explore our practice mode, test different grade levels, and see how QUEST benefits your child's learning.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    How does the adaptive learning work?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Our adaptive learning system adjusts question difficulty based on student performance. If a student answers correctly, the system presents slightly more challenging questions. If they struggle, it provides easier questions to build confidence and understanding.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="floating-shapes">
            <div class="shape" style="width: 100px; height: 100px; top: 10%; left: 5%; background: var(--primary-yellow); border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; animation-delay: 0s;"></div>
            <div class="shape" style="width: 150px; height: 150px; top: 20%; left: 80%; background: white; border-radius: 50%; animation-delay: 5s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 cta-content" data-aos="fade-right">
                    <h2 class="mb-3">Ready to start your child's learning adventure?</h2>
                    <p class="mb-4">Join thousands of parents who are already using QUEST to enhance their children's education and critical thinking skills.</p>
                </div>
                <div class="col-lg-4 text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <a href="signup.php" class="btn btn-warning btn-lg">Start Free Trial</a>
                </div>
            </div>
        </div>
    </section>

<?php include_once('layouts/footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="scripts/contact.js"></script>


</body>
</html>