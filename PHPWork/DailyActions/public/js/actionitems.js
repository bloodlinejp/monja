// action-items View のJQuery

// 登録ボタン押下時のチェックボックス相関チェック
$(function () {
  $('#btn-action-items-create').click(function () {
    if ($('#from').prop('checked') == false &&
      $('#to').prop('checked') == false &&
      $('#text').prop('checked') == false &&
      $('#value').prop('checked') == false &&
      $('#checkbox').prop('checked') == false
    ) {
      $('.msg').text("いずれかをチェック（複数可）");
      $('#btn-action-items-create').removeClass('btn-primary').addClass('btn-danger').text('未選択');
      $('html,body').animate({scrollTop:$('#from').offset().top});
      return false;
    }
  })
});

// チェックボックスチェック時の動作
$('input[type=checkbox][name!="index2use"][name!="index3use"]').change(function() {
  if ($(this).prop('checked') == true) {
    $('.msg').text('');
    $('#btn-action-items-create').removeClass('btn-danger').addClass('btn-primary').text('登録');
  }
});

// 中見出し文言使用チェック時の動作
$('#index2use').change(function() {
  if ($(this).prop('checked') == true) {
    $('#index2text').prop('disabled', false);
  } else {
    $('#index2text').prop('disabled', true);
  }
});

// 小見出し使用チェック時の動作
$('#index3use').change(function() {
  if ($(this).prop('checked') == true) {
    $('#index3text').prop('disabled', false);
  } else {
    $('#index3text').prop('disabled', true);
  }
});

// 文字入力チェック時の動作
$('#text').change(function() {
  if ($(this).prop('checked') == true) {
    $('#lines').prop('disabled', false);
  } else {
    $('#lines').prop('disabled', true);
  }
});

// 数値入力チェック時の動作
$('#value').change(function() {
  if ($(this).prop('checked') == true) {
    $('#unit').prop('disabled', false);
  } else {
    $('#unit').prop('disabled', true);
  }
});


