$(document).ready(function() {
  $.expr[":"].contains = $.expr.createPseudo(function(arg) {
    return function( elem ) {
        return $(elem).text().toUpperCase().indexOf(arg.toUpperCase()) >= 0;
    };
  });
  
  var s1, s2;
  $('#settlement-filter').change(function() {
    s1 = $(this).val();
    search(s1, s2);    
  })
  
  $('#topic-filter').change(function() {
    s2 = $(this).val();
    search(s1, s2);
  })
  
  $('#keyword').keyup(function(event) {
    if ($(this).val() != '') {
      $('.row').hide();
      $('.row:contains("' + $(this).val() + '")').show();
    }
    
  });
  
  
  
  function search(s1, s2) {
    console.log(s1 + ':' + s2);
    $('.row').hide();
    if (s1 != 'város' && s1 != undefined && s2 != 0 && s2 != undefined) {
      $('.row[data-settlement="' + s1 + '"][data-topic="' + s2 + '"]').show();
      console.log(1);
    } else if (s1 != 'város' && s1 != undefined) {
      $('.row[data-settlement="' + s1 + '"]').show();
      console.log(2);
    } else if (s2 != 0 && s2 != undefined) {
      $('.row[data-topic="' + s2 + '"]').show();
      console.log(3);
    } else {
      $('.row').show();
    }
    
    
  }
  
  $('.reporter .summary').each(function() {
    limit = 14;
    words = new Array();
    words = $(this).html().split(' ');
    if (words.length > limit) {
      
      pre = '';
      for (c = 0; c < limit; c++) {
        pre+=words[c] + ' ';
      }
      post = '';
      for (c = limit; c < words.length; c++) {
        post+= words[c] + ' ';
      }
      $(this).html('<span class="pre">' + pre + '</span><span class="opener">▼</span><span class="post">' + post + '</span><span class="closer">▲</span>');
      $('.closer, .post', this).hide();
      $('.opener, .closer').css('cursor', 'pointer');
    }
  });
  
  $('.reporter .opener').click(function() {
    $(this).hide();
    $(this).parent().find('.post').slideToggle();
    $(this).parent().find('.closer').show();
  })
  
  $('.reporter .closer').click(function() {
    $(this).hide();
    $(this).parent().find('.post').slideToggle(400, function() {
      $(this).parent().find('.opener').show();
    });
    
  })
  
  
  //dropdown menu
  
  $('ul#menu li.submenu').hover(function() {
    $('ul', this).show();
  },
  function() {
    $('ul', this).hide();
  })
  
  
  //slider
  $('#slider').bjqs({
      'height' : 320,
      'width' : 820,
      'responsive' : true,
      animtype : 'fade', // accepts 'fade' or 'slide'
      animduration : 450, // how fast the animation are
      animspeed : 8000, // the delay between each slide
      automatic : true, // automatic
  });

  function splitText($text, $maxLength)
  {
      /* Make sure that the string will not be longer
         than $maxLength.
       */
      if(strlen($text) > $maxLength)
      {
          /* Trim the text to $maxLength characters */
          $text = substr($text, 0, $maxLength - 1);
   
          /* Split words only at boundaries. This will be
             accomplished by moving back each character from
             the end of the split string until a space is found.
           */
          while(substr($text,-1) != ' ')
          {
              $text = substr($text, 0, -1);
          }
   
          /* Remove the whitespace at the end. */
          $text = rtrim($text);
      }
      return $text;
  } 
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
})

