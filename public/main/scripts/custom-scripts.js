/*

CUSTOM SCRIPTS

Author - Roussounelos Nikos
Template - Asgard 
Version - 1.00
Contact - info@roussounelosweb.gr

*/

//Main configuration
var hexDigits = new Array("0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f");
var menuVisible = true;
var windowHeight = document.documentElement.clientHeight;
var windowWidth = document.documentElement.clientWidth;
var pageHash = window.location.hash;
var anchorage;
var previousMenuDimensions;
var isAsgard = true;
var playlistInterval = 6000;
var homePage = 'test';
var pageType = ".html";
var animationLength = 400;
var videoHeight = 360;
var videoWidth = 640;
var hoverColor = "9c0606";

$(window).load(function(){

	//start the intro
	intro();

});

$(window).resize(function() {

	//responsiveness
	responsive();

	//readjust gallery, simple portfolio images - performance hit on resize :-(
	//autoImageAdjust();

});

//me
$.ajaxPrefilter(function( options, originalOptions, jqXHR ) { options.async = true; });

//load hash selected - home page instead
function loadHash(){

	pageHash = window.location.hash;

	//if there's a hash, load the appropriate page
	if (pageHash.length > 1) {
		anchorage = pageHash.split("#")[1];
		//loadContents(anchorage);console.log(pageHash);
        loadContents('404');
	}
	else
	{
		loadContents('404');
		console.log('40/4');
	}//load home page

}

