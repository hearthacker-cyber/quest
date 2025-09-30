<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - QUEST Interactive Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

<?php include_once('layouts/header.php'); ?>

<!-- Subscription Hero Section -->
<section class="subscription-hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="hero-title">Choose Your Learning Plan</h1>
                <p class="hero-subtitle">Select the perfect subscription to unlock your child's potential with our comprehensive learning platform.</p>
                <div class="hero-stats mt-4">
                    <div class="stat-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Cancel anytime</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-check-circle"></i>
                        <span>7-day money back guarantee</span>
                    </div>
                    <div class="stat-item">
                        <i class="fas fa-check-circle"></i>
                        <span>Access all grades and sections</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-image">
                    <img src="https://images.unsplash.com/photo-1551836026-d5c88ac5c73d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" class="img-fluid rounded shadow-lg" alt="Learning Subscription">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Pricing Comparison Section -->
<section class="pricing-comparison py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Compare Plans & Features</h2>
                <p class="section-subtitle">Find the perfect plan for your child's learning journey</p>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>1 Month</h3>
                        <p>Perfect for trying out</p>
                    </div>
                    <div class="pricing-body text-center">
                        <div class="price">$30</div>
                        <p class="price-period">per month</p>
                        <a href="signup.php?plan=1month" class="btn btn-primary w-100 mb-4">Get Started</a>
                        <ul class="list-unstyled my-4">
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Full access to all sections</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Practice & Test modes</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Progress tracking</li>
                            <li class="mb-3"><i class="fas fa-times text-secondary me-2"></i> Final tests</li>
                            <li class="mb-3"><i class="fas fa-times text-secondary me-2"></i> Priority support</li>
                            <li class="mb-3"><i class="fas fa-times text-secondary me-2"></i> Downloadable reports</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="pricing-card highlighted">
                    <div class="pricing-header">
                        <h3>3 Months</h3>
                        <p>Most popular choice</p>
                    </div>
                    <div class="pricing-body text-center">
                        <div class="price">$25</div>
                        <p class="price-period">per month</p>
                        <p class="savings">Save $15 compared to monthly</p>
                        <a href="signup.php?plan=3months" class="btn btn-warning w-100 mb-4">Get Started</a>
                        <ul class="list-unstyled my-4">
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Full access to all sections</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Practice & Test modes</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Progress tracking</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> 2 Final tests included</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Priority support</li>
                            <li class="mb-3"><i class="fas fa-times text-secondary me-2"></i> Downloadable reports</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3>6 Months</h3>
                        <p>Best value</p>
                    </div>
                    <div class="pricing-body text-center">
                        <div class="price">$20</div>
                        <p class="price-period">per month</p>
                        <p class="savings">Save $60 compared to monthly</p>
                        <a href="signup.php?plan=6months" class="btn btn-primary w-100 mb-4">Get Started</a>
                        <ul class="list-unstyled my-4">
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Full access to all sections</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Practice & Test modes</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Progress tracking</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> 4 Final tests included</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Priority support</li>
                            <li class="mb-3"><i class="fas fa-check text-success me-2"></i> Downloadable reports</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Included Section -->
<section class="features-included py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">What's Included in Every Plan</h2>
                <p class="section-subtitle">All subscriptions include these powerful features</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-included">
                    <div class="feature-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h4>9 Learning Sections</h4>
                    <p>Access to all sections including Picture Analogy, Sentence Completion, and more with thousands of questions.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-included">
                    <div class="feature-icon">
                        <i class="fas fa-brain"></i>
                    </div>
                    <h4>Adaptive Difficulty</h4>
                    <p>Questions automatically adjust to your child's skill level with easy, medium, and hard difficulty settings.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-included">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h4>Progress Analytics</h4>
                    <p>Track improvement with detailed performance reports and identify areas for growth.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                <div class="feature-included">
                    <div class="feature-icon">
                        <i class="fas fa-stopwatch"></i>
                    </div>
                    <h4>Practice & Test Modes</h4>
                    <p>Learn with unlimited practice or simulate real exams with timed test mode.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-included">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h4>Mobile Friendly</h4>
                    <p>Access QUEST on any device - computer, tablet, or smartphone for learning anywhere.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-included">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4>Grade Specific Content</h4>
                    <p>Content tailored to specific grade levels with age-appropriate challenges and learning objectives.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Get answers to common questions about our subscriptions</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="0">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                Can I change or cancel my subscription anytime?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes! You can change or cancel your subscription at any time. If you cancel, you'll continue to have access until the end of your billing period.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Do you offer a free trial?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer a 7-day money-back guarantee. If you're not satisfied with QUEST within the first week, we'll provide a full refund.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Can I use QUEST on multiple devices?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Absolutely! Your subscription allows access from any device with an internet connection. You can switch between computer, tablet, and smartphone seamlessly.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour">
                                How are the final tests different from regular tests?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Final tests are comprehensive assessments that cover all sections and provide detailed performance analytics. They're designed to simulate real exam conditions and give you a complete picture of your child's progress.
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
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 cta-content" data-aos="fade-right">
                <h2 class="mb-3">Ready to Start Your Child's Learning Journey?</h2>
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
<script src="scripts/subscription.js"></script>