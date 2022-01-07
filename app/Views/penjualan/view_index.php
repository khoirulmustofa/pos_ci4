<?= $this->extend('_template/main_layout') ?>

<?= $this->section('content') ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Layout</a></li>
                        <li class="breadcrumb-item active">Top Navigation</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-primary shadow-lg">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-cart-plus"></i> Daftar Belanja</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 300px;">
                                    <input type="text" name="search_barcode" class="form-control float-right" placeholder="Ketik / Scan Barcode disini ....">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Produk</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="detail_cart">

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-4">
                    <div class="card card-success shadow-lg">
                        <div class="card-header">
                            <h3 class="card-title"><i class="fas fa-money-check-alt"></i> Pembayaran</h3>

                            <div class="card-tools">

                            </div>
                        </div>
                        <div class="card-body p-2">
                            <div class="form-group">
                                <h3>Total Bayar :</h3>
                                <h1><strong id="total_bayar">0</strong></h1>
                                <hr>
                                <h3>Total Item :</h3>
                                <h1><strong id="total_item">0</strong></h1>
                            </div>
                            <div class="form-group">
                                <button type="button" onclick="btn_bayar()" class="btn btn-block btn-success btn-lg"><i class="fas fa-money-check-alt"></i> BAYAR / F2</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_edit_cart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Default Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" placeholder="Masukan Nama Produk" disabled>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="qty" min="1" class="form-control" placeholder="Masukan Jumlah Barang">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<?= $this->endSection() ?>