"use strict";

// Class definition

var KTKanbanBoardDemo = function () {

    // Private functions

    // Basic demo
    var demos = function () {

		var kanban2 = new jKanban({
			element : '#kanban2',
			gutter  : '0',
			click : function(el){
				alert(el.innerHTML);
			},
			boards  :[
				{
					'id' : '_todo',
					'title'  : 'Call Scheduled',
					'class' : 'brand',
					'dragTo' : ['_working'],
					'item'  : [
						{
							'title':'My Task Test',
							'class': 'info'
						},
						{
							'title':'Buy Milk',
							'class': 'info'
						}
					]
				},
				{
					'id' : '_working',
					'title'  : 'Appointment Scheduled',
					'class' : 'warning',
					'item'  : [
						{
							'title':'Do Something!',
							'class': 'warning'
						},
						{
							'title':'Run?',
							'class': 'warning'
						}
					]
				},
				{
					'id' : '_done',
					'title'  : 'Presentation Scheduled',
					'class' : 'success',
					'dragTo' : ['_working'],
					'item'  : [
						{
							'title':'All right',
							'class': 'success'
						},
						{
							'title':'Ok!',
							'class': 'success'
						}
					]
				},
				{
					'id' : '_test',
					'title'  : 'Contract Sent',
					'class' : 'primary',
					'item'  : [
						{
							'title':'Passed',
							'class': 'primary'
						},
						{
							'title':'Well done!',
							'class': 'primary'
						}
					]
				},
                {
                    'id' : '_notes',
                    'title'  : 'Qualified To Buy',
                    'class' : 'danger',
                    'item'  : [
                        {
                            'title':'Warning Task',
                            'class': 'danger'
                        },
                        {
                            'title':'Do not enter',
                            'class': 'danger'
                        }
                    ]
                },
                {
                    'id' : '_notes',
                    'title'  : 'Closed Won',
                    'class' : 'primary',
                    'item'  : [
                        {
                            'title':'Warning Task',
                            'class': 'primary'
                        },
                        {
                            'title':'Do not enter',
                            'class': 'primary'
                        }
                    ]
                },
                {
                    'id' : '_notes',
                    'title'  : 'Closed Lost',
                    'class' : 'warning',
                    'item'  : [
                        {
                            'title':'Warning Task',
                            'class': 'warning'
                        },
                        {
                            'title':'Do not enter',
                            'class': 'warning'
                        }
                    ]
                }
			]
		});



    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
}();

jQuery(document).ready(function() {
    KTKanbanBoardDemo.init();
});
