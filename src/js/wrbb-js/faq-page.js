jQuery( ".faq-question" ).click(function(e) {
  // Don't close the question per the selector below
  e.stopPropagation();

  let qNumber = jQuery(this).attr("class").split(' ')[1];
  let answer = jQuery(".faq-answer." + qNumber);

  if (answer.css("opacity") === 0) {
    jQuery(this).toggleClass("faq-open");
    answer.toggleClass("faq-open");
  } else {
    jQuery(this).toggleClass("faq-open");
    answer.toggleClass("faq-open");
  }
})

// Close the FAQ answer when the user clicks outside of it
jQuery(document).click(function () {
  jQuery(".faq-question").removeClass("faq-open");
  jQuery(".faq-answer").removeClass("faq-open");
})
// Don't close the answer when the user clicks inside of it
jQuery(".faq-answer").click(function (e) {
  e.stopPropagation();
})