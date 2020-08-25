

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

deleteComment = function (e) {
    let result = confirm('刪除留言?');

    let action = $(e.currentTarget).data('action');
    let comment = $(e.currentTarget).closest('.media');
    if (result) {
       $.post(action, {
          _method: 'delete',         
       }).done(function (data) {
           comment.remove();
       }); 
    }
};
