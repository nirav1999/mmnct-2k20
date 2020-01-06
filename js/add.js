$(document).ready(function(){

	var elem=$(".blink");
    setInterval(function() {
        if (elem.css('visibility') == 'hidden') {
            elem.css('visibility', 'visible');
        } else {
            elem.css('visibility', 'hidden');
        }    
    }, 500);


   $("#img2").hover(function(){
       
        var src = ($(this).attr('src') == 'img/mmnct_logo2.png')
            ? 'img/mmnct_logo1.png'
            : 'img/mmnct_logo2.png';
        
        $(this).attr('src', src);

        return false;
    });
});