//custom inner page animations
function animatePage(divId, direction){

	var direction = direction;

	//hide the div provided
	if(divId){

		var divId = $("#"+divId);
		divId.css("opacity","0");

	}

	//animate opacity and direction according to the one given
	switch(direction){

		case "gallery":
			var counter = 0;
			var delayPar = 100;
			var nElements = parseInt($(".masonryImage, .simpleImage, .galleryImage").length);

			$(".masonryImage, .simpleImage, .galleryImage").each(function(){

				$(this).css({"opacity":"0", "margin-right":"-80px"});
				$(this).stop().delay(animationLength+100*counter).animate({"opacity": "1", "margin-right":"0px"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){$(this).css({"margin-right":"", "opacity":""});}});

				counter++;

				if(nElements == counter)
					setTimeout(function(){

						//animate images
						animateImages();

					}, 1000);

			});
			break;

		case "all":
			var counter = 0;
			divId.delay(800).animate({"opacity":"1"},{duration:animationLength, easing:"easeInOutQuad"});

			divId.find("div *:not(div, li, li a, td)").each(function(){

				//don't touch absolutely positioned elements
				if($(this).css("position") != "absolute"){

					$(this).css({"position":"relative", "top":"-40px", "opacity":"0"});

					//animate in and then reset attributes
					$(this).delay(animationLength+(counter*100)).animate({"top":"0px", "opacity":"1"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){$(this).css({"top":"", "opacity":""});}});

					counter++;

				}

			});
			break;

		case "half":
			divId.children("div.half-column").css({"position":"relative", "top":"-80px"});
			divId.children("div.half-column.last").css({"position":"relative", "top":"80px"});

			divId.delay(800).animate({"opacity":"1"},{duration:animationLength, easing:"easeInOutQuad"});
			divId.children("div.half-column").delay(800).animate({"top":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			divId.children("div.half-column.last").delay(800).animate({"top":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			break;

		case "top":
			divId.css({"position":"relative", "top":"-80px"});
			divId.delay(800).animate({"opacity":"1", "top":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			break;

		case "right":
			divId.css({"position":"relative", "right":"-80px"});
			divId.delay(800).animate({"opacity":"1", "right":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			break;

		case "left":
			divId.css({"position":"relative", "left":"-80px"});
			divId.delay(800).animate({"opacity":"1", "left":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			break;

		case "bottom":
			divId.css({"position":"relative", "bottom":"-80px"});
			divId.delay(800).animate({"opacity":"1", "bottom":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			break;

		case "opacity":
			divId.css({"opacity":"0"});
			divId.delay(800).animate({"opacity":"1"},{duration:animationLength, easing:"easeInOutQuad"});
			break;

		default:
			divId.css({"position":"relative", "top":"-80px"});
			divId.delay(800).animate({"opacity":"1", "top":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			break;

	}

}

//function that handles the portfolio items when clicked - popup, etc
function portfolioClicked(){

	//if play button is pressed
	var playlistOn = false;
	var playlist;

	$(".masonryImage, .simpleImage").on("click", function(evt){

		evt.preventDefault();
		evt.stopPropagation();

		showItem($(this));

	});

	function showItem(thiss){

		var thisDescription = thiss.children("span.description");
		var thisParagraph = thiss.children("p");
		var thisItem = thiss.children("img.item");
		var descriptionWrapper = $("#onclickDescriptionWrapper div");

		$("#onclickWrapper").css("display","block");

		//if item is video, add it
		if(thisItem.hasClass("video")){

			//clone the item clicked on the itemwrapper
			$("#onclickItemWrapper").html("<iframe class='item' src='"+thisItem.attr("alt")+"' frameborder='0' allowfullscreen></iframe>");

		}
		else{

			//clone the item clicked on the itemwrapper
			$("#onclickItemWrapper").html(thisItem.clone());

		}

		var newitem = $("#onclickItemWrapper .item");

		//remove previous junk attached
		newitem.removeAttr("style class");

		//append the appropriate description, paragraph and buttons
		descriptionWrapper.append("<h2>"+thisDescription.html()+"</h2>");
		descriptionWrapper.append(thisParagraph.clone());
		descriptionWrapper.append("<div id='onclickButtons'><div class='previousButton'></div><div class='playButton'></div><div class='nextButton'></div><div class='closeButton'></div></div>");

		//adjust inner wrapper width and height
		if(document.documentElement.clientWidth <= 960)
			$("#onclickItemWrapper").css({"height":document.documentElement.clientHeight-$("#onclickDescriptionWrapper").height()+"px", "width":"100%", "top":$("#onclickDescriptionWrapper").height()-40+"px"});
		else
			$("#onclickItemWrapper").css({"width":document.documentElement.clientWidth-$("#onclickDescriptionWrapper").width()+"px", "height":"100%"});

		//if item is not a video, adjust the width and height
		if(thisItem.hasClass("video")){

			newitem.css({"width":videoWidth+"px", "height":videoHeight+"px"});

		}
		else{

			//extract full-image from thumbnail
			var newitemSrc = newitem.attr("src").split("/thumbnails/");
			newitem.attr("src", newitemSrc[0]+"/full-images/"+newitemSrc[1]);

			//if width>height, adjust to 80% width
			if(newitem.width() > newitem.height()){

				newitem.css({"width":"80%", "height":"auto"});

				if(newitem.height() >= 0.8 * windowHeight)
					newitem.css({"height":"80%", "width":"auto"});

			}

		}

		//align vertically and horizontally
		newitem.css({"margin-top":"-"+newitem.height()/2+"px", "margin-right":"-"+newitem.width()/2+"px"});

		$("#onclickWrapper").animate({"opacity":"1"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

			//get top positions
			var itemTop = $("#onclickItemWrapper").css("top").split("px");
			var descriptionTop = $("#onclickDescriptionWrapper").css("top").split("px");

			//animate them in
			$("#onclickItemWrapper").animate({"opacity":"1", "top":parseInt(itemTop[0])+40+"px"},{duration:animationLength, easing:"easeInOutQuad"});
			$("#onclickDescriptionWrapper").animate({"opacity":"1", "top":parseInt(descriptionTop[0])-40+"px"}, {duration:animationLength, easing:"easeInOutQuad"});

			if(playlistOn){

				//change icon
				$(".playButton").css("background-image","url(images/pause.png)");

				//disable the other buttons
				$(".closeButton, .nextButton, .previousButton").addClass("disabledButton");

			}

			//animate buttons and other elements on hover
			animateOnHover();

			//add remove listener for the close button
			$(".closeButton").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					removeItem();

				}

			});

			//add listener for the next button
			$(".nextButton, #onclickItemWrapper img").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					removeItem();
					setTimeout(function(){

						//if there's no next item, skip to the very first one
						if(thiss.next(".masonryImage, .simpleImage").length == 0)
							showItem($(".masonryImage, .simpleImage").first());
						else
							showItem(thiss.next(".masonryImage, .simpleImage"));

					}, 1000);

				}

			});

			//add listener for the previous button
			$(".previousButton").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					removeItem();
					setTimeout(function(){

						//if there's no previous item, skip to the very last one
						if(thiss.prev(".masonryImage, .simpleImage").length == 0)
							showItem($(".masonryImage, .simpleImage").last());
						else
							showItem(thiss.prev(".masonryImage, .simpleImage"));

					}, 1000);

				}

			});

			//add listener for the play button
			$(".playButton").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					//disable the other buttons
					$(".closeButton, .nextButton, .previousButton").addClass("disabledButton");

					playlist = setInterval(function(){

						removeItem();
						setTimeout(function(){

							//if there's no previous item, skip to the very last one
							if(thiss.next(".masonryImage, .simpleImage").length == 0)
								showItem($(".masonryImage, .simpleImage").first());
							else
								showItem(thiss.next(".masonryImage, .simpleImage"));

							thiss = thiss.next(".masonryImage, .simpleImage");

						}, 1000);

					}, playlistInterval);

					//change icon
					$(this).css("background-image","url(images/pause.png)");

					playlistOn = true;

				}
				else{

					//enable the other buttons
					$(".closeButton, .nextButton, .previousButton").removeClass("disabledButton");

					clearInterval(playlist);

					//change icon
					$(this).css("background-image","url(images/video.png)");

					playlistOn = false;

				}

			});

		}});

	}

	function removeItem(){

		//get top positions
		var itemTop = $("#onclickItemWrapper").css("top").split("px");
		var descriptionTop = $("#onclickDescriptionWrapper").css("top").split("px");

		$("#onclickItemWrapper").animate({"opacity":"0", "top":parseInt(itemTop[0])-40+"px"},{duration:animationLength, easing:"easeInOutQuad"});
		$("#onclickDescriptionWrapper").animate({"opacity":"0", "top":parseInt(descriptionTop[0])+40+"px"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

			$("#onclickWrapper").animate({"opacity":"0"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

				$("#onclickWrapper").css("display","none");
				$("#onclickDescriptionWrapper div").empty();
				$("#onclickItemWrapper").empty();

				//reset top and other values
				$("#onclickItemWrapper").removeAttr("style");
				$("#onclickDescriptionWrapper").removeAttr("style");

			}});

		}});

	}

}

