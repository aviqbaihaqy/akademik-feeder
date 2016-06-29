define([
	"apps",
    "views/modules/window",
	"views/modules/dataProcessing"
],function(apps, ui_window, handleProcessing){

	var form={
		view: "form",
		id: "form_reset",
		elementsConfig:{
			labelWidth: 120
		},
		elements: [
			{view: "text",type:"password", name: "old_password", label: "Password Lama"},
			{view: "text",type:"password", name: "new_password", label: "Password Baru"},
			{view: "text",type:"password", name: "re_password",	label: "Password Baru"},
			{
				margin: 10,
				paddingX: 2,
				borderless: true,
				cols:[
					{},
					{view: "button", label: "Reset", css: "button_raised", align: "right", width: 90, height:35, click:function(){
						$$('form_reset').clear();
					}},
					{view: "button", label: "Save", css: "button_success button_raised", type: "form", align: "right", width: 90, height:35, click:function(){
						var form = $$('form_reset');
						var values = form.getValues();

						if(form.isDirty()){
							if(!form.validate())
								return false;

							webix.ajax().post("./resetpassword.json", values, function(t,res) {
								var res = res.json();

								webix.message({ type:"default",
									text: res.messages.data+"<br>"+res.messages.status +" in "+res.messages.operation,
									expire:5000
								});
							});
				        };
					}}
				]
			}
		]
	}

	return {
	    ui: function() {
       		apps.setUiWindow = ui_window.ui("win_reset", "RESET PASSWORD", {rows:[form]});
	    	apps.webix();
	    },
	    onInit:function(){
	    	webix.ready(function(){
		    	$$("win_reset").show();
		    });
	    }
	};

});
