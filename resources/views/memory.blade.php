<!DOCTYPE html>
<html lang="km">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Our Special Memories 💕</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      margin: 0;
      padding: 0;
      background: #fff0f3;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .container {
      width: 90%;
      max-width: 800px;
      margin: 40px auto;
      text-align: center;
    }

    h1 {
      color: #ff4d6d;
      font-size: 2.2rem;
      margin-bottom: 10px;
    }

    p.desc {
      color: #590d22;
      font-size: 1.1rem;
      margin-bottom: 25px;
    }

    /* 🖼️ ផ្នែករូបថត Top Banner */
    .top-photo-section {
      width: 100%;
      margin-bottom: 30px;
      background: white;
      padding: 15px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(255, 77, 109, 0.15);
    }

    .top-photo-box {
      width: 100%;
      height: 350px;
      background: #ffe6ea;
      border-radius: 15px;
      overflow: hidden;
      cursor: pointer;
    }

    .top-photo-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.3s ease;
    }

    .top-photo-box:hover img {
      transform: scale(1.02);
    }

    /* 📱 ផ្នែក App Icons Grid */
    .app-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
      gap: 20px;
      margin-top: 20px;
    }

    .app-item {
      display: flex;
      flex-direction: column;
      align-items: center;
      cursor: pointer;
      transition: transform 0.2s;
    }

    .app-item:hover {
      transform: translateY(-5px);
    }

    .app-icon {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, #ff758c, #ff7eb3);
      border-radius: 22px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 2.2rem;
      color: white;
      box-shadow: 0 8px 15px rgba(255, 77, 109, 0.25);
    }

    .app-name {
      margin-top: 10px;
      font-size: 0.95rem;
      font-weight: bold;
      color: #590d22;
    }

    /* 🖼️ Bottom Cover Photo */
    .featured-photo-section {
      margin-top: 40px;
      background: white;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(255, 77, 109, 0.15);
      text-align: center;
    }

    .featured-photo-section h2 {
      color: #ff4d6d;
      margin-bottom: 15px;
    }

    .big-photo-box {
      width: 100%;
      min-height: 250px;
      max-height: 450px;
      background: #ffe6ea;
      border-radius: 15px;
      overflow: hidden;
    }

    .big-photo-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Modal Popup Styles */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.75);
      display: flex;
      justify-content: center;
      align-items: center;
      opacity: 0;
      pointer-events: none;
      transition: opacity 0.3s ease;
      z-index: 1000;
      padding: 20px;
    }

    .modal-overlay.active {
      opacity: 1;
      pointer-events: auto;
    }

    .modal-content {
      background: white;
      border-radius: 20px;
      max-width: 700px;
      width: 100%;
      max-height: 85vh;
      overflow-y: auto;
      padding: 25px;
      position: relative;
      box-shadow: 0 10px 30px rgba(0,0,0,0.3);
      animation: zoomIn 0.3s ease;
    }

    @keyframes zoomIn {
      from { transform: scale(0.8); }
      to { transform: scale(1); }
    }

    .close-btn {
      position: absolute;
      top: 15px;
      right: 20px;
      font-size: 28px;
      font-weight: bold;
      color: #aaa;
      cursor: pointer;
      z-index: 1001;
    }

    .close-btn:hover {
      color: #092151;
    }

    /* 🔍 Banner Zoom Modal Styling */
    .banner-modal-content {
      position: relative;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      max-width: 90vw;
      max-height: 90vh;
    }

    .zoom-img-container {
      overflow: hidden;
      border-radius: 15px;
      display: flex;
      justify-content: center;
      align-items: center;
      max-width: 85vw;
      max-height: 75vh;
    }

    .zoom-img-container img {
      max-width: 100%;
      max-height: 75vh;
      object-fit: contain;
      transition: transform 0.2s ease-out;
      transform-origin: center center;
    }

    .zoom-controls {
      margin-top: 15px;
      display: flex;
      gap: 12px;
      background: rgba(3, 0, 104, 0.9);
      padding: 8px 20px;
      border-radius: 30px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }

    .zoom-btn {
      background: #5400fb;
      color: white;
      border: none;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      font-size: 1.2rem;
      font-weight: bold;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background 0.2s;
    }

    .zoom-btn:hover {
      background: #42045e;
    }

    .photo-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin-top: 20px;
    }

    .photo-box {
      aspect-ratio: 1;
      background: #42010c;
      border-radius: 10px;
      overflow: hidden;
    }

    .photo-box img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .btn-back {
      display: inline-block;
      margin-top: 30px;
      padding: 12px 28px;
      background: #575455;
      color: white;
      text-decoration: none;
      border-radius: 25px;
      font-weight: bold;
      transition: background 0.3s;
    }

    .btn-back:hover {
      background: #0b0204;
    }
  </style>