//function that handles the gallery items when clicked - popup, etc
function galleryClicked(){

	//if play button is pressed
	var playlistOn = false;
	var playlist;

	$(".galleryImage").on("click", function(evt){

		evt.preventDefault();
		evt.stopPropagation();

		showItem($(this));

	});

	function showItem(thiss){

		var thisItem = thiss.children("img.item");
		var onClickWrapper = $("#onclickWrapper");
		var thisDescription = thiss.children("span.description");
		var gallerySize = $(".galleryImage").length;
		var itemPosition = $(".galleryImage").index(thiss) + 1;

		onClickWrapper.css("display","block");

		//clone the item clicked on the itemwrapper
		$("#onclickItemWrapper").html(thisItem.clone());

		var newitem = $("#onclickItemWrapper .item");

		//remove previous junk attached
		newitem.removeAttr("style class");

		//adjust inner wrapper width and height
		if(document.documentElement.clientWidth <= 960)
			$("#onclickItemWrapper").css({"height":document.documentElement.clientHeight+"px", "width":"100%", "top":$("#onclickDescriptionWrapper").height()-40+"px"});
		else
			$("#onclickItemWrapper").css({"width":document.documentElement.clientWidth+"px", "height":"100%"});

		//if width>height, adjust to 80% width
		if(newitem.width() > newitem.height()){

			newitem.css({"width":"80%", "height":"auto"});

			if(newitem.height() >= 0.8 * windowHeight)
				newitem.css({"height":"80%", "width":"auto"});

		}

		//align vertically and horizontally
		newitem.css({"margin-top":"-"+newitem.height()/2+"px", "margin-right":"-"+newitem.width()/2+"px"});

		//add description, controls and count
		onClickWrapper.append("<span class='itemDescription'>"+thisDescription.html()+"</span>");
		onClickWrapper.append("<a class='button disabledButton itemCount'>"+itemPosition+" / "+gallerySize+"</a>");
		onClickWrapper.append("<div class='previousButton'></div></div><div class='nextButton'></div><div class='closeButton'></div>");

		onClickWrapper.animate({"opacity":"1"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

			//get top positions
			var itemTop = $("#onclickItemWrapper").css("top").split("px");

			//animate them in
			$("span.itemDescription").animate({"opacity":"1", "bottom":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
			$("#onclickItemWrapper").animate({"opacity":"1", "top":parseInt(itemTop[0])+40+"px"},{duration:animationLength, easing:"easeInOutQuad"});

			if(playlistOn){

				//change icon
				$(".playButton").css("background-image","url(images/pause.png)");

				//disable the other buttons
				$(".closeButton, .nextButton, .previousButton").addClass("disabledButton");

			}

			//animate buttons and other elements on hover
			animateOnHover();

			//add remove listener for the close button
			$(".closeButton").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					removeItem();

				}

			});

			//add listener for the next button
			$(".nextButton, #onclickItemWrapper img").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					removeItem();
					setTimeout(function(){

						//if there's no next item, skip to the very first one
						if(thiss.next(".galleryImage").length == 0)
							showItem($(".galleryImage").first());
						else
							showItem(thiss.next(".galleryImage"));

					}, 1000);

				}

			});

			//add listener for the previous button
			$(".previousButton").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					removeItem();
					setTimeout(function(){

						//if there's no previous item, skip to the very last one
						if(thiss.prev(".galleryImage").length == 0)
							showItem($(".galleryImage").last());
						else
							showItem(thiss.prev(".galleryImage"));

					}, 1000);

				}

			});

			//add listener for the play button
			$(".playButton").on("click", function(evt){

				evt.stopPropagation();

				if(!playlistOn){

					//disable the other buttons
					$(".closeButton, .nextButton, .previousButton").addClass("disabledButton");

					playlist = setInterval(function(){

						removeItem();
						setTimeout(function(){

							//if there's no previous item, skip to the very last one
							if(thiss.next(".galleryImage").length == 0)
								showItem($(".galleryImage").first());
							else
								showItem(thiss.next(".galleryImage"));

							thiss = thiss.next(".galleryImage");

						}, 1000);

					}, playlistInterval);

					//change icon
					$(this).css("background-image","url(images/pause.png)");

					playlistOn = true;

				}
				else{

					//enable the other buttons
					$(".closeButton, .nextButton, .previousButton").removeClass("disabledButton");

					clearInterval(playlist);

					//change icon
					$(this).css("background-image","url(images/video.png)");

					playlistOn = false;

				}

			});

			//extract full-image from thumbnail
			var newitemSrc = newitem.attr("src").split("/thumbnails/");
			newitem.attr("src", newitemSrc[0]+"/full-images/"+newitemSrc[1]);

		}});

	}

	function removeItem(){

		//get top positions
		var itemTop = $("#onclickItemWrapper").css("top").split("px");

		$("span.itemDescription").animate({"opacity":"0", "bottom":"-40px"},{duration:animationLength, easing:"easeInOutQuad"});
		$("#onclickItemWrapper").animate({"opacity":"0", "top":parseInt(itemTop[0])-40+"px"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

			$("#onclickWrapper").animate({"opacity":"0"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

				$("#onclickWrapper").css("display","none");
				$(".nextButton, .previousButton, .closeButton, span.itemDescription, a.itemCount").remove();
				$("#onclickItemWrapper").empty();

				//reset top and other values
				$("#onclickItemWrapper").removeAttr("style");

			}});

		}});

	}

}

//function that hides and shows the menu
function showHideMenu(){

	$("#hideMenu").on("click", function(){

		//split for smaller than 960px resolution - horizontal or vertical menu
		if(windowWidth <= 960){

			var menuHeight = $("#menu-wrapper").height();

			if(menuVisible == true){

				$(this).removeClass("menuVisible menuInVisible");
				$(this).addClass("menuInVisible");

				$("#main-wrapper").animate({"top":"0px", "height":windowHeight+"px"},{duration:animationLength, easing:"easeInOutQuad"});
				$("#menu-wrapper").animate({"top":-menuHeight+"px"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

					$(window).trigger("resize");

				}});
				menuVisible = false;

			}
			else{

				$(this).removeClass("menuVisible menuInVisible");
				$(this).addClass("menuVisible");

				$("#main-wrapper").animate({"top":menuHeight+"px"},{duration:animationLength, easing:"easeInOutQuad"});
				$("#menu-wrapper").animate({"top":"0px"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

					$(window).trigger("resize");

				}});
				menuVisible = true;

			}

		}
		else{

			var menuWidth = $("#menu-wrapper").width();

			if(menuVisible == true){

				$(this).removeClass("menuVisible menuInVisible");
				$(this).addClass("menuInVisible");

				$("#main-wrapper").animate({"right":"0px", "width":windowWidth+"px"},{duration:animationLength, easing:"easeInOutQuad"});
				$("#menu-wrapper").animate({"right":-menuWidth+"px"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

					$(window).trigger("resize");

				}});
				menuVisible = false;

			}
			else{

				$(this).removeClass("menuVisible menuInVisible");
				$(this).addClass("menuVisible");

				$("#main-wrapper").animate({"right":menuWidth+"px"},{duration:animationLength, easing:"easeInOutQuad"});
				$("#menu-wrapper").animate({"right":"0px"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

					$(window).trigger("resize");

				}});
				menuVisible = true;

			}

		}

	});

}

