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
  
  //dropdown menu
  
  $('ul#menu li.submenu').hover(function() {
    $('ul', this).show();
  },
  function() {
    $('ul', this).hide();
  })
})

