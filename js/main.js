function startGoogleFeeds() {
	// Use Google Feed API for RSS Feeds
	google.load("feeds", "1");
	google.setOnLoadCallback(initializeFeedAPI);
}

$(document).ready(function()
{
	// When the menu bar is hovered over, it glows.
	$(".fa.fa-bars").hover(function()
	{
		$(this).toggleClass("menuHover");
	});

	// When it is clicked, the menu panel appears and the main screen darkens
	$(".fa.fa-bars").click(function()
	{
		$(".menuPanel").slideToggle();
		
		toggleVision("darken");
	});

	/*
	When the user hovers the right-center side of the website,
	arrows appear and move left and right. Upon removing focus, the arrows
	disappear.
	*/
	$(".cabinethover").hover(function()
	{
		$(".fa.fa-arrow-left").show();
		$(".fa.fa-arrow-left").animate({right:'+=10px'},500);

		for(var i=0; i < 10; i++)
		{
			setTimeout(function()
			{
				$(".fa.fa-arrow-left").animate({right: '0px'},500);
			},500);

			setTimeout(function()
			{
				$(".fa.fa-arrow-left").animate({right: '10px'},500);
			},500);
		}
	},
	function()
	{
		$(".fa.fa-arrow-left").hide();
	});

	/*
	If the user clicks the arrows, the cabinet appears and the website darkens.
	*/
	$(".cabinethover").click(function()
	{
		toggleVision("cabinet");
		toggleVision("darken");
		$(".fa.fa-arrow-left").hide();
		$(".cabinethover").hide();
	});

	/*
	If the user clicks outside of the cabinet, the cabinet disappears.
	This ONLY works if the cabinet is visible. Will not work with the menu.
	*/
	$("#darken").click(function()
	{
		if($("#cabinet").css("display") == "block")
		{
			toMainScreen();
		}

		if($(".menuPanel").css("display") == "block")
		{
			$(".menuPanel").slideToggle();
			toggleVision("darken");
		}
	});

	/*--------Dragging functionality----------*/
	// Moving your mouse into a block will highlight it.
	$(".miniblocks").mouseenter(function ()
	{
		$(this).css("border-color", "yellow");
	});

	// Moving your mouse out of a block will return it to default.
	$(".miniblocks").mouseleave(function ()
	{
		$(this).css("border-color", "black");
	});

	// All blocks except the block with #extrafeed identifier can be dragged.
	$(".blocks").not("#extrafeed").draggable({
		containment: 'body',
		addClasses: false,
		revert: true,
	});
	/*
	Make the miniblocks draggable. 
	The miniblocks must stay within the body's constraint/boundaries. 
	*/
	$(".miniblocks").draggable({
		containment: 'body',
		revert: 'invalid',
		addClasses: false,
		helper: 'clone',
		appendTo: 'body',
		/* 
		On drag, the miniblock glows and adds its ID to the clone,
		styling the clone to look like the original.
		*/
		start: function (event, ui)
		{
			$("#cabinet").css("border-color", "yellow");
			$(ui.helper).attr("id", ui.helper.context.id);
			$(ui.helper).attr("z-index", 5);
		},
		/*
		While dragging, if the miniblock ever leaves the cabinet, 
		the function toMainScreen is activated. Refer to comments on
		top of the function for details.
		*/
		drag: function(event, ui)
		{
			//console.log(ui.helper.offset().left);
			//console.log($(this).position().left);
			if (ui.helper.offset().left <= $("#cabinet").offset().left)
			{
				toMainScreen();
			}
		},
		/*
		When done dragging, the cabinet returns to its normal colour.
		*/
		stop: function(event, ui)
		{
			$("#cabinet").css("border-color", "black")
		}
	});

	/*
	Divs with the class "blocks" will accept divs with the class 
	"miniblocks"
	*/
	$(".blocks").not("#extrafeed").droppable({
		accept: '.miniblocks, .blocks',
		hoverClass: 'ui-state-active',
		tolerance: 'pointer',
		drop: function(event, ui)
		{
			//console.log($(this));
			//console.log(ui);
			if ($("#cabinet").css("display") != "block")
			{
				// The block accepting the element
				var bID = $(this).context.id;
				// The block being dragged into the element
				var mbID = ui.draggable.context.id;

				$(this).attr("id", mbID);
				$(this).find("p:first").html(ui.draggable.context.innerText);

				ui.draggable.context.id = bID;
				ui.draggable.context.innerHTML = "<p>" + 
				bID.charAt(0).toUpperCase() +
				bID.slice(1) + "</p>";
			}
		}
	});

	/* 
	The problem lies here. Apparently, #darken is everywhere. So it doesn't
	matter where I drop the miniblock when I pick it up. I have to figure out
	how to get the cabinet to intercept the droppable. If I drop it outside of
	the cabinet, the program knows that. So how do I let it know that if
	it was dropped inside the cabinet to NOT allow #darken to accept the 
	droppable?
	*/
	// $("#darken").droppable({
	// 	accept: '.miniblocks',
	// 	drop: function(event, ui)
	// 	{
	// 		var num = prompt("Section 1, 2 or 3?");
	// 		toMainScreen();
	// 		if(num == 1 || num == 2 || num == 3)
	// 		{
	// 			// ID that is being replaced
	// 			var id = document.getElementsByClassName("blocks")[num-1].id;
	// 			// ID we are replacing with
	// 			var draggedid = ui.draggable.context.id;

	// 			$(".blocks#" + id).after(sectionReplace(ui.draggable));
	// 			$(".blocks#" + id).remove();

	// 			$(".miniblocks#" + draggedid).html("<p>" + id.charAt(0).toUpperCase() + id.slice(1) + "</p>");
	// 			$(".miniblocks#" + draggedid).attr("id", id);
	// 			console.log("Miniblock dropped!");
	// 		}
	// 		else
	// 		{
	// 			console.log("Reverted miniblock. No changes made.");
	// 		}
	// 	}
	// });
});

