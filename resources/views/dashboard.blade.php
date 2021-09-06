@extends('layouts.master')
@section('sidebar')
	<nav class="side-nav">
	    <a href="" class="intro-x flex items-center pl-5 pt-4">
	        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="{{asset('dist/images/logo.svg')}}">
	        <span class="hidden xl:block text-white text-lg ml-3"><span class="font-medium">Absensi</span> </span>
	    </a>
	    <div class="side-nav__devider my-6"></div>
	    <ul>
	        <li>
	            <a href="/dashboard" class="side-menu side-menu--active">
	                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
	                @if(Auth::user()->role == 'user')
	                	<div class="side-menu__title"> Absensi </div>
	                @else
	                	<div class="side-menu__title"> Dashboard </div>
	                @endif
	            </a>
	        </li>
	        @if(Auth::user()->role == 'user')

	        <li>
	            <a href="/logout" class="side-menu">
	                <div class="side-menu__icon"> <i data-feather="toggle-right"></i> </div>
	                <div class="side-menu__title"> Logout </div>
	            </a>
	        </li>
	        @endif
	        @if(Auth::user()->role == 'admin')
	        <li>
	            <a href="/data-karyawan" class="side-menu ">
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
	        @endif
	    </ul>
	</nav>
@endsection
@section('main')
	@if(Auth::user()->role == 'user')
	
	<div class="grid grid-cols-12 gap-6 mt-5">
	    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
			<h2 class="intro-y text-lg font-medium mt-10">
			    Halo <strong>{{Auth::user()->nama}}</strong>, {{ $info['status']}}
			</h2>
			
	    </div>
	    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
			
                <form action="/absen" method="post">
                    {{csrf_field()}}
                    {{-- <button type="submit" class="btn btn-flat btn-primary" name="btnIn" {{$info['btnIn']}}>ABSEN MASUK</button> --}}
                     <button {{$info['btnIn']}} name="btnIn" type="submit" class="button w-24 inline-block mr-1 mb-2 bg-theme-1 text-white inline-flex items-center"> Masuk <i data-feather="log-in" class="w-4 h-4 ml-auto"></i> </button>  
                     <button {{$info['btnOut']}} name="btnOut" type="submit" class="button w-24 inline-block mr-1 mb-2 bg-theme-6 text-white inline-flex items-center"> Keluar <i data-feather="log-out" class="w-4 h-4 ml-auto"></i> </button>  
                </form>
	    </div>
	    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center text-center">
			<h3 class="intro-y text-lg font-medium ">
			    Riwayat absensi
			</h3>
	    </div>
	    <!-- BEGIN: Data List -->
	    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
	        <table class="table table-report -mt-2">
	            <thead>
	                <tr>
	                    <th class="text-center whitespace-no-wrap">Tanggal</th>
	                    <th class="text-center whitespace-no-wrap">NIK</th>
	                    <th class="text-center whitespace-no-wrap">Nama</th>
	                    <th class="text-center whitespace-no-wrap">Waktu Masuk</th>
	                    <th class="text-center whitespace-no-wrap">Waktu Keluar</th>
	                    <th class="text-center whitespace-no-wrap">Status</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@forelse($data_absen as $absen)
                        <tr>
                            <td class="text-center">{{$absen->tgl}}</td>
                            <td class="text-center">{{$absen->nik}}</td>
                            <td class="text-center">{{$absen->nama}}</td>
		                    <td class="text-center">{{$absen->masuk}}</td>
		                    <td class="text-center">{{$absen->keluar}}</td>
		                    <td class="text-center">{{$absen->status}}</td>
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
	@else
	<div class="grid grid-cols-12 gap-6 mt-5">
	    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
	        
			<h2 class="intro-y text-lg font-medium">
			    Tabel Keterangan Absensi Karyawan Hari ini tanggal {{date('d-m-Y');}}
			</h2>
	        <div class="hidden md:block mx-auto text-gray-600"></div>
	        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
	            <div class="w-56 relative text-gray-700">
	            	<form action="/dashboard" method="get">
		                <input type="text" name="search" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Cari NIK...">
		                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i> 
	            	</form>
	            </div>
	        </div>
	        <div class="hidden md:block mx-4"></div>
	        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
	            <div class="relative mx-auto">
	            	<a href="/laporanPDFharian" class="button mr-auto text-white bg-theme-1 shadow-md mr-2">Unduh PDF</a>
	         	</div> 
	        </div>
	    </div>
	    <!-- BEGIN: Data List -->
	    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
	        <table class="table table-report -mt-2">
	            <thead>
	                <tr>
	                    <th class="text-center whitespace-no-wrap">Tanggal</th>
	                    <th class="text-center whitespace-no-wrap">NIK</th>
	                    <th class="text-center whitespace-no-wrap">Nama</th>
	                    <th class="text-center whitespace-no-wrap">Waktu Masuk</th>
	                    <th class="text-center whitespace-no-wrap">Waktu Keluar</th>
	                    <th class="text-center whitespace-no-wrap">Status</th>
	                </tr>
	            </thead>
	            <tbody>
	            	@forelse($data_absen as $absen)
                        <tr>
                            <td class="text-center">{{$absen->tgl}}</td>
                            <td class="text-center">{{$absen->nik}}</td>
                            <td class="text-center">{{$absen->nama}}</td>
		                    <td class="text-center">{{$absen->masuk}}</td>
		                    <td class="text-center">{{$absen->keluar}}</td>
		                    <td class="text-center">{{$absen->status}}</td>
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
	@endif
@endsection