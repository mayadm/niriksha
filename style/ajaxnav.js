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
						  
						 $('#add_pos')
			                          .button()
			                          .click(function() {
				                  $('#position').dialog('open');
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
						  
						  $('select#jaba').select();
						  
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