//function that automatically prepares the galleries - adds icons, etc
function prepareGallery(){

	//add the appropriate icon
	$(".masonryImage, .simpleImage, .galleryImage").each(function(){

		var innerImg = $(this).children("img.item");

		//add an icon according to its class
		if(innerImg.hasClass("image")){

			$(this).append("<img src='public/main/images/image.png' alt='image' class='icon' />");

		}

		if(innerImg.hasClass("video")){

			$(this).append("<img src='public/main/images/video.png' alt='video' class='icon' />");

		}

		if(innerImg.hasClass("music")){

			$(this).append("<img src='public/main/images/music.png' alt='music' class='icon' />");

		}

		if(innerImg.hasClass("link")){

			$(this).append("<img src='public/main/images/link.png' alt='link' class='icon' />");

		}

		if(innerImg.hasClass("blog")){

			$(this).append("<img src='public/main/images/blog.png' alt='blog' class='icon' />");

		}

		//start to work after the icons are fully loaded
		$(this).imagesLoaded(function(){

			//center the icons
			var icon = $(this).children("img.icon");
			var iconWidth = icon.outerWidth()/2;
			var iconHeight = icon.outerHeight()/2;

			icon.css({"margin-top": "-"+iconHeight-40+"px"});
			icon.css({"margin-right": "-"+iconWidth+"px"});

			//center the descriptions
			var description = $(this).children("span.description");
			var descriptionWidth = description.width()/2;

			description.css({"margin-right": "-"+descriptionWidth+"px", "margin-top":"20px"});

		});

	});

}

//function that handles image items animation
function animateImages(){

	//animation of the masonry items - pops out, changes colour and shadows over
	$(".masonryImage").each(function(){

		var thisItem = $(this).children(".item");
		var thisIcon = $(this).children("img.icon");
		var iconHeight = thisIcon.height();
		var thisDescription = $(this).children("span.description");

		$(this).on("mouseenter", function(evt){

			evt.stopPropagation();

			var thisWidth = $(this).width();
			var thisHeight = $(this).height();

			if($(this).children("#hover-item").length == 0)
				$(this).prepend("<div id='hover-item'></div>");
			var hoverItem = $(this).children("#hover-item");

			thisIcon.stop().animate({"opacity": "1", "margin-top":"-"+iconHeight-10+"px"},{duration:animationLength, easing:"easeInOutQuad"});
			thisDescription.stop().animate({"opacity": "1", "margin-top":"10px"},{duration:animationLength, easing:"easeInOutQuad"});
			hoverItem.stop().css("width","100%").animate({"opacity":"1", "right":"0px", "top":"0px", "height":thisHeight}, {duration:animationLength, easing:"easeInOutQuad"});

		});

		//add leave listener
		$(this).on("mouseleave", function(evt){

			var hoverItem = $(this).children("#hover-item");

			thisIcon.stop().animate({"opacity": "0", "margin-top":"-"+iconHeight-30+"px"},{duration:animationLength, easing:"easeInOutQuad"});
			hoverItem.stop().animate({"opacity":"0", "height":"0px"}, {duration:animationLength, easing:"easeInOutQuad"});
			thisDescription.stop().animate({"opacity": "0", "margin-top":"30px"},{duration:animationLength, easing:"easeInOutQuad"});

		});

	});

	//animation of the simple portfolio items - shadows over and changes colour
	$(".simpleImage").each(function(){

		var thisItem = $(this).children(".item");
		var thisIcon = $(this).children("img.icon");
		var iconHeight = thisIcon.height();
		var thisDescription = $(this).children("span.description");

		$(this).on("mouseenter", function(){

			if(!$(this).hasClass("faded")){

				$(this).css("z-index","999");
				$(this).stop().animate({"boxShadow" : "0px 0px 20px rgba(0,0,0,0.8)"},{duration:animationLength, easing:"easeInOutQuad"});

				thisItem.stop().animate({"opacity": "0"},{duration:animationLength, easing:"easeInOutQuad"});
				thisIcon.stop().animate({"opacity": "1", "margin-top":"-"+iconHeight-10+"px"},{duration:animationLength, easing:"easeInOutQuad"});
				thisDescription.stop().animate({"opacity": "1", "margin-top":"10px"},{duration:animationLength, easing:"easeInOutQuad"});

			}

		});

		$(this).on("mouseleave", function(){

			if(!$(this).hasClass("faded")){

				$(this).css("z-index","");
				$(this).stop().animate({"boxShadow" : "none"},{duration:animationLength, easing:"easeInOutQuad"});

				thisItem.stop().animate({"opacity": "1", "margin":"0px"},{duration:animationLength, easing:"easeInOutQuad"});
				thisIcon.stop().animate({"opacity": "0", "margin-top":"-"+iconHeight-30+"px"},{duration:animationLength, easing:"easeInOutQuad"});
				thisDescription.stop().animate({"opacity": "0", "margin-top":"30px"},{duration:animationLength, easing:"easeInOutQuad"});

			}

		});

	});

	//animation of the gallery items - shadows over and a coloured box is guided to the item position
	$(".galleryImage").each(function(){

		var thisIcon = $(this).children("img.icon");
		var iconHeight = thisIcon.height();
		var thisDescription = $(this).children("span.description");

		$(this).on("mouseenter", function(evt){

			if(!$(this).hasClass("faded")){

				evt.stopPropagation();

				var thisWidth = $(this).width();
				var thisHeight = $(this).height();

				if($(this).children("#hover-item").length == 0)
					$(this).prepend("<div id='hover-item'></div>");
				var hoverItem = $(this).children("#hover-item");

				thisIcon.stop().animate({"opacity": "1", "margin-top":"-"+iconHeight+"px"},{duration:animationLength, easing:"easeInOutQuad"});
				hoverItem.stop().css("width","100%").animate({"opacity":"1", "right":"0px", "top":"0px", "height":thisHeight}, {duration:animationLength, easing:"easeInOutQuad"});

			}

		});

		//add leave listener
		$(this).on("mouseleave", function(evt){

			var hoverItem = $(this).children("#hover-item");

			thisIcon.stop().animate({"opacity": "0", "margin-top":"-"+iconHeight-20+"px"},{duration:animationLength, easing:"easeInOutQuad"});
			hoverItem.stop().animate({"opacity":"0", "height":"0px"}, {duration:animationLength, easing:"easeInOutQuad"});

		});

	});

}

