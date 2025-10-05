<header class="modern-admin-header">
  <nav class="admin-navbar">
    <div class="navbar-container">
      
      <!-- Left: Logo & Brand -->
      <div class="navbar-brand-section">
        <div class="brand-logo">
          <img src="{{ asset('images/Logo.png') }}" alt="Logo" class="admin-logo">
        </div>
        <div class="brand-text">
          <h3 class="admin-title">Admin Dashboard</h3>
          <span class="admin-subtitle">Content Management</span>
        </div>
      </div>

      <!-- Right: User Actions -->
      <div class="navbar-actions">
        <div class="user-menu">
          <x-app-layout></x-app-layout>
        </div>
      </div>

    </div>
  </nav>
</header>

<style>
.modern-admin-header {
  background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
  box-shadow: 0 2px 20px rgba(0,0,0,0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
}

.admin-navbar {
  padding: 0;
}

.navbar-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 30px;
  max-width: 100%;
}

.navbar-brand-section {
  display: flex;
  align-items: center;
  gap: 15px;
}

.brand-logo .admin-logo {
  height: 40px;
  width: auto;
  filter: brightness(0) invert(1);
}

.brand-text {
  display: flex;
  flex-direction: column;
}

.admin-title {
  color: white;
  font-size: 20px;
  font-weight: 600;
  margin: 0;
  line-height: 1.2;
}

.admin-subtitle {
  color: rgba(255,255,255,0.8);
  font-size: 12px;
  font-weight: 400;
  margin: 0;
}

.navbar-actions {
  display: flex;
  align-items: center;
}

.user-menu {
  color: white;
}

/* Responsive */
@media (max-width: 768px) {
  .navbar-container {
    padding: 12px 20px;
  }
  
  .admin-title {
    font-size: 18px;
  }
  
  .admin-subtitle {
    font-size: 11px;
  }
  
  .brand-logo .admin-logo {
    height: 35px;
  }
}
</style>
