<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <!-- Theme CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/theme.min.css">
  <title>FUBK-SMCS | Login</title>

  <style>
    .login-wrapper {
      min-height: 100vh;
      background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
    }
    .login-container {
      max-width: 400px;
      margin: 0 auto;
      padding: 2rem;
    }
    .login-card {
      border: none;
      border-radius: 15px;
      box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
      overflow: hidden;
    }
    .login-header {
      background: #fff;
      padding: 2rem 1rem;
      text-align: center;
      border-bottom: 1px solid rgba(0,0,0,0.05);
    }
    .login-body {
      padding: 2rem;
      background: #fff;
    }
    .logo-container {
      display: inline-block;
      padding: 1rem;
      border-radius: 50%;
      background: rgba(78, 115, 223, 0.1);
      margin-bottom: 1rem;
    }
    .logo-img {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }
    .form-control {
      height: 48px;
      border-radius: 8px;
      padding: 0.75rem 1rem;
      font-size: 0.95rem;
      border: 1px solid #e3e6f0;
      background-color: #f8f9fc;
    }
    .form-control:focus {
      border-color: #4e73df;
      box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    .btn-login {
      height: 48px;
      border-radius: 8px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      background: linear-gradient(135deg, #4e73df 0%, #224abe 100%);
      border: none;
      box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
    }
    .btn-login:hover {
      transform: translateY(-1px);
      box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
    }
    .footer-link {
      color: #4e73df;
      font-weight: 500;
      text-decoration: none;
      transition: color 0.2s ease;
    }
    .footer-link:hover {
      color: #224abe;
      text-decoration: none;
    }
    .login-footer {
      padding: 1rem;
      background: #f8f9fc;
      text-align: center;
    }
  </style>
</head>

<body>
  <div class="login-wrapper d-flex align-items-center">
    <div class="login-container">
      <div class="login-card">
        <div class="login-header">
          <div class="logo-container">
            <img class="logo-img" src="<?php echo base_url(); ?>assets/images/file.jpg" alt="FUBK-SMCS Logo">
          </div>
          <h4 class="mb-1 text-dark">Welcome Back!</h4>
          <p class="text-muted mb-0">Sign in to continue to FUBK-SMCS</p>
        </div>
        
        <div class="login-body">
          <?php if($this->session->flashdata('msg')!= "") { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <i class="fas fa-exclamation-circle mr-2"></i>
              <?php echo $this->session->flashdata('msg'); ?>
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          <?php } ?>
          <form method="POST" action="<?php echo site_url('auth/authentication'); ?>">
            <div class="form-group mb-4">
              <label class="form-label text-muted small text-uppercase font-weight-bold">Username</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-transparent border-right-0">
                    <i class="fas fa-user text-primary"></i>
                  </span>
                </div>
                <input 
                  class="form-control border-left-0 pl-0" 
                  id="username" 
                  name="username" 
                  type="text" 
                  placeholder="Enter your username"
                  autocomplete="off" 
                  required
                >
              </div>
            </div>
            
            <div class="form-group mb-4">
              <label class="form-label text-muted small text-uppercase font-weight-bold">Password</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-transparent border-right-0">
                    <i class="fas fa-lock text-primary"></i>
                  </span>
                </div>
                <input 
                  class="form-control border-left-0 pl-0" 
                  id="password" 
                  name="password" 
                  type="password" 
                  placeholder="Enter your password"
                  required
                >
              </div>
            </div>

            <div class="form-group mb-4">
              <div class="d-flex justify-content-between align-items-center">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="rememberMe">
                  <label class="custom-control-label text-muted" for="rememberMe">Remember me</label>
                </div>
                <a href="#" class="footer-link small">Forgot password?</a>
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-login btn-block mb-3">
              <i class="fas fa-sign-in-alt mr-2"></i> Sign In Securely
            </button>
          </form>
        </div>
        
        <div class="login-footer">
          <p class="text-muted mb-0">
            © <?php echo date('Y'); ?> FUBK-SMCS. All rights reserved.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Required Scripts -->
  <script src="<?php echo base_url(); ?>assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/theme.min.js"></script>

  <script>
    $(document).ready(function() {
      // Fade in the login container
      $('.login-container').hide().fadeIn(1000);
      
      // Add loading state to form submit
      $('form').on('submit', function() {
        $(this).find('button[type="submit"]')
          .prop('disabled', true)
          .html('<i class="fas fa-circle-notch fa-spin mr-2"></i> Signing In...');
      });

      // Password visibility toggle
      const togglePassword = function() {
        const passwordInput = $('#password');
        const type = passwordInput.attr('type') === 'password' ? 'text' : 'password';
        passwordInput.attr('type', type);
        $(this).find('i').toggleClass('fa-eye fa-eye-slash');
      };

      // Add password visibility toggle button
      $('.input-group:has(#password)').append(
        $('<div class="input-group-append">')
          .append(
            $('<span class="input-group-text bg-transparent border-left-0" style="cursor: pointer;">')
              .on('click', togglePassword)
              .append('<i class="fas fa-eye text-muted"></i>')
          )
      );
    });
  </script>
</body>
</html>