$(document).ready(function(){
  if($('#plan-date').length >0 )
      $('#plan-date').parent().datepicker({"autoclose":true,"format":"dd-mm-yyyy"});

  if( $(".product-gallery").find("li").length > 1 ) {
		$(".product-gallery").bxSlider({ auto:false, useCSS:false, pagerCustom: '#bx-pager', autoHover:true, adaptiveHeight:true, controls:true });
		$('.product-gallery-wrapper').appendTo('#gallery');
	}//Portfolio Slider Single in Portfolio
  if($('.select-category').length > 0)
  {
  	var data = [];

  	$('a.category').click(function(){
  		if(!$(this).hasClass('cat-active'))
  		{
  			$(this).addClass('cat-active');
  			var category_id = $(this).attr('data-category');
  			data.push(category_id);
  		}
  		else
  		{
  			$(this).removeClass('cat-active');
  			var category_id = $(this).attr('data-category');
  			data = $.grep(data, function(value){
  				return value != category_id;
  			});
  		}
  		$('#category').val(data);

  		if(data.length > 0)
  		{
	  		$('#btn-next').removeAttr('disabled');
	  	}
	  	else
	  	{
	  		$('#btn-next').attr('disabled', 'disabled');
	  	}	
  	})
  }

  if($('#upload-gallery').length > 0)
  {

    var data = [];
    window.i = 1;
    var dz = new Dropzone("#upload-gallery", {
       maxFilesize: 2, // MB
       acceptedFiles: 'image/*',
       addRemoveLinks:true,
       parallelUploads: true,
       
        
    }); 

    dz.on('success', function(file, res){
      var temp_file = "";
      
      window.file = res;
      data.push(res);
      console.log(file);
      $('#dimages').val(data);
      
    });

    dz.on('success', function(file){
      file.previewElement.classList.add("file-"+window.i);

      $('.file-'+window.i+' .dz-remove').attr('data-file', window.file);
      i++;
    });

    dz.on('removedfile', function(file){
      
      var temp_file = file._removeLink.getAttribute('data-file'); //ambil atribut data file dari button remove link 
        
      $.ajax({ //form ]
        method:"POST",  //methodenya
        url:'delete-gallery.php', // action
        data: {file : temp_file } //data inputnta
      }).done(function(res){ //ketika berhasil lakukan proses
        //ini buat hapus nama image dari list yg akan diupload
        data = $.grep(data, function(value){
          return value != temp_file; //nge return nama image yg tdk di delete
        });
        console.log(temp_file);
          $('#dimages').val(data);
      });

    });

    
  }
  if($('.enlarge').length > 0){
    $(".enlarge").colorbox({rel:'enlarge', transition:"fade", width:"50%", height:"50%"});
  }
//edit AVATAR
  if($('#chgavatar').length > 0)
  {

    var data = [];
    var dz = new Dropzone("#chgavatar", {
       maxFilesize: 2, // MB,
       maxFiles:1,
       acceptedFiles: 'image/*',
       addRemoveLinks:true,
       dictDefaultMessage : "Drop logo pada kotak ini" 
       
        
    }); 

    dz.on('success', function(file, res){
      var temp_file = "";
      
      data.push(res);
      $('#images').val(data);
    });

    dz.on('removedfile', function(file){
      
      var temp_file = file.name;
      
      $.ajax({
        method:"POST",
        url:'delete-avatar.php',
        data: {file : temp_file }
      }).done(function(res){
        data = $.grep(data, function(value){
          return value != temp_file;
        });
        $('#images').val(data);
      });

    });

    
  }
  if($('.enlarge').length > 0){
    $(".enlarge").colorbox({rel:'enlarge', transition:"fade", width:"50%", height:"50%"});
  }

  if($('.galleria').length > 0){
    Galleria.loadTheme('assets/galleria/themes/classic/galleria.classic.min.js');
     Galleria.run('.galleria');
  }

  if($('.confirm-delete').length > 0)
  {
    $('.confirm-delete').click(function(e){
      var d = $(this);
      bootbox.confirm("Anda yakin akan menghapusnya?", function(result) {
        if(result == true)
          window.location = $(d).attr('href');
      }); 
      e.preventDefault();
    });
  }



  if($('.btn-finish').length > 0)
  {
    $('.btn-finish').click(function(e){
      var d = $(this);
      bootbox.confirm("Apakah anda sudah selesai memilih?", function(result) {
        if(result == true)
          $('#act-step-3').submit();
      }); 
      e.preventDefault();
    });
  }

  if($('.form-select').length > 0)
  {
    $('.form-select').submit(function(e){
      var that = $(this);
      var Data = {
        'product_id' : $(this).find('input[name=product_id]').val(),
        'harga' : $(this).find('input[name=harga]').val(),
        'cat_id' : $(this).find('input[name=cat_id]').val(),
        'ajax' : true
      }

      var method = that.find('input[name=method]').val();
      
      if(method == 'add')
        var action = 'select_product.php';
      else
        var action = 'unselect_product.php';
      
      $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : action, // the url where we want to POST
        data        : Data, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode          : true
      })// using the done promise callback
            .done(function(data) {
                if(data.method != 'error')
                {
                  // log data to the console so we can see
                  $('#sisaBudget').html(data.formatsisaBudget);
                  that.attr('action','unselect_product.php');
                  that.removeClass('form-select');
                  
                  that.find('input[name=method]').val(data.method);
                  if(data.method == 'remove')
                  {
                    that.find('input[type=submit]').val('Batal');
                    $('#product-'+data.sel_product).addClass('product-active');
                  }
                  else
                  {
                    that.find('input[type=submit]').val('Pilih');
                    $('#product-'+data.sel_product).removeClass('product-active');
                  }
                  if(data.product_count > 0){
                      $('.btn-noitem').addClass('hide');
                      $('.btn-finish').removeClass('hide');
                  }
                  else{
                      $('.btn-noitem').removeClass('hide');
                      $('.btn-finish').addClass('hide');
                  }
                }
                else
                {
                  bootbox.alert('Budget Anda Kurang');
                }
                // here we will handle errors and validation messages
            });

      e.preventDefault();
    });
  }

  if($('.form-unselect').length > 0)
  {
    $('.form-unselect').submit(function(e){
      var that = $(this);
      var Data = {
        'product_id' : $(this).find('input[name=product_id]').val(),
        'harga' : $(this).find('input[name=harga]').val(),
        'cat_id' : $(this).find('input[name=cat_id]').val(),
        'ajax' : true
      }

      var method = that.find('input[name=method]').val();
      
      if(method == 'add')
        var action = 'select_product.php';
      else
        var action = 'unselect_product.php';
      
      $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : action, // the url where we want to POST
        data        : Data, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode          : true
      })// using the done promise callback
            .done(function(data) {

                // log data to the console so we can see
                $('#sisaBudget').html(data.formatsisaBudget);
                that.attr('action','unselect_product.php');
                that.removeClass('form-select');
                
                that.find('input[name=method]').val(data.method);
                if(data.method == 'remove')
                {
                  that.find('input[type=submit]').val('Batal');
                  $('#product-'+data.sel_product).addClass('product-active');
                }
                else
                {
                  that.find('input[type=submit]').val('Pilih');
                  $('#product-'+data.sel_product).removeClass('product-active');
                }
                if(data.product_count > 0){
                    $('.btn-noitem').addClass('hide');
                    $('.btn-finish').removeClass('hide');
                }
                else{
                    $('.btn-noitem').removeClass('hide');
                    $('.btn-finish').addClass('hide');
                }
            });

      e.preventDefault();
    });
  }

  if($('#form-report').length > 0)
  {
    $('#form-report').submit(function(e){
      var that = $(this);
      var Data = {
        'vendor_id' : $(this).find('input[name=vendor_id]').val(),
        'message' : $(this).find('textarea[name=message]').val(),
        'ajax' : true
      }
      if($(this).find('textarea[name=message]').val() != ""){


        $('#pesan-body').addClass('hide');
        $('#pesan-loading').removeClass('hide');

        $.ajax({
          type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
          url         : 'report.php', // the url where we want to POST
          data        : Data, // our data object
          dataType    : 'json', // what type of data do we expect back from the server
          encode          : true
        })// using the done promise callback
              .done(function(data) {
                $('#pesan-loading').addClass('hide');
                $('#pesan-success').removeClass('hide');
                $('#action-success').addClass('hide');
                that.addClass('hide');
                  // log data to the console so we can see
                  
              });
      }
      else{
        bootbox.alert('Pesan tidak boleh kosong');
      }
      e.preventDefault();
    });
  }

  if($('.btn-noitem').length > 0){
    $('.btn-noitem').click(function(){
      bootbox.alert('Belum ada produk yang dipilih');
    });
  }

  if($('.btn-catdel').length > 0)
  {
    
    $('.btn-catdel').click(function(e){
      var d = $(this);
      bootbox.confirm("Anda yakin akan menghapusnya?", function(result) {
        if(result == true)
          window.location = $(d).attr('href');
      }); 
      e.preventDefault();
    });
  }

  $('#form-step1').submit(function(e){
    if($('#invitation').val() == "" || $('#plan-date').val() == "" || $('#inputBudget').val() == "" )
    {

      bootbox.alert("Data Belum Lengkap");
      e.preventDefault();
    }

      
  })
  if($("input[data-inputmask]").length > 0)
      $("input[data-inputmask]").inputmask();
});