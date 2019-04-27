$('input').each(function(){
    
    if($(this).attr('required') === 'required'){
        $(this).after('<span class="Asterak">*</span>')
    }
});

// convert password filed to text filed

var passFiled = $('.password');

$('.show-pass').haver(function(){
    passFiled.attr('type','text');
    
},function(){
    passFiled.attr('type','password');
});

//confirmation message on button

$(.'confirm').click(function(){
   return confirm('Are you sure?');
});