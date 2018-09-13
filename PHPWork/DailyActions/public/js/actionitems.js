// action-items Viewで使用するJS

// 登録ボタン押下時の未入力相関チェック
$(function () {
  $('#action-items-create').click(function () {
    if ($('#from').prop('checked') == false &&
      $('#to').prop('checked') == false &&
      $('#text').prop('checked') == false &&
      $('#value').prop('checked') == false &&
      $('#checkbox').prop('checked') == false
    ) {
      $('.rel').text('いずれか（複数可）をチェック');
      $('#action-items-create').removeClass('btn-primary').addClass('btn-danger').text('未選択');
      $('html,body').animate({scrollTop:$('#from').offset().top});
      return false;
    }
  })
});

// チェックされた場合の動作
$('input[type=checkbox]').change(function() {
  if ($(this).prop('checked')) {
    $('.rel').text('');
      $('#action-items-create').removeClass('btn-danger').addClass('btn-primary').text('登録');
  }
});
