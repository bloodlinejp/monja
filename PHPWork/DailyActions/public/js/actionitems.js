// action-items View のJQuery

// 登録ボタン押下時のチェックボックス相関チェック
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

// チェックボックスチェック時の動作
$('input[type=checkbox]' + '[name!=index2use]' + '[name!=index3use]').change(function() {
  if ($(this).prop('checked') == true {
    $('.rel').text('');
      $('#action-items-create').removeClass('btn-danger').addClass('btn-primary').text('登録');
  }
});