//function that handles the custom scrollbar
function customScrollbar(){

	$("#main-wrapper").mCustomScrollbar({
	  set_width:false,
	  set_height:false,
	  horizontalScroll:false,
	  scrollInertia:550,
	  scrollEasing:"easeOutCirc",
	  mouseWheel:"auto",
	  autoDraggerLength:true,
	  scrollButtons:{
	    enable:false,
	    scrollType:"continuous",
	    scrollSpeed:20,
	    scrollAmount:40
	  },
	  advanced:{
	    updateOnBrowserResize:true,
	    updateOnContentResize:false,
	    autoExpandHorizontalScroll:false,
	    autoScrollOnFocus:true
	  },
	  callbacks:{
	    onScrollStart:function(){},
	    onScroll:function(){},
	    onTotalScroll:function(){},
	    onTotalScrollBack:function(){},
	    onTotalScrollOffset:0,
	    whileScrolling:false,
	    whileScrollingInterval:30
	  }
	});

}

//function that handles theme responsiveness
function responsive(){

	var menuWrapperWidth = $("#menu-wrapper").width();
	var menuWrapperHeight = $("#menu-wrapper").height();

	windowWidth = document.documentElement.clientWidth;
	windowHeight = document.documentElement.clientHeight;

	//split for smaller than 960px resolution - horizontal or vertical menu
	if(windowWidth<=960){

		//if menu is visible or not, adjust
		if(menuVisible)
			$("#main-wrapper").css({"top":menuWrapperHeight + 5 +"px", "height":windowHeight - menuWrapperHeight - 5 +"px", "width":"100%", "right":"0px"});
		else
			$("#main-wrapper").css({"top":"5px", "height":windowHeight - 5 + "px", "width":"100%", "right":"0px"});

		$("#menu-wrapper").css({"right":"0px"});

		$("#social-wrapper, #menu").css("display", "none");
		$("#tablet-menu").css("display", "block");

	}
	else{

		//if menu is visible or not, adjust
		if(menuVisible)
			$("#main-wrapper").css({"right":menuWrapperWidth + 5 +"px", "width":windowWidth - menuWrapperWidth - 5 +"px", "height":"100%", "top":"0px"});
		else
			$("#main-wrapper").css({"right":"5px", "width":windowWidth - 5 + "px", "height":"100%", "top":"0px"});

		$("#menu-wrapper").css({"top":"0px"});


		$("#social-wrapper, #menu").css("display", "block");
		$("#tablet-menu").css("display", "none");

	}

}

//function that handles the masonry gallery layout
function masonryGallery(){

	var $container = $('#masonryGallery');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector : '.masonryImage',
        columnWidth: function( containerWidth ) {
		    return containerWidth / 5;
		  },
		isResizable: true,
  		isAnimated: true
      });
    });

}

//function that handles the masonry blog layout
function masonryBlog(){

	var $container = $('#masonryBlog');

    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector : '.masonryBlogPost',
        columnWidth: function( containerWidth ) {
		    return containerWidth / 4;
		  },
		isResizable: true,
  		isAnimated: !Modernizr.csstransitions,
  		animationOptions: {
		    duration: 750,
		    easing: 'quad',
		    queue: false
		  }
      });
    });

}

//function that handles the ajax loading of the contents
function loadContents(anchorage){

	animateInAjax(function(){

		setTimeout(function(){

			//load contents
			$('#main-wrapper').load(anchorage, function(responseText, textStatus, req){

				//page not found - get the 404 error page
				if(textStatus == "error")
					$('#main-wrapper').load("404"+pageType, function(responseText, textStatus, req){

						animateBackFromAjax();

					});
				else
					animateBackFromAjax();

			});

		}, animationLength+400);

	});

}

