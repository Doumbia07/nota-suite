    <!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'NotaSuite')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
<style>
body{background:#f4f6f9;margin:0}
.sidebar{width:260px;background:#3f4d7a;min-height:100vh;color:white;position:fixed;left:0;top:0;z-index:1000;transition:transform .3s}
.sidebar a{color:white;display:flex;align-items:center;gap:10px;padding:12px;text-decoration:none}
.sidebar a:hover{background:rgba(255,255,255,.1)}
.topbar{height:60px;background:white;box-shadow:0 2px 4px rgba(0,0,0,.05);position:sticky;top:0;z-index:999}
.main-wrapper{margin-left:260px;transition:margin-left .3s}
.menu-toggle{display:none;background:none;border:none;font-size:24px;cursor:pointer}

@media (max-width:768px){
.sidebar{transform:translateX(-100%)}
.sidebar.active{transform:translateX(0)}
.main-wrapper{margin-left:0}
.menu-toggle{display:block}
.overlay{display:none;position:fixed;top:0;left:0;right:0;bottom:0;background:rgba(0,0,0,.5);z-index:999}
.overlay.active{display:block}
}
</style>
</head>

<body>

<div class="sidebar" id="sidebar">
<h4 class="p-3"><a href="">NotaSuite</a></h4>
<a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Dashboard</a>
<a href="{{ route('clients.index') }}"><i class="bx bx-user"></i> Clients</a>
<a href="{{ route('dossiers.create') }}"><i class="bx bx-folder-plus"></i> Ouvrir un dossier</a>
<a href="{{ route('dossiers.index') }}"><i class="bx bx-folder"></i> Dossiers</a>
</div>

<div class="overlay" id="overlay"></div>

<div class="main-wrapper">
<div class="topbar d-flex align-items-center justify-content-between px-4">
    <button class="menu-toggle" id="menuToggle"><i class="bx bx-menu"></i></button>
    <span>{{ auth()->user()->name ?? '' }}</span>
</div>

<div class="p-4">
    @yield('content')
</div>
</div>

<script>
const sidebar=document.getElementById('sidebar');
const overlay=document.getElementById('overlay');
const menuToggle=document.getElementById('menuToggle');

menuToggle.addEventListener('click',()=>{
sidebar.classList.toggle('active');
overlay.classList.toggle('active');
});

overlay.addEventListener('click',()=>{
sidebar.classList.remove('active');
overlay.classList.remove('active');
});
</script>

</body>
</html>