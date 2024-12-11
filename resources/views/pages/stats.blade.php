<style>
    /* Stats Section Styling */
    .stats {
      background: #f8f9fa;
      padding: 60px 0;
    }

    .stats .stats-item {
      text-align: center;
      background: #fff;
      padding: 30px 20px;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stats .stats-item:hover {
      transform: translateY(-10px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .stats .stats-item i {
      font-size: 40px;
      color: #149ddd;
      margin-bottom: 15px;
      transition: color 0.3s ease;
    }

    .stats .stats-item:hover i {
      color: #0d6efd;
    }

    .stats .stats-item span {
      font-size: 40px;
      font-weight: bold;
      color: #333;
      display: block;
      margin-bottom: 10px;
    }

    .stats .stats-item p {
      font-size: 16px;
      color: #666;
      margin: 0;
    }

    .stats .stats-item p strong {
      color: #149ddd;
    }

    .stats .stats-item p span {
      display: block;
      margin-top: 5px;
      font-size: 14px;
      color: #888;
    }

    @media (max-width: 767px) {
      .stats .stats-item {
        margin-bottom: 20px;
      }
    }
  </style>

  <section id="stats" class="stats section">

    <div class="container" data-aos="fade-up" data-aos-delay="100">
      <div class="row gy-4">

        <!-- Stats Item 1 -->
        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-emoji-smile"></i>
            <span class="purecounter" data-target="2000">0</span>
            <p><strong>System Users</strong> <span>across financial modules</span></p>
          </div>
        </div>

        <!-- Stats Item 2 -->
        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-journal-richtext"></i>
            <span class="purecounter" data-target="20">0</span>
            <p><strong>Projects</strong> <span>delivered successfully</span></p>
          </div>
        </div>

        <!-- Stats Item 3 -->
        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-headset"></i>
            <span class="purecounter" data-target="1500">0</span>
            <p><strong>Hours Of Support</strong> <span>to streamline workflows</span></p>
          </div>
        </div>

        <!-- Stats Item 4 -->
        <div class="col-lg-3 col-md-6">
          <div class="stats-item">
            <i class="bi bi-people"></i>
            <span class="purecounter" data-target="30">0</span>
            <p><strong>Team Collaborations</strong> <span>for impactful solutions</span></p>
          </div>
        </div>

      </div>
    </div>

  </section>

  <script>
    // Intersection Observer for Stats Animation
    const statsItems = document.querySelectorAll('.purecounter');

    const observerOptions = {
      threshold: 0.5, // Trigger when 50% of the item is visible
    };

    const animateCounter = (entry) => {
      if (entry.isIntersecting) {
        const counter = entry.target;
        const targetValue = +counter.getAttribute('data-target');
        let currentValue = 0;
        const increment = targetValue / 100; // Adjust animation speed

        const updateCounter = () => {
          currentValue += increment;
          if (currentValue >= targetValue) {
            counter.textContent = targetValue;
          } else {
            counter.textContent = Math.ceil(currentValue);
            requestAnimationFrame(updateCounter);
          }
        };

        updateCounter();
        observer.unobserve(counter); // Stop observing once animation completes
      }
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(animateCounter);
    }, observerOptions);

    statsItems.forEach((item) => observer.observe(item));
  </script>
