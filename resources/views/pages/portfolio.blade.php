<style>
    /* Portfolio Section Styles */
    .portfolio-section {
        padding: 60px 0;
        background: #f8f9fa; /* Light background */
    }

    .portfolio-content {
        border: 2px solid #ddd;
        padding: 15px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background: #fff;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 450px; /* Set fixed height for all cards */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    .portfolio-content:hover {
        transform: translateY(-8px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .portfolio-content img {
        width: 100%;
        height: 200px; /* Fixed height for images */
        object-fit: cover;
        border-radius: 10px;
        transition: transform 0.3s ease;
    }

    .portfolio-content img:hover {
        transform: scale(1.05);
    }

    .portfolio-info {
        text-align: center;
        padding-top: 10px;
    }

    .portfolio-info h4 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 8px;
    }

    .portfolio-info p {
        font-size: 14px;
        color: #666;
        margin-bottom: 15px;
        min-height: 50px; /* Ensure consistent height for descriptions */
    }

    .portfolio-info a {
        display: inline-block;
        margin: 0 5px;
        font-size: 18px;
        color: #333;
        transition: color 0.3s ease, transform 0.3s ease;
    }

    .portfolio-info a:hover {
        color: #007bff;
        transform: scale(1.2);
    }

    /* Responsive Design */
    @media (max-width: 767px) {
        .portfolio-content {
            height: auto;
        }

        .portfolio-content img {
            height: 150px;
        }

        .portfolio-info p {
            min-height: auto;
        }
    }
</style>

<section id="portfolio" class="portfolio-section">

    <div class="container section-title" data-aos="fade-up">
        <div class="text-start mb-4">
            <h2>Portfolio</h2>
            <p>Explore some of my highlighted projects that showcase my skills and creativity:</p>
        </div>



        <!-- Portfolio Items -->
        <div class="row gy-4" data-aos="fade-up" data-aos-delay="200">

            <!-- Portfolio Item 1 -->
            <div class="col-lg-3 col-md-6 portfolio-item">
                <div class="portfolio-content">
                    <img src="assets/img/portfolio/bnu.png" class="img-fluid" alt="BNU ITRC">
                    <div class="portfolio-info">
                        <h4>BNU ITRC</h4>
                        <p>ITRC provides top-notch IT services for students and faculty to ensure smooth campus operations.</p>
                        <a href="assets/img/portfolio/bnu.png" title="View Image" class="glightbox preview-link">
                            <i class="bi bi-zoom-in"></i>
                        </a>
                        <a href="https://itrc.bnu.edu.pk/" target="_blank" title="Visit BNU ITRC" class="details-link">
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 2 -->
            <div class="col-lg-3 col-md-6 portfolio-item">
                <div class="portfolio-content">
                    <img src="assets/img/portfolio/advance.jpg" class="img-fluid" alt="Advance Construction">
                    <div class="portfolio-info">
                        <h4>Advance Construction</h4>
                        <p>Revolutionizing construction with innovative, sustainable, and cutting-edge practices globally.</p>
                        <a href="assets/img/portfolio/advance.jpg" title="View Image" class="glightbox preview-link">
                            <i class="bi bi-zoom-in"></i>
                        </a>
                        <a href="https://www.acscotland.com/" target="_blank" title="Visit Advance Construction" class="details-link">
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 3 -->
            <div class="col-lg-3 col-md-6 portfolio-item">
                <div class="portfolio-content">
                    <img src="assets/img/portfolio/jm-logo-2.png" class="img-fluid" alt="JM Publishers">
                    <div class="portfolio-info">
                        <h4>JM Publishers</h4>
                        <p>Innovative educational publishing to create a brighter future for students nationwide.</p>
                        <a href="assets/img/portfolio/jm-logo-2.png" title="View Image" class="glightbox preview-link">
                            <i class="bi bi-zoom-in"></i>
                        </a>
                        <a href="https://www.jmpublishers.pk/" target="_blank" title="Visit JM Publishers" class="details-link">
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 4 -->
            <div class="col-lg-3 col-md-6 portfolio-item">
                <div class="portfolio-content">
                    <img src="assets/img/portfolio/cost.jpg" class="img-fluid" alt="Costumbrella">
                    <div class="portfolio-info">
                        <h4>Costumbrella</h4>
                        <p>Budgeting tools designed for smarter financial management for individuals and businesses.</p>
                        <a href="assets/img/portfolio/cost.jpg" title="View Image" class="glightbox preview-link">
                            <i class="bi bi-zoom-in"></i>
                        </a>
                        <a href="https://costumbrella.com/" target="_blank" title="Visit Costumbrella" class="details-link">
                            <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Portfolio Item 5 -->
<div class="col-lg-3 col-md-6 portfolio-item">
    <div class="portfolio-content">
        <img src="assets/img/portfolio/roofpal.jpg" class="img-fluid" alt="Roofpal">
        <div class="portfolio-info">
            <h4>Roofpal</h4>
            <p>Innovative roofing solutions offering durable designs and advanced technology for long-lasting performance.</p>
            <a href="assets/img/portfolio/roofpal.jpg" title="View Image" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
            </a>
            <a href="https://roofpal.uk/" target="_blank" title="Visit Roofpal" class="details-link">
                <i class="bi bi-link-45deg"></i>
            </a>
        </div>
    </div>
</div>

<!-- Portfolio Item 6 -->
<div class="col-lg-3 col-md-6 portfolio-item">
    <div class="portfolio-content">
        <img src="assets/img/portfolio/progressive.jpg" class="img-fluid" alt="Progressive Estate Solutions">
        <div class="portfolio-info">
            <h4>Progressive Estate Solutions</h4>
            <p>Effortless estate management tools offering reliable property solutions for owners and tenants alike.</p>
            <a href="assets/img/portfolio/progressive.jpg" title="View Image" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
            </a>
            <a href="https://progressiveestatesolutions.com/" target="_blank" title="Visit Progressive Estate Solutions" class="details-link">
                <i class="bi bi-link-45deg"></i>
            </a>
        </div>
    </div>
</div>

<!-- Portfolio Item 7 -->
<div class="col-lg-3 col-md-6 portfolio-item">
    <div class="portfolio-content">
        <img src="assets/img/portfolio/pak.jpg" class="img-fluid" alt="Pakhoarding">
        <div class="portfolio-info">
            <h4>Pakhoarding</h4>
            <p>Creative advertising solutions designed to maximize visibility and connect businesses with target audiences.</p>
            <a href="assets/img/portfolio/pak.jpg" title="View Image" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
            </a>
            <a href="https://pakhoardings.com/" target="_blank" title="Visit Pakhoarding" class="details-link">
                <i class="bi bi-link-45deg"></i>
            </a>
        </div>
    </div>
</div>

<!-- Portfolio Item 8 -->
<div class="col-lg-3 col-md-6 portfolio-item">
    <div class="portfolio-content">
        <img src="assets/img/portfolio/kfc.png" class="img-fluid" alt="KFC Clone">
        <div class="portfolio-info">
            <h4>KFC Clone</h4>
            <p>A React-based clone showcasing modern design and fast, responsive user experience for food websites.</p>
            <a href="assets/img/portfolio/kfc.png" title="View Image" class="glightbox preview-link">
                <i class="bi bi-zoom-in"></i>
            </a>
            <a href="https://kfc-by-hamid.vercel.app/" target="_blank" title="Visit KFC Clone" class="details-link">
                <i class="bi bi-link-45deg"></i>
            </a>
        </div>
    </div>
</div>

        </div>
    </div>
</section>