</head>
<body>

  <div class="container">
    <h1> love book 📖</h1>
    <p class="desc">ឆ្ងាយកាយ តែចិត្តនៅក្បែរគ្នា ✨</p>

    <!-- 🖼️ ផ្នែករូបថត Top Banner -->
    <div class="top-photo-section">
      <div class="top-photo-box" onclick="openBannerZoom('{{ asset('images/2026-08-26 18.32.45.jpg') }}')">
        <img src="{{ asset('images/2026-08-26 18.32.45.jpg') }}" alt="Top Banner Map">
      </div>
    </div>

    <div class="app-grid">
      <div class="app-item" onclick="openModal('modal1')">
        <div class="app-icon">📅</div>
        <div class="app-name">ថ្ងៃដំបូង</div>
      </div>

      <div class="app-item" onclick="openModal('modal2')">
        <div class="app-icon">☕</div>
        <div class="app-name">ដើរលេងដំបូង</div>
      </div>

      <div class="app-item" onclick="openModal('modal3')">
        <div class="app-icon">💌</div>
        <div class="app-name">ពាក្យក្នុងចិត្ត</div>
      </div>
    </div>

    <div class="featured-photo-section">
      <h2>💖 រូបថតអនុស្សាវរីយ៍ពិសេស 💖</h2>
      <div class="big-photo-box">
        <img src="{{ asset('images/love1.jpg') }}" alt="Bottom Cover">
      </div>
    </div>

    <a href="{{ url('/dashboard') }}" class="btn-back">⬅️ ត្រឡប់ទៅ Dashboard</a>
  </div>

  <!-- 🔍 Modal សម្រាប់ពង្រីក/បង្រួម Banner -->
  <div class="modal-overlay" id="bannerZoomModal">
    <div class="banner-modal-content">
      <span class="close-btn" onclick="closeModal('bannerZoomModal')" style="color: white; top: -40px; right: 0;">&times;</span>
      <div class="zoom-img-container">
        <img id="bannerZoomImg" src="" alt="Zoomed Banner">
      </div>
      <div class="zoom-controls">
        <button class="zoom-btn" onclick="zoomImage(0.2)">+</button>
        <button class="zoom-btn" onclick="zoomImage(-0.2)">-</button>
        <button class="zoom-btn" onclick="resetZoom()">↺</button>
      </div>
    </div>
  </div>

  <!-- Modal 1 -->
  <div class="modal-overlay" id="modal1">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal('modal1')">&times;</span>
      <h2 style="color: #ff4d6d;">📸 ថ្ងៃដំបូងដែលយើងជួបគ្នា</h2>
      <p style="color: #666;">ជាថ្ងៃដែលពិសេសបំផុតក្នុងជីវិត ដែលធ្វើឱ្យខ្ញុំបានស្គាល់មនុស្សម្នាក់ដែលល្អ និងស្រឡាញ់ខ្ញុំខ្លាំងបែបនេះ ❤️</p>
      <div class="photo-grid">
        <div class="photo-box"><img src="{{ asset('images/m1_pic1.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic2.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic3.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic4.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic5.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic6.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic7.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic8.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m1_pic9.jpg') }}" alt="Photo"></div>
      </div>
    </div>
  </div>

  <!-- Modal 2 -->
  <div class="modal-overlay" id="modal2">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal('modal2')">&times;</span>
      <h2 style="color: #ff4d6d;">🛵 ការជួបគ្នា និងដើរលេងដំបូង</h2>
      <p style="color: #666;">ការសន្ទនាដ៏ផ្អែមល្ហែម និងស្នាមញញឹមដែលមិនអាចបំបំភ្លេចបាន...</p>
      <div class="photo-grid">
        <div class="photo-box"><img src="{{ asset('images/m2_pic1.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic2.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic3.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic4.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic5.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic6.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic7.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic8.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m2_pic9.jpg') }}" alt="Photo"></div>
      </div>
    </div>
  </div>

  <!-- Modal 3 -->
  <div class="modal-overlay" id="modal3">
    <div class="modal-content">
      <span class="close-btn" onclick="closeModal('modal3')">&times;</span>
      <h2 style="color: #ff4d6d;">💌 ពាក្យក្នុងចិត្ត</h2>
      <p style="color: #666;">អរគុណសម្រាប់រាល់ការមើលថែ និងការយល់ចិត្តកន្លងមក។ ស្រឡាញ់អូនរហូតទៅ! 💕</p>
      <div class="photo-grid">
        <div class="photo-box"><img src="{{ asset('images/love1.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic2.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic3.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic4.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic5.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic6.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic7.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic8.jpg') }}" alt="Photo"></div>
        <div class="photo-box"><img src="{{ asset('images/m3_pic9.jpg') }}" alt="Photo"></div>
      </div>
    </div>
  </div>

  <script>
    let currentScale = 1;

    function openModal(id) {
      document.getElementById(id).classList.add('active');
    }

    function closeModal(id) {
      document.getElementById(id).classList.remove('active');
      if(id === 'bannerZoomModal') {
        resetZoom();
      }
    }

    function openBannerZoom(imgSrc) {
      const zoomImg = document.getElementById('bannerZoomImg');
      zoomImg.src = imgSrc;
      resetZoom();
      openModal('bannerZoomModal');
    }

    function zoomImage(amount) {
      currentScale += amount;
      if (currentScale < 0.6) currentScale = 0.6;
      if (currentScale > 3) currentScale = 3;
      document.getElementById('bannerZoomImg').style.transform = `scale(${currentScale})`;
    }

    function resetZoom() {
      currentScale = 1;
      document.getElementById('bannerZoomImg').style.transform = `scale(${currentScale})`;
    }
  </script>

</body>
</html>