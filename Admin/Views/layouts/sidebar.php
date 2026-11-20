<?php
    $currentPage = $_SERVER['REQUEST_URI']; 
    $page = "/sni/Admin/";
?>

<div class="sidebar-header">
    <a class="brand-mark" href="index.html" aria-label="adminHMD dashboard">
        <span class="brand-icon"><i class="bi bi-grid-1x2-fill" aria-hidden="true"></i></span>
        <span class="brand-copy">
        <span class="brand-title">adminHMD</span>
        <span class="brand-subtitle">Admin Template</span>
        </span>
    </a>
    </div>

    <nav class="sidebar-nav">
    <a class="nav-link <?= $currentPage == $page.'dashboard' ? 'active' : '' ?>" href="<?php echo URL; ?>dashboard" aria-current="page">
        <span class="nav-icon"><i class="bi bi-speedometer2" aria-hidden="true"></i></span>
        <span class="nav-text">Dashboard</span>
    </a>
    <a class="nav-link <?= $currentPage == $page.'welding' ? 'active' : '' ?>" href="<?php echo URL; ?>welding">
        <span class="nav-icon"><i class="bi bi-people" aria-hidden="true"></i></span>
        <span class="nav-text">Welding Consumables</span>
    </a>
    <a class="nav-link <?= $currentPage == $page.'material' ? 'active' : '' ?>" href="<?php echo URL; ?>material">
        <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
        <span class="nav-text">Tools & Materials</span>
    </a>
    <a class="nav-link <?= $currentPage == $page.'employee' ? 'active' : '' ?>" href="<?php echo URL; ?>employee">
        <span class="nav-icon"><i class="bi bi-person-plus" aria-hidden="true"></i></span>
        <span class="nav-text">Employee</span>
    </a>
    
    </nav>

    <div class="sidebar-user">
    <img class="avatar-img avatar-md sidebar-user-avatar" src="<?= ASSET_URL ?>/images/avatar/avatar.jpg" alt="Admin Hasan">
    <strong>Admin Hasan</strong>
    <small>Active Workspace</small>
    </div>

    <div class="sidebar-footer">
    <span class="status-dot"></span>
    <span class="sidebar-footer-text">System running smoothly</span>
    </div>