jQuery(document).ready(function($){
  
  $('.commentlist li').each(function(i){
    $(this).find('div.commentNumber').text('# ' + (i+1));
  });

  $('#commentform').on('click', '#submit', function(e){
    e.preventDefault();

    let comParent = $(this);

    $('.wrap_result').css('color','green').text('Сохранение комментария...').fadeIn(500,function(){
      let data = $('#commentform').serializeArray();
      
      $.ajax({
        url: $('#commentform').attr('action'),
        data: data,
        headers:{'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'POST',
        datatype: 'JSON',
        success: function(data){
          if(data.error){
            $('.wrap_result').css('color','red').append('<br><strong>Ошибка:</strong>' + data.error.join('<br>'));
            $('.wrap_result').delay(2000).fadeOut(500);
          }else if(data.success){
            $('.wrap_result').append('<br><strong>Сохранено!</strong>').delay(1000).fadeOut(500,function(){
              if(data.data.parent_id > 0){
                comParent.parents('div#respond').prev().after('<ul class="children">' + data.comment + '</ul>');
              }else{
                if($.contains('#comments','ol.commentlist')){
                  $('ol.commentlist').append(data.comment);
                }else{
                  $('#respond').before('<ol class="commentlist group">' + data.comment + '</ol>');
                }
              }
              $('#cancel-comment-reply-link').click();
            });
          }
        },
        error: function(){
          $('.wrap_result').css('color','red').append('<br><strong>Ошибка:</strong>');
          $('.wrap_result').delay(2000).fadeOut(500,function(){
            $('#cancel-comment-reply-link').click();
          });
        }
      });

    });
  });
});