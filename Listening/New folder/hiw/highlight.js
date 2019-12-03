
var sentence = $('.sentence').html().split(/\s+/),    
    result = []; 

for( var i = 0; i < sentence.length; i++ ) {
    result[i] = '<span>' + sentence[i] + '</span>';
}

$('.sentence').html(result.join(' '));

$('.sentence').on('click', 'span', function(){
	$(this).toggleClass('highlight');
}); 

    
  
    
  
    
  