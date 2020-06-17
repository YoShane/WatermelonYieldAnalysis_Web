jQuery(document).ready(function($) {
  "use strict";

  //Contact
  $('form.php-email-form').submit(function() {
   
    var formData = new FormData($("#uploadForm")[0]);
    var input = document.getElementById('upload');
    var fileName = input.files[0].name;

    var this_form = $(this);
    var action = $(this).attr('action');

    this_form.find('.loading').slideDown();
    this_form.find('.sent-message').slideUp();
    this_form.find('.error-message').slideUp();
    
    $.ajax({
      type: "POST",
      url: action,
      data: formData,
      cache: false, 
      contentType: false, 
      processData: false, 
      success: function(msg) {
        var newArray = new Array();
　      var newArray = msg.split("_");
        if (newArray[0] == 'ok') {
          this_form.find('.loading').slideUp();
          this_form.find('.sent-message').slideDown();

          $('#output_img').attr('src','http://163.18.42.219:5000/pic/output_'+newArray[5]+'_'+fileName);
          $('#model').modal('show');
          $('#count').text('Amount：'+ newArray[1]);
          $('#price').text('Market value：NTD$ '+ newArray[2]);
          $('#processTime').text('Picture recognition time：'+newArray[3]+ ' sec.');
          $('#totalProcessTime').text('Total process time：'+newArray[4]+ ' sec.');

          $("#list").first().children().remove();
          $('<div class="media text-muted pt-3" id="list"><img src="http://163.18.42.219:5000/pic/output_'+newArray[5]+'_'+fileName+'" alt="" class="mr-2 rounded img-fluid"><p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray"><strong class="d-block text-gray-dark">Amount：'+newArray[1]+'</strong><span id="priceList">NTD$ '+newArray[2]+' </span><br><span id="recTimeList">Recognition time: '+newArray[3]+'</span><br><span id="totalTimeList">Process Time: '+newArray[4]+'</span ></div>').prependTo('#showNew');
          $("#list .mr-2.rounded.img-fluid").last().click(function() {
            $('#model').modal('show');
          });
          
        } else {
          this_form.find('.loading').slideUp();
          this_form.find('.error-message').slideDown().html(msg);
        }
      }, 
      error: function() {
        this_form.find('.loading').slideUp();
        this_form.find('.error-message').slideDown().html('Upload error');
      }
    });
    return false;
  });

});
