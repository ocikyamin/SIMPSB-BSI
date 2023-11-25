<div class="modal fade" id="modal-foto">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><i class="fas fa-cloud-upload-alt"></i> Foto Calon Santri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="upload-form" method="post" action="<?= base_url('uploads/upload-foto-student'); ?>"
                enctype="multipart/form-data">
                <div class="modal-body text-sm">
                    <!-- Form  -->
                    <?= csrf_field() ?>
                    <input type="hidden" name="id" value="<?= $old->id ?>">
                    <input type="hidden" name="old_image_name" value="<?= $old->foto ?>">
                    <div class="form-group bg-light p-3 shadow-sm" style="border: 2px dotted; border-radius: 10px;">
                        <label for="image">Pilih Foto (JPG, PNG)</label>
                        <input type="file" name="image" id="image" accept="image/jpeg, image/png">
                    </div>

                    <!-- Tambahkan elemen <img> untuk menampilkan preview gambar -->
                    <div class="text-center">
                        <img id="image-preview" class="profile-user-img img-fluid img-circle" src="#" alt="Preview"
                            style="width: 300px;height:300px; display: none;">
                    </div>

                    <div class="progress mt-2" style="display: none;">
                        <div class="progress-bar" id="upload-progress" role="progressbar" style="width: 0%;"
                            aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                    </div>
                    <div id="response"></div>
                    <p>
                        Syarat dan ketentuan Foto :
                    <ol>
                        <li> Baju ananda harus formal, khusus putri wajib menggunakan jilbab.</li>
                        <li> Posisi Bahu dan Dagu Tegak mengahadap kedepan</li>
                        <li> Pose foto formal seperti saat membuat pas foto</li>
                        <li> Wajah harus memenuhi setidaknya 1/3 dari frame foto</li>
                    </ol>
                    </p>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger shadow-sm" id="reset-preview" style="display: none;"><i
                            class="fas fa-sync-alt me-3"></i> Reset</button>
                    <!-- <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button> -->
                    <button type="submit" class="btn btn-dafult bg-teal shadow-sm" id="upload-btn"><i
                            class="fas fa-cloud-upload-alt"></i> Upload</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Tambahkan event handler untuk priview gambar dan tombol reset -->
<script>
$(document).ready(function() {
    // Fungsi untuk menampilkan priview gambar
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result).show();
                $('#reset-preview').show(); // Menampilkan tombol reset
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Event handler saat perubahan pada input file
    $('#image').change(function() {
        readURL(this);
    });

    // Fungsi untuk mereset priview gambar
    function resetPreview() {
        $('#image-preview').attr('src', '').hide();
        $('#reset-preview').hide(); // Sembunyikan tombol reset
        $('#image').val(''); // Kosongkan nilai input file
    }

    // Event handler untuk tombol reset
    $('#reset-preview').click(function() {
        resetPreview();
    });
});
</script>

<!-- /.modal -->

<script>
$(document).ready(function() {
    $("#upload-form").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: $(this).attr('action'),
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            xhr: function() {
                var xhr = new window.XMLHttpRequest();
                xhr.upload.addEventListener("progress", function(evt) {
                    if (evt.lengthComputable) {
                        var percentComplete = (evt.loaded / evt.total) * 100;
                        $("#upload-progress").width(percentComplete + "%");
                        $("#upload-progress").text(percentComplete.toFixed(2) +
                            '%');
                    }
                }, false);
                return xhr;
            },
            beforeSend: function() {
                $('#upload-btn').prop('disabled', true);
                $('#upload-btn').html(
                    `<i class="fa fa-spin fa-spinner"></i>`
                );
            },
            complete: function() {
                // $('#upload-btn').show();
                $('#upload-btn').prop('disabled', false);
                $('#upload-btn').html(`<i
                            class="fas fa-cloud-upload-alt"></i> Upload`);
            },
            success: function(response) {
                if (response.success) {
                    // $("#response").html('<div class="alert alert-success">' + response
                    //     .success + '</div>');
                    Swal.fire({
                        // position: 'top-end',
                        icon: 'success',
                        title: 'Sukses',
                        text: response.success,
                        showConfirmButton: false,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload()
                    })



                    $("#upload-form")[0].reset();
                    $(".progress").hide();
                } else if (response.error) {
                    // $("#response").html('<div class="alert alert-danger">' + response.error
                    //     .image + '</div>');

                    Swal.fire({
                        // position: 'top-end',
                        icon: 'error',
                        title: 'Gagal',
                        text: response.error.image,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        });

        $(".progress").show();
    });
});
</script>