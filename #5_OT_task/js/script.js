window.onload = function () {

insertForm ("main_comment");
insertReplies ($('.comment'));
insertCommentCount();


$('.reply_btn').click(function(e){
  showReplyForm($(event.target).closest('.comment')["0"].attributes[1].value);
  $(".reply_btn").off("click");
});

};
