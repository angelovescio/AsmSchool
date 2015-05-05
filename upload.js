function parse2(document){
    $( "#slideHolder" ).empty();
  $(document).find("ins").each(function(){
     // this is where all the reading and writing will happen
     console.log($(this).text());
     $( ".all-slides" ).append(  "<div class='slide'>"+$(this).text()+"</div>" );

  });
  $('.slide').each(function (i) {
    var item = $(this);
    var item_clone = item.clone();
    item.data('clone', item_clone);
    var position = item.position();
    item_clone.css({
        left: position.left,
        top: position.top,
        visibility: 'hidden'
    }).attr('data-pos', i + 1);
    $('#cloned-slides').append(item_clone);
});
}
function parseXml(xml)
{

}