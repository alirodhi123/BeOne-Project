<script>
$(document).ready(function() {
    		var count = 0;

    		$("#add_btn").click(function(){
					count += 1;
		   		$('#container_table').append(
							 '<tr class="records">'
						 + '<td ><div id="'+count+'">' + count + '</div></td>'
						 + '<td><input id="nim_' + count + '" name="nim_' + count + '" type="text"></td>'
						 + '<td><input id="nama_depan_' + count + '" name="nama_depan_' + count + '" type="text"></td>'
						 + '<td><input id="nama_belakang_' + count + '" name="nama_belakang_' + count + '" type="text"></td>'
						 + '<td><a class="remove_item" href="#" >Delete</a>'
						 + '<input id="rows_' + count + '" name="rows[]" value="'+ count +'" type="hidden"></td></tr>'
					);
				});

				$(".remove_item").live('click', function (ev) {
    			if (ev.type == 'click') {
	        	$(this).parents(".records").fadeOut();
	        	$(this).parents(".records").remove();
        	}
     		});
		});
</script>
