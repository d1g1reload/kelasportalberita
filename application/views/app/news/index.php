<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="col-md-3">
                    <a href="<?php echo base_url('news/create') ?>" class="btn btn-primary">+ Berita</a>
                </div>
                <h3 class="mt-3">Data Berita</h3>
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
                                <th>Kategori</th>
                                <th>Judul</th>
                                <th style="width: 200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($news)) : ?>
                            <tr>
                                <td colspan="2" class="text-center p-4">
                                    <div class="alert alert-warning mb-0" role="alert">
                                        <i class="fas fa-exclamation-triangle me-2"></i> Belum ada data berita yang
                                        tersedia.
                                    </div>
                                </td>
                            </tr>
                            <?php else : ?>
                            <?php foreach ($news as $row) : ?>
                            <tr>
                                <td class="align-middle">
                                    <?php echo $row->category_name; ?>
                                </td>
                                <td class="align-middle">
                                    <?php echo $row->title; ?>
                                </td>
                                <td class="align-middle">
                                    <div class="d-flex gap-1">

                                        <a href="<?php echo base_url('news/edit/'.$row->id_news) ?>"
                                            class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteNewsModal<?php echo $row->id_news; ?>">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </div>
                                    <div class="modal fade" id="deleteNewsModal<?php echo $row->id_news; ?>"
                                        tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header bg-danger text-white">
                                                    <h5 class="modal-title fs-6">Hapus Berita?</h5>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <p class="mb-0">Apakah Anda yakin ingin menghapus berita:</p>
                                                    <p class="fw-bold text-danger">"<?php echo $row->title; ?>"</p>
                                                    <small class="text-muted">Tindakan ini tidak dapat dibatalkan dan
                                                        gambar akan dihapus permanen.</small>
                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <a href="<?php echo base_url('news/delete/' . $row->id_news); ?>"
                                                        class="btn btn-danger btn-sm">
                                                        Ya, Hapus Permanen
                                                    </a>
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