//action-items Viewで使用するJS
$(function () {
  $("#action-items-create").click(function () {
    if ($("#from").prop("checked") == false &&
      $("#to").prop("checked") == false &&
      $("#text").prop("checked") == false &&
      $("#value").prop("checked") == false &&
      $("#checkbox").prop("checked") == false
    ) {
      $("#action-items-create").text("チェックされていません");
    }
  })
});
