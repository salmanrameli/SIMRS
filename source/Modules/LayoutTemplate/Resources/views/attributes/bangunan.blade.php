<script>
    $("#manajemen_staff_jabatan").removeAttr("class", "sidebar-active");
    $("#manajemen_data_pasien").removeAttr("class", "sidebar-active");
    $("#pengaturan_rumah_sakit").attr("class", "sidebar-active");
    $("#pengaturan_akun").removeAttr("class", "sidebar-active");
</script>

<script>
    $('#beranda').removeAttr("class", "active").attr("class", "nav-link");
    $('#manajemen_staff_jabatan').removeAttr("class", "active").attr("class", "nav-link");
    $('#manajemen_data_pasien').removeAttr("class", "active").attr("class", "nav-link");
    $('#manajemen_dokter').removeAttr("class", "active").attr("class", "nav-link");
    $('#pengaturan_rumah_sakit').attr("class", "nav-link active");
</script>