//function that animated the menu into position to start ajax loading
function animateInAjax(callback){

	$("#social-wrapper").stop().animate({"opacity":"0"},{duration:animationLength, easing:"easeOutQuad"});
	$("#menu").stop().animate({"opacity":"0"},{duration:animationLength, easing:"easeOutQuad", complete:function(){

		//split for smaller than 960px resolution - horizontal or vertical menu
		if(windowWidth <= 960){

			//keep the old menu dimensions
			previousMenuDimensions = $("#menu-wrapper").height();

			$("#tablet-menu").css("display","none");
			$("#menu-wrapper").stop().animate({"height":"100%"},{duration:animationLength+200, easing:"easeOutQuad"});

		}
		else{

			//keep the old menu dimensions
			previousMenuDimensions = $("#menu-wrapper").width();

			$("#menu").css("display","none");
			$("#social-wrapper").css("display","none");
			$("#menu-wrapper").stop().animate({"width":"100%"},{duration:animationLength+200, easing:"easeOutQuad"});

		}

		$("#loader, #percentage").stop().animate({"opacity":"1"},{duration:animationLength, easing:"easeOutQuad"});
		$("#logo-wrapper").stop().animate({"top": "50%" , "margin-top":"-68px"},{duration:animationLength+200, easing:"easeOutQuad", complete:function(){

			callback();

		}});

	}});

}

//function that puts menu back after loading the elments via ajax
function animateBackFromAjax(){

	//make sure all images are fully loaded;
    innerImagesLoaded(function(){

		//split for smaller than 960px resolution - horizontal or vertical menu
		if(windowWidth <= 960)
			$("#menu-wrapper").stop().animate({"height":previousMenuDimensions + "px"},{duration:animationLength+200, easing:"easeInOutQuad", complete:function(){$("#menu-wrapper").css("height","")}});
		else
			$("#menu-wrapper").stop().animate({"width":previousMenuDimensions + "px"},{duration:animationLength+200, easing:"easeInOutQuad", complete:function(){$("#menu-wrapper").css("width","")}});

		$("#loader, #percentage").stop().animate({"opacity":"0"},{duration:animationLength, easing:"easeInOutQuad"});

		//when the entire animation's complete, run the appropriate inner page animation and add the custom scrollbar
		animateThis();

		$("#logo-wrapper").stop().animate({"top":"0%", "margin-top":"20px"},{duration:animationLength+200, easing:"easeInOutQuad", complete:function(){

			//split for smaller than 960px resolution - horizontal or vertical menu
			if(windowWidth <= 960)
				$("#tablet-menu").css("display","block");
			else{

				$("#menu").css("display","block");
				$("#social-wrapper").css("display","block");

			}

			$("#social-wrapper").stop().animate({"opacity":"1"},{duration:animationLength, easing:"easeInOutQuad"});
			$("#menu").stop().animate({"opacity":"1"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

				//add the custom scrollbar
				customScrollbar();

			}});

		}});

    });

}

//function that gets a div and returns true when all inner images are fully loaded
function innerImagesLoaded(callback){

	//make sure all images are fully loaded
	var images = $("#main-wrapper img");
    var nimages = images.length;
    var counter = nimages;
    var percentage;

    if(images.length > 0)
	    images.load(function() {

	    	percentage = Math.round(((nimages - counter) / nimages) * 100);

	    	if(percentage > 100)
	    		percentage = 100;

	    	percentage = percentage +"%";


	    	//update the percentage meter
	    	$("#percentage").html(percentage);

		    counter--;
		    if(counter == 0){

		    	//restore percentage to 0% and callback
		    	setTimeout(function(){$("#percentage").html("0%");},animationLength);
		    	callback();

		    }

		});
	else{

		//update the percentage meter
	    $("#percentage").html("100%");

		//restore percentage to 0% and callback
    	setTimeout(function(){$("#percentage").html("0%");},animationLength);
    	callback();

	}

}

//function that handles menu item animation
function animateMenuItems(){

	var menuWrapperHeight = $("#menu-wrapper .menu-item").height();

	//on mouse enter
	$(".menu-item").on("mouseenter", function(){

		var menuItem = $(this);

		menuItem.children(".menu-background").stop().animate({"opacity": "1", "top":"-1px"},{duration:animationLength, easing:"easeOutQuad"});
		menuItem.children(".menu-item").stop().animate({"opacity": "1", "top":"-1px"},{duration:animationLength, easing:"easeOutQuad"});
		menuItem.children(".menu-item").css("display","block");

	});

	//on mouse leave
	$(".menu-item").on("mouseleave", function(){

		var menuItem = $(this);

		menuItem.children(".menu-background").stop().animate({"opacity": "0", "top":-menuWrapperHeight+"px"},{duration:animationLength, easing:"easeOutQuad"});
		menuItem.children(".menu-item").stop().animate({"opacity": "0", "top":(menuWrapperHeight-10)+"px"},{duration:animationLength, easing:"easeOutQuad"});
		menuItem.children(".menu-item").css("display","none");

	});

}

//function that implements a input text hotfix; remove if you don't like it
function inputTextFix(){

	$("input[type='text'], input[type='password']").each(function(){

		//each time a user clicks on a input field
		$(this).click(function(){

			//save the current value, if any
			if($(this).attr("value")!=""){

				$(this).attr("previous_value", $(this).attr("value"));
				$(this).attr("value","");

			}

		});

		//on blur, if right empty, restore the saved value, if any
		$(this).blur(function(){

			if($(this).attr("value") == "")
				$(this).attr("value",$(this).attr("previous_value"));

		});

	});

}

//function that simply animates opacity of the social media icons
function animateSocialIcons(){

	$("#social-wrapper>a>img").on("mouseenter", function(){

		$(this).stop().animate({"opacity": "1"},{duration:animationLength, easing:"easeInOutQuad"});

	});

	$("#social-wrapper>a>img").on("mouseleave", function(){

		$(this).stop().animate({"opacity": "0.5"},{duration:animationLength, easing:"easeInOutQuad"});

	});

}

