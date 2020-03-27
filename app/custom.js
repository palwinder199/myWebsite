 var ChangeStatus=function(token,data)
{
	$.ajax({
		type:"post",
		data:{token:token,changeStatus:data},
		success:function(res)
		{
			//alert(res);
			swal("Changed",res,"success");
			console.log(token+" "+data+" "+res);
		},
		error:function()
		{
			alert("Error");
		}
		
	});
}

var DeleteRow=function(token,data,id)
{
	swal({
		title:"Are you sure?",
		text:"You will not be able to recover this!",
		icon:"warning",
		buttons:{
			cancel:{
				text:"No, cancel!",
				value:null,
				visible:!0,
				className:"",
				closeModal:!1
			},
			confirm:{
				text:"Yes, delete it!",
				value:!0,
				visible:!0,
				className:"bg-danger",
				closeModal:!1
			}
		}
	}).then(function(e){
		console.log(e);
		if(e===true)
		{
			$.ajax({
				type:"post",
				data:{token:token,deleteData:data,id:id},
				success:function(res)
				{
					if(res>0)
					{
						//alert(res);
						$(id).hide(3000);
						swal("Deleted!","Data has been deleted.","success");
					}
					else
					{
						console.log(token+" "+data+" "+id+" "+res);
					}
				},
				error:function()
				{
					alert("Error");
				}
				
			});
		}
		else
		{
			swal("Cancelled","Data is safe :)","error");
		}
		/***** /
		e?swal("Deleted!","Data has been deleted.","success"):swal("Cancelled","Data is safe :)","error")
		/*****/
	});
	/**************** /
	var con=confirm('Do you want to delete?');
	if(con)
	{
		$.ajax({
			type:"post",
			data:{token:token,deleteData:data,id:id},
			success:function(res)
			{
				if(res>0)
				{
					//alert(res);
					$(id).hide(1000);
				}
				else
				{
					console.log(token+" "+data+" "+id+" "+res);
				}
			},
			error:function()
			{
				alert("Error");
			}
			
		});
	}
	/****************/
}


var ChkExistPrintMsgDanger=function(token,data,id)
{
	//alert('hi');
	$.ajax({
		type:"post",
		data:{token:token,data:data},
		success:function(res)
		{
			//alert(res);
			if(res>0)
			{
				$(id).html('Already exist');
				//alert('Entry already exist, please try another one.');
			}
			else if(res==0)
			{
				$(id).html('');
			}
		},
		error:function()
		{
			alert("Error");
		}
		
	});
}

function notifyMe() {
  console.log("notification");
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check if the user is okay to get some notification
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
  var options = {
        body: "New Order Arrived",
        icon: "../arigato.png",
        dir : "ltr"
    };
  var notification = new Notification("New Order",options);
  }

  // Otherwise, we need to ask the user for permission
  // Note, Chrome does not implement the permission static property
  // So we have to check for NOT 'denied' instead of 'default'
  else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // Whatever the user answers, we make sure we store the information
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
        var options = {
              body: "New Order Arrived",
              icon: "../arigato.png",
              dir : "ltr"
          };
        var notification = new Notification("New Order",options);
      }
    });
  }

  // At last, if the user already denied any notification, and you
  // want to be respectful there is no need to bother them any more.
}

function playAudio(id) { 
	console.log("Playing audio................");
	var x=document.getElementById(id);
	x.play(); 
}