// action-items Viewで使用するJS

// 未入力チェック
$(function () {
  $('#action-items-create').click(function () {
    if ($('#from').prop('checked') == false &&
      $('#to').prop('checked') == false &&
      $('#text').prop('checked') == false &&
      $('#value').prop('checked') == false &&
      $('#checkbox').prop('checked') == false
    ) {
      $('#action-items-create').text('未選択あり');
      $('#action-items-create').removeClass('btn-primary').addClass('btn-danger');
      $('html,body').animate({scrollTop:$('#from').offset().top});
      return false;
    }
    else {
      $(this).parent.submit();
    }
  })
});
