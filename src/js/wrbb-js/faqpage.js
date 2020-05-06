jQuery( "#question" ).click(function() {
  console.log("hi");
  let id = jQuery( this ).attr("id");
  let x = jQuery( '.answer#' + id);
  let dis = x.css("display");
  if (dis === "none") {
    x.css("display", "block");
  } else {
    x.css("display", "none");
  }
});