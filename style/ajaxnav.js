				$(function() {
                             
                                           	$("#user_profile").dialog({
			                          autoOpen: false,
						  height: 300,
						  width: 400,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						
						  });
						  
						  $("#division").dialog({
			                          autoOpen: false,
						  height: 150,
						  width: 300,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						
						  });
						  
						  $("#camera").dialog({
			                          autoOpen: false,
						  height: 300,
						  width: 350,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						
						  });
						  
						 $('#add_div')
			                          .button()
			                          .click(function() {
				                  $('#division').dialog('open');
		                                 });
						  
						   $("#position").dialog({
			                          autoOpen: false,
						  height: 150,
						  width: 300,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						
						  });
						  
						   $("#location").dialog({
			                          autoOpen: false,
						  height: 150,
						  width: 300,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						
						  });
						  
						 $('#add_pos')
			                          .button()
			                          .click(function() {
				                  $('#position').dialog('open');
		                                 }); 
		                                 
		                 $('#add_lok')
			                          .button()
			                          .click(function() {
				                  $('#location').dialog('open');
		                                 }); 
		                                 
		                  $('#add_cam')
			                          .button()
			                          .click(function() {
				                  $('#camera').dialog('open');
		                                 }); 
		                                 
						    $("#user").dialog({
			                          autoOpen: false,
						  height: 350,
						  width: 350,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						
						  });
						  
						 $('#add_user')
			                          .button()
			                          .click(function() {
				                  $('#user').dialog('open');
		                                 }); 
						 
						 $('#edit-profile')
			                          .button()
			                          .click(function() {
				                  $('#user_profile').dialog('open');
		                                 });
		                                 
		                                 $("#user_pass").dialog({
			                          autoOpen: false,
						  height: 220,
						  width: 350,
						  show: 'puff',
						  hide: 'explode',
						  draggable: false,
						  resizable: false,
						  modal: true
						  });
						 
						  
						 $('#edit-pass')
			                          .button()
			                          .click(function() {
				                  $('#user_pass').dialog('open');
		                                 });
		                                 
		                                 $('#profile')
			                          .button()
			                          .click(function() {
				                   $("#form-profile").submit();
		                                 });
		                                 
		                        $('#pass')
			                          .button()
			                          .click(function() {
				                   $("#form-profile").submit();
		                                 });
						 
						  $('#divisi')
			                          .button()
			                          .click(function() {
				                   $("#form-divis").submit();
		                                 });
						 
						 $('#useradd')
			                          .button()
			                          .click(function() {
				                   $("#form-user").submit();
		                                 });
		                                 
		                   $('#lokadd')
			                          .button()
			                          .click(function() {
				                   $("#form-lok").submit();
		                                 });
		                   $('#camadd')
			                          .button()
			                          .click(function() {
				                   $("#form-cam").submit();
		                                 });
						 
						  $('#jabatan')
			                          .button()
			                          .click(function() {
				                   $("#form-jabatan").submit();
		                                 });
		                                 
		                   $( "#accordion" ).accordion({
						      autoHeight: false,
						      navigation: true
						  });
		                    
		                               });
					       
$(function (){
        $('a.edit_user').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 350,
		      width: 350,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      modal: true,
		      title: title,	  
		      buttons : {
	"Edit" : function(){
		    $("#edit_user").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    

 $(function (){
        $('a.delete_user').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div class="delete" style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 350,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,		  
		      modal: true,
		      buttons : {
	"Delete" : function(){
		    $("#del_user").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }

		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
       
 
    $(function (){
        $('a.edit_div').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 200,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		      buttons : {
	"Edit" : function(){
		    $("#editdiv").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    
    $(function (){
        $('a.edit_lok').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 250,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		      buttons : {
	"Edit" : function(){
		    $("#edit_lok").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    
$(function (){
        $('a.delete_lok').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 250,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		      buttons : {
	"Edit" : function(){
		    $("#dellok").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
        
$(function (){
        $('a.delete_cam').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 400,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		      buttons : {
	"Delete" : function(){
		    $("#delcam").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    
$(function (){
        $('a.start_cam').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 400,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		      buttons : {
	"Start" : function(){
		    $("#startcam").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    
 $(function (){
        $('a.start_rec').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 400,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		      buttons : {
	"Start" : function(){
		    $("#startrec").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    
 $(function (){
        $('a.stop_rec').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 400,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		      buttons : {
	"Stop" : function(){
		    $("#stoprec").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    

 $(function (){
        $('a.delete_div').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 300,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		       buttons : {
	"Delete" : function(){
		    $("#del_div").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
       
 $(function (){
        $('a.edit_pos').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 250,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
	              title: title,
		      modal: true,
		      buttons : {
	"Edit" : function(){
		    $("#editpos").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }});
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
    

 $(function (){
        $('a.delete_pos').click(function() {
            var url = this.href;
	    var title = this.title;
            var dialog = $('<div style="display:hidden"></div>').appendTo('body');
            // load remote content
            dialog.load(
                url, 
                {},
                function (responseText, textStatus, XMLHttpRequest) {
                    dialog.dialog({
		      height: 150,
		      width: 300,
		      show: 'puff',
		      hide: 'explode',
		      draggable: false,
		      resizable: false,
		      title: title,
		      modal: true,
		       buttons : {
	"Delete" : function(){
		    $("#del_pos").submit();
		  },
	
         "Cencel" : function(){
		     dialog.dialog('destroy');
		  }
      }
		    });
                }
            );
            //prevent the browser to follow the link
            return false;
        });
    });
       
 
