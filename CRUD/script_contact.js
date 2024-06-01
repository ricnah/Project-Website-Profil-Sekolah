$(document).ready(function () {
    // Load data saat halaman pertama kali dimuat
    loadData();

    function loadData() {
        $.ajax({
            url: 'api_contact.php',
            type: 'GET',
            success: function (data) {
                $('#data-container').html(data);
            }
        });
    }

    // Tambah data
    $(document).on('submit', '#add-form', function (e) {
        e.preventDefault();
        $.ajax({
            url: 'api_contact.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function () {
                loadData();
                $('#add-form')[0].reset();
            }
        });
    });

    // Hapus data
    $(document).on('click', '.delete-btn', function () {
        var id = $(this).data('id');
        if (confirm('Apakah Anda yakin ingin menghapus rekaman ini?')) {
            $.ajax({
                url: 'api_contact.php',
                type: 'POST',
                data: { id: id, action: 'delete' },
                success: function () {
                    location.reload(); // Reload halaman setelah penghapusan data
                }
            });
        }
    });

    // Tampilkan Formulir Pengeditan
    $(document).on('click', '.update-btn', function () {
        var id = $(this).data('id');
        $('.edit-form-row').hide();
        $('#edit-form-row-' + id).show();
    });

    // Kirim Permintaan Pembaruan Data
    $(document).on('submit', '.edit-form', function (e) {
        e.preventDefault();
        var id = $(this).data('id');
        var form = $(this); // Simpan referensi formulir
        $.ajax({
            url: 'api_contact.php',
            type: 'POST',
            data: form.serialize() + '&update_id=' + id,
            dataType: 'json', // Tentukan tipe data yang diharapkan dari respons
            success: function (response) {
                if (response.status === "success") {
                    // Sembunyikan formulir pengeditan setelah pembaruan
                    $('#edit-form-row-' + id).hide();

                    // Me-refresh halaman untuk memuat data terbaru
                    location.reload();

                    // Perbarui tampilan dengan data terbaru
                    var updatedRow = $('#data-container').find("[data-id='" + id + "']");
                    updatedRow.find("[data-column='name']").text(response.data.name);
                    updatedRow.find("[data-column='email']").text(response.data.email);
                    updatedRow.find("[data-column='message']").text(response.data.message);

                    // Munculkan kembali formulir pengeditan untuk pembaruan selanjutnya
                    $('#edit-form-row-' + id).show();
                } else {
                    alert("Error memperbarui data: " + response.message);
                }
            }
        });
    });

    // Batalkan Pembaruan
    $(document).on('click', '.cancel-btn', function () {
        var id = $(this).data('id');
        // Sembunyikan formulir pengeditan tanpa mengirim permintaan ke server
        $('#edit-form-row-' + id).hide();
    });
});
