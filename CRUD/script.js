$(document).ready(function () {
    // Load data saat halaman pertama kali dimuat
    loadData();

    function loadData() {
        $.ajax({
            url: 'api.php',
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
            url: 'api.php',
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
                url: 'api.php',
                type: 'POST',
                data: { id: id, action: 'delete' },
                success: function () {
                    // loadData(); // Tidak perlu memuat ulang data karena data dihapus dari tabel secara langsung
                    // Tambahkan kode jika ada yang perlu dilakukan setelah penghapusan
                }
            });
        }
    });
});

document.addEventListener('click', function (e) {
    if (e.target.classList.contains('delete-btn')) {
        var deleteId = e.target.getAttribute('data-id');

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'api.php', true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                // Tambahkan kode untuk reload halaman
                location.reload();
                } else {
                    console.error('Error menghapus data.');
                }
            };
            xhr.send('action=delete&id=' + deleteId);
        // }
    }
});





$(document).ready(function () {
    // ... Kode sebelumnya ...

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
            url: 'api.php',
            type: 'POST',
            data: form.serialize() + '&update_id=' + id,
            dataType: 'json', // Tentukan tipe data yang diharapkan dari respons
            success: function (response) {
                if (response.status === "success") {
                    // Tidak perlu notifikasi
                    // Sembunyikan formulir pengeditan setelah pembaruan
                    $('#edit-form-row-' + id).hide();
    
                    // Me-refresh halaman untuk memuat data terbaru
                    window.location.reload();

                    // Perbarui tampilan dengan data terbaru
                    var updatedRow = $('#data-container').find("[data-id='" + id + "']");
                    updatedRow.find("[data-column='jurusan']").text(response.data.jurusan);
                    updatedRow.find("[data-column='nisn']").text(response.data.nisn);
                    updatedRow.find("[data-column='nama']").text(response.data.nama);
                    updatedRow.find("[data-column='asal_sekolah']").text(response.data.asal_sekolah);
                    updatedRow.find("[data-column='no_hp']").text(response.data.no_hp);
                    updatedRow.find("[data-column='tempat_lahir']").text(response.data.tempat_lahir);
                    updatedRow.find("[data-column='tanggal_lahir']").text(response.data.tanggal_lahir);
    
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