//function that animates and controls changing colours on the fly for the theme
function colourBoxes(){

	//on mouseover
	$(".colour-picker a").on("mouseenter", function(){

		$(this).find("img").stop().animate({"opacity": "1"},{duration:animationLength, easing:"easeInOutQuad"});

	});

	//on mouseout
	$(".colour-picker a").on("mouseleave", function(){

		$(this).find("img").stop().animate({"opacity": "0.5"},{duration:animationLength, easing:"easeInOutQuad"});

	});

	//onclick
	$(".colour-picker a").on("click", function(evt){

		//prevent default clicking behavior, change the css, and the javascript color value
		evt.preventDefault();

		$('#main-stylesheet').attr('href', "css/colours/"+$(this).find("img").attr("title")+".css");

		setTimeout(function(){

			var color = $("a").css("color");
			color = rgb2hex(color).split("#");
			hoverColor = color[1];

		}, animationLength);

	});

}

//template intro, run only once
function intro(){

	//finish the animation
	animationFinish();

	//animate menu items
	animateMenuItems();

	//animate social icons
	animateSocialIcons();

	//Tipsy implementation
	$('.with-tooltip').tipsy({gravity: $.fn.tipsy.autoNS, fade : true, offset:12});

	//responsiveness initiate
	responsive();

	//show / hide menu bar
	showHideMenu();

	//function that handles tablet menu clicks
	tabletMenuClick();

	//function that handles all normal links
	linkage();

}

//centering function
jQuery.fn.center = function () {
	this.css("position","absolute");
	this.css("top", ((document.documentElement.clientHeight - this.outerHeight()) / 2) + "px");
	this.css("right", ((document.documentElement.clientWidth - this.outerWidth()) / 2) + "px");
	return this;
}

//function that hides the universal preloader when everything is loaded
function animationFinish(){

	//make the animation progressively longer
	var counter = 0;

	//split for smaller than 960px resolution - horizontal or vertical menu
	if(windowWidth <= 960){

		var menuWrapperHeight = $("#menu-wrapper").height();

		//animate the menu and main wrappers
		$("#menu-wrapper").delay(400).animate({"opacity":"1", "top":"0px"},{duration:animationLength, easing: "easeInOutQuad"});
		$("#main-wrapper").delay(800).animate({"top":menuWrapperHeight + 5 +"px"},{duration:animationLength, easing: "easeInOutQuad", complete:function(){

			//load the clicked hash - index page instead
			loadHash();

		}});

	}
	else{

		var menuWrapperWidth = $("#menu-wrapper").width();

		//animate the menu and main wrappers
		$("#menu-wrapper").delay(400).animate({"opacity":"1", "right":"0px"},{duration:animationLength, easing: "easeInOutQuad"});
		$("#main-wrapper").delay(800).animate({"right":menuWrapperWidth + 5 + "px"},{duration:animationLength, easing: "easeInOutQuad", complete:function(){

			var numOfMenuItems = $("#menu>div.menu-item").length;
			//animate the items progressively
			$("#menu>div.menu-item").each(function(){
				$(this).delay(counter*50).animate({opacity:1},{duration:animationLength, easing: "easeInOutQuad", complete:function(){
					setTimeout(function(){
						//last menu item
						if(counter == numOfMenuItems)
							loadHash();
					}, counter*50);

				}});
				counter++;

			});

		}});
	}

	//bind the hash change event to appropriate handler
	$(window).bind('hashchange', function() {

		//load the clicked hash - index page instead
	    loadHash();

	});

}

//function that handles contact form basic validation
function validateForm(){

	//user clicked the reser button; reset all settings
	$("#clearForm").click(function(){

		$("#messageForm-contact").find("select, input, textarea").each(function(){

			$(this).animate({opacity:'0.1'},{duration:800, queue:true, easing: 'easeInOutQuad', complete:function(){

				$(this).attr("value","");
				$(this).animate({opacity:'1'},{duration:300, queue:true, easing: 'easeInOutQuad'});

			}});

		});

	});

	//variable that acts as a flag; if true, a validation error occured
	var flag = "";

	$("#submitForm").click(function(){

		$("#loadingForm").css("display","inline"); //IE fix
		$("#loadingForm").css("opacity","1");

		//nice fake loading animation trick; remove if it bothers you
		$("#loadingForm").delay(2000).animate({opacity:'1'},{duration:10, easing: 'easeInOutQuad', complete:function(){

			flag = "";
			$("#loadingForm").animate({opacity:'0'},{duration:100, easing: 'easeInOutQuad'});
			$("#loadingForm").css("display","none"); //IE fix

			//get all required elements
			$("#messageForm-contact").find("*.required").each(function(){

				$(this).removeClass("error");

				//if any of them is null
				if($(this).val().length == 0){

					$(this).addClass("error");
					$(this).stop().animate({opacity:'1'},{duration:animationLength, easing: 'easeInOutQuad'});

					//validation error
					flag += "Form field <strong>"+$(this).attr("name")+"</strong> is empty, please give a value<br />";

				}

			});

			//email validation
			var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
			var emailValue = $("#email").val();

			if(!emailReg.test(emailValue))
				flag += "Not a valid <strong>email</strong>! Please try again<br />";

			if(flag=="") {

					//submit form via ajax
				    var dataString = 'name='+ $("#name").attr("value") + '&email=' + $("#email").attr("value") + '&subject=' + $("#subject").attr("value")  + '&message=' + $("#message").attr("value");
				    //alert (dataString);return false;
				    $.ajax({
				      type: "POST",
				      url: "php/mail.php",
				      data: dataString,
				      error: function(xhr, ajaxOptions, thrownError){

				       	$("#contact-notice").removeClass("ok notice alert error");
						$("#contact-notice").addClass("error");
				      	$("#contact-notice").css("opacity","0.3");
						$("#contact-notice").stop().animate({opacity:'1'},{duration:animationLength, easing: 'easeInOutQuad'});
				      	$("#contact-notice").html("Error "+xhr.status+" - "+thrownError+" | Please contact our <strong>support team</strong> with this code!");

				      }
					  }).done(function(data){

					  	//get and filter return data
					  	var data = data.split("^");

				      	$("#contact-notice").removeClass("ok notice alert error");

				      	//change message type on success or error
				      	if(data[0] == "ok")
							$("#contact-notice").addClass("ok");
						else
							$("#contact-notice").addClass("error");

						$("#contact-notice").css("opacity","0.3");
						$("#contact-notice").stop().animate({opacity:'1'},{duration:animationLength, easing: 'easeInOutQuad'});
				        $("#contact-notice").html(data[1]);

				      });

			}
			else {

				//validation errors, alert
				$("#contact-notice").css("opacity","0.3");
				$("#contact-notice").removeClass("ok notice alert error");
				$("#contact-notice").addClass("error");
				$("#contact-notice").html(flag);
				$("#contact-notice").stop().animate({opacity:'1'},{duration:animationLength, easing: 'easeInOutQuad'});

			}

		}});

	});

}

