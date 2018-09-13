//actions Viewで使用するJS

//日付select変更時に起動
$(function () {
  $('select[name=date]').change(function() {
    if ($(this).val() != "") {
      window.location.href = "/actions/"+$(this).val()+"/edit";
    }
  })
});
