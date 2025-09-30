<!-- File: faq.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - QUEST Learning Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/faq.css">
</head>
<body>
    <?php include_once('layouts/header.php'); ?>

    <!-- FAQ Hero Section -->
    <section class="faq-hero-section">
        <div class="floating-elements">
            <div class="floating-element" style="width: 50px; height: 50px; top: 10%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-element" style="width: 30px; height: 30px; top: 20%; left: 80%; animation-delay: 2s;"></div>
            <div class="floating-element" style="width: 70px; height: 70px; top: 60%; left: 5%; animation-delay: 4s;"></div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <h1 class="faq-hero-title">Frequently Asked <span style="color: var(--primary-yellow)">Questions</span></h1>
                    <p class="faq-hero-subtitle">Find quick answers to common questions about QUEST learning platform. Can't find what you're looking for? Contact our support team.</p>
                    <div class="faq-search mt-4">
                        <div class="input-group">
                            <input type="text" class="form-control" id="faqSearch" placeholder="Search FAQs...">
                            <button class="btn btn-warning" type="button" id="searchButton">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <div class="quick-stats mt-5">
                        <div class="row">
                            <div class="col-4">
                                <div class="stat-item">
                                    <i class="fas fa-question-circle"></i>
                                    <div>
                                        <h4>50+</h4>
                                        <p>Questions</p>
                                    </div>
                                </div>
                            </div>
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
                                    <i class="fas fa-comments"></i>
                                    <div>
                                        <h4>98%</h4>
                                        <p>Resolved</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="faq-hero-animation">
                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                        <lottie-player 
                            src="https://assets1.lottiefiles.com/packages/lf20_aw5kkcwe.json" 
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

    <!-- FAQ Categories Section -->
    <section class="faq-categories-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Browse by Category</h2>
                    <p class="section-subtitle">Find answers organized by topic</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="0">
                    <div class="category-card" data-category="getting-started">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_kdxn4d2a.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Getting Started</h4>
                        <p>Setup and account questions</p>
                        <span class="question-count">12 Questions</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="category-card" data-category="account-billing">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_5tkztbqk.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Account & Billing</h4>
                        <p>Payment and subscription</p>
                        <span class="question-count">8 Questions</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="category-card" data-category="technical">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_ydo2agll.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Technical Support</h4>
                        <p>Platform and device issues</p>
                        <span class="question-count">15 Questions</span>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="category-card" data-category="learning">
                        <div class="category-icon">
                            <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                            <lottie-player 
                                src="https://assets1.lottiefiles.com/packages/lf20_kuhijvxr.json" 
                                background="transparent" 
                                speed="1" 
                                style="width: 80px; height: 80px;" 
                                loop 
                                autoplay>
                            </lottie-player>
                        </div>
                        <h4>Learning Features</h4>
                        <p>Using QUEST effectively</p>
                        <span class="question-count">10 Questions</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main FAQ Section -->
    <section class="main-faq-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5" data-aos="fade-up">
                    <h2 class="section-title">Common Questions</h2>
                    <p class="section-subtitle">Quick answers to our most frequently asked questions</p>
                </div>
            </div>

            <!-- Getting Started FAQ -->
            <div class="faq-category mb-5" data-aos="fade-up">
                <div class="category-header">
                    <h3><i class="fas fa-play-circle me-3"></i>Getting Started</h3>
                    <p>Questions about setting up and starting with QUEST</p>
                </div>
                <div class="accordion" id="gettingStartedAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#gs1">
                                How do I create a QUEST account?
                            </button>
                        </h2>
                        <div id="gs1" class="accordion-collapse collapse show" data-bs-parent="#gettingStartedAccordion">
                            <div class="accordion-body">
                                <p>Creating an account is simple! Click the "Sign Up" button in the top navigation, fill in your details, and choose your subscription plan. You can start with our 14-day free trial without any payment information required.</p>
                                <div class="tip-box">
                                    <strong>Tip:</strong> Use a valid email address as we'll send important updates and progress reports there.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gs2">
                                What devices are supported?
                            </button>
                        </h2>
                        <div id="gs2" class="accordion-collapse collapse" data-bs-parent="#gettingStartedAccordion">
                            <div class="accordion-body">
                                <p>QUEST works on all modern devices including:</p>
                                <ul>
                                    <li><strong>Computers:</strong> Windows, Mac, and Chromebooks with Chrome, Firefox, or Safari browsers</li>
                                    <li><strong>Tablets:</strong> iPad (iOS 12+), Android tablets (Android 8+)</li>
                                    <li><strong>Smartphones:</strong> iPhone (iOS 12+), Android phones (Android 8+)</li>
                                </ul>
                                <p>For the best experience, we recommend using a tablet or computer with a stable internet connection.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#gs3">
                                How do I set up my child's profile?
                            </button>
                        </h2>
                        <div id="gs3" class="accordion-collapse collapse" data-bs-parent="#gettingStartedAccordion">
                            <div class="accordion-body">
                                <p>After creating your parent account, you can add child profiles by:</p>
                                <ol>
                                    <li>Going to your Dashboard</li>
                                    <li>Clicking "Add Child Profile"</li>
                                    <li>Entering your child's name, grade level, and learning preferences</li>
                                    <li>Setting appropriate difficulty levels</li>
                                </ol>
                                <p>You can create multiple child profiles under one parent account, each with their own progress tracking.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Account & Billing FAQ -->
            <div class="faq-category mb-5" data-aos="fade-up" data-aos-delay="100">
                <div class="category-header">
                    <h3><i class="fas fa-credit-card me-3"></i>Account & Billing</h3>
                    <p>Questions about subscriptions, payments, and account management</p>
                </div>
                <div class="accordion" id="billingAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bill1">
                                What payment methods do you accept?
                            </button>
                        </h2>
                        <div id="bill1" class="accordion-collapse collapse show" data-bs-parent="#billingAccordion">
                            <div class="accordion-body">
                                <p>We accept all major payment methods:</p>
                                <div class="payment-methods">
                                    <span class="payment-method"><i class="fab fa-cc-visa"></i> Visa</span>
                                    <span class="payment-method"><i class="fab fa-cc-mastercard"></i> MasterCard</span>
                                    <span class="payment-method"><i class="fab fa-cc-amex"></i> American Express</span>
                                    <span class="payment-method"><i class="fab fa-cc-paypal"></i> PayPal</span>
                                </div>
                                <p class="mt-3">All payments are processed securely through encrypted channels.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bill2">
                                Can I cancel my subscription anytime?
                            </button>
                        </h2>
                        <div id="bill2" class="accordion-collapse collapse" data-bs-parent="#billingAccordion">
                            <div class="accordion-body">
                                <p>Yes, you can cancel your subscription at any time. Here's how:</p>
                                <ol>
                                    <li>Log into your parent account</li>
                                    <li>Go to "Account Settings"</li>
                                    <li>Click "Subscription"</li>
                                    <li>Select "Cancel Subscription"</li>
                                </ol>
                                <p>Your subscription will remain active until the end of your current billing period, and you'll continue to have access to all features during that time.</p>
                                <div class="tip-box">
                                    <strong>Note:</strong> We offer a 30-day money-back guarantee if you're not satisfied with our platform.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#bill3">
                                Do you offer family discounts?
                            </button>
                        </h2>
                        <div id="bill3" class="accordion-collapse collapse" data-bs-parent="#billingAccordion">
                            <div class="accordion-body">
                                <p>Yes! We offer special family pricing:</p>
                                <ul>
                                    <li><strong>First child:</strong> Regular price</li>
                                    <li><strong>Second child:</strong> 25% discount</li>
                                    <li><strong>Third+ child:</strong> 40% discount</li>
                                </ul>
                                <p>Family discounts are automatically applied when you add additional child profiles to your account. The discounts apply to all subscription plans.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Technical Support FAQ -->
            <div class="faq-category mb-5" data-aos="fade-up" data-aos-delay="200">
                <div class="category-header">
                    <h3><i class="fas fa-tools me-3"></i>Technical Support</h3>
                    <p>Technical issues and platform troubleshooting</p>
                </div>
                <div class="accordion" id="technicalAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tech1">
                                The platform is running slow. What can I do?
                            </button>
                        </h2>
                        <div id="tech1" class="accordion-collapse collapse show" data-bs-parent="#technicalAccordion">
                            <div class="accordion-body">
                                <p>If you're experiencing slow performance, try these steps:</p>
                                <ol>
                                    <li><strong>Check your internet connection:</strong> Ensure you have a stable connection with at least 5 Mbps download speed</li>
                                    <li><strong>Clear browser cache:</strong> Clear your browser's cache and cookies</li>
                                    <li><strong>Update browser:</strong> Make sure you're using the latest version of your browser</li>
                                    <li><strong>Try a different browser:</strong> Switch to Chrome, Firefox, or Safari</li>
                                    <li><strong>Close other tabs:</strong> Close unnecessary browser tabs and applications</li>
                                </ol>
                                <p>If issues persist, contact our support team with details about your device and browser.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tech2">
                                Can we use QUEST offline?
                            </button>
                        </h2>
                        <div id="tech2" class="accordion-collapse collapse" data-bs-parent="#technicalAccordion">
                            <div class="accordion-body">
                                <p>Currently, QUEST requires an internet connection for most features. However, we're working on offline capabilities for:</p>
                                <ul>
                                    <li>Practice mode exercises</li>
                                    <li>Downloadable worksheets</li>
                                    <li>Progress review</li>
                                </ul>
                                <p>These offline features will be available in our next update. Progress syncs automatically when you reconnect to the internet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#tech3">
                                How do I reset my password?
                            </button>
                        </h2>
                        <div id="tech3" class="accordion-collapse collapse" data-bs-parent="#technicalAccordion">
                            <div class="accordion-body">
                                <p>To reset your password:</p>
                                <ol>
                                    <li>Go to the login page</li>
                                    <li>Click "Forgot Password"</li>
                                    <li>Enter your email address</li>
                                    <li>Check your email for a password reset link</li>
                                    <li>Click the link and create a new password</li>
                                </ol>
                                <div class="tip-box">
                                    <strong>Security Tip:</strong> Use a strong password with at least 8 characters including numbers and symbols.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Learning Features FAQ -->
            <div class="faq-category mb-5" data-aos="fade-up" data-aos-delay="300">
                <div class="category-header">
                    <h3><i class="fas fa-graduation-cap me-3"></i>Learning Features</h3>
                    <p>Making the most of QUEST's educational features</p>
                </div>
                <div class="accordion" id="learningAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#learn1">
                                How does adaptive learning work?
                            </button>
                        </h2>
                        <div id="learn1" class="accordion-collapse collapse show" data-bs-parent="#learningAccordion">
                            <div class="accordion-body">
                                <p>Our adaptive learning technology works by:</p>
                                <ul>
                                    <li><strong>Initial Assessment:</strong> Starting with questions to gauge current skill level</li>
                                    <li><strong>Dynamic Adjustment:</strong> Automatically adjusting difficulty based on performance</li>
                                    <li><strong>Personalized Path:</strong> Creating custom learning paths for each student</li>
                                    <li><strong>Progress Tracking:</strong> Continuously monitoring improvement and adapting content</li>
                                </ul>
                                <p>This ensures your child is always challenged at the right level - not too easy, not too difficult.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#learn2">
                                What's the difference between Practice and Test modes?
                            </button>
                        </h2>
                        <div id="learn2" class="accordion-collapse collapse" data-bs-parent="#learningAccordion">
                            <div class="accordion-body">
                                <div class="mode-comparison">
                                    <div class="mode practice-mode">
                                        <h5>Practice Mode</h5>
                                        <ul>
                                            <li>Unlimited attempts</li>
                                            <li>Immediate feedback</li>
                                            <li>Detailed explanations</li>
                                            <li>No time limits</li>
                                            <li>Learn at your own pace</li>
                                        </ul>
                                    </div>
                                    <div class="mode test-mode">
                                        <h5>Test Mode</h5>
                                        <ul>
                                            <li>20-minute time limit</li>
                                            <li>Simulates exam conditions</li>
                                            <li>Results at the end</li>
                                            <li>Builds time management</li>
                                            <li>Progress tracking</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#learn3">
                                How often is new content added?
                            </button>
                        </h2>
                        <div id="learn3" class="accordion-collapse collapse" data-bs-parent="#learningAccordion">
                            <div class="accordion-body">
                                <p>We regularly update our content library:</p>
                                <ul>
                                    <li><strong>Weekly:</strong> New practice questions and exercises</li>
                                    <li><strong>Monthly:</strong> Additional test modules and challenges</li>
                                    <li><strong>Quarterly:</strong> Major content updates and new features</li>
                                    <li><strong>Annually:</strong> Curriculum alignment with educational standards</li>
                                </ul>
                                <p>All updates are automatically available to active subscribers at no additional cost.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Support CTA Section -->
    <section class="support-cta-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8" data-aos="fade-right">
                    <h2 class="mb-3">Still Need Help?</h2>
                    <p class="mb-4">Our support team is here to assist you with any questions or issues you might have.</p>
                    <div class="support-features">
                        <div class="support-feature">
                            <i class="fas fa-comments text-warning"></i>
                            <span>24/7 Chat Support</span>
                        </div>
                        <div class="support-feature">
                            <i class="fas fa-phone text-warning"></i>
                            <span>Phone Support: Mon-Fri 9am-6pm EST</span>
                        </div>
                        <div class="support-feature">
                            <i class="fas fa-envelope text-warning"></i>
                            <span>Email Response within 2 hours</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-center" data-aos="fade-left" data-aos-delay="200">
                    <div class="support-animation mb-4">
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
                    <a href="contact.php" class="btn btn-warning btn-lg me-3">Contact Support</a>
                </div>
            </div>
        </div>
    </section>

    <?php include_once('layouts/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="scripts/home.js"></script>
    <script src="scripts/faq.js"></script>
</body>
</html>