//function that handles normal clicks
function linkage(){

	$("a").on("click", function(evt){

		//prevent default redirection - that's only for crawlers
		evt.preventDefault();
		evt.stopPropagation();

		//ignore links with the 'ignore' class
		if(!$(this).hasClass("ignore")){

			var thisHash = $(this).attr("href").split(pageType);
			window.location.hash = "#"+thisHash[0];

		}

	});

}

//function that handles tablet menu clicks
function tabletMenuClick(){

	$("#tablet-menu").on("change", function(){

		window.location.hash = $(this).find('option:selected').val();

	});

}

//function that animates buttons and other elements on hover
function animateOnHover(){

	$("a.button, .closeButton, .nextButton, .previousButton, .playButton").on("mouseenter", function(){

		if(!$(this).hasClass("disabledButton"))
			$(this).stop().animate({"backgroundColor": "'#"+hoverColor+"'"},{duration:animationLength, easing:"easeInOutQuad"});

	});

	$("a.button, .closeButton, .nextButton, .previousButton, .playButton").on("mouseleave", function(){

		if(!$(this).hasClass("disabledButton"))
			$(this).stop().animate({"backgroundColor": "#000000"},{duration:animationLength, easing:"easeInOutQuad"});

	});

}

//function that handles blog list post and about us circle animation and blog list linking
function blogListPost(){

	//attach event to appropriate handlers
	$("div.blog-post, .about-circle").on("mouseenter", mouseEnter);
	$("div.blog-post, .about-circle").on("mouseleave", mouseLeave);

	function mouseEnter(evt){

		evt.stopPropagation();

		//create a new 'background' div, prepare it, then animate it in
		if($(this).find(".blog-background").length == 0)
			$(this).prepend("<div class='blog-background'></div>");

		var thisHeight = $(this).outerHeight();
		var thisWidth = $(this).outerWidth();
		var thisBackground = $(this).find(".blog-background");

		//adjust coloring
		$(this).addClass("blog-post-light");

		thisBackground.css({"height":thisHeight+"px", "width":thisWidth+"px"});
		thisBackground.stop().animate({"opacity": "1", "top":"0px"},{duration:animationLength, easing:"easeInOutQuad"});

	}

	function mouseLeave(evt){

		evt.stopPropagation();

		var thisBackground = $(this).find(".blog-background");
		var thiss = $(this);

		thiss.removeClass("blog-post-light");
		thisBackground.stop().animate({"opacity": "0", "top":"-40px"},{queue:true, duration:animationLength});

	}

	$("div.blog-post").on("click", function(evt){

		evt.stopPropagation();

		//get the href attribute of the blog-post-link link and directs to it
		var thisHash = $(this).find("a.blog-post-link").attr("href").split(pageType);
		window.location.hash = "#"+thisHash[0];

	});

}

//function to convert hex format to a rgb color
function rgb2hex(rgb) {

	rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
	return "#" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);

}

function hex(x) {

	return isNaN(x) ? "00" : hexDigits[(x - x % 16) / 16] + hexDigits[x % 16];

}

//function that automatically adjusts images with the .item class based on their width/height
function autoImageAdjust(){

	$(".galleryImage, .simpleImage").each(function(){

		//wait for images to fully load
		$(this).imagesLoaded(function(){

			var thisItem = $(this).children("img.item");
			var thisHeight = thisItem.height();
			var thisWidth = thisItem.width();
			var ratio = thisWidth / thisHeight;

			//if the height is smaller than the container, increase the width
			if(thisHeight < $(this).height()){

				var thisWidth = thisItem.width() + (ratio *($(this).height() - thisHeight)) + 50;
				thisItem.width(parseInt(Math.round(thisWidth))+"px");

			}

		});

	});

}

//this function filters galleryImages
function filterGalleryImages(){

	$(".filter-box a.button").on("click", function(evt){

		evt.preventDefault();

		//save the choice
		var choice = $(this).attr("title");

		//restore all faded items
		$(".galleryImage.faded").stop().animate({"opacity": "1"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

			$(this).removeClass("faded");
			$(this).removeAttr("style");

		}});

		if(choice != "all")
			$(".galleryImage").each(function(){

				if($(this).attr("title") != choice){

					$(this).stop().animate({"opacity": "0.2"},{duration:animationLength, easing:"easeInOutQuad", complete:function(){

						$(this).addClass("faded");

					}});

				}

			});

	});

}
