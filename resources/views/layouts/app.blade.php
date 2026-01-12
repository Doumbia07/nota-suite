<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>@yield('title', 'NotaSuite')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/boxicons/css/boxicons.min.css" rel="stylesheet">
<style>
body{background:#f4f6f9}
.sidebar{width:260px;background:#3f4d7a;min-height:100vh;color:white}
.sidebar a{color:white;display:flex;align-items:center;gap:10px;padding:12px;text-decoration:none}
.sidebar a:hover{background:rgba(255,255,255,.1)}
.topbar{height:60px;background:white;box-shadow:0 2px 4px rgba(0,0,0,.05)}
</style>
</head>

<body class="d-flex">

<div class="sidebar">
<h4 class="p-3"><a href="">NotaSuite</a></h4>
<a href="{{ route('dashboard') }}"><i class="bx bx-home"></i> Dashboard</a>
<a href="{{ route('clients.index') }}"><i class="bx bx-user"></i> Clients</a>
<a href="{{ route('dossiers.create') }}"><i class="bx bx-folder-plus"></i> Ouvrir un dossier</a>
<a href="{{ route('dossiers.index') }}"><i class="bx bx-folder"></i> Dossiers</a>
</div>

<div class="flex-grow-1">
<div class="topbar d-flex align-items-center justify-content-end px-4">
    <span>{{ auth()->user()->name ?? '' }}</span>
</div>

<div class="p-4">
    @yield('content')
</div>
</div>

</body>
</html>
