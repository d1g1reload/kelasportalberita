<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#categoryModal">
                    + Kategori
                </button>

                <!-- Modal -->
                <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="categoryModal"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Kategori</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="<?php echo base_url('category/submit') ?>" method="post">
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nama Kategori</label>
                                        <input type="text" name="category_name" class="form-control"
                                            placeholder="Nama Kategori" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <h3 class="mt-3">Data Kategori</h3>
                <?php if ($this->session->flashdata('failed')) : ?>

                <div class="alert alert-danger alert-dismissible" role="alert" id="liveAlert">
                    <strong><?php echo $this->session->flashdata('failed'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('success')) : ?>

                <div class="alert alert-success alert-dismissible" role="alert" id="liveAlert">
                    <strong><?php echo $this->session->flashdata('success'); ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr class="border-b">
                                <th>Nama Kategori</th>
                                <th style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($categories)) : ?>
                            <tr>
                                <td colspan="2" class="text-center p-4">
                                    <div class="alert alert-warning mb-0" role="alert">
                                        <i class="fas fa-exclamation-triangle me-2"></i> Belum ada data kategori yang
                                        tersedia.
                                    </div>
                                </td>
                            </tr>
                            <?php else : ?>
                            <?php foreach ($categories as $row) : ?>
                            <tr>
                                <td class="align-middle">
                                    <?php echo $row->category_name; ?>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex gap-1">

                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#editCategoryModal<?php echo $row->id_category; ?>">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteCategoryModal<?php echo $row->id_category; ?>">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </div>

                                    <div class="modal fade" id="editCategoryModal<?php echo $row->id_category; ?>"
                                        tabindex="-1" aria-labelledby="labelEdit<?php echo $row->id_category; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title"
                                                        id="labelEdit<?php echo $row->id_category; ?>">
                                                        Edit Kategori</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="<?php echo base_url('category/update') ?>" method="post">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id_category"
                                                            value="<?php echo $row->id_category; ?>">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nama Kategori</label>
                                                            <input type="text" name="category_name" class="form-control"
                                                                value="<?php echo $row->category_name; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-primary">Simpan
                                                            Perubahan</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="deleteCategoryModal<?php echo $row->id_category; ?>"
                                        tabindex="-1" aria-labelledby="labelDelete<?php echo $row->id_category; ?>"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title"
                                                        id="labelDelete<?php echo $row->id_category; ?>">Hapus Data?
                                                    </h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Apakah anda yakin ingin menghapus kategori: <br>
                                                    <strong><?php echo $row->category_name; ?></strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?php echo base_url('category/delete/' . $row->id_category); ?>"
                                                        class="btn btn-danger btn-sm">Ya, Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>