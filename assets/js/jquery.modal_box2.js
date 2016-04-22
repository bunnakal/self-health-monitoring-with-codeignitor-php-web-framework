

(function($){

	// Defining our jQuery plugin

	$.fn.modal_box2 = function(prop){

		// Default parameters

		var options = $.extend({
			height : "460",
			width : "816",
			title:"Default Title",
			description: "This is how it works",
			top: "20%",
			left: "20%",
		},prop);
				
		//Click event on element
		return this.click(function(e){

			add_popup_box();
			add_block_page();
			add_styles();
			add_removal();
			
			$('.modal_box').fadeIn();
		});
		
		/**
		 * Add styles to the html markup
		 */
		 function add_styles(){			
			$('.modal_box').css({ 
				'font-family':"Arial",
				'color':'rgb(80,80,80)',
				'background-color': 'rgb(144,192,216)',
				'position':'absolute', 
				'left':options.left,
				'top':options.top,
				'display':'none',
				'height': options.height + 'px',
				'width': options.width + 'px',
				'box-shadow': '0px 2px 7px #292929',
				'-moz-box-shadow': '0px 2px 7px #292929',
				'-webkit-box-shadow': '0px 2px 7px #292929',
				'border-radius':'10px',
				'-moz-border-radius':'10px',
				'-webkit-border-radius':'10px',
				//'background': '#f2f2f2', 
				'z-index':'50',
			});
			$('.modal_close').css({
				'position':'relative',
				'top':'-25px',
				'left':'20px',
				'float':'right',
				'display':'block',
				'height':'50px',
				'width':'50px',
				'background': 'url(../../assets/images/popup/close2.png) no-repeat',
			});
			$('.block_page').css({
				'position':'absolute',
				'top':'0',
				'left':'0',
				'background-color':'rgba(0,0,0,0.8)',
				'height':'100%',
				'width':'100%',
				'z-index':'10'
			});
			$('.inner_modal_box').css({
				'background-color':'#fff',
				'height':(options.height - 50) + 'px',
				'width':(options.width - 50) + 'px',
				'padding':'10px',
				'margin':'15px',
				'border-radius':'10px',
				'-moz-border-radius':'10px',
				'-webkit-border-radius':'10px'
			});
		}
		
		 /**
		  * Create the block page div
		  */
		 function add_block_page(){
			var block_page = $('<div class="block_page"></div>');
						
			$(block_page).appendTo('body');
		}
		 	
		 /**
		  * Creates the modal box
		  */
		 function add_popup_box(){
			 var pop_up = $('<div class="modal_box"><a href="#" class="modal_close"></a><div class="inner_modal_box"><h2>' + options.title + '</h2><p><center><br></p><P STYLE="font-size: 17pt; text-align: left;">' + options.description + '</p></div></div>');
			 $(pop_up).appendTo('body');
		}
		 
		 function add_removal(){			 			 
			 $('.modal_close').click(function(){
				$(this).parent().fadeOut().remove();
				$('.block_page').fadeOut().remove();				 
			 });		 
			 $('.block_page').click(function(){
					$('.modal_box').fadeOut().remove();
					$('.block_page').fadeOut().remove();
				 });
		}

		return this;
	};
	
})(jQuery);
