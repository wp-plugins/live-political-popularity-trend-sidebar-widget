<script type="text/javascript">
function enableDisable(box_checked)
{
	var disable = !box_checked.checked;
	var argument_length = arguments.length;
	var obj, startIndex = 1;
	var frm = box_checked.form;
	for (var i=startIndex;i<argument_length;i++)
	{

		obj = frm.elements[arguments[i]];

		if (typeof obj=="object")
			{

			if (document.layers) 
				{

				if (disable){
					obj.onfocus=new Function("this.blur()");
					if (obj.type=="text") obj.onchange=new Function("this.value=this.defaultValue");

					}
				else 
					{

					obj.onfocus=new Function("return");
					if (obj.type=="text") obj.onchange=new Function("return");

					}

				}

			else obj.disabled=disable;	

			}
	}
}
</script>
<p>
<label for="ppw_title">Title for Politician Popularity Checker:
<input  name="ppw_title" type="text" value="<?php echo $title; ?>" /></label>
<input type="hidden" id="ppw_submit" name="ppw_submit" value="1" />
</p>
<p class="box1">
Your Politician Popularity Checker will load without default names in the boxes. 

However, if you would like to input names that will display when your widget loads, please check this box, which also means that you agree that
the backlinks are allowed on your site.

<input type="checkbox" id="enable_checkbox" name="enable_checkbox" value="<?php echo $enable_checkbox; ?>" onclick="enableDisable(this,'first_name','second_name');" />

<input type="hidden" id="ppw_submit" name="ppw_submit" value="4" />
<br />
</p>
<p>

<label for="first_name">Enter political name you want to compare:
<input  id="first_name" name="first_name" disabled="disabled" type="text" value="<?php 

 if(empty($options['first_name'])){
      echo $first_name = "Barack Obama";
      
   }else echo $first_name; 

?>" /></label>			

<input type="hidden" id="ppw_submit" name="ppw_submit" value="2" />
</p>

<p>
<label for="second_name">Enter political name you want to compare:
<input id="second_name" name="second_name" disabled="disabled" type="text" value="<?php 

 if(empty($options['second_name'])){
    echo $second_name = "Hillary Clinton"; 
 }
else echo $second_name;
?>" /></label>			

<input type="hidden" id="ppw_submit" name="ppw_submit" value="3" />

</p>