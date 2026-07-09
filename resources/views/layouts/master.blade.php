<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NTC DTR Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
      :root {
        --sidebar: #071426;
        --sidebar-light: #102746;
        --primary: #1769e8;
        --background: #f1f5f9;
        --text: #172033;
        --muted: #718096;
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        min-height: 100vh;
        background: var(--background);
        font-family: "Segoe UI", Arial, sans-serif;
        color: var(--text);
      }

      /* SIDEBAR */
      .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        width: 270px;
        height: 100vh;
        padding: 25px 18px;
        color: white;
        background:
          linear-gradient(180deg,
            #071426,
            #0c2443);
        z-index: 1000;
      }

      .brand {
        display: flex;
        align-items: center;
        gap: 13px;
        padding: 5px 10px 30px;
        border-bottom:
          1px solid rgba(255, 255, 255, .10);
      }

      .brand-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 15px;
        color: white;
        font-size: 28px;
        background: #1769e8;
      }

      .brand-title {
        font-size: 22px;
        font-weight: 800;
      }

      .brand-subtitle {
        color: #91a4be;
        font-size: 11px;
        letter-spacing: 1px;
      }

      .menu-title {
        margin:
          28px 14px 10px;
        color: #6f829d;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
      }

      .nav-link {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 7px;
        padding: 14px 16px;
        border-radius: 13px;
        color: #b7c4d7;
        font-weight: 600;
        transition: .25s;
      }

      .nav-link i {
        width: 24px;
        font-size: 20px;
      }

      .nav-link:hover {
        color: white;
        background:
          rgba(255, 255, 255, .08);
      }

      .nav-link.active {
        color: white;
        background:
          linear-gradient(90deg,
            #1769e8,
            #3184ff);
        box-shadow:
          0 8px 25px rgba(23, 105, 232, .35);
      }

      /* MAIN */
      .main {
        margin-left: 270px;
        min-height: 100vh;
      }

      /* TOPBAR */
      .topbar {
        height: 85px;
        padding: 0 35px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: white;
        border-bottom: 1px solid #e5eaf1;
      }

      .page-title {
        font-size: 25px;
        font-weight: 800;
      }

      .page-subtitle {
        color: var(--muted);
        font-size: 14px;
      }

      .admin-avatar {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        color: white;
        font-size: 20px;
        background: #1769e8;
      }

      .content {
        padding: 30px 35px;
      }

      /* STAT CARDS */
      .stat-card {
        height: 150px;
        padding: 24px;
        border: 0;
        border-radius: 20px;
        background: white;
        box-shadow:
          0 8px 30px rgba(26, 45, 76, .07);
        transition: .25s;
      }

      .stat-card:hover {
        transform:
          translateY(-4px);
      }

      .stat-icon {
        width: 58px;
        height: 58px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        font-size: 27px;
      }

      .icon-blue {
        color: #1769e8;
        background: #e8f1ff;
      }

      .icon-green {
        color: #16a34a;
        background: #e8f8ed;
      }

      .icon-orange {
        color: #e88b10;
        background: #fff3df;
      }

      .icon-red {
        color: #dc3545;
        background: #ffe9eb;
      }

      .stat-label {
        color: #718096;
        font-size: 14px;
        font-weight: 600;
      }

      .stat-number {
        margin-top: 4px;
        font-size: 35px;
        font-weight: 800;
      }

      /* PANELS */
      .dashboard-card {
        padding: 25px;
        border-radius: 20px;
        background: white;
        box-shadow:
          0 8px 30px rgba(26, 45, 76, .07);
      }

      .card-title {
        font-size: 20px;
        font-weight: 800;
      }

      .card-description {
        color: #718096;
        font-size: 13px;
      }

      /* ATTENDANCE SUMMARY */
      .summary-box {
        min-height: 320px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
      }

      .summary-circle {
        width: 190px;
        height: 190px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border-radius: 50%;
        background:
          conic-gradient(#1769e8 0 70%,
            #e9eef5 70% 100%);
        position: relative;
      }

      .summary-circle::before {
        content: "";
        position: absolute;
        width: 145px;
        height: 145px;
        border-radius: 50%;
        background: white;
      }

      .summary-value {
        position: relative;
        font-size: 39px;
        font-weight: 900;
      }

      .summary-label {
        position: relative;
        color: #718096;
        font-size: 12px;
      }

      /* TABLE */
      .table {
        vertical-align: middle;
      }

      .table thead th {
        padding: 15px;
        color: #718096;
        border-bottom:
          1px solid #e9edf3;
        font-size: 12px;
        text-transform: uppercase;
      }

      .table tbody td {
        padding: 16px 15px;
        border-color: #edf0f4;
      }

      .employee-avatar {
        width: 45px;
        height: 45px;
        object-fit: cover;
        border-radius: 50%;
      }

      .employee-name {
        font-weight: 700;
      }

      .employee-number {
        color: #8a98aa;
        font-size: 12px;
      }

      .status-in {
        padding: 7px 13px;
        color: #159447;
        border-radius: 20px;
        background: #e6f7ec;
        font-size: 11px;
        font-weight: 800;
      }

      .status-out {
        padding: 7px 13px;
        color: #d93b47;
        border-radius: 20px;
        background: #ffe9eb;
        font-size: 11px;
        font-weight: 800;
      }

      /* RESPONSIVE */
      @media(max-width:992px) {
        .sidebar {
          width: 85px;
        }

        .brand-title,
        .brand-subtitle,
        .menu-title,
        .nav-link span {
          display: none;
        }

        .main {
          margin-left: 85px;
        }
      }
    </style>
  </head>
  <body>



@yield ('content')