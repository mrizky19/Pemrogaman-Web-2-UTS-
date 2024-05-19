$(document).ready(function () {
  // hilangkan tombol cari
  $('#tombol-cari').hide();

  // event ketika keyword di ketik
  $('#keyword').on('keyup', function () {
    //   munculkakan loading
    $('.load').show();
    // ajax menggunakan load
    // $('#container').load('ajax/anime.php?keyword=' + $('#keyword').val());
    // ajax menggunakan get
    $.get('ajax/search.php?keyword=' + $('#keyword').val(), function (data) {
      $('#container').html(data);
      $('.load').hide();
    });
  });
});