function toggleVision(obj)
{
	var id = "#" + obj;
	if(document.getElementById(obj).style.display == "block")
		$(id).css("display", "none");
	else
		$(id).css("display", "block");
}

/*
Makes the cabinet disappears and lightens the site again.
*/
function toMainScreen()
{
	toggleVision("cabinet");
	toggleVision("darken");
	$(".cabinethover").show();
}

/* Jean Done */
/* Avery Start */

// Google RSS Feed API callback function
// TODO: protect against xss
// TODO: properly format RSS output
// TODO: get feed list from database
// TODO: style output
// TODO: change number of elements that we load

// loads the user's RSS feeds, sorts by date, and appends the output to #extrafeed
function initializeFeedAPI() 
{
	var feedList = [];

	// get the current user's feed list from the data base
	$.ajax({
		url: "getFeedList.php",
		datatype: "json",
		data: {"username": "user001"}, // currently hardcoded to load test user
		async: false,
		success: function (data) {
			var obj = jQuery.parseJSON(data);
			for (var i = 0; i < obj.length; i++) {
				feedList.push(obj[i]['rssURL']);
			}
		}
	});

	// go through the list adding the content
	for(var i = 0; i < feedList.length; i++) {
		var feed = new google.feeds.Feed(feedList[0]);
		feed.load(function(result) {
			if(!result.error) {
				for(var j = 0; j < result.feed.entries.length; j++) {
					var entry = result.feed.entries[j];
					$("#extrafeed").append($("<div><p>" + entry.title + "</p></div>")) 
				}
			}
		});
	}
}

/* Avery Done */

/* !function(d,s,id)
{
	var js,fjs=d.getElementsByTagName(s)[0],
	p=/^http:/.test(d.location)?'http':'https';

	if(!d.getElementById(id))
		{
			js=d.createElement(s);
			js.id=id;
			js.src=p+"://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
		}
}(document,"script","twitter-wjs"); */