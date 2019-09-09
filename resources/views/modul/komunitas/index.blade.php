@extends('master')
@section('content')
<section class="header-main shadow">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-3 col-sm-4">
	<div class="brand-wrap">
		<img width="70" height="70" class="logo" src="asset/img/logo/dog.png">
	</div> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-8">
			<form action="#" class="search-wrap">
				<div class="input-group w-100">
				    <input type="text" class="form-control" style="width:40%;" placeholder="Search">
				    <select class="custom-select" name="category_name">
							<option value="">Semua Hewan</option><option value="codex">Anjing</option>
							<option value="comments">Kucing</option>
					</select>
				    <div class="input-group-append">
				      <button class="btn btn-primary" type="submit">
				        <i class="fas fa-search"></i>
				      </button>
				    </div>
			    </div>
			</form> <!-- search-wrap .end// -->
		
	</div> <!-- col.// -->
	<div class="col-lg-3 col-md-12">
		
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section>


<section class="section-content bg padding-y">
<div class="container">

<div class="row">
	<aside class="col-sm-3">

<div class="card card-filter">
	<article class="card-group-item">
		<header class="card-header">
			<a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">Berdasarkan Jenis Hewan</h6>
			</a>
		</header>
		<div style="" class="filter-content collapse show" id="collapse22">
			<div class="card-body">
				<form class="pb-3">
				<div class="input-group">
				  <input class="form-control" placeholder="Search" type="text">
				  <div class="input-group-append">
				    <button class="btn btn-primary" type="button"><i class="fa fa-search"></i></button>
				  </div>
				</div>
				</form>

				<ul class="list-unstyled list-lg">
					<li><a href="#">Anjing <span class="float-right badge badge-light round">142</span> </a></li>
					<li><a href="#">Kucing  <span class="float-right badge badge-light round">3</span>  </a></li>
				</ul>  
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
	
	<article class="card-group-item">
		<header class="card-header">
			<a href="#" data-toggle="collapse" data-target="#collapse44">
				<i class="icon-action fa fa-chevron-down"></i>
				<h6 class="title">Berdasarkan Lokasi </h6>
			</a>
		</header>
		<div class="filter-content collapse show" id="collapse44">
			<div class="card-body">
			<form>
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">5</span>
				    Jakarta Utara
				  </span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">13</span>
				    Jakarta Timur
				  </span>
				</label> <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">12</span>
				    Jakarta Selatan
				  </span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">32</span>
				    Jakarta Barat
				  </span>
				</label>  <!-- form-check.// -->
				<label class="form-check">
				  <input class="form-check-input" value="" type="checkbox">
				  <span class="form-check-label">
				  	<span class="float-right badge badge-light round">32</span>
				    Jakarta Pusat
				  </span>
				</label>  <!-- form-check.// -->
			</form>
			</div> <!-- card-body.// -->
		</div> <!-- collapse .// -->
	</article> <!-- card-group-item.// -->
</div> <!-- card.// -->


	</aside> <!-- col.// -->
	<main class="col-sm-9">

	<h1 style="color:#0066ff;">Dibawah ini merupakan daftar komunitas yang bekerja sama dengan aplikasi ini untuk menyelamatkan dan melindungi hewan.</h1><br>

@foreach($comunity as $comunities)
	<article class="card card-product">
		<div class="card-body">
		<div class="row">
			<aside class="col-sm-3">
				<div class="img-wrap"><img src="asset/img/fotokomunitas/komunitassemua.jpg"></div>
			</aside> <!-- col.// -->
			<article class="col-sm-6">
					<h4 class="title"> {{$comunities->name}} </h4>
					<div class="rating-wrap  mb-2">
						<ul class="rating-stars">
							<li style="width:80%" class="stars-active"> 
								<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
								<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
								<i class="fa fa-star"></i> 
							</li>
							<li>
								<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
								<i class="fa fa-star"></i> <i class="fa fa-star"></i> 
								<i class="fa fa-star"></i> 
							</li>
						</ul>
						<div class="label-rating">{{$comunities->rating}} reviews</div>
						<div class="label-rating">{{$comunities->case_finish}} selesai ditangani </div>
					</div> <!-- rating-wrap.// -->
					<p> {{$comunities->description}}. </p>
					<dl class="dlist-align">
					<dt>Lokasi</dt>
					<dd><a target="_blank" href="{{$comunities->url_lokasi}}">{{$comunities->location}},&nbsp;{{$comunities->mywilayah->name}}</a></dd>
					</dl>  <!-- item-property-hor .// -->
					<dl class="dlist-align">
					<dt>Sosial Media</dt>
					<dd>Instagram:</dd>
					<dd>{{$comunities->instagram}}</dd><br>
					<dd>Whatsapp:</dd>
					<dd>{{$comunities->whatsapp}}</dd><br>
					<dd>Line:</dd>
					<dd>{{$comunities->Line}}</dd><br>
					</dl>  <!-- item-property-hor .// -->
					<dl class="dlist-align">
					<dt>Komunitas</dt>
					<dd>{{$comunities->myhewan->name}}</dd>
					</dl>  <!-- item-property-hor .// -->
					
				
			</article> <!-- col.// -->
			<aside class="col-sm-3 border-left">
				<div class="action-wrap">
					<div class="price-wrap h4">
						
					</div> <!-- info-price-detail // -->
				
					<br>
					
					<a href="#"><i class="fa fa-heart"></i> Beri Rating</a>
				</div> <!-- action-wrap.// -->
			</aside> <!-- col.// -->
		</div> <!-- row.// -->
		</div> <!-- card-body .// -->
	</article> <!-- card product .// -->
@endforeach

<h1 style="color:#0066ff;">Kami terbuka bagi siapa saja yang memiliki komunitas yang ingin mendaftarkan komunitasnya untuk bekerja sama dengan aplikasi ini </h1><br>
<center><a href="" style="width:200px; height:50px;" class="btn btn-primary">DAFTAR</a><br><br></center>

	</main> <!-- col.// -->
</div>

</div> <!-- container .//  -->
</section>


@endsection