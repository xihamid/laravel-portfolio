<style>
    /* About Section Styles */
    .about {
      background: #f8f9fa;
      padding: 60px 0;
      overflow: hidden;
    }

    .about img {
      border-radius: 15px;
      transition: transform 0.5s ease, box-shadow 0.5s ease;
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .about img:hover {
      transform: scale(1.05);
      box-shadow: 0 12px 25px rgba(0, 0, 0, 0.2);
    }

    .about h2 {
      font-size: 28px;
      font-weight: bold;
      color: #333;
      position: relative;
      animation: fadeInTitle 1s ease;
    }

    .about .fst-italic {
      font-style: italic;
      font-size: 16px;
      color: #555;
      border-left: 4px solid #149ddd;
      padding-left: 15px;
      animation: slideInLeft 1.5s ease;
    }

    .about ul {
      padding: 0;
      list-style: none;
      animation: fadeInUp 1.5s ease;
    }

    .about ul li {
      margin-bottom: 10px;
      position: relative;
      padding-left: 25px;
    }

    .about ul li i {
      position: absolute;
      top: 0;
      left: 0;
      font-size: 20px;
      color: #149ddd;
    }

    .about p {
      font-size: 15px;
      color: #666;
      line-height: 1.6;
      animation: fadeInUp 2s ease;
    }

    /* Keyframe Animations */
    @keyframes fadeInTitle {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-50px);
      }
      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* AOS Animation */
    .about .content {
      background: #fff;
      padding: 20px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      animation: fadeInUp 2s ease;
    }

    .about .section-title h2 {
      position: relative;
      color: #555;
      display: inline-block;
    }

    .about .section-title h2:after {
      content: "";
      display: block;
      width: 60px;
      height: 3px;
      background: #555;
      margin: 10px auto 0;
    }

    .about .section-title p {
      color: #666;
      font-size: 15px;
      animation: slideInLeft 1s ease;
    }
  </style>

  <section id="about" class="about section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <h2>About</h2>
      <p>
        I am a Software Engineer with extensive experience in developing scalable web solutions. I specialize in Laravel, PHP, and modern web technologies to deliver impactful results.
      </p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4 justify-content-center">
        <div class="col-lg-4">
          <img src="assets/img/my-profile-img.jpg" class="img-fluid" alt="">
        </div>

        <div class="col-lg-8 content">
          <h2>Software Engineer</h2>
          <p class="fst-italic py-3">
            Passionate about developing efficient and user-friendly web solutions for businesses.
          </p>
          <div class="row">
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>xihamid@gmail.com</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>+92 300 2519048</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Lahore, Pakistan</span></li>
              </ul>
            </div>
            <div class="col-lg-6">
              <ul>
                <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>BS Computer Science</span></li>
                <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span></li>
              </ul>
            </div>
          </div>
          <p class="py-3">
            I have successfully developed solutions such as Financial Modules, Application Tracking System, and Automated Reporting Tools, optimizing workflows and enhancing user experience for 2,000+ users.
          </p>
        </div>
      </div>
    </div>

  </section>
