
$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

	if(counter>20){
            alert("Only 20 textboxes allow");
            return false;
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);

	newTextBoxDiv.after().html('<input type="text" name="textbox' + counter +
	      '" id="textbox' + counter + '" class="form-control" value="" >');

	newTextBoxDiv.appendTo("#newTxt");
	
	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

	counter--;

        $("#TextBoxDiv" + counter).remove();

     });

     $("#getButtonValue").click(function () {

	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });