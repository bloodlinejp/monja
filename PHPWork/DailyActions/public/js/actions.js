//actions Viewで使用するJS

$(function () {
  $('select[name=date]').change(function() {
    if ($(this).val() != "") {
      window.location.href = "/actions/"+$(this).val()+"/edit";
    }
  })
});
