$(document).ready(function() {
  $('#settlement-filter').change(function() {
    $('.row').hide();
    $('.row[data-settlement="' + $(this).val() + '"]').show();
    
  })
  
  $('#topic-filter').change(function() {
    $('.row').hide();
    $('.row[data-topic="' + $(this).val() + '"]').show();
    
  })
})