var form = '<!-- inputs (Name and Email) -->'+
            '<div class="form-group row">'+
              '<strong class="col-sm-2 col-form-label text-center">Email*</strong>'+
                '<div class="col-sm-3">'+
                  '<input type="email" class="form-control" placeholder="Email" id="email">'+
                '</div>'+
              '<strong class="col-sm-2 col-form-label text-center">Name*</strong>'+
              '<div class="col">'+
                '<input type="email" class="form-control" placeholder="Name" id="name">'+
              '</div>'+
            '</div>'+
            '<!-- textarea -->'+
            '<div class="form-group row">'+
              '<strong class="col-sm-2 col-form-label text-center">Comment*</strong>'+
              '<div class="col">'+
                '<textarea rows="4" type="text" class="form-control" placeholder="Comment" id="comment"></textarea>'+
              '</div>'+
            '</div>';
var button = '<div class="row">'+
              '<div class="col-sm-2"></div>'+
                '<div class="col">'+
                  '<button type="submit" class="btn btn-secondary">Submit</button>'+
                '</div>'+
              '</div>';


function addCommentToDom (id, date, obj) {
  var comment = '<div class="row justify-content-sm-center comment" comment_id="'+id+'">'+
                                      '<div class="col-sm-12 comment-area mt-3">'+
                                          '<div class="p-1" style="width: 100%">'+
                                            '<strong class="name">'+obj.name+'</strong>'+
                                            '<span class="ml-2 date">'+date+'</span>'+
                                            '<span class="float-right mr-3 reply_btn">'+
                                              '<img class="mr-1" src="./svg/reply.svg" alt="reply_icon">'+
                                                'Reply'+
                                            '</span>'+
                                          '</div>'+
                                        '<p class="comment_place">'+obj.comment+'</p>'+
                                      '</div>'+
                                     '</div>';
    return comment;
}

function addReplyToDom (name, comment, date){
  var reply = '<div class="row justify-content-end reply">'+
                '<div class="col-sm-10 comment-area mt-3">'+
                    '<div class="p-1">'+
                      '<strong>'+name+'</strong>'+
                      '<span class="ml-2">'+date+'</span>'+
                    '</div>'+
                    '<p>'+comment+'</p>'+
                  '</div>'+
                '</div>';
  return reply;
}
