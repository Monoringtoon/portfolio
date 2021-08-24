$("#btnHtml").click(function() {
    $("#html").toggle();
    $("#btnHtml").toggleClass("active");
  });

$("#btnCss").click(function() {
    $("#css").toggle();
    $("#btnCss").toggleClass("active");
});

$("#btnOutput").click(function() {
    $("#output").toggle();
    $("#btnOutput").toggleClass("active");
});

if($(".codeDiv:visible").length = 1){
    $("#html").toggleClass("resize");
    $("#css").toggleClass("resize");
    $("#output").toggleClass("resize");
}

$("#valueHtml").on("change keyup", function(){
    $("#output").contents().find("html").html("<html><head><style>" + $('#valueCss').val() + "</style></head>" + $("#valueHtml").val() + "</html>")
});

$("#valueCss").on("change keyup", function(){
    $("#output").contents().find("html").html("<html><head><style>" + $('#valueCss').val() + "</style></head>" + $("#valueHtml").val() + "</html>")
});