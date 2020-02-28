jQuery(function($){
  $('.btn_show-more').click(function(){
    const button = $(this),
      data = {
        'action': 'loadmore',
        'query': loadmore_params.posts,
        'page' : loadmore_params.current_page
      };

    $.post({
      url : loadmore_params.ajaxurl, // AJAX handler
      data : data,
      type : 'POST',
      beforeSend : function ( xhr ) {
        button.text('Loading...'); // button text
      },
      success : function( data ){
        if( data ) {
          $('.grid_posts').append(data); // insert new posts
          loadmore_params.current_page++;

          if ( loadmore_params.current_page == loadmore_params.max_page )
            button.remove(); // if last page, remove the button
        } else {
          button.remove(); // if no data, remove the button as well
        }
      }
    });
  });
});