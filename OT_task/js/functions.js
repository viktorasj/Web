function insertCommentCount() {
  var request = new XMLHttpRequest();
  var formData = new FormData();
  formData.append('request_type', "get comment count");
  request.open('post', './php/controller.php', true);
  request.send(formData);
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      $('#number_of_comments').text(request.responseText);
      console.log($('#number_of_comments')["0"].innerHTML);
    }
  };
}

function insertReplies(allComments) {
  var request = new XMLHttpRequest();
  var formData = new FormData();
  formData.append('request_type', "get all replies");
  request.open('post', './php/controller.php', true);
  request.send(formData);
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      var allReplies = JSON.parse(request.responseText);
      for (var i = 0; i < allComments.length; i++) {
        for (var j = 0; j < allReplies.length; j++) {
          if (allReplies[j].belongs_to === allComments[i].getAttribute('comment_id')) {
            $('.comment[comment_id="' + allComments[i].getAttribute('comment_id') + '"]').after(addReplyToDom(allReplies[j].name, allReplies[j].comment, allReplies[j].date));
          }
        }
      }
    }
  };
}


function insertForm(formType, comment_id) {
  if (formType === "main_comment") {
    $('.main_comment_form').show(1000);
    $('.main_comment_form').append(form);
    $('.main_comment_form').append(button);
    $('button').attr('id', 'main_comment_submit');
    $('button#main_comment_submit').click(function() {
      addCommentToDbAndDom();
    });
  }
  if (formType === "reply_comment") {
    $('.comment[comment_id="' + comment_id + '"]').after('<div class="mt-2 p-5 reply_comment_form"></div>');
    $('.reply_comment_form').append(form);
    $('.reply_comment_form').append(button);
    $('button').attr('id', 'reply_comment_submit');
    $('button').text('Reply');
  }
}



function addCommentToDbAndDom() {
  var collected_data = {
    email: $('#email').val(),
    name: $('#name').val(),
    comment: $('#comment').val(),
  };
  var request = new XMLHttpRequest();
  var formData = new FormData();
  $.each(collected_data, function(key, value) {
    formData.append(key, value);
  });
  formData.append('request_type', "add comment");
  request.open('post', './php/controller.php', true);
  request.send(formData);
  request.onreadystatechange = function() {
    if (request.readyState == 4 && request.status == 200) {
      var returned_comment = JSON.parse(request.responseText);
      console.log(returned_comment);
      if (returned_comment.error_msg !== "false") {
        alert(returned_comment.error_msg);
        return;
      }
      $('#comments').prepend(addCommentToDom(returned_comment.id, returned_comment.date, collected_data));
      clearImputFields();
      updateCommentNr();
      $('.reply_btn').click(function(e) {
        showReplyForm($(event.target).closest('.comment')["0"].attributes[1].value);
        $(".reply_btn").off("click");
      });
    }
  };
}

function showReplyForm(comment_id) {
  $('.main_comment_form').hide(1000, function() {
    $(this).empty();
  });
  insertForm("reply_comment", comment_id);
  $('button#reply_comment_submit').click(function() {
    addReplyToDbAndDom(comment_id);
  });
}

function addReplyToDbAndDom(comment_id) {
  var collected_data = {
    email: $('#email').val(),
    name: $('#name').val(),
    comment: $('#comment').val(),
  };
  var request = new XMLHttpRequest();
  var formData = new FormData();
  $.each(collected_data, function(key, value) {
    formData.append(key, value);
  });
  formData.append('request_type', "add reply");
  formData.append('belongs_to_id', comment_id);
  request.open('post', './php/controller.php', true);
  request.send(formData);
  request.onreadystatechange = function() {

    if (request.readyState == 4 && request.status == 200) {
      var returned_reply = JSON.parse(request.responseText);
      if (returned_reply.error_msg !== "false") {
        alert(returned_reply.error_msg);
        return;
      }
      $('.comment[comment_id="' + comment_id + '"]').after(addReplyToDom(collected_data.name, collected_data.comment, returned_reply.date));
      $('.reply_comment_form').css({
        'transform': 'scale(3, 3)',
        'opacity': '0'
      });
      $('.reply_comment_form').hide(2000, function() {
        $(this).remove();
      });
      insertForm("main_comment");
      updateCommentNr();
      $('.reply_btn').click(function(e) {
        showReplyForm($(event.target).closest('.comment')["0"].attributes[1].value);
        $(".reply_btn").off("click");
      });
    }
  };
}

function clearImputFields() {
  $('.main_comment_form input').val('');
  $('.main_comment_form textarea').val('');
}

function updateCommentNr() {
  var cmtcount = document.getElementById('number_of_comments').innerHTML;
  $('#number_of_comments').text(Number(cmtcount) + 1);
}
