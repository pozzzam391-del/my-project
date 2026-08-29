<!DOCTYPE html>
<html lang="km">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anniversary Login Form</title>
  <style>
    * {
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: #5c4c4c;
      margin: 0;
    }

    .form-container {
      width: 100%;
      max-width: 450px;
      padding: 25px;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .top-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .top-header h2 {
      margin: 0 0 5px 0;
      color: #333;
      font-size: 22px;
    }

    .top-header p {
      margin: 0;
      color: #666;
      font-size: 14px;
    }

    .date-group {
      margin-bottom: 20px;
    }

    .date-label {
      display: block;
      font-weight: bold;
      color: #333;
      font-size: 16px;
      margin-bottom: 8px;
    }

    .input-field {
      width: 100%;
      padding: 10px 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 6px;
      outline: none;
      margin-bottom: 5px;
    }

    .status-message {
      font-size: 14px;
      font-weight: bold;
      margin-top: 5px;
      display: block;
    }

    .status-message.error { color: #e74c3c; }
    .status-message.success { color: #2ecc71; }

    .checkbox-container {
      display: flex;
      align-items: center;
      gap: 10px;
      margin-bottom: 25px;
      font-size: 15px;
      color: #333;
    }

    .checkbox-container a {
      color: #333;
      font-weight: bold;
      text-decoration: underline;
    }

    .btn-login {
      display: block;
      width: 140px;
      margin: 0 auto 25px auto;
      padding: 12px;
      background-color: #7052ff;
      color: white;
      border: none;
      border-radius: 25px;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      text-align: center;
      transition: opacity 0.3s;
    }

    .btn-login:disabled {
      background-color: #a594ff;
      cursor: not-allowed;
      opacity: 0.6;
    }

    .btn-login:not(:disabled):hover {
      background-color: #5c3ee0;
    }

    .branding {
      text-align: center;
      font-size: 18px;
      font-weight: bold;
      color: #ff4757;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <div class="top-header">
      <h2>🔒 Memory Lock</h2>
      <p>សូមជ្រើសរើសថ្ងៃខែឆ្នាំដែលយើងស្រឡាញ់គ្នា</p>
    </div>

    <form id="loginForm">
      <div class="date-group">
        <label for="dob" class="date-label">Anniversary Date</label>
        <input type="date" id="dob" class="input-field" required>
        <span id="statusMsg" class="status-message"></span>
      </div>

      <div class="checkbox-container">
        <label for="terms"><a>tah plex ngai sl knea trov hx</a></label>
      </div>

      <button type="submit" id="loginBtn" class="btn-login" disabled>Login</button>
    </form>

    <div class="branding">
      <span>Love you ❤️</span>
    </div>
  </div>

  <script>
    // កំណត់ថ្ងៃខែឆ្នាំ (YYYY-MM-DD)
    const CORRECT_DATE = "2026-03-25"; 

    const dateInput = document.getElementById('dob');
    const loginBtn = document.getElementById('loginBtn');
    const statusMsg = document.getElementById('statusMsg');
    const form = document.getElementById('loginForm');

    dateInput.addEventListener('change', function() {
      if (this.value === CORRECT_DATE) {
        loginBtn.disabled = false;
        statusMsg.textContent = "🔓 ថ្ងៃខែត្រឹមត្រូវហើយ! អាចចូលបាន។";
        statusMsg.className = "status-message success";
      } else {
        loginBtn.disabled = true;
        statusMsg.textContent = "🔒 ជ្រើសរើសថ្ងៃខែខុសហើយ!";
        statusMsg.className = "status-message error";
      }
    });
form.addEventListener('submit', function(e) {
      e.preventDefault();
      window.location.href = "/memory";
    });
  </script>

</body>
</html>