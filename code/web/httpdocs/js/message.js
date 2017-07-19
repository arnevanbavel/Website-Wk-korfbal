$(window).load(function(){

var timer;

$('#searchform').submit(function() {
  return false;
});

$( "#search-input" ).keyup(function(){
  timer = setTimeout(function(){
    var keyword = $('#search-input').val();

    if (keyword) {
      $.ajax({
              url: 'http://dreamteam.mctantwerpen.kdg.be/search',
              type: "POST",
              data: {
                '_token': $('input[name=_token]').val(),
                  'keyword': keyword
              },
                
              success: function(data){
          $('#search-results').html(data);
              },
              error: function(xhr, status, error){
                console.log(error);
              },
          });

    }
    else{
      $('#search-results').html(null);
    }
  },500)
});

$( "#search-input" ).keydown(function(){
  clearTimeout(timer);
});



  /* READ MESSAGE AJAX */
  $('.item').click(function(){
    var id = $(this).attr('id');
    $('.item').removeClass('selected-message');
    $('#create-message').removeClass('hidden');
    $(this).addClass('selected-message');

    if (id) {
      $.ajax({
        url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/message/'+ id ,
        type: "GET",
        dataType: 'html',
                
        success: function(data){
          $('#message-box').html(data);
        },
        error: function(xhr, status, error){
          console.log(error);
        },
      });
    }
  });

  /* CREATE MESSAGE AJAX */
  $('#create-album-mobile').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/album',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#mediaform').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });


  /* CREATE MESSAGE AJAX */
  $('#create-album').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/album',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#mediaform').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });
  /* CREATE MESSAGE AJAX */
  $('#create-media').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/media',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#mediaform').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

    /* CREATE MESSAGE AJAX */
  $('#create-media-mobile').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/media',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#mediaform').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

  /* CREATE MESSAGE AJAX */
  $('#create-message').click(function(){
    $('.item').removeClass('selected-message');
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/message',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#message-box').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

  /* CREATE TEAM AJAX */
  $('#create-team').click(function(){
    $('.team').removeClass('selected-message');
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/team',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#teambox').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

  /* CREATE EVENT AJAX */
  $('#create-event').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/event',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#editevents').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

  /* CREATE EVENT AJAX */
  $('#create-event-mobile').click(function(){
    $("#create-event-mobile").addClass('hidden');
    $("#create-location-mobile").addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/event',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#editevents').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

  /* CREATE EVENT AJAX */
  $('#create-location').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/location',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#editevents').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

    /* CREATE EVENT AJAX */
  $('#create-location-mobile').click(function(){
    $("#create-location-mobile").addClass('hidden');
    $("#create-event-mobile").addClass('hidden');
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/location',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#editevents').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

  /* CREATE ARTICLE AJAX */
  $('#create-news').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/news',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#editnews').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });

    /* CREATE ARTICLE AJAX */
  $('#create-news-mobile').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/news',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#editnews').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });


  /* CREATE TAG AJAX */
  $('#create-tag').click(function(){
    $(this).addClass('hidden');

    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/tag',
      type: "GET",
      dataType: 'html',
          
      success: function(data){
        $('#tagform').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    }); 
  });


});

/* BIJ INLADEN VAN AJAX ZIJN DE ELEMENTEN NOG NIET GEDECLAREERD -> JAVASCRIPT FUNCTIES */

/* EDIT MESSAGE AJAX */
function message_edit(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/message/'+ id ,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#message-box').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};

function location_edit(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/location/'+ id ,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#editevents').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};

/* EDIT MESSAGE AJAX */
function event_edit(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/event/'+ id ,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#event-list').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};


/* EDIT MESSAGE AJAX */
function album_edit(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/album/'+ id ,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#mediaform').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};


/* EDIT MESSAGE AJAX */
function media_edit(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/media/'+ id ,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#mediaform').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};

/* EDIT MESSAGE AJAX */
function team_edit(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/team/'+ id ,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#teambox').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};


function event_edit(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/event/'+ id ,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#editevents').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};


/* CREATE PLAYER AJAX */
function create_player(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/create/player/'+ id,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#player-form').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};

/* CREATE PLAYER AJAX */
function edit_player(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/player/'+ id,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#player-form').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};

/* CREATE USER AJAX */
function edit_user(id){
  if (id) {
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/user/'+ id,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#player-form').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });
  }
};

function edit_news(id){
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/edit/news/'+id,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#editnews').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });

};

function getTagNews(id){
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/news/tag/'+id,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#tagteam').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });

};

function getTeamNews(id){
    $.ajax({
      url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/news/team/'+id,
      type: "GET",
      dataType: 'html', 
      success: function(data){
        $('#tagteam').html(data);
      },
      error: function(xhr, status, error){
        console.log(error);
      },
    });

};


function firstMessage(id){
     $.ajax({
        url: 'http://dreamteam.mctantwerpen.kdg.be/dashboard/message/'+ id ,
        type: "GET",
        dataType: 'html',
                
        success: function(data){
          $('#message-box').html(data);
        },
        error: function(xhr, status, error){
          console.log(error);
        },
      });
};



