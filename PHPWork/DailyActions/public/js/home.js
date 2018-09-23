// home のJQuery

// 登録ボタン押下時のテキストボックス相関チェック
$(function () {
  $('#btn-users-update').click(function () {
    if ($('#name').val() == '' &&
      $('#email').val()== '' &&
      $('#newpassword').val() == ''
    ) {
      $('input').addClass('is-invalid');
      $('.errmsg').html("<strong>何れかの項目の変更が必要です</strong>");
      $('#btn-users-update').removeClass('btn-primary').addClass('btn-danger');
      $('html,body').animate({scrollTop:$('#name').offset().top});
      return false;
    }
  })
});

// テキストボックス変更時の動作
$('input').change(function() {
  if ($(this).val() !== '') {
    $('.invalid-feedback').text('');
    $('input').removeClass('is-invalid');
    $('#btn-users-update').removeClass('btn-danger').addClass('btn-primary');
  }
});

// email 入力時の動作
$('#email').change(function() {
  if ($(this).val() !== '') {
    $('#email-confirm').prop('disabled', false);
  } else {
    $('#email-confirm').prop('disabled', true);
  }
});

// email 入力時の動作
$('#newpassword').change(function() {
  if ($(this).val() !== '') {
    $('#newpassword-confirm').prop('disabled', false);
  } else {
    $('#newpassword-confirm').prop('disabled', true);
  }
});
