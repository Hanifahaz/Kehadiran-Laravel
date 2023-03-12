<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Kehadiran</title>
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
					<li><a href="<?php echo e(route('anggotas.index')); ?>">Data Anggota</a></li>
					<li><a href="<?php echo e(route('kehadirans.index')); ?>" style="color: black;">Data Kehadiran</a></li>
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
                    <h1 style="font-family:Fantasy;">DATA KEHADIRAN</h1>
                        
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NAMA LENGKAP</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">TANGGAL</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">EDIT/HAPUS</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php $__empty_1 = true; $__currentLoopData = $kehadirans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kehadiran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($kehadiran->nama); ?></td>
                                    <td><?php echo e($kehadiran->kelas); ?></td>
                                    <td><?php echo e($kehadiran->tanggal); ?></td>
                                    <td><?php echo e($kehadiran->keterangan); ?></td>
                                    <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="<?php echo e(route('kehadirans.destroy', $kehadiran->id)); ?>" method="POST">
                                            <a href="<?php echo e(route('kehadirans.edit', $kehadiran->id)); ?>" class="btn btn-sm btn-success">EDIT</a>
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                  <div class="alert alert-danger">
                                      Data Kehadiran belum Tersedia.
                                  </div>
                              <?php endif; ?>
                            </tbody>
                          </table>  
                          <?php echo e($kehadirans->links()); ?>

                    </div>
                </div>
            </div>
        </div>
        <a href="<?php echo e(route('kehadirans.create')); ?>" class="btn btn-md btn-primary mb-3">TAMBAH DATA</a>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        <?php if(session()->has('success')): ?>
        
            toastr.success('<?php echo e(session('success')); ?>', 'BERHASIL!'); 

        <?php elseif(session()->has('error')): ?>

            toastr.error('<?php echo e(session('error')); ?>', 'GAGAL!'); 
            
        <?php endif; ?>
    </script>

</body>
</html><?php /**PATH C:\xampp\htdocs\Tugas-Laravel(v9)\resources\views/kehadirans/index.blade.php ENDPATH**/ ?>