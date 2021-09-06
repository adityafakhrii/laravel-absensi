@extends('layouts.master')
<title>Tambah Karyawan</title>
@section('sidebar')
	<nav class="side-nav">
	    <a href="" class="intro-x flex items-center pl-5 pt-4">
	        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{asset('dist/images/logo.svg')}}">
	        <span class="hidden xl:block text-white text-lg ml-3"> Mid<span class="font-medium">one</span> </span>
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
	<div class="intro-y flex items-center mt-8">
	    <h2 class="text-lg font-medium mr-auto">
	        Tambah Karyawan
	    </h2>
	</div>
	<div class="grid grid-cols-12 gap-6 mt-5">
	    <div class="intro-y col-span-12 lg:col-span-12">
	        <!-- BEGIN: Form Layout -->
	        <form action="/data-karyawan/store" method="post">
	        	@csrf
		        <div class="intro-y box p-5">
		            <div>
		                <label>NIK</label>
		                <input name="nik" type="number" class="input w-full border mt-2" placeholder="Masukkan NIK..." required>
		            </div>
		            <div class="mt-3">
		                <label>Password</label>
		                <input name="password" type="password" class="input w-full border mt-2" placeholder="Masukkan password..." required>
		            </div>
		            <div class="mt-3">
		                <label>Nama</label>
		                <input name="nama" type="text" class="input w-full border mt-2" placeholder="Masukkan Nama..." required>
		            </div>
		            <div class="mt-3">
		                <label>Jabatan</label>
		                <input name="jabatan" type="text" class="input w-full border mt-2" placeholder="Masukkan Jabatan..." required>
		            </div>
		            <div class="text-right mt-5">
		                <button type="submit" class="button w-24 bg-theme-1 text-white">Simpan</button>
		            </div>
		        </div>

	        </form>
	        <!-- END: Form Layout -->
	    </div>
	</div>
@endsection