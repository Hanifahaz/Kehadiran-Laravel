<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Anggota</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        th {
            background-color: #cccccc;
        }
    </style>
</head>
<body>
    <!-- membuat menu navigasi -->
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="https://www.instagram.com/esbiforpad_4/?hl=id">ESBIFORPAD</a>
			</div>
			
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ route('anggotas.index') }}" style="color: black;">Data Anggota</a></li>
					<li><a href="{{ route('kehadirans.index') }}">Data Kehadiran</a></li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>	
	<!-- akhir menu navigasi -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                    <h1 style="font-family:Fantasy;">DATA ANGGOTA</h1>
                        
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NISN</th>
                                <th scope="col">NAMA LENGKAP</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">LAHIR</th>
                                <th scope="col">ALAMAT</th>
                                <th scope="col">NO.HP ORANG TUA/WALI</th>
                                <th scope="col">EDIT/HAPUS</th>
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($anggotas as $anggota)
                                <tr>
                                    <td>{{ $anggota->NISN }}</td>
                                    <td>{{ $anggota->nama }}</td>
                                    <td>{{ $anggota->kelas }}</td>
                                    <td>{{ $anggota->lahir }}</td>
                                    <td>{{ $anggota->alamat }}</td>
                                    <td>{{ $anggota->phone }}</td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST">
                                            <a href="{{ route('anggotas.edit', $anggota->id) }}" class="btn btn-sm btn-success">EDIT</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Anggota belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>  
                          {{ $anggotas->links() }}
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('anggotas.create') }}" class="btn btn-md btn-primary mb-3">TAMBAH DATA</a>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>