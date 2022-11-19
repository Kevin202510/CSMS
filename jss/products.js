
$(document).ready(function(){
    $("body").on('click','#update',function(e){
        alert($(e.currentTarget).data("index"));
    });
});