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
	e?swal("Deleted!","Data has been deleted.","success"):swal("Cancelled","Data is safe :)","error")
});