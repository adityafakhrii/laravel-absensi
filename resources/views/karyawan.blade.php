@extends('layouts.master')
<title>Data Karyawan</title>
@section('sidebar')
	<nav class="side-nav">
	    <a href="" class="intro-x flex items-center pl-5 pt-4">
	        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{asset('dist/images/logo.svg')}}">
	        <span class="hidden xl:block text-white text-lg ml-3"><span class="font-medium">Absensi</span> </span>
	    </a>
	    <div class="side-nav__devider my-6"></div>
	    <ul>
	        <li>
	            <a href="/dashboard" class="side-menu ">
	                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
	                <div class="side-menu__title"> Dashboard </div>
	            </a>
	        </li>
	        <li>
	            <a href="/data-karyawan" class="side-menu side-menu--active">
	                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
	                <div class="side-menu__title"> Data Karyawan </div>
	            </a>
	        </li>
	        <li>
	            <a href="/laporan" class="side-menu">
	                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
	                <div class="side-menu__title"> Laporan Absensi </div>
	            </a>
	        </li>
	        <li>
	            <a href="/logout" class="side-menu">
	                <div class="side-menu__icon"> <i data-feather="toggle-right"></i> </div>
	                <div class="side-menu__title"> Logout </div>
	            </a>
	        </li>
	    </ul>
	</nav>
@endsection

@section('main')

	@if(Session::has('success'))
	  <div class="rounded-md px-5 py-4 mb-2 bg-theme-9 text-white">{{Session::get('success')}}</div>
	@elseif(Session::has('hapus'))
	  <div class="rounded-md px-5 py-4 mb-2 bg-theme-6 text-white">{{Session::get('hapus')}}</div>
	@elseif(Session::has('ubah'))
	  <div class="rounded-md px-5 py-4 mb-2 bg-theme-12 text-white">{{Session::get('ubah')}}</div>
	@endif
	

	<h2 class="intro-y text-lg font-medium mt-10">
       Data Karyawan
    </h2>
	<div class="grid grid-cols-12 gap-6 mt-5">
		<div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="/data-karyawan/tambah" class="button text-white bg-theme-1 shadow-md mr-2">Tambah Karyawan</a>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
	            	<form action="/data-karyawan" method="get">
		                <input type="text" name="search" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Cari NIK...">
		                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
	            	</form>
	            </div>
            </div>
        </div>
	   
	    <!-- BEGIN: Data List -->
	    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
	        <table class="table table-report -mt-2">
	            <thead>
	                <tr>
	                    <th class=" whitespace-no-wrap">NIK</th>
	                    <th class=" whitespace-no-wrap">Nama</th>
	                    <th class=" text-center whitespace-no-wrap">Jabatan</th>
	                    <th class=" text-center whitespace-no-wrap">Aksi</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@forelse($users as $kar)
                        <tr class="intro-x">
		                    <td>{{$kar->nik}}</td>
		                    <td>
		                        <p href="" class="font-medium whitespace-no-wrap">{{$kar->nama}}</p>
		                    </td>
		                    <td class="text-center">{{$kar->jabatan}}</td>
		                    <td class="text-center">
		                    	  <a href="/data-karyawan/ubah/{{$kar->id}}" class="button w-24 inline-block mr-1 mb-2 bg-theme-12 text-white">Ubah</a> <a onclick="return confirm('Anda yakin?')" href="/data-karyawan/hapus/{{$kar->id}}" class="button w-24 inline-block mr-1 mb-2 bg-theme-6 text-white">Hapus</a> 
		                    </td>
		                </tr>
                    @empty
                        <tr>
                            <td colspan="6" align="center"><b>TIDAK ADA DATA UNTUK DITAMPILKAN</b></td>
                        </tr>
                    @endforelse

	            </tbody>
	        </table>
	    </div>
	    <!-- END: Data List -->
	</div>
@endsection