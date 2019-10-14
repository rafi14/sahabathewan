<nav class="navbar navbar-expand-lg  navbar-dark" style="background-color: #00cc00;">
  <a class="navbar-brand" href="{{route('detailprofile.index')}}">  <img src="{{asset('asset/img/logo/sahabathewan1.png')}}" width="30" height="30" alt=""><b> Sahabat Hewan</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav ml-auto" style="padding-right:55px">
    
        <li class="nav-item dropdown active">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Pelaporan Hewan
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown">
               <a class="dropdown-item" href="{{route('pelaporan.index')}}"><i  style = "color:green" class="fas fa-users"></i> Komunitas Hewan </a>
             </div>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('userevent.index')}}">Event</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="{{route('komunitas.index')}}">Komunitas</a>
        </li>
     <li class="nav-item active">
        <a class="nav-link" href="{{route('adoption.index')}}">Adopsi</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('caridokter.index')}}">Cari Dokter</a>
      </li>
      
   
    <li class="nav-item dropdown active">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Akun Saya</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="{{route('detailprofile.index')}}">Profilku</a>
      <a class="dropdown-item" href="{{route('myinfo.edit')}}">Setelan</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="{{route('login.create')}}">Keluar</a>
    </div>
  </li>
   <li class="nav-item active">
        <a class="nav-link" href="#"><img class = "rounded-circle"src="{{Auth::user()->image}}" alt="" width="30" height="30"></a>
      </li>
    </ul>
  </div>
